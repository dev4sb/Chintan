<?php
    class crud{
        public function insert($table, $array, $imgnew){
        
            $k = implode(",", array_keys($array));
            $v = implode("','", $array);
            echo $k."<br><br>";
            echo $v;
            echo "<br>insert into $table (".$k.") values ('".$v."')";
            $imgnew=$_FILES['ppic']['name']; 
            $imageArr=explode('.',$imgnew); //first index is file name and second index file type
            $rand=rand(10000,99999);
            $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
            $uploadPath="img/".$newImageName;
            $isUploaded=move_uploaded_file($_FILES["ppic"]["tmp_name"],$uploadPath);
            if($isUploaded)
            echo 'successfully file uploaded'.$newImageName;
            else
            echo 'something went wrong'; 
        }
    }
    

?>

<html>
    <head>

    </head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="ppic"/>
        <input type="text" name="fname"  /><br>
        <input type="text" name="lname"  /><br>
        <input type="text" name="email"  /><br>
        <input type="text" name="contact"  /><br>
        <input type="text" name="age"  /><br>
        <input type="submit" value="save"/>
    </form>

    <?php
     $image=$_FILES['ppic']['name']; 
     $imageArr=explode('.',$image);
     $rand=rand(10000,99999);
     $newImageName=$imageArr[0].$rand.'.'.$imageArr[1];
    $obj = new crud;
    $obj->insert("users", ['pic'=>$newImageName, 'fname'=>$_POST["fname"], 'lname'=>$_POST["lname"], 'email'=>$_POST["email"], 'contact'=>$_POST["contact"], 'age'=>$_POST["age"]], $image);
    
    ?>
</body>
</html>