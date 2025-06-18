<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(isset($_POST['title'])){
    require __DIR__ . '/db_conn.php';;
    $title = $_POST['title'];
    $user_id = $_POST['user_id'];

    if(empty($title)){
        header("location: /dashboard.php?mess=error");
    }else {
        //var_dump($_SESSION); // данные сессии
        $stmt = $conn->prepare("INSERT INTO todo(title, user_id) values(?, ?)");
        $res = $stmt->execute([$title, $user_id]);

        if($res){
            header("location: /dashboard.php?mess=success");
        }else{
            header("location: /dashboard.php");
        }
        $conn = null;
        exit();
    }
}else{
    header("location: /dashboard.php?mess=error");
}

?>