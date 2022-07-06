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
    <link rel="stylesheet" href="./css/bs5css.css">

    <style>.error {
  color: #F00;
  background-color: #FFF;
}</style>


</head>
<body>
    <div class="data"><p id="ptag"></p></div>
   

    <div class="container mb-3 mt-5" style="display: flex; justify-content: space-between">
        <div>
            <form id="searchform" method="post">
                <input type="text"  name="searchdata" id="search" placeholder="Search.." >
                <button class="py-1 border-1 py-0" id="searchbtn">Search</button>
            </form>
        </div>
        
        <div>
            <button type="button" class="btn btn-primary" style="float: right;" id="insert" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert</button>
        </div>
    </div>

    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row">
                    <div class="col-md-12 p-0">
                        <table id="tblid" class="table table-dark table-hover text-center">
                            <thead>
                                <tr>
                                    <th scope="col">Id<i class="fa-solid fa-caret-down" id="iddec"></i><i class="fa-solid fa-caret-up" id="iddesc"></i></th>
                                    <th scope="col">IMG</th>
                                    <th scope="col">First Name <i class="fa-solid fa-caret-down" id="fnasc"></i><i class="fa-solid fa-caret-up" id="fndec"></i></th>
                                    <th scope="col">Last Name<i class="fa-solid fa-caret-down" id="lnasc"></i><i class="fa-solid fa-caret-up" id="lndec"></i></th>
                                    <th scope="col">E-mail<i class="fa-solid fa-caret-down" id="emasc"></i><i class="fa-solid fa-caret-up" id="emdec"></i></th>
                                    <th scope="col">Gender<i class="fa-solid fa-caret-down" id="gasc"></i><i class="fa-solid fa-caret-up" id="gdec"></i></th>
                                    <th scope="col">Course<i class="fa-solid fa-caret-down" id="casc"></i><i class="fa-solid fa-caret-up" id="cdec"></i></th>
                                    <th scope="col">Description<i class="fa-solid fa-caret-down" id="desasc"></i><i class="fa-solid fa-caret-up" id="desdesc"></i></th>
                                    <th scope="col" colspan="3">Action</th>
                                </tr>
                            </thead>
                            <tbody> 
                            </tbody>
                        </table>

                        <div class="d-flex">
                            <p id="pnum" class="mr-2">page: 1</p> of <p class="ml-2"></p>
                        </div>
                        <div class="pagination mb-5" id="pagination">
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1"  aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <form method="post" id="" class="form" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="nid" id="nid" value="">
                        <div>
                        <img id="oldimg" src="../src/public/uploads/" height="50" width="50" ><input type="file" class="form-control" name="profilepic" id="profilepic">
                            <input type="hidden" name="oldimgtxt" id="oldimgtxt" value="" >
                        </div><br>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div>
                                    <input type="text" placeholder="First Name" class="form-control"  name="fname" id="fname" value="">
                                </div><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div>
                                    <input type="text" placeholder="Last Name" class="form-control"  name="lname" id="lname" value="">
                                </div><br>
                            </div>
                        </div>

                        <div>
                            <input type="email" placeholder="Your E-mail" class="form-control" name="email" id="email" value="">
                        </div><br>
                        
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <label class="fw-bold">Gender:</label>
                                <input type="radio" name="gender" value="Male" id="genderM">Male
                                <input type="radio" name="gender" value="Female" id="genderF">Female
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <select name="course" class="form-control" id="courses">
                                    <option selected disabled>Course</option>
                                    <option id="selected" selected value=""></option>
                                    <option value="MCA">MCA</option>
                                    <option value="BCA">BCA</option>
                                </select>
                            </div>
                        </div><br>
                        
                        <textarea class="form-control" placeholder="Description" name="description" id="description"></textarea>
                        <div><br>
                            <label class="fw-bold">Hobbies:</label>
                            <input type="checkbox" value="Sports" id="hobbiess" name="hobbies[]">Sports
                            <input type="checkbox" value="Reading" id="hobbiesr" name="hobbies[]">Reading
                            <input type="checkbox" value="Coding" id="hobbiesc" name="hobbies[]">Coding
                            <input type="checkbox" value="music" id="hobbiesm" name="hobbies[]">music
                        </div><br>
                        <div class="row" id="passrow">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                                </div><br>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div>
                                    <input type="password" class="form-control" placeholder="Confirm Password" name="password2" id="password">
                                </div><br>
                            </div>
                        </div>
                        
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button id="btn-addupdate" data-bs-dismiss="" class="btn btn-primary"> Save </button>
                            <button id="btn-update" data-bs-dismiss="modal" class="btn btn-primary"> Update </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <script src="./js/jquery.min.js"></script>
    <script src="./js/jquery.validate.min.js"></script>
    <script src="./js/bs5minjs.js"></script>
    <script src="./js/validate.js"></script>
    
    

</body>
</html>