# ToDoList

Базовый менеджер задач с возможностью регистрации пользователя

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
cd /srv/todolist_project/
```
```bash
docker compose -f docker-compose-todolist.yml up -d
```


### Как пользоваться
Добавить задачу: Введите текст и нажмите "Добавить"

Отметить выполненной: Кликните на флажок слева от задачи

Редактировать задача: Нажмите на значок карандаша ✏️

Удалить задачу: Нажмите на корзину 🗑️


## Остановка контейнеров 
```bash
docker compose -f /srv/todolist_project/docker-compose-todolist.yml down
```
