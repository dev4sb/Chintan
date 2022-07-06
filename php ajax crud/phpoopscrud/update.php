<?php 
    include 'db.php';
        // echo "done";
        // print_r($_POST['nfname']);
        // exit();
        $id = $_POST["nid"];

        $filename = $_FILES["nprofilepic"]["name"];

        if($_FILES["nprofilepic"] != ""){
            $newfile = $_FILES["nprofilepic"]["name"];
        }else{
            $newfile = $_POST["oldimg"];
        }

        $tempname = $_FILES["nprofilepic"]["tmp_name"];  
    
        $folder = "img/".$newfile;
        move_uploaded_file($tempname, $folder);

        $im = $_POST["oldimg"];
       
        $newhobbies = implode(",", $_POST["nhobbies"]);


        $a = new database();
        $a->update('users',['profilePic'=>$newfile, 'firstName'=>$_POST["nfname"], 'lastName'=>$_POST['nlname'], 'email'=>$_POST['nemail'], 'gender'=>$_POST['ngender'], 'course'=>$_POST['ncourse'], 'description'=>$_POST['ndescription'], 'hobbies'=>$newhobbies], "id=$id");
    
?>