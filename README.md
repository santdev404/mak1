# Maniak project

The project have two github repositories, "mak1" for PHP Backend and "mak-front" for Angular Frontend.
The projects establish communications each others through URL with API calls.
Below are the instructions to setup all the tools and config all the requires php files. 
I strongly recommend to perform all the installations on a machine with Ubuntu operational system.

## PHP
Please follow the below instrution to setup the PHP enviroment:

- Install LAMP last version, in /opt/ directory, with the default configurations (Mysql, default root user credentials).

Database credentials
user: root
pass: 

- Create a directory "project" in '/opt/lampp/htdocs/'
- Install Componser last version.
- Once LAMP and Composer tools are installed, download the "santdev404/mak1" php repository in '/opt/lampp/htdocs/project' directory.

The next step is config the virtual host

- At the '/opt/lampp/etc/extra' directory inside the file 'httpd-vhosts.conf', add the next code and save:

<VirtualHost *:80>
    DocumentRoot "/opt/lampp/htdocs/project/public"
    ServerName maniak.com.devel
    ServerAlias www.maniak.devel
    <Directory "/opt/lampp/htdocs/project/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Order Deny,Allow
        Allow from all
    </Directory>
</VirtualHost>


- At the '/etc' directory add the next line inside the hosts file and save:


127.0.0.1       maniak.com.devel

- Restart the php apache server.

Then follow the next steps:

- Starts the Apache server and Mysql throught LAMP console.
- Once the apache server and mysql database are on, open a google chrome browser and type this url 'http://localhost/phpmyadmin/'

### Database setup

In order to create the database, please follow the next instructions:

- Open the file 'database.sql', from the project.
- Copy all the content of the file 'database.sql'.
- On mysql tab in google chrome select the option SQL.
- Paste all the content of the 'database.sql'.
- Run all the commands at once.
- Check if the database maniank and all the tables were created.


## Angular

The next step need to be follow to install the angular enviroment.

- Download the last Node version.
- Create a directory "project-angular" in '/opt/lampp/htdocs/'
- Download the "santdev404/mak-front" angular repository in '/opt/lampp/htdocs/project-angular' directory.
- In the '/opt/lampp/htdocs/project-angular' install all the dependencies with 'npm update --force'
- On terminal starts the project with 'npm serve' command. 