<?php

    include("./sqlcon.php");
    
    $fname = $_POST["fname"];
    $email = $_POST['email'];
    $password = $_POST["password"];

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        $query = "SELECT * FROM users where firstName = '.$fname.' AND email = '.$email.' AND password = '.$password.'";
        $login = mysqli_query($con, $query);
        $row = mysqli_fetch_array($login, MYSQLI_ASSOC);
        $count = mysqli_num_rows($login);  
        if($count == 1){
            echo "ok";
            foreach($login as $l){
                echo $l["email"];
            }
        }else{
            echo "problem".mysqli_error($con);
        }
    }




?>