# Initial Coin Offerings
ICO using block chain method for campaign.

## Prequisites
- PHP 7.0
- MySQL 5.7
- Composer
- NPM
- Laravel Echo Server
- Redis
- Supervisor

## Project Setup
For ICO installation requirements. Please follow below steps:

- Clone this project to your machine
```
$ cd /path/where/you/want/to/clone
$ git clone <http_url_of_repository>
```

- Setup Database credentials in **.env** file of the project
- Run this command in project root directory to generate **.env**
```
/inside/project/directory$ composer run-script post-root-package-install
```

- Ensure that you should have relevant API keys added to **.env** file
- Run this command in project root directory to generate key
```
/inside/project/directory$ php artisan key:generate
```

- Run Migrations
```
/inside/project/directory$ php artisan migrate
```
- Run Seeds
```
/inside/project/directory$ php artisan db:seed
```

- Verify passport keys by using this command
```
/inside/project/directory$ php artisan passport:install
```

- Server needs to allow **storage** directory and **cache** and allow **passport keys** to read by laravel
```
/inside/project/directory$ sudo chmod -R gu+w storage/
/inside/project/directory$ sudo chmod -R guo+w storage/

/inside/project/directory$ sudo chmod -R gu+w bootstrap/cache/
/inside/project/directory$ sudo chmod -R guo+w bootstrap/cache/

/inside/project/directory$ sudo chown www-data:www-data storage/oauth-*.key
/inside/project/directory$ sudo chmod 600 storage/oauth-*.key
```

- Setup a `queue worker` with supervisor and write file in `/etc/supervisor/conf.d/pass-queue-worker.conf` with this content
```
[program:ico-queue-worker]
process_name=%(program_name)s_%(process_num)02d
command=sudo php /var/www/html/project-path/artisan queue:work
autostart=true
autorestart=true
user=ubuntu
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/html/project-path/storage/logs/queue-worker.log
```

- Setup a `echo server worker` with supervisor and write file in `/etc/supervisor/conf.d/pass-echo-worker.conf` with this content
```
[program:ico-echo-worker]
directory=/var/www/html/project-path
command=sudo /usr/bin/laravel-echo-server start
autostart=true
autorestart=true
user=ubuntu
redirect_stderr=true
stdout_logfile=/var/www/html/project-path/storage/logs/echo-server-worker.log
```

- Setup scheduler for project and register this command in `sudo crontab -e`.
```
* * * * * php /var/www/html/project-path/artisan schedule:run >> /dev/null 2>&1
```

- Add storage link using this command in root for Linux.
```
/inside/project/directory$ ln -sr storage/app/public public/storage
```
