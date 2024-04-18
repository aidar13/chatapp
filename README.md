## Chatapp project

API для онлайн чата

- Нужно запулить проект
- запустить composer install
- чтобы поднимать провект: sail up -d 
- добавить **chatapp.loc** в файл /etc/hosts
- скопируйте конфиг файл через команду: cp .env.example .env
- чтобы создать таблицы: ./vendor/bin/sail php artisan migrate
- чтобы добавить тестовые данные запустить: ./vendor/bin/sail php artisan db:seed

методы:
1) регистрация /
