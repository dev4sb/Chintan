<section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row">
                        <div class="col-md-12 p-0">
                            <table class="table table-dark table-hover text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">IMG</th>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">E-mail</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Course</th>
                                        <th scope="col">Hobbies</th>
                                        <th scope="col" colspan="3">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        include_once 'db.php';
                                        $sele = new databse();
                                        $sele->select("users");
                                        $result = $sele->sql;
                                    ?>
                                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                        <tr>
                                            <td><?php echo $row['id']; ?></td>
                                            <td><img src="uploads/<?php echo $row['profilePic']; ?>" height="100" width="100" ></td>
                                            <td><?php echo $row['firstName']; ?></td>
                                            <td><?php echo $row['lastName']; ?></td>
                                            <td><?php echo $row['email']; ?></td>
                                            <td><?php echo $row['gender']; ?></td>
                                            <td><?php echo $row['course']; ?></td>
                                            <td><?php echo $row['hobbies']; ?></td>
                                            
                                            <td>
                                                Edit Delete                                                
                                            </td>
                                        </tr>
                                    <?php } ?>
                              </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>