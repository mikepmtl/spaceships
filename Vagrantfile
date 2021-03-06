# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.


module OS

  def self.windows
    (/cygwin|mswin|mingw|bccwin|wince|emx/ =~ RUBY_PLATFORM) != nil
  end

  def self.mac
   (/darwin/ =~ RUBY_PLATFORM) != nil
  end

  def self.unix
    !self.windows
  end

  def self.linux
    self.unix and not self.mac
  end

end



Vagrant.configure(2) do |config|


  # The most common configuration options are documented and commented below.
  # For a complete reference, please see the online documentation at
  # https://docs.vagrantup.com.

  # Every Vagrant development environment requires a box. You can search for
  # boxes at https://atlas.hashicorp.com/search.

  config.vm.box = "ubuntu/xenial64"

  # Disable automatic box update checking. If you disable this, then
  # boxes will only be checked for updates when the user runs
  # `vagrant box outdated`. This is not recommended.

  config.vm.box_check_update = true

  # Time to wait for boot
  config.vm.boot_timeout = 600


  # Set the hostname

  config.vm.hostname = "postcardmania.aboutmikep.com"

  # Create a forwarded port mapping which allows access to a specific port
  # within the machine from a port on the host machine. In the example below,
  # accessing "localhost:8080" will access port 80 on the guest machine.

  # config.vm.network "forwarded_port", guest: 80, host: 8001
  # config.vm.network "forwarded_port", guest: 9200, host: 9200

  # Create a private network, which allows host-only access to the machine
  # using a specific IP.

  config.vm.network "private_network", ip: "192.168.56.110"

  # Create a public network, which generally matched to bridged network.
  # Bridged networks make the machine appear as another physical device on
  # your network.
  config.vm.network "public_network"

  # bridge: [ "en1: Wi-Fi (AirPort)", "en1: Thunderbolt 1", "en2: Thunderbolt 2" ]
  # use_dhcp_assigned_default_route: true,

  # Share an additional folder to the guest VM. The first argument is
  # the path on the host to the actual folder. The second argument is
  # the path on the guest to mount the folder. And the optional third
  # argument is a set of non-required options.
  # config.vm.synced_folder "../data", "/vagrant_data"

  config.vm.synced_folder ".", "/var/sites/postcardmania.aboutmikep.com", owner: "www-data", group: "www-data", create: true

  #config.vm.synced_folder "/var/www/tomcat7/webapps", "/var/lib/tomcat7/webapps",
  #      owner: "root", group: "root"

  #config.vm.synced_folder "/var/www/tomcat7/logs-adhoc-reports", "/var/lib/tomcat7/logs-adhoc-reports",
  #      owner: "root", group: "root"




    # SSH options.
    config.ssh.insert_key = true
    config.ssh.forward_agent = true


  # Provider-specific configuration so you can fine-tune various
  # backing providers for Vagrant. These expose provider-specific options.
  # Example for VirtualBox:





  config.vm.provider "virtualbox" do |vb|

    # Display the VirtualBox GUI when booting the machine
    vb.gui = false

    # Customize the amount of memory on the VM:
    vb.memory = "2048"

  end

  # View the documentation for the provider you are using for more
  # information on available options.

  # Define a Vagrant Push strategy for pushing to Atlas. Other push strategies
  # such as FTP and Heroku are also available. See the documentation at
  # https://docs.vagrantup.com/v2/push/atlas.html for more information.
  # config.push.define "atlas" do |push|
  #   push.app = "YOUR_ATLAS_USERNAME/YOUR_APPLICATION_NAME"
  # end

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "shell", inline: <<-SHELL
  FILE=/tmp/aptupdate
  if [ ! -f $FILE ]; then
    sudo apt-get update
    touch $FILE
  fi
  if ! dpkg --get-selections | grep "^puppet\s.*install$"; then
    sudo apt-get install -y puppet
  fi
  SHELL


  # PROVISIONING
  config.vm.provision "puppet" do |puppet|
    puppet.manifests_path = 'puppet/manifests'
    puppet.module_path = 'puppet/modules'
    puppet.manifest_file = 'init.pp'
  end


end
