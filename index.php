<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-witdh, intitial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="./styles/index.css">
</head>

<body>
    <!--<header>
        <a class="logo" href="/">
            <h2 class="logo">Todo List</h2>
        </a>
        <nav class="navigation">
            <a href="#">Главная</a>
            <a href="#">О нас</a>
            <a href="#">Сервис</a>
            <a href="#">Контакты</a>
            <button class="btnlogin-popup">Войти</button>
        </nav>
    </header>-->
    <div class="wrapper">
        <div class="form-box login">
            <h2>Войти</h2>
            <form action="./php/interactions/login.php" method="POST">
                <div class="input-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input type="email" name="email" required>
                    <label>Электронная почта</label>
                </div>
                <div class="input-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-lock" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"/>
                    </svg>
                    <input type="password" name="password" required>
                    <label>Пароль</label>
                </div>
                <div class="remember-forgot">
                    <label><input type="checkbox">Запомнить </label>
                    <a href="#">Забыли пароль?</a>
                </div>
                <button type="submit" class="btn">Войти</button>
                <div class="login-register">
                    <p>У вас еще нет учетной записи?
                        <a href="#" class="register-link">Зарегистрироваться</a>
                    </p>
                </div>
            </form>
        </div>
        <div class="form-box signup">
            <h2>Регистрация</h2>
            <form action="./php/interactions/register.php" method="POST">
                <div class="input-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-person-circle" viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                    </svg>
                    <input type="username" name="username" required>
                    <label>Имя пользователя</label>
                </div>
                <div class="input-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-envelope" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                    </svg>
                    <input type="email" name="email" required>
                    <label>Электронная почта</label>
                </div>
                <div class="input-box">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-lock" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 0a4 4 0 0 1 4 4v2.05a2.5 2.5 0 0 1 2 2.45v5a2.5 2.5 0 0 1-2.5 2.5h-7A2.5 2.5 0 0 1 2 13.5v-5a2.5 2.5 0 0 1 2-2.45V4a4 4 0 0 1 4-4M4.5 7A1.5 1.5 0 0 0 3 8.5v5A1.5 1.5 0 0 0 4.5 15h7a1.5 1.5 0 0 0 1.5-1.5v-5A1.5 1.5 0 0 0 11.5 7zM8 1a3 3 0 0 0-3 3v2h6V4a3 3 0 0 0-3-3"/>
                    </svg>
                    <input type="password" name="password" required>
                    <label>Пароль</label>
                </div>
                <div class="remember-forgot">
                    <!--<label><input type="checkbox">I agree with terms and conditions</label>-->
                </div>
                <button type="submit" class="btn">Зарегистрироваться</button>
                <div class="login-register">
                    <p>У вас уже есть учетная запись?
                        <a href="#" class="login-link">Войти</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/login.js"></script>
</body>

</html>