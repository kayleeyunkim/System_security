sudo apt-get update
sudo apt-get install apache2
sudo apt-get install mysql-server libapache2-mod-auth-mysql php5-mysql
php -r 'echo "\n\nPHP installation successful.\n\n\n";'
sudo mysql_install_db
echo | sudo /usr/bin/mysql_secure_installation