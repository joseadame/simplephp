Vagrant.configure(2) do |config|
  config.vm.box = "hashicorp/precise64"
  config.vm.network "forwarded_port", guest: 8000, host: 8000
  config.vm.network "forwarded_port", guest: 80, host: 8080
  config.vm.synced_folder ".", "/vagrant_data"
  config.vm.provider "virtualbox" do |v|
    v.memory = 1024
  end
  config.vm.provision "shell", inline: <<-SHELL
    # Init setup
    sudo apt-get update
    sudo apt-get install -y python-software-properties
    # PHP & Composer
    sudo add-apt-repository ppa:ondrej/php5-5.6
    sudo apt-get update
    sudo apt-get install -y curl git php5 php5-curl php5-cli php5-mysql
    curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer
    # MySQL
    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
    sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
    sudo apt-get -y install mysql-server
    # PHPMyAdmin (& Apache2)
    sudo add-apt-repository ppa:ondrej/apache2
    sudo apt-get update
    sudo apt-get install -y apache2 libapache2-mod-php5 php5-mcrypt
    sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
    sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password root"
    sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password root"
    sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password root"
    sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
    apt-get install -y phpmyadmin
    sudo php5enmod mcrypt
    sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/sites-enabled/phpmyadmin.conf
    sudo service apache2 restart
  SHELL
end