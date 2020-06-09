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

The url 'wirelog.test' should now be accessible for development.

The following requires the nodejs and composer applications to be installed. Following this, perform the below commands/installs:

composer require laravel/ui (this may take serveral minutes)
php artisan ui bootstrap

perform the following commands:
npm install
npm run dev

regenerate .env file by performing the following command:
cp .env.example .env
php artisan key:generate

go to .env and ensure key has been generated.
Ensure the following are in the .env:

APP_NAME=wirelog
APP_NAME=wirelog
APP_URL=http://localhost
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=wirelog
DB_USERNAME=root
DB_PASSWORD=

Add the following to the .env file:
APP_ADMIN="l.albert@wirelog.com.au" (or your preferred admin address).


run:
php artisan storage:link

add images from public/stock_img to public/storage/cover_images

to create new project exluding existing database entries, create new database 'wirelog' and run the following command:
php artisan migrate

note: all existing database user credentials default passwords are set to 'password'

// deploy online

Ensure all default passwords are securely updated and ammended for an online environment.
Ensure domain nameservers are pointing towards desired web hosting address
Login to cpanel and locate FTP credentials.
Run your preferred FTP client e.g Filezilla, CoreFTP
Enter ftp.domain and port 21
Transfer files to cpanel root
Ensure index.php url is accurate
Add desired restrictions and IP whitelists to .htacess file.

// HTTPS and IP whitelist

If by default your web hosting provider has assigned an SSL although not forced HTTPS, the following can be added to the .htaccess file:
Additionally, to whitelist an IP address, replace <xxx.xxx.xxx.xxx> with desired IP(s).

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

// what the site does

anyone can register to the system and see 'jobs' and 'comments', although limited to anything else.
following registration, admin email addresses in the .env file are able to assign recently registered users to become 'technicians'.
once users have been assigned to become a 'technician', they are able to comment on jobs and view other technicians credentials.
In addition, if admin create new technicians with the role 'ICA', they are able to also add and edit jobs (although not delete).
Only main admin credentials are able to delete data and ammend user and technician credentials.

Ensure guest users who are not registered are redirected to a login form and are unable to access the following pages:

wirelog.test/home
wirelog.test/job
wirelog.test/technician
wirelog.test/user
wirelog.test/job_log

Register new user with desired email address and password.
Ensure new user is able to view jobs and their comments, although unable access any sensitive technician credentials or the following unauthorised pages:

wirelog.test/job/5000
wirelog.test/job/1/edit
wirelog.test/technician
wirelog.test/technician/5000
wirelog.test/technician/1/edit
wirelog.test/job_log
wirelog.test/user
wirelog.test/user/5000
wirelog.test/user/1/edit

default admin credentials set to un:l.albert@wirelog.com.au pw:password

Log into admin credentials either above or the newly ammended .env admin, and find the new user in the 'users' section.
Enter in the credentials for this user to become a technician.
Ensure this user has now be added to the 'technicians' section.
Log out of admin.
Log in with this newly created technician and ensure they are able to comment and see other technicians sensistive information.
Ensure this user is unable to delete data unless provided with an 'ICA' role.
Ensure new technician is unable to access the following pages:

wirelog.test/job/5000
wirelog.test/job/1/edit
wirelog.test/technician/5000
wirelog.test/technician/1/edit
wirelog.test/job_log
wirelog.test/user
wirelog.test/user/5000
wirelog.test/user/1/edit

Log out of technician account.
Log back into admin, and locate the recently added technician. click edit and change position to 'ICA'.
Ensure technician was successfully updated.
Log out of admin.

Log in as the recently ammended technician.
Ensure user is able to everything previously, with the addition of adding and editting jobs (although not deleting):

wirelog.test/job/1/edit (success)

Ensure user is unable to access the following:

wirelog.test/job/5000
wirelog.test/technician/5000
wirelog.test/technician/1/edit
wirelog.test/job_log
wirelog.test/user
wirelog.test/user/5000
wirelog.test/user/1/edit