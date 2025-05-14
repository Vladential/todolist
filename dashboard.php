<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$pdo = include("./php/interactions/db_conn.php");

//если пользователь не авторизовался
if(!isset($_SESSION['user'])){
    header("location: ./todolist_project/index.php");
    exit();
}

include ("./php/interactions/get_info.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-witdh, intitial-scale=1.0">
    <title>Todo List</title>
    <link rel="stylesheet" href="./styles/dashboard.css">
</head>

<body>
    <header>
        <div class="profile-link">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pr-picture-link" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
            </svg> Мой профиль
        </div>
    </header>
    <div class="profile-container">
        <span class="icon-close">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-close-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
        </svg>
        </span>
        <div class="form-box dashboard">
            <nav class="navbar">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="pr-picture" viewBox="0 0 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                    <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
                </svg>
                <h2>Здравствуйте, <span id="username">
                    <?php echo htmlspecialchars($name)?>!</span>
                </h2>
            </nav>
            <div class="user details">
                <br>
                <br>
                <p><strong>Эл. почта:</strong>
                    <?php echo htmlspecialchars($youremail)?>
                </p>
                <p><strong>Зарегистрирован:</strong>
                    <?php echo htmlspecialchars($create_account)?>
                </p>
                <a href="./php/interactions/logout.php">
                    <button id="logout" class="btn logout-btn">Выйти &nbsp
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
                        </svg>
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="main-section">
    <link rel="stylesheet" href="./styles/todo-list.css">
        <div class="add-section">
            <form action="./php/interactions/add.php" method="POST" autocomplete="off">
                <input type="hidden" name="user_id" value="<?php echo $user_id;?>">
                <?php if(isset($_GET['mess']) && $_GET['mess'] == 'error') { ?>
                    <input type="text" name="title" class="input-text" style="border-bottom: 2px solid rgb(255, 0, 0)" placeholder="Это поле не должно быть пустым"/>
                <?php }else { ?>
                    <input type="text" name="title" class="input-text" placeholder="Напишите что-нибудь"/>
                <?php } ?>
                <button type="submit" class="btn add">Добавить 
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                </button>
            </form>
        </div>
        <div class="todo-container">
            <div class="show-todo-section">
                <?php while($task = $todo->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="todo-item">
                        <?php if ($task['checked']) { ?>
                            <input type="checkbox" data-todo-id ="<?php echo $task['id']; ?>" class="check-box" checked />
                            <h2 class="checked"><?php echo $task['title']?></h2>
                        <?php }else { ?>
                            <input type="checkbox" data-todo-id ="<?php echo $task['id']; ?>" class="checkbox" />
                            <h2><?php echo $task['title']?></h2>
                        <?php } ?>
                        <span todo-id="<?php echo $task['id']; ?>" todo-text="<?php echo $task['title']; ?>" class ="edit-todo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                            </svg>
                        </span>
                        <span id="<?php echo $task['id']; ?>" class ="remove-todo">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                            </svg>
                        </span>  
                        <br>
                        <small><?php echo $task['date_time']?></small>
                    </div>
                <?php } ?> 
            </div>
        </div>
            <div class="overlay"></div>
        <div class="edit-inputbox">
            <input type="text" class="edit-text" value="title"/>
            <!--<textarea class="edit-text"></textarea>-->
            <div class="btn-container">
                <button type="submit" class="btn-save">Сохранить</button>
                <button type="submit" class="btn-cancel">Отменить</button>
            </div>
        </div>                                 
    </div>
    <script src="./js/jquery-3.7.1.min.js"></script>
    <script src="./js/dashboard.js"></script>
</body>
</html>