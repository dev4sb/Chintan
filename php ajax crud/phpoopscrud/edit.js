$(document).ready(function(){



    $("#editform").submit(function(e){
        e.preventDefault();
        var id = $("#id").val();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "update.php",
            data: formData,
            cache: false,
            processData: false,
            contentType: false,
            success: function(data){
                var jdata = jQuery.parseJSON(data);
                var ebtn = "<button class='edit' data-id='"+jdata['id']+"' data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button>";
                var dbtn = "<button class='delete' data-id='"+jdata['id']+"'>Delete</button>";
                var img = "<img src='img/"+jdata['profilePic']+"' height='100' width='100' >";
                $(".trid[data-trace='"+id+"']").html("<td>"+id+"</td><td>"+img+"</td><td>"+jdata['firstName']+"</td><td>"+jdata['lastName']+"</td><td>"+jdata['email']+"</td><td>"+jdata['gender']+"</td><td>"+jdata['course']+"</td><td>"+jdata['description']+"</td><td>"+ebtn + dbtn+"</td>");

            },
            error: function(xhr, status, error){
            console.log("xhr");
            }
        });

});
});


