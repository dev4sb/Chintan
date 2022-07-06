
<?php
        include_once "db.php";
        $s = new database();
        $limit = 5;
        $btnNum = $_POST['paginationbtn'];
        $startFrom = ($btnNum - 1) * $limit;
        $endTo = $startFrom + $limit;
        $s->select("users","*","", "id ASC", "LIMIT $limit OFFSET $startFrom ");
        $result = $s->sql;
    ?>
        <?php while($row = mysqli_fetch_assoc($result)){ 
            
        ?>
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


        <script src="./validate.js"></script>