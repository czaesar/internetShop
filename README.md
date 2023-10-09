## Technologies used in the project

1) [Sail](https://laravel.com/docs/10.x/sail) - запуск сервисов через docker
2) [Laravel permissions and roles](https://github.com/spatie/laravel-permission) - ассоциировать пользователей с ролями
   и доступами
3) [Pint](https://laravel.com/docs/10.x/pint) - стилизация кода
4) [Sanctum](https://laravel.com/docs/10.x/sanctum) - система аутентификации для api приложений


## Run project locally

Для запуска проекта локально можно использовать пакет [sail](https://laravel.com/docs/10.x/sail)

* Необходимо установить [docker](https://docs.docker.com/engine/install/)
* Опционально установить [composer 2.x](https://getcomposer.org/download/)
* *Для windows необходимо работать в* [wsl](https://learn.microsoft.com/en-us/windows/wsl/install)

1) Склонировать репозиторий
2) Перейти в директорию репозитория и выполнить в ней следующие команды (п. 3-7)
3) а) Если установлен composer, то можно использовать команду: ```composer install```

   б) Иначе установить composer зависимости через docker. Актуальность команды можно проверить
   по [ссылке](https://laravel.com/docs/10.x/sail#installing-composer-dependencies-for-existing-projects)
    ```
    docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
    ```
4) ```cp .env.example .env```
5) ```./vendor/bin/sail up``` or ```./vendor/bin/sail up -d```
6) ```./vendor/bin/sail artisan key:generate```
7) ```./vendor/bin/sail artisan storage:link```
8) ```./vendor/bin/sail artisan migrate --seed```
