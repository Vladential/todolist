<?php
session_start();

if(isset($_POST['edittext']) && isset($_POST['id'])){
    require 'db_conn.php';

    $edittext = $_POST['edittext'];
    $id = $_POST['id'];
    
    if(empty($edittext)){
        echo "empty";
    }else{
        //var_dump($_SESSION);
        $stmt = $conn ->prepare("UPDATE todo SET title = ?, date_time = CURRENT_TIMESTAMP WHERE id = ?");
        $res = $stmt ->execute([$edittext, $id]);

        if($res){
            echo "success";
        }else{
            echo "error";
        }
        $conn = null;
        exit();
    }
}else{
    header("location: dashboard.php?mess=error");
}

?>