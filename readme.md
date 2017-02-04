# laravel-karaoke
Projecte per crear llistes de torns per a festes de karaoke. Sense usuaris, només frontend per a crear llistes (festes) amb temes per a ser cantats. Els aspirants a singstars afegiran temes posant les seves dades i el link al youtube amb el vídeo de la cançó (versió karaoke amb lletres per anar bé). L'organitzadora només caldrà que vagi cridant les cantaires i engegant els vídeos que han seleccionat.

## Instal·lació
Instal·lar Composer, Git i llibreries PHP
```sh
$ sudo apt-get install composer git php7
```
Descarregar el repo i instal·lar dependències:
```sh
$ git clone https://github.com/emieza/laravel-karaoke
$ cd laravel-karaoke
$ composer install
```
Setup sqlite DB (o altres):
```sh
$ cp .env.example .env
$ php artisan key:generate
```
Modificar .env:
```
DB_CONNECTION=sqlite
DB_DATABASE=/path/absolut/a/db.sqlite
```
Migrar DB i posar en marxa:
```sh
$ touch db.sqlite
$ php artisan migrate
$ php artisan serve
```
Visitar http://localhost:8000 ...et voilà!


