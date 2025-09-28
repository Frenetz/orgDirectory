## Задание "Создание REST API"

### Стек технологий
1. Laravel
2. MySQL
3. Docker
4. Nginx

### Инструкция по развертыванию проекта
1. Склонировать проект и перейти в него
```bash
    git clone git@github.com:Frenetz/orgDirectory.git
    cd orgDirectory
```
2. Указать конфигурацию в файле .env (DB и API_KEY)
3. Запустить Docker-контейнеры
```bash
    docker-compose up -d --build
```
5. Выполнить миграции
```bash
    docker exec -it laravel_app php artisan migrate
```
6. Заполните БД тестовыми данными
```bash
    docker exec -it laravel_app php artisan db:seed
```

### Информация о проекте
1. Документация API (Swagger UI) находится по маршруту http://localhost:8000/api/documentation