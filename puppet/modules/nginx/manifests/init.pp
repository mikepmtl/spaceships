# vagrant/puppet/modules/nginx/manifests/init.pp

class nginx {

  # Install the nginx package. This relies on apt-get update
  package { 'nginx':
    ensure => 'present',
    require => Class['apt']
  }

  # Add a host template
  file { 'vagrant-nginx':
    audit => 'content',
    path => '/etc/nginx/sites-available/postcardmania_aboutmikep_com.conf',
    ensure => file,
    require => Package['nginx'],
    source => 'puppet:///modules/nginx/postcardmania_aboutmikep_com.conf',
    notify => Service['nginx'],
  }

  # Disable the default nginx vhost
  file { 'default-nginx-disable':
    path => '/etc/nginx/sites-enabled/default',
    ensure => absent,
    require => Package['nginx'],
  }

  # Symlink our vhost in sites-enabled to enable it
  file { 'vagrant-nginx-enable':
    path => '/etc/nginx/sites-enabled/postcardmania_aboutmikep_com.conf',
    target => '/etc/nginx/sites-available/postcardmania_aboutmikep_com.conf',
    ensure => link,
    notify => Service['nginx'],
    require => [
      File['vagrant-nginx'],
      File['default-nginx-disable']
    ]
  }

  # Make sure that the nginx service is running
  service { 'nginx':
    ensure => running,
    require => [ Package['nginx'], File['vagrant-nginx-enable'] ]
  }

}
