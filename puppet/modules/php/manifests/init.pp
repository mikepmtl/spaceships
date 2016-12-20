# vagrant/puppet/modules/php/manifests/init.pp

class php {

  # Install the php5-fpm and php5-cli packages
  package { [ 'php-fpm',
              'php-common',
              'php-mysql',
              'php-mcrypt',
              'php-curl',
              'php-xml',
              'mcrypt',
              'php-xdebug',
             ]:
    ensure => present,
    require => Class['apt']
  }


  # Add the xdebug.ini config
  file { 'xdebug.ini':
    path => '/etc/php/7.0/mods-available/xdebug.ini',
    ensure => file,
    require => Package['php-xdebug'],
    source => 'puppet:///modules/php/xdebug.ini',
    audit   => content,
    notify  => Service["php7.0-fpm"],
  }

  # Add the php.ini config
  file { 'php.ini':
    path => '/etc/php/7.0/fpm/php.ini',
    ensure => file,
    source => 'puppet:///modules/php/php.ini',
    audit => content,
    require => Package['php-fpm'],
    notify  => Service['php7.0-fpm']
  }


  # Make sure php5-fpm is running
  service { 'php7.0-fpm':
    ensure => running,
    require => Package['php-fpm']
  }

# /usr/sbin/php5enmod/php5enmod mcrypt
#   exec { 'php5enmod':
#     command => "/usr/sbin/php5enmod mcrypt",
#     notify => Service['php5-fpm']
#   }

  #build mongo extension with PECL
  # exec { 'pecl_mongo':
  #   command => "/usr/bin/printf '\n' | /usr/bin/pecl install mongo",
  #   unless => "/usr/bin/pecl list mongo",
  #   require => Package['php5-dev']
  # }

  # exec { 'pecl_mongo_mods':
  #   command => "/usr/bin/printf extension=mongo.so > /etc/php5/mods-available/mongo.ini",
  #   require => Exec['pecl_mongo'],
  #   creates => '/etc/php5/mods-available/mongo.ini'
  # }

  # /usr/sbin/php5enmod/php5enmod mcrypt
  # exec { 'enable_mongo':
  #   command => "/usr/sbin/php5enmod mongo",
  #   require => Exec['pecl_mongo_mods'],
  #   creates => "/etc/php5/fpm/conf.d/20-mongo.ini",
  #   notify => Service['php5-fpm']
  # }


}

