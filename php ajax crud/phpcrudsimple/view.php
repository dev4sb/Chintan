
<html>
    <head>
        <link rel="stylesheet" href="./bs5css.css" >
    </head>
<body>
<div class="main">
<?php

include("./sqlcon.php");

    $query = "SELECT * FROM users";
    $res = $con->query($query);

    if($res->num_rows > 0){
        ?>
        <table border="2" class="table text-center table-hover table-striped mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>E-mail</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
    
        <?php
        while($row = $res->fetch_array(MYSQLI_NUM)){
            echo "
                    
                        <tr>
                            <td>$row[0]</td>
                            <td>$row[2]</td>
                            <td>$row[3]</td>
                            <td>$row[4]</td>
                            <form>
                                <td><input type='submit' value='Edit' data-id='$row[0]' data-fname='$row[2]' data-lname='$row[3]' data-email='$row[4]' data-des='$row[6]' class='edit' data-bs-target='#exampleModal'  data-bs-toggle='modal' data-bs-target='#exampleModal'/>

                                <input type='submit' data-id='$row[0]' value='Delete' class='delete' /></td>
                            </form>
                        </tr>"; 
        }
    }else{
        echo "nok";
    }
    ?>
                </table>

</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
      </div>
      <div class="modal-body">
        <form><input type='hidden' id='hiddenid' value=''>
        <label>First Name:</label>
            <input type="text" id="ufname" placeholder="First Name" value=""><br>
            <label>Last Name:</label>
            <input type="text" id="ulname" placeholder="Last Name" value=""><br>
            <label>Email:</label>
            <input type="text" id="uemail" placeholder="Email" value=""><br>
            <label>Description:</label>
            <textarea id="utextarea"></textarea>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" id="update" value="Update">

      </div>
    </div>
  </div>
</div>


<script>
    $(document).ready(function(){
        $(".delete").click(function(){
            var id = $(this).data("id");
            $.ajax({
                type: "POST",
                url: "del.php",
                data: {id: id},
                cache: false,
                success: function(data){
                    $(".main").html(data);
                }
            });
            
        })
        $(".edit").click(function(){
            var id = $(this).data("id");
            var fname = $(this).data("fname");
            var lname = $(this).data("lname");
            var email = $(this).data("email");
            var des = $(this).data("des");

            $("#ufname").val(fname);
            $("#ulname").val(lname);
            $("#uemail").val(email);
            $("#utextarea").val(des);
            $("#hiddenid").val(id);

        });

        $("#update").click(function(){
            var nid = $("#hiddenid").val();
            var fname = $("#ufname").val();
            var lname = $("#ulname").val();
            var email = $("#uemail").val();
            var desc = $("#utextarea").val();
            $.ajax({
                type: "POST",
                url: "edit.php",
                data: {
                    nid: nid,
                    fname: fname,
                    lname: lname,
                    email: email,
                    desc: desc,
                },
                cache: false,
                success: function(data){

                    $(".main").html(data);
                }
            });
            
        })
    });
</script>
<script src="./bs5minjs.js"></script>
<script src="./jquery.min.js"></script>
<script src="./jquery.js"></script>

</body>    
</html>

