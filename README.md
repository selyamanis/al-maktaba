Al·Maktaba | الـمـكـتـبـة
=========================

**"Al·Maktaba | الـمـكـتـبـة" is an Open Source Library Application**

Programming languages : PHP, MySQL, JavaScript..

This application helps to manage (add / show / edit / delete) the information of :

- Books
- Attachments to the books : all documents types , media files ..
- Books categories
- Authors
- Lend books
- Members : ranges of permitted actions
- Filter search
- ..

## Requirements

 * PHP version 7.4 or higher
 * Apache2 server
 * MySQL

## Installation

#### Download 

Download the latest release of "Al·Maktaba | الـمـكـتـبـة" application.

Extract the ZIP file on your server. Such as a local server accessible at : http://localhost/.

#### Database 

Create a database with the name "al-maktaba_db", by using this command line in SQL terminal :

    CREATE DATABASE IF NOT EXISTS al-maktaba_db CHARACTER SET = utf8 COLLATE utf8_general_ci;

Import on it the SQL file [al-maktaba_db.sql](al-maktaba_db/al-maktaba_db.sql/).

#### Virtual host 

Set up a virtual host on ubuntu/linux : (for windows and mac, there is an equivalent operation)

1- Paste the extracted folder with the name "al-maktaba" at : /var/www/.

2- Create a text file with the name "al-maktaba.conf" at : /etc/apache2/sites-available/

3- Copy this into the "al-maktaba.conf" file :
````
<VirtualHost *:80>
	ServerName al-maktaba
	ServerAlias www.al-maktaba
	DocumentRoot "/var/www/al-maktaba/public"
	<Directory "/var/www/al-maktaba/public">
		Options +FollowSymLinks
		AllowOverride all
		Require all granted
	</Directory>
	ErrorLog /var/log/apache2/error.al-maktaba.log
	CustomLog /var/log/apache2/access.al-maktaba.log combined
</VirtualHost>
````
4- Activate this configuration with this command line in terminal :

    sudo a2ensite al-maktaba

5- Reload this apache2 configuration :

    sudo systemctl reload apache2

6- For a localhost use :

6-1- Open the hosts file in terminal :

    sudo nano /etc/hosts

6-2- Add this line into the hosts file : (to save : Ctrl o + Enter. to quit : Ctrl x)

    127.0.0.1	al-maktaba

7- Activate the rewrite mode :

    sudo a2enmod rewrite

8- Restart apache2:

    sudo systemctl restart apache2

#### Run

Then, get access to the app at : http://al-maktaba/

## Usage

##### Login as an admin :

	Login Name : admin1
	Password : admin1

##### Login as an admin with full ranges of actions :

	Login Name : admin2
	Password : admin2

##### Login as a member (for test) :

	Login Name : member
	Password : member

##### Login as a visitor (for test) :

	Login Name : visitor
	Password : visitor

These 4 users  are required for the proper functioning of the application, which is why the actions of "edit" and "delete" them are disabled.

---

*Many thanks to [Mohammed Yehia](https://github.com/engmohammedyehia).*

*This application is the fruit of work on his PHP/MySQL course.*

- [His course on YouTube](https://www.youtube.com/playlist?list=PLrwRNJX9gLs3kkSDgCHFlpgL6qLrlHUBG)
- [His course Repository](https://github.com/ycourses/Es)

---

- ["Al·Maktaba | الـمـكـتـبـة" Repository](https://github.com/selyamanis/al-maktaba/)
- [@selyamanis](https://github.com/selyamanis/)
- <selyamanisalim@gmail.com>

---

# al-maktaba
