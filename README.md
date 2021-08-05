## Git ##
Примерный план действий с git:
* fork - создать свой репозиторий в GitHub от репозитория https://github.com/konstantin141091/shop
* clone - развернуть проект локально от своего репозитория
* внести изменения
* commit - создать коммит изменений
* push - загрузить изменения в свой репозиторий
* pull request - загрузить изменения из своего репозитория в первоначальный
* в дальнейшем перед выполнением задач выгружать последнюю версию из первоначального репозитория

## Разворачивание проекта ##
* скопировать .env.example в .env, указать соответствующие настройки БД
* настроить web-сервер, php7.2
* composer install
* npm install
* php artisan key:generate
* php artisan migrate
* php artisan db:seed (если ошибка composer dump-autoload)
* npm run dev (каждый раз после выгрузки последней версии из репозитория) или
* npm run watch
* php artisan storage:link

###Если проблемы с composer-lock
* composer update --lock

## Описание баз данных ##
* php artisan migrate:refresh --seed

## Описание баз api ##

