<?php 
include 'db.php';
    
    // echo $_POST["fname"];
        
    if(!empty($_POST) && $_SERVER['REQUEST_METHOD'] == 'POST'){
        $filename = $_FILES["profilepic"]["name"];

        $tempname = $_FILES["profilepic"]["tmp_name"];  
    
        $folder = "img/".$filename;   
        
        
        if (move_uploaded_file($tempname, $folder)) {
        //   echo "File is valid, and was successfully uploaded.\n";
        } else {
        //    echo "Upload failed";
        }

        $newhobbies = implode(",", $_POST["hobbies"]);
        
        $a = new database();
        $a->insert('users',['profilePic'=>$_FILES['profilepic']['name'],'firstName'=>$_POST["fname"],'lastName'=>$_POST["lname"],'email'=>$_POST["email"],'gender'=>$_POST["gender"],'course'=>$_POST["course"],'description'=>$_POST["description"],'hobbies'=>$newhobbies, 'password'=>$_POST["password"]]);

        
        
    }   

    

    
?>