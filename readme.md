**Clash of Nerds**
==============
[![ClashofNerds](http://clashofnerds.com/images/logo.png)](http://clashofnerds.com/)

Clash of Nerds é um blog sobre o universo dos games. Foi idealizado por pessoas que gostam de games e que jogam em diversas plataformas.

A proposta é produzir conteúdo de qualidade, de forma leve e descontraída. São abordados diversos assuntos do universo gamer:
 - Novidades
 - Tendências
 - Gamers em evidência
 - Resenhas de jogos
 - Lançamentos

# Instructions for Gama XP
---
> This site was developed using Laravel 5.3 framework and a pre configured blog system.
> Credit https://github.com/jcc/blog
### Requirements
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Composer
* Local or Remote MySQL server
* Virutal Host Apache

### Intallation
Run these commands below in your workspace:
```sh
~/workspace $ git clone https://github.com/ftgibran/blog.git
~/workspace $ cd blog
~/workspace/blog $ composer install
~/workspace/blog $ cp .env.example .env
~/workspace/blog $ php artisan key:generate
```
Open .env file in ~/workspace/blog and set it as the following:
```sh
APP_ENV=local
APP_KEY=[Dont change it]
APP_DEBUG=true
APP_LOG_LEVEL=debug
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=127.0.0.1 [or your remote url server]
DB_PORT=3306
DB_DATABASE=[your desired database name]
DB_USERNAME=[database user name (e.g. root)]
DB_PASSWORD=[database password]

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

Run this command below:
```sh
~/workspace/blog $ php artisan blog:install
```

Configure your Virtual Host to redirect your blog.localhost/ to ~/workspace/blog/public/

Enter http://blog.localhost/ and done!

#### Obs
* Maybe you need to change your permissions in ~/workspace/blog/storage. To do it, just run the following command:
```sh
~/workspace/blog $ chown -R 777 storage/
```
* If you want to edit js/Vue files, first you need to run `npm install` in your project directory and then, after your changes, run `gulp`

----
License
----
MIT