<?php
$servername = "todolist-pgsql";
$user = "crud";
$password = "P@ssword1234";
$dbname = "todo_data";

try{
    $conn = new PDO("pgsql:host=$servername; dbname=$dbname", $user, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
    echo "connected";
    
}

catch(PDOException $e){
    echo "Connection failed : " . $e->getMessage();
}
?>
