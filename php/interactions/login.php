<?php
// вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$pdo = include __DIR__ . '/db_conn.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){

//получение данных с формы. авторизация

$email = $_POST['email'];
$password = $_POST['password'];

$sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$sql->execute([$email]);
$result = $sql->fetch(PDO::FETCH_ASSOC);

if($result){
    $username = $result;

//проверка пароля    
if(password_verify($password, $username['password'])){
    header("Location: /dashboard.php");

    $_SESSION['user'] = $username['email'];
    //redirect to dashboard

}

else{
    //echo "wrong password";
    echo "<script>alert('неправильный пароль');window.location.href = '/index.php';</script>";
    }

}

else{
    echo"<script>alert('данного пользователя не существует');window.location.href = '/index.php';</script>";
}

}