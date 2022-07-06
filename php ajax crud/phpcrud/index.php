<html>
    <head>
        <link rel="stylesheet" href="./bs5css.css" >

    </head>


<body>
    <div>

        <button type="button" class="btn btn-primary" id="insert" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert</button>

        <div class="show"></div>

        <!-- form model -->
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
                        <button type="submit" id="btn-add" data-bs-dismiss="modal" class="btn btn-primary">Save</button>
                        <button type="button" id="update" data-bs-dismiss="modal" class="btn btn-primary">Update</button>
                    </div>
                    </div>
                </div>
            </div>



    </div>


    <script src="./jquery.min.js"></script>
    <script src="./bs5minjs.js"></script>
    <script src="./custom.js"></script>
</body>
</html>