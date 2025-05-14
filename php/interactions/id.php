<?php
session_start();

if(isset($_POST['id'])){
    require 'db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
        echo "empty";
    }else{
        $sql = $conn ->prepare("SELECT * FROM todo WHERE id =?");
        $res = $sql ->execute([$id]);

        if($res){
            echo "$id";
        }else{
            echo "error";
        }
        $conn = null;
        exit();
    }
}