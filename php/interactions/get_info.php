<?php

//данные пользователя
$email=$_SESSION['user'];

$sql = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$sql->execute([$email]);
$user = $sql->fetch(PDO::FETCH_ASSOC);
$name = $user["username"];
$youremail = $user["email"];
$create_account = $user["created_at"];
$user_id = $user["user_id"];

//echo "$name";
//echo "$youremail";
//echo "$create_account";
//echo "$user_id";

//список задач
$todo = $conn->query("SELECT * FROM todo WHERE user_id = $user_id ORDER BY id DESC");

?>