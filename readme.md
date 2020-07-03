# Quản Trị Mạng

## Proxy (Choose one of two ways below)
### Static
```
sudo nano /etc/apt/apt.conf.d/proxy.conf
```
add the following lines
```
Acquire {
  HTTP::proxy "http://cache-st.ctu.edu.vn:3128";
  HTTPS::proxy "http://cache-st.ctu.edu.vn:3128";
}
```
Save your changes and exit the text editor.
Your proxy settings will be applied the next time you run Apt.

[link detailed](https://www.serverlab.ca/tutorials/linux/administration-linux/how-to-set-the-proxy-for-apt-for-ubuntu-18-04/)
### Temporay
```
export http_proxy=http://cache-st.ctu.edu.vn:3128
export https_proxy=http://cache-st.ctu.edu.vn:3128
```
### Git Proxy
```
git config --global http.proxy http://cache-st.ctu.edu.vn:3128
```
## Static IP Config
To configure your system to use static address assignment, create a netplan configuration in the file **/etc/netplan/99_config.yaml**
```
sudo vi /etc/netplan/99_config.yaml
```
add following lines 
```
network:
  version: 2
  renderer: networkd
  ethernets:
    eth0:
      addresses:
        - 10.10.10.2/24
      gateway4: 10.10.10.1
      nameservers:
          addresses: [172.18.27.2, 172.18.27.6]
```
Then save it and run to apply
```
sudo netplan apply
```

## Web service
### Install Apache2
```
sudo apt-get install apache2
```
### Install PHP
```
sudo apt-get install php
```
### Install MYSQL
```
sudo apt-get install mysql-server
sudo apt-get install php-mysql
```
### Configure Remote Mysql
Modify file **/etc/mysql/mysql.conf.d/mysqld.cnf**
```
sudo vi /etc/mysql/mysql.conf.d/mysqld.cnf
```
- Change 
```
bind-address            = 127.0.0.1
```
- To
```
bind-address            = 0.0.0.0
```
- Then, Restart the Ubuntu MysQL Server.
```
systemctl restart mysql.service
```
### Connect To MySQL
```
sudo mysql -u root -p
```
- Create a database
```
mysql>create database test_db
```
- Create **remote account**
```
mysql>CREATE USER 'username'@'%' IDENTIFIED BY 'password';
```
- Grant Privileges to user
```
mysql>GRANT ALL PRIVILEGES ON test_db. * TO 'username'@'%';
```
