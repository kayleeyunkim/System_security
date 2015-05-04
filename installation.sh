#!/bin/bash
sudo apt-get install lamp-server^
sudo nano/etc/mysql.cnf
sudo apt-get install phpmyadmin
sudo dpkg-reconfigure -plow phpmyadmin
sudo ln -s /etc/phpmyadmin/apache.conf /etc/apache2/conf-available/phpmyadmin.conf
sudo a2enconf phpmyadmin
sudo /etc/init.d/apache2 reload
mysql -u root << EOF
adduser binker
sudo usermod -a -G sudo binker
use mysql;
SET PASSWORD FOR 'root'@'localhost' = PASSWORD('admin');
GRANT ALL PRIVILEGES ON *.* TO 'binker'@'localhost' IDENTIFIED BY 'admin' WITH GRANT OPTION;
CREATE DATABASE Comp424;
CREATE TABLE students (userid INT AUTO_INCREMENT,today INT,username TEXT, fname TEXT, lname TEXT, email TEXT, birthday DATE, userpass TEXT);
SHOW TABLES;
\q;
EOF