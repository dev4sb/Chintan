<html>

<head>
    <link rel="stylesheet" href="./bs5css.css">
</head>

    <body>



    <button type="button" class="btn btn-primary" id="insert" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert</button>


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
                                        $sele = new database();
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
                                                <button data-id="<?php $row['id']; ?>" data-firstName="<?php $row['firstName'];  ?>" data-lastName="<?php $row['lasrName'];?>" data-email="<?php $row['email'];?>" data-gender="<?php $row['gender'];?>" data-course="<?php $row['course'];?>" data-description="<?php $row['description'];?>" data-hobbies="<?php $row['hobbies'];?>" id="edit" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                            
                                                <button type="submit" data-id="<?php echo $row['id']; ?>" id="del" class="btn btn-danger btn-sm">Delete</button>
                                                
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



        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Insert Record</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" id="signupeditform" enctype="multipart/form-data">
                            <div><input type="file" class="form-control" name="profilepic" id="profilepic"></div><br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div><input type="text" placeholder="First Name" class="form-control" value="" name="fname" id="fname"></div><br>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                <div><input type="text" placeholder="Last Name" class="form-control" name="lname" id="lname"></div><br>
                                </div>
                            </div>
                            
                            <div><input type="email" placeholder="Your E-mail" class="form-control" name="email" id="email"></div><br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <label class="fw-bold">Gender:</label>
                                    <input type="radio" name="gender" value="Male" id="gender">Male
                                    <input type="radio" name="gender" value="Female" id="gender">Female
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <select name="course" class="form-control" id="courses">
                                        <option selected disabled>Course</option>
                                        <option value="MCA">MCA</option>
                                        <option value="BCA">BCA</option>
                                    </select>
                                </div>
                                
                            </div><br>
                            <textarea class="form-control" placeholder="Description" name="description" id="description"></textarea>
                            <div><br>
                                <label class="fw-bold">Hobbies:</label>
                                <input type="checkbox" value="Sports" id="hobbies" name="hobbies[]">Sports
                                <input type="checkbox" value="Reading" id="hobbies" name="hobbies[]">Reading
                                <input type="checkbox" value="Coding" id="hobbies" name="hobbies[]">Coding
                                <input type="checkbox" value="music" id="hobbies" name="hobbies[]">music
                            </div><br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div><input type="password" class="form-control" placeholder="Password" name="password" id="password"></div><br>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div><input type="password" class="form-control" placeholder="Confirm Password" name="password2" id="password"></div><br>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <input type="submit" id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary" value="save" >
                        <!-- <input type="submit" id="update" data-bs-dismiss="modal" class="btn btn-primary" value="update" > -->
                        <button type="button" id="update" data-bs-dismiss="modal" class="btn btn-primary">Update</button>
                    </div>
                    </div>
                </div>
            </div>




        <script>
        $(document).ready(function(){
            $(document).on('click',"#del",function(e) {
                e.preventDefault();
                var del = $(this).data('id');

                swal({
                    title: "Are you sure?",
                    text: "Once deleted, you will not be able to recover this imaginary file!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url : "delete_data.php",
                            type : "POST",
                            data : {id:del},
                            success : function() {
                                swal({
                                    title: "Sweet!",
                                    text: "Delete data",
                                    imageUrl: 'thumbs-up.jpg'
                                }); 
                            }
                        });
                        swal("Poof! Your imaginary file has been deleted!", {
                            icon: "success",
                        });
                    } else {
                        swal("Your imaginary file is safe!");
                    }
                });
            });


            $("#btn-addupdate").click(function(){
        

        var profilepic = $("#profilepic").val();
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            var email = $("#email").val();
            var gender = $("#gender").val();
            var course = $("#courses :selected").text();
            var description = $("#description").val();
            var hobbies = new Array();
                $('input[name="hobbies[]"]:checked').each(function(){
                hobbies.push($(this).val());
            });
            var dataString = ''+ hobbies;
            var password = $("#password").val();
            $.ajax({
                type: "POST",
                url: "insert.php",
                data: {
                    profilepic: profilepic,
                    fname: fname,
                    lname: lname,
                    email: email,
                    gender: gender,
                    course: course,
                    description: description,
                    dataString: dataString,
                    password: password,
                },
                cache: false,
                success: function(data){
                    // $(".data").html(data);
                    console.log("inserted");
                },
                error: function(xhr, status, error){
                    console.log(xhr);
                }
            });
        });

        });




    </script>
    <script src="./jquery.min.js"></script>
    <script src="./bs5minjs.js"></script>

    </body>
    </html>
