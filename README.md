<p align="center"><img src="https://porloscerros.github.io/img/portada-logo.svg"></p>
<h1 align="center">I love Dogs</h1>
<h3 align="center">Telegram Bot with Laravel and BotMan</h3>

My first try for build a bot following this great tutorial [Build A Telegram Bot with Laravel and BotMan](https://scotch.io/tutorials/build-a-telegram-bot-with-laravel-and-botman) by Rachid Laasri.

## Documentation

### Tecnologies
The project is based on:
- [Laravel 5.6](https://laravel.com/docs/5.6).
- [BotMan Studio](http://botman.io).
- [Telegram Bot](https://core.telegram.org/bots)

### Local Enviroment
#### Dependences
- [Docker](https://docs.docker.com).
- [Ngrok](https://ngrok.com).
- [Robo](https://robo.li/) (optional).


#### Getting started
##### Install Docker:
Follow the instructions for your OS: 
https://docs.docker.com/install/

##### Clone the project:

`$ git clone git@github.com:porloscerros/ilovedogs.git`

##### Start Docker container:

`$ cd ilovedogs`

`$ docker-compose up`

##### Install Composer packages:
`$ cd src`

`$ docker-compose run composer install`

#### Configure Permissions for Laravel
`$ sudo chown $USER:http ./storage -R`

`$ sudo chown $USER:http ./bootstrap/cache -R`

`$ find ./storage -type d -exec chmod 775 {} \;`

`$ find ./storage -type f -exec chmod 664 {} \;`

`$ find ./bootstrap/cache -type d -exec chmod 775 {} \;`

#### Create a Telegram Bot
Open the Telegram app and search for BotFather, type /newbot, enter the name the username for your bot and you are good to go.

Add this to your .env file and replace YOUR_TOKEN with the token Telegram gave you:

`TELEGRAM_TOKEN=YOUR_TOKEN`

#### Ngrok
[Download](https://ngrok.com/download) and extract ngrok. 

`cd` into ngrok folder and start it:

`$ ./ngrok http 8080`

Link the bot to Telegram
`$ curl -X POST -F 'url=https://{YOU_URL}/botman' https://api.telegram.org/bot{TOKEN}/setWebhook`

Eg:
`$ curl -X POST -F 'url=https://80c2c170.ngrok.io/botman' https://api.telegram.org/bot999999999:ABCD123AbC1Ab1-1MAQ1yzAbCdEF1xyz1/setWebhook`


#### Test the Bot on Telegram
you will find it at the address that BotFather gave you. Eg:

[t.me/ILoveDogsBot]()

Send he one of the following commands:

`/random`.

`/b {breed}`. Eg: `/b bulldog`.

`/s {breed}:{subBreed}`. Eg: `/s hound:afghan`

`Start Conversation`

Check response to unrecognised commands:

`/cat`

#### Stop and Destroy your Docker Development Environment
`$ docker-compose down`

<br><hr><br>

#### (optional) Robo:
Install Robo globally:

`$ composer global require consolidation/robo`

If needed make an alias or add to PATH. Add in ~/.bashrc

`$ alias robo='~/.config/composer/vendor/bin/robo'`

and refresh bashrc:

`$ source ~/.bashrc`

Use it in /src folder. Eg:

`$ robo up`

`$ robo composer install`

`$ robo artisan make:controller FallbackController`

`$ robo composer "require botman/driver-telegram"`