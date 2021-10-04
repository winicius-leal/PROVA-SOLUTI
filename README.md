Laravel PHP Framework
Sobre o  projeto
O projeto tem como objetivo desenvolver um sistema onde um cliente possa realizar seu proprio cadastro, se autenticar com email e senha e importar um certificado usando a biblioteca phpseclib.

Para rodar este projeto
$ git clone https://github.com/winicius-leal/PROVA-SOLUTI
$ composer install
$ php artisan key:generate
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan serve
Acesssar pela url: http://localhost:8000/
