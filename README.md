// localhost development

Download GitBash or use your preffered CLI.
Go to https://github.com/la-x/wirelog and copy the link to clone with HTTPS: https://github.com/la-x/wirelog
Open CLI and cd into desired location.
Clone the above repository by running the following command:
git clone now https://github.com/la-x/wirelogu
Download and install LAMP, XAMP or WAMP.
Open phpMyAdmin and create a new database titled 'wirelog', whilst ensuring phpMyAdmin user credentials are set to username 'root' and password ''.
Find the SQL file titled 'wirelog.sql' located inside the root directory, and import the file into the 'wirelog' database.

For functionality in localhost via windows, locate the 'hosts' file located within the following directory:
cd /c/windows/system32/drivers/etc/

open the file and add the following the the file:
127.0.0.1 wirelog.test

Next, locate the 'httpd-vhosts.conf' file located within the following directory:
cd /c/wamp64/www/bin/apache/apache2.4.39/conf/extra

ensure the following is set:
<VirtualHost *:80>
  DocumentRoot "c:/wamp64/www"
  ServerName localhost
</VirtualHost>

<VirtualHost *:80>
  DocumentRoot "c:/wamp64/www/wirelog/public"
  ServerName wirelog.test
</VirtualHost>

The url wirelog.test should now be accessible for development.

The following requires the nodejs and composer application(s) to be installed. Following this, perform the below commands/installs:

composer require laravel/ui
php artisan ui bootstrap
composer require laravelcollective/html (optional)
php artisan ui:auth (if required)

perform the following commands:
npm install
npm run dev

regenerate .env file and add the above database name and phpMyAdmin login credentials.

run:
php artisan storage:link

to create new project exluding existing database entries, create new database 'wirelog' and run the following command:
php artisan migrate

php artisan migrate:rollback (to undo)

default passwords for user credentials are set to 'password'

// deploy online

Ensure all default passwords are securely ammended.
Ensure domain nameservers are pointing towards desired web hosting address
Login to cpanel and locate FTP credentials.
Run your preferred FTP client e.g Filezilla, CoreFTP
Enter ftp.domain and port 21
Transfer files to cpanel root
Ensure index.php url is accurate
Add desired restrictions to .htacess file.

// UI help document

Following successful registration/login, users are able to navigate towards the collapsable hamburger menu if viewing via mobile devices.
This will review the navigation menu allowing users to navigate towards their desired destination.
Should a user click on 'jobs' section, the job id number (yellow) will act as a href, allowing the user to proceed to view details relative to that specific job.
In addition, the user is then able to click on the job photo (scan code) to obtain a full sized image should they require or wish to redistribute and/or print.
If a user has administation credentials, they will similarly be able to click on technicians/users id numbers which will again act as a href to allow the user to edit or delete credtials.
The implementation of bootstrap buttons has also been incorporated to enhance overall user interaction experience.

// HTTPS and IP whitelist

if by default your web hosting provider has assigned an SSL although not forced HTTPS, the following can be added to the .htaccess file:
to whitelist an IP address(es), replace <xxx.xxx.xxx.xxx> with desired IP(s).

<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>
    
    order deny,allow
    deny from all
    allow from <xxx.xxx.xxx.xxx>

    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]

    RewriteEngine On
    RewriteCond %{HTTPS} !=on
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]
    
    DOSSiteInterval 1
    DOSSiteCount 1

</IfModule>