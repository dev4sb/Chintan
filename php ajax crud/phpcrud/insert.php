<?php 
    include_once './db.php';
    
    
        
    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
    
        $a = new databse();
        $a->insert('users',['firstName'=>$_POST["fname"],'lastName'=>$_POST["lname"],'email'=>$_POST["email"],'gender'=>$_POST["gender"],'course'=>$_POST["course"],'description'=>$_POST["description"],'hobbies'=>$_POST["dataString"], 'password'=>$_POST["password"]]);

        if ($a == true) {
            header('location:index.php');
            // echo "ok";
        }else{
            echo "nok";
        }
    }   
?>