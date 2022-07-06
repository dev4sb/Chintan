<?php
include("sqlcon.php");
    $id = mysqli_real_escape_string($con, $_POST["id"]);
    
    $query = "DELETE FROM users WHERE id = $id";
    if(mysqli_query($con, $query)){
        echo "<script>alert('Record Deleted successfully')</script>";
        
    }else{
        echo "no deleted";
    }


?>
