
    <div class="main-div mt-5">
        
        <div class="show">
            
            <div class="sear">
                
            </div>
            
            


            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" id="m" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Insert Record</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="post" id="signupeditform" enctype="multipart/form-data">
                            <div class="modal-body">
                        

                                <div><input type="file" class="form-control" name="profilepic" id="profilepic"></div><br>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                        <div><input type="text" placeholder="First Name" class="form-control"  name="fname" id="fname"></div><br>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div><input type="text" placeholder="Last Name" class="form-control"  name="lname" id="lname"></div><br>
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
                            
                                <!-- <input type="submit" id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary" value="Save" > -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary" value="Save" >
                                    <!-- <button id="btn-addupdate" data-bs-dismiss="modal" class="btn btn-primary">Save</button> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
    <script src="./js/jquery.min.js"></script>
    <!-- <script src="./edit.js"></script> -->
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/bs5minjs.js"></script>
    <script src="https://kit.fontawesome.com/e4b0bef1bf.js" crossorigin="anonymous"></script>
</body>
</html>

