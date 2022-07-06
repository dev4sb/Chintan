<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="SemiColonWeb" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.3/css/bootstrap.min.css" integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g==" crossorigin="anonymous" />
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login</title>
    <link rel="stylesheet" href="./bs5css.css">
</head>
<body>
<?php

    include_once "db.php";





    $id = $_POST["idedit"];
    $sele = new database();
    $sele->selectone("users", "*", "id = $id");
    $result = $sele->sql;
    while ($row = mysqli_fetch_assoc($result)) { 
?>



<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Record</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" id="editform" enctype="multipart/form-data">

            <div><input type="file" class="form-control" name="nprofilepic" id="nprofilepic"><input type="hidden" name="oldimg" value="<?php echo $row["profilePic"];?>" ></div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div><input type="text" placeholder="First Name" class="form-control" value="<?php echo $row["firstName"]; ?>" name="nfname" id="nfname"></div><br>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                    <div><input type="text" placeholder="Last Name" class="form-control" value="<?php echo $row["lastName"]; ?>"  name="nlname" id="nlname"></div><br>
                    </div>
                </div>
                
                <div><input type="email" placeholder="Your E-mail" class="form-control" name="nemail" value="<?php echo $row["email"]; ?>" id="nemail"></div><br>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <label class="fw-bold">Gender:</label>
                        <input type="radio" name="ngender" value="Male"<?php echo ($row["gender"] == 'Male')?'checked':'' ?> id="ngender">Male
                        <input type="radio" name="ngender" value="Female" <?php echo ($row["gender"] == 'Female')?'checked':'' ?> id="ngender">Female
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <select name="ncourse" class="form-control" id="ncourses">
                            <option selected value="<?php echo $row["course"]; ?>" ><?php echo $row["course"]; ?></option>
                            <option value="MCA">MCA</option>
                            <option value="BCA">BCA</option>
                        </select>
                    </div>
                </div><br>
                <textarea class="form-control" placeholder="Description" name="ndescription" id="ndescription"><?php echo $row["description"] ?></textarea>
                <div><br>
                    <label class="fw-bold">Hobbies:</label>
                    <?php
                        $ho = explode(",", $row["hobbies"]);
                        
                    ?>
                    <input type="checkbox" value="Sports" <?php if(in_array("Sports", $ho)){echo "checked";} ?>  id="nhobbies" name="nhobbies[]">Sports
                    <input type="checkbox" value="Reading" <?php if(in_array("Reading", $ho)){echo "checked";} ?> id="nhobbies" name="nhobbies[]">Reading
                    <input type="checkbox" value="Coding" <?php if(in_array("Coding", $ho)){echo "checked";} ?> id="nhobbies" name="nhobbies[]">Coding
                    <input type="checkbox" value="music" <?php if(in_array("music", $ho)){echo "checked";} ?> id="nhobbies" name="nhobbies[]">music
                <?php ?>
                </div><br>
                <input type="hidden" name="nid" id="id" value="<?php echo $row["id"]; ?>">
                <?php } ?>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <input type="submit" id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary" value="Update" >
                    <!-- <button id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary">Save</button> -->
                </div>
            </form>
        </div>
    </div>
</div>



    
    <script src="./edit.js"></script>
    <script src="./jquery.min.js"></script>
    <script src="./jquery.validate.min.js"></script>
</body>
</html>