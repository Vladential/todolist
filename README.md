# ToDoList

Базовый менеджер задач с возможностью регистрации пользователя

![authorization](https://github.com/Vladential/todolist_project/blob/master/gif/auth.gif)

## Технологии  
- **Backend**: PHP  
- **Frontend**: HTML/CSS/JS  
- **База данных**: PostgreSQL
- **Деплой**: Docker, Docker Compose

## Установка и запуск  

### 1. Клонирование репозитория  
```bash
git clone https://github.com/Vladential/todolist.git /srv/todolist_project/
```

### 2. Запуск через Docker Compose
```bash
docker compose -f /srv/todolist_project/docker-compose-todolist.yml up -d
```


### Как пользоваться
Добавить задачу: Введите текст и нажмите "Добавить"

Отметить выполненной: Кликните на флажок слева от задачи

Редактировать задача: Нажмите на карандаш

Удалить задачу: Нажмите на корзину

![crud](https://github.com/Vladential/todolist_project/blob/master/gif/crud.gif)


## Остановка контейнеров 
```bash
docker compose -f /srv/todolist_project/docker-compose-todolist.yml down
```
