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
</head>
<body>

<div class="container mb-3" style="display: flex; justify-content: space-between">
    <div class="mt-5">
      <form id="searchform" method="post">
        <input type="text"  name="search" id="search" placeholder="Search.." >
        <button class="py-1 border-1 py-0" id="searchbtn">Search</button>
      </form>
                    
    </div>
    <div class="mt-5">
      <button type="button" class="btn btn-primary" style="float: right;" id="insert" data-bs-toggle="modal" data-bs-target="#exampleModal">Insert</button>
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
                                         
                  <?php
                      include_once "db.php";
                      $s = new database();
                      $limit = 5;
                      $s->select("users","*","", "id ASC LIMIT  $limit  ");
                      $result = $s->sql;
                      
                  ?>
                  <?php 
                    while($row = mysqli_fetch_assoc($result)){       
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
                </tbody>
              </table>
                                    
              <?php
                  $s->countRecords();
                  $total_data =  $s->totalrecords;
                  $pagesize = ceil($total_data / 5);
              ?>

              <div class="d-flex"> <p id="pnum" class="mr-2">page: 1</p> of <p class="ml-2"><?php echo $pagesize ?></p></div>
                <div class="pagination mb-5" id="pagination">
                  <?php
                    for($i=1;$i<=$pagesize;$i++){ 
                      if($i == 1){ ?>
                          <button class="pbtn  px-3 py-2" id="<?php echo $i; ?>"><?php echo $i; ?></button>
                      <?php }else{ ?>
                          <button class="pbtn px-3 py-2" id="<?php echo $i; ?>"><?php echo $i; ?></button>
                      <?php } ?>   
                    <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    