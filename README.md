# ToDo List

Базовый менеджер задач с возможностью регистрации пользователя

![authorization](https://github.com/fekojo/todolist_project/blob/main/gif/auth.gif)

## Технологии  
- **Backend**: PHP  
- **Frontend**: HTML/CSS/JS  
- **База данных**: PostgreSQL
- **Деплой**: Docker, Docker Compose

## Установка и запуск  

### Клонирование репозитория  
```bash
git clone https://github.com/fekojo/todolist.git /srv/todolist_project/
```

### Ручной запуск через Docker

Cборка образов
```bash
docker build -t todolist_project-postgresql /srv/todolist_project/postgresql/docker-entrypoint-initdb.d
docker build -t todolist_project-nginx:latest /srv/todolist_project/nginx
docker build -t todolist_project-php /srv/todolist_project/php
```
Создание сети
```bash
docker network create todolist_project
```

Контейнер PHP
```bash
docker run --name todolist-php \
--network=todolist_project \
-v /srv/todolist_project:/var/www/todolist \
-e TZ=Europe/Moscow -d todolist_project-php:latest
```

Контейнер nginx
```bash
docker run --name todolist-nginx \
--network=todolist_project \
-p 80:80 \
-v /srv/todolist_project:/var/www/todolist \
-e TZ=Europe/Moscow \
-d todolist_project-nginx:latest 
```

Контейнер PostgreSQL  
**обязательно укажите пароль к базе данных в строке POSTGRES_PASSWORD**
```bash
docker run --name todolist-pgsql \
--network=todolist_project \
-v /srv/todolist_project/postgres:/var/lib/postgresql \
-e POSTGRES_PASSWORD= \
-e TZ=Europe/Moscow \
-e PGTZ=Europe/Moscow \
-d todolist_project-postgresql:latest 
```

### Запуск через Docker Compose  
**Перед запуском обязательно укажите пароль к базе данных в строке POSTGRES_PASSWORD через команду**
```bash
nano /srv/todolist_project/docker-compose-todolist.yml
```
Запуск готового docker-compose файла осуществляется по команде
```bash
docker compose -f /srv/todolist_project/docker-compose-todolist.yml up -d
```
Остановка контейнеров
```bash
docker compose -f /srv/todolist_project/docker-compose-todolist.yml down
```

## Как пользоваться
Добавить задачу: Введите текст и нажмите "Добавить"

Отметить выполненной: Кликните на флажок слева от задачи

Редактировать задача: Нажмите на карандаш

Удалить задачу: Нажмите на корзину

![crud](https://github.com/fekojo/todolist_project/blob/main/gif/crud.gif)
