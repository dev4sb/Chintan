
                            
   <?php 
       include_once 'db.php';
       $searchdata = $_POST['sdata'];
       echo $searchdata;
       $sele = new database();
       $sele->select("users", "*", "gender LIKE '%" . $searchdata . "%'  OR firstName LIKE '%" . $searchdata . "%' OR email LIKE '%" . $searchdata . "%' OR gender LIKE '%" . $searchdata . "%' OR course LIKE '%" . $searchdata . "%' ");
       $result = $sele->sql;
       while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ ?>
           <tr class="trid">
                <td><?php echo $row['id']; ?></td>
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
                            