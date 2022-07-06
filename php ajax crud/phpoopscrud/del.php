<?php
    include_once 'db.php';
        
    $id = $_POST['id'];

    $a = new database();
    $a->delete('users',"id='$id'");
    if($a == true){
        // header('location:index.php');
        echo "deleted";
    }
            
        ?>