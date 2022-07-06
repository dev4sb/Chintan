<?php 
        include_once 'db.php';
        $sele = new database();
        $sele->select("users");
        $result = $sele->sql;
?>

    <?php while ($row = $result->fetch_array(MYSQLI_NUM)) { ?>
        <tr>
            <td><?php echo $row['0']; ?></td>
            <td><img src="img/<?php echo $row['1']; ?>" height="100" width="100" ></td>
            <td><?php echo $row['2']; ?></td>
            <td><?php echo $row['3']; ?></td>
            <td><?php echo $row['4']; ?></td>
            <td><?php echo $row['5']; ?></td>
            <td><?php echo $row['6']; ?></td>
            <td><?php echo $row['7']; ?></td>
            <td>
            <button class='edit' data-bs-toggle="modal" data-bs-target="#exampleModal" data-id='<?php $row[0]; ?>'>Edit</button>
            <button class="delete" data-id="<?php echo $row['0'] ?>">Delete<?php echo $row['id'] ?></button>
            </td>
        </tr>
    <?php } ?>


