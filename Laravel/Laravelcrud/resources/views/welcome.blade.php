<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
        </style>

        <link rel="stylesheet" href="./css/bs5css.css">

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
<body class="antialiased">
    <div class="container mb-3 mt-5 d-flex justify-content-between">
        <div>
            <form id="formid" method="post">@csrf
                <input type="text" name="searchnm" placeholder="Search...." id="searchid">
                <input type="submit" value="Search">
            </form>
        </div>
        <div>
            <button type="button" id="insert" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Insert Data
            </button>
        </div>
        
    </div>
    

<div class="container">
    <table class="table table-dark table-hover">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Images</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Gender</th>
            <th scope="col">Course</th>
            <th scope="col">Description</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" id="" class="form">
                    @csrf
                    <input type="hidden" name="nid" id="nid" value="">
                    <div>
                        <img id="oldimg" src="" height="50" width="50" ><input type="file" class="form-control" name="profilepic" id="profilepic">
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
                        <input type="submit" id="save" data-bs-dismiss="modal">
                        <input type="submit" id="update" data-bs-dismiss="modal" value="Update">
                    </div> 
                </form>
            </div>
        
    </div>
</div>



    
    
     <script src="../js/jquery.min.js"></script>
     <script src="../js/bs5minjs.js"></script>
     <script src="../js/crud.js"></script>
     <script src="../js/sweetalert.min.js"></script>
    </body>
    
</html>
