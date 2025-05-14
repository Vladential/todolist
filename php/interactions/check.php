<?php
if (isset($_POST['id'])){
    require 'db_conn.php';

    $id = $_POST['id'];

    if(empty($id)){
        echo 'error';
    }else{
        $todo = $conn->prepare("SELECT id, checked FROM todo WHERE id=?");
        $todo->execute([$id]);

        $todos = $todo->fetch();
        $uid = $todos['id'];
        $checked = $todos['checked'];

        $uchecked = $checked ? "false" : "true";
        
        $res = $conn->query("UPDATE todo SET checked=$uchecked WHERE id=$uid");

        if($res){
            echo $checked;
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