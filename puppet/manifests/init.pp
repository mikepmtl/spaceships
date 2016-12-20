
exec { 'apt-get update':
  path => '/usr/bin'
}

exec { 'locale-gen':
  path => '/bin:/usr/bin:/usr/sbin',
  command => "locale-gen en_US",
  require => Exec['apt-get update'],
  unless => "locale -a | grep en_US"
}

package { 'apt-file':
  ensure => present,
  require => Exec['apt-get update']
}

package { 'unzip':
  ensure => present,
  require => Exec['apt-get update']
}

package { 'vim':
  ensure => present,
  require => Exec['apt-get update']
}

package { 'lynx':
  ensure => present,
  require => Exec['apt-get update']
}

package { 'wget':
  ensure => present,
  require => Exec['apt-get update']
}

package { 'git':
  ensure => present,
  require => Exec['apt-get update']
}

file { '/var/sites/postcardmania.aboutmikep.com':
  ensure => 'directory'
}


host { 'postcardmania.aboutmikep.com':
  ip => '192.168.56.110'
}


class {'groups': }

class {'users': }


class { 'apt':
  update => {
    frequency => 'daily',
  },
}

######################################
# PHP
#

class { 'php': }


######################################
# NGINX
#

class { 'nginx': }



