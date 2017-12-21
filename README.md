# Support-Ticket-system
Simple IT helpdesk written in laravel and runs on PHP 7.0

[![N|Solid](http://www.onetouchtelecare.com/images/logo1.png)](http://www.onetouchtelecare.com/)

IT Support Ticket is a Helpdesk written in Laravel 5.5 and run PHP 7.0
## Requirements
- PHP >= 7.0.0
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
#  Features, some are still in progress
    1. Single sign on(SSO)
	2. Tags (Tagging of tickets)
	3. Quick answer templates
	4. Priority levels
	5. Public message and private message/notes
	6. Customised tickets drop down menu and so on on the type of requests
	7. Auto emails
	8. Slack ??
	9. File upload of images up to 2mb ie screenshots
	10. Separate user accounts
	11. Limits tickets to company and customers, manager sees all tickets for that company. But customer only see there tickets


Markdown is a lightweight markup language based on the formatting conventions that people naturally use in email.  As [John Gruber] writes on the [Markdown site][df1]

> The overriding design goal for Markdown's
> formatting syntax is to make it as readable
> as possible. The idea is that a
> Markdown-formatted document should be
> publishable as-is, as plain text, without
> looking like it's been marked up with tags
> or formatting instructions.

This text you see here is *actually* written in Markdown! To get a feel for Markdown's syntax, type some text into the left window and watch the results in the right.

### Tech

Dillinger uses a number of open source projects to work properly:


* [TinyMCE editor](https://www.tinymce.com/) - awesome web-based text editor
* [Twitter Bootstrap] - great UI boilerplate for modern web apps
* [Laravel](https://laravel.com/) -The PHP Framework For Web Artisans
* [Express] - fast node.js network app framework [@tjholowaychuk]
* [htmlpurifier](http://htmlpurifier.org/) - HTML to Markdown converter
* [jQuery](https://jquery.com/) - jQuery is a fast, small, and feature-rich JavaScript library.



### Installation

Dillinger requires [Node.js](https://nodejs.org/) v4+ to run.

Install the dependencies and devDependencies and start the server.

```sh
$ cd /home
$ curl -sS https://getcomposer.org/installer | php
$ sudo mv composer.phar /usr/local/bin/composer
$ git clone git clone https://github.com/ShaneCunn/Support-Ticket-system.git
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
