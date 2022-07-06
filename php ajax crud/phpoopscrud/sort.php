<?php
    include_once "db.php";
    $sort = $_POST["sortby"];
    $s = new database();
    if($_POST['idsortasc']){
        $s->select("users","*", "", "id ASC");
    }elseif($_POST['idsortdesc']){
        $s->select("users","*", "", "id DESC");
    }elseif($_POST['fnsortasc']){
        $s->select("users","*", "", "firstName ASC");
    }elseif($_POST['fnsortdesc']){
        $s->select("users","*", "", "firstName DESC");
    }elseif($_POST['lnsortasc']){
        $s->select("users","*", "", "lastName ASC");
    }elseif($_POST['lnsortdesc']){
        $s->select("users","*", "", "lastName DESC");
    }elseif($_POST['emsortasc']){
        $s->select("users","*", "", "email ASC");
    }elseif($_POST['emsortdesc']){
        $s->select("users","*", "", "email DESC");
    }elseif($_POST['gsortasc']){
        $s->select("users","*", "", "gender ASC");
    }elseif($_POST['gsortdesc']){
        $s->select("users","*", "", "gender DESC");
    }elseif($_POST['csortasc']){
        $s->select("users","*", "", "course ASC");
    }elseif($_POST['csortasc']){
        $s->select("users","*", "", "course DESC");
    }elseif($_POST['csortasc']){
        $s->select("users","*", "", "description ASC");
    }else{
        $s->select("users","*", "", "description DESC");
    }
    
    $result = $s->sql;
    
    
?>
    <?php while($row = mysqli_fetch_assoc($result)){ ?>
        <tr class="trid" data-trace ="<?php echo $row['id']; ?>">
            <td ><?php echo $row['id']; ?></td>
            <td><img src="img/<?php echo $row['profilePic']; ?>" height="100" width="100" ></td>
            <td><?php echo $row['firstName']; ?></td>
            <td><?php echo $row['lastName']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['gender']; ?></td>
            <td><?php echo $row['course']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
                <button class='edit' data-id='<?php echo $row['id']; ?>' data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                <button class="delete" data-id="<?php echo $row['id'] ?>">Delete</button>
            </td>
        </tr>
    <?php } ?>       