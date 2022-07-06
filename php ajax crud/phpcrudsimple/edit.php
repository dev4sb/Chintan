<?php
include("./sqlcon.php");

    $fname = mysqli_real_escape_string($con, $_POST["fname"]);
    $lname = mysqli_real_escape_string($con, $_POST["lname"]);
    $email = mysqli_real_escape_string($con, $_POST["email"]);
    $desc = mysqli_real_escape_string($con, $_POST["desc"]);
    $id = mysqli_real_escape_string($con, $_POST["nid"]);

    $query = "UPDATE users SET firstName = '$fname', lastName = '$lname', email = '$email', description = '$desc' WHERE id = $id";

    if(mysqli_query($con, $query)){
        echo "<script>alert('Recrd Updated')</script>";
    }else{
        echo "not Updated".mysqli_error($con);
    }



?>