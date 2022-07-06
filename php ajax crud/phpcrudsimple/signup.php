<?php

    include('./sqlcon.php');
    

    $profilepic = mysqli_real_escape_string($con, $_POST["profilepic"]);
    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $gender = mysqli_real_escape_string($con, $_POST["gender"]);
    $description = mysqli_real_escape_string($con, $_POST["description"]);
    $dataString = mysqli_real_escape_string($con, $_POST["dataString"]);
    $password = mysqli_real_escape_string($con, $_POST["password"]);
    



    $query = "INSERT INTO users (profilePic, firstName, lastName, email, gender, description, hobbies, password) 
        VALUES ('$profilepic', '$fname', '$lname', '$email', '$gender', '$description', '$dataString', '$password')";

    if(mysqli_query($con, $query)){
        echo "<script>alert('Record Inserted Successfully')</script>";
    }else{
        echo "nok";
    }

?>
