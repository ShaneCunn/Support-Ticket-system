# Support-Ticket-system
Simple IT helpdesk written in Laravel and runs on PHP 7.0

[![N|Solid](http://www.onetouchtelecare.com/images/logo1.png)](http://www.onetouchtelecare.com/)

IT Support Ticket is a Helpdesk written in Laravel 5.5 and run PHP 7.0
## Requirements
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
##  Features, some are still in progress
 - Priority levels 
 - Public message and private message/notes
 - Customised tickets drop down menu and so on on the type of requests
 - Auto emails
 - Separate user accounts
 

### Tech

Support ticket uses a number of open source projects to work properly:
* [Laravel](https://laravel.com/) -The PHP Framework For Web Artisans
* [TinyMCE editor](https://www.tinymce.com/) - awesome web-based text editor
* [Twitter Bootstrap](https://getbootstrap.com/)- great UI boilerplate for modern web apps
* [htmlpurifier](http://htmlpurifier.org/) - HTML to Markdown converter
* [jQuery](https://jquery.com/) - jQuery is a fast, small, and feature-rich JavaScript library.

### Installation

```sh
$ cd /home
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ git clone https://github.com/ShaneCunn/Support-Ticket-system.git
$ cd Support-Ticket-system/Support
$ cp -r * /var/www/folder-to-be-installed-in
$ cd /var/www/folder-to-be-installed-in
$ composer install
$ composer dump-autoload
$ php artisan cache:clear
& cp .env.example .env
$ nano .env
```
# For Production
```sh
$ cd /home
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ git clone git clone https://github.com/ShaneCunn/Support-Ticket-system.git
$ cd Support-Ticket-system/Support
$ cp -r * /var/www/folder-to-be-installed-in
$ cd /var/www/folder-to-be-installed-in
$ composer install --no-dev
$ composer dump-autoload
$ php artisan cache:clear
& cp .env.example .env
$ nano .env
```
edit the .env with  database details
```
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null

PUSHER_APP_ID=
PUSHER_KEY=
PUSHER_SECRET=
```
As you can see, quite a lot of those values are empty. And, to be honest, by default you will actually need to change only a few of them – related to database connection:
```
DB_HOST=127.0.0.1
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

### Todos
 - [ ] Single sign on(SSO)
 - [ ] Tags (Tagging of tickets)
 - [ ] Quick answer templates
 - [x] Priority levels
 - [x] Public message and private message/notes
 - [ ] Customised tickets drop down menu and so on on the type of requests
 - [x] Auto emails
 - [ ] Slack
 - [x] File upload of images up to 2mb ie screenshots
 - [x] Separate user accounts
 - [ ] Limits tickets to company and customers, manager sees all tickets for that company. But customer only see there tickets
