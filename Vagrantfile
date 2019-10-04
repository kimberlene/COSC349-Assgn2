# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.
Vagrant.configure("2") do |config|
  # Online Vagrantfile documentation is at https://docs.vagrantup.com.

  # The AWS provider does not actually need to use a Vagrant box file.
  config.vm.box = "dummy"

  config.vm.provider :aws do |aws, override|
    # We will gather the data for these three aws configuration
    # parameters from environment variables (more secure than
    # committing security credentials to your Vagrantfile).
    #
    # aws.access_key_id = "YOUR KEY"
    # aws.secret_access_key = "YOUR SECRET KEY"
    # aws.session_token = "SESSION TOKEN"

    # The region for Amazon Educate is fixed.
    aws.region = "us-east-1"

    # These options force synchronisation of files to the VM's
    # /vagrant directory using rsync, rather than using trying to use
    # SMB (which will not be available by default).
    override.nfs.functional = false
    override.vm.allowed_synced_folder_types = :rsync

    # Following the lab instructions should lead you to provide values
    # appropriate for your environment for the configuration variable
    # assignments preceded by double-hashes in the remainder of this
    # :aws configuration section.

    # The keypair_name parameter tells Amazon which public key to use.
    aws.keypair_name = "cosc349"
    # The private_key_path is a file location in your macOS account
    # (e.g., ~/.ssh/something).
    override.ssh.private_key_path = "~/.ssh/cosc349.pem"

    # Choose your Amazon EC2 instance type (t2.micro is cheap).
    aws.instance_type = "t2.micro"

    # You need to indicate the list of security groups your VM should
    # be in. Each security group will be of the form "sg-...", and
    # they should be comma-separated (if you use more than one) within
    # square brackets.
    #
    aws.security_groups = ["sg-030ea28d805b9fc56", "sg-0f79c1398dc36da71"]

    # For Vagrant to deploy to EC2 for Amazon Educate accounts, it
    # seems that a specific availability_zone needs to be selected
    # (will be of the form "us-east-1a"). The subnet_id for that
    # availability_zone needs to be included, too (will be of the form
    # "subnet-...").
    aws.availability_zone = "us-east-1a"
    aws.subnet_id = "subnet-6cde3d21"

    # You need to chose the AMI (i.e., hard disk image) to use. This
    # will be of the form "ami-...".
    # 
    # If you want to use Ubuntu Linux, you can discover the official
    # Ubuntu AMIs: https://cloud-images.ubuntu.com/locator/ec2/
    #
    # You need to get the region correct, and the correct form of
    # configuration (probably amd64, hvm:ebs-ssd, hvm).
    #
    aws.ami = "ami-04763b3055de4860b"

    # If using Ubuntu, you probably also need to uncomment the line
    # below, so that Vagrant connects using username "ubuntu".
    override.ssh.username = "ubuntu"
  end

  config.vm.define "webserver1" do |webserver1|
    # These are options specific to the webserver VM
    webserver1.vm.hostname = "webserver1"
    
    webserver1.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's webserver's configuration to use shared folder.
      # (Look inside test-website.conf for specifics.)
      cp /vagrant/test-website.conf /etc/apache2/sites-available/
      
      # activate our website configuration ...
      a2ensite test-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL
  end

  config.vm.define "webserver2" do |webserver2|
    webserver2.vm.hostname = "webserver2"

    webserver2.vm.provision "shell", inline: <<-SHELL
      apt-get update
      apt-get install -y apache2 php libapache2-mod-php php-mysql
            
      # Change VM's webserver's configuration to use shared folder.
      # (Look inside query-website.conf for specifics.)
      cp /vagrant/query-website.conf /etc/apache2/sites-available/

      
      # activate our website configuration ...
      a2ensite query-website
      # ... and disable the default website provided with Apache
      a2dissite 000-default
      # Reload the webserver configuration, to pick up our changes
      service apache2 reload
    SHELL


  end

  # Enable provisioning with a shell script. Additional provisioners such as
  # Puppet, Chef, Ansible, Salt, and Docker are also available. Please see the
  # documentation for more information about their specific syntax and use.
  config.vm.provision "shell", inline: <<-SHELL
     apt-get update
     apt-get install -y apache2
   SHELL
  

  




end
