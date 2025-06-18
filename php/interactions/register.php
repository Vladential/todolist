<?php
// вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pdo = include __DIR__ . '/db_conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

// получение данных с формы. Создание аккаунта
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

//проверка email на наличие в базе

$check = $pdo->prepare("SELECT * FROM users WHERE email= ?");
$check->execute([$email]);
$user = $check->fetch();

if ($user){
    //echo "Email already has an account";
    echo "<script>alert('Аккаунт с данным email уже существует');window.location.href = '/index.php';</script>)";
} 

//else{
    //echo "Create account now";
//}


//хэширование пароля
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

try {
    $sql = $pdo->prepare("INSERT INTO users(username,email,password) VALUES (?, ?, ?)");
    $success = $sql->execute([$username, $email, $hashed_password]);

    if($success){
        //echo "Account created";
        echo "<script>alert('Аккаунт создан');window.location.href = '/index.php';</script>";
    }
    } catch(PDOexeption $e){
    echo "SQL Error" . $e->getMessage();
}
}
