$(document).ready(function(){

    $("#signupeditform").validate();



    $("#iddec").click(function(){
        var idsortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {idsortasc: idsortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#iddesc").click(function(){
        var idsortdesc = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {idsortdesc: idsortdesc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#fnasc").click(function(){
        var fnsortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {fnsortasc: fnsortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#fndec").click(function(){
        var fnsortdesc = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {fnsortdesc: fnsortdesc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#lnasc").click(function(){
        var lnsortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {lnsortasc: lnsortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#lndec").click(function(){
        var lnsortdesc = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {lnsortdesc: lnsortdesc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#emasc").click(function(){
        var emsortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {emsortasc: emsortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#emdec").click(function(){
        var emsortdesc = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {emsortdesc: emsortdesc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });

    $("#gasc").click(function(){
        var gsortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {gsortasc: gsortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#gdec").click(function(){
        var gsortdesc = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {gsortdesc: gsortdesc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });

    $("#casc").click(function(){
        var csortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {csortasc: csortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#cdec").click(function(){
        var csortdec = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {csortdesc: csortdec},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#desasc").click(function(){
        var dessortasc = "ASC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {csortasc: dessortasc},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });
    $("#desdesc").click(function(){
        var csortdec = "DESC";
        $.ajax({
            type: "POST",
            url: "sort.php",
            data: {csortdesc: csortdec},
            cache: "false",
            success: function(data){
                $("tbody").html(data);
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
        });
    });

    
    


    $("#searchform").submit(function(e){
        e.preventDefault();
        var sdata = $("#search").val();
        $.ajax({
            type: "POST",
            url: "select1.php",
            data: {sdata: sdata},
            success: function(data){
                // alert(data);
                // console.log(data);
                $("tbody").html(data);
            },error: function(xhr, status, error){
                console.log(xhr);
            },
        });
        console.log("ok");
    });

    $("#insert").click(function(){
        $("form").trigger("reset");
        
    });

    $(".edit").click(function(){
        $("#btn-addupdate").hide();
        $("#update").show();
        
        var eid = $(this).data('id');

        $.ajax({
            type: "POST",
            url: "edit.php",
            data: {
                idedit: eid,
            },
            cache: false,
            success: function(data){
                $("#exampleModal").html(data);
                console.log("data sent");
            },
            error: function(xhr, status, error){
                console.log(xhr);
            }
        });

    })

    // $.ajax({    
    //     type: "POST",
    //     url: "select.php",                 
    //     success: function(data){                    
    //         $("#tbody").html(data); 
    //         // console.log(data);   
    //     },error: function(xhr, status, error){
    //         console.log(xhr);
    //     }
    // });
    

    var rowCount = $("#tblid tr").length-1;
            // alert(rowCount); 

    $("#signupeditform").submit(function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        var lastId = $('.trid').last().data('trace');
        var lid =  parseInt(lastId + 1);
        $.ajax({
            url: "insert.php",
            type: 'POST',
            data: formData,
            success: function (data) {
                jdata = jQuery.parseJSON(data);
                var ebtn = "<button class='edit bg-light text-dark py-0 px-2' data-id="+lid+" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button>";
                var dbtn = "<button class='delete bg-light text-dark py-0 px-2' data-id="+lid+">Delete</button>";
                // $("tbody").append("<tr><td>"+lid+"</td><td><img src='img/"+jdata['profilePic']+"' width='100' height='100'/></td><td>"+jdata['firstName']+"</td><td>"+jdata['lastName']+"</td><td>"+jdata['email']+"</td><td>"+jdata['gender']+"</td><td>"+jdata['course']+"</td><td>"+jdata['description']+"</td><td>"+ebtn+dbtn+"</td></tr>");
                // $("form").trigger("reset");
                
            },
            cache: false,
            contentType: false,
            processData: false
        });
    });



    

        // delete
        $(".delete").click(function(){
            var del = $(this).data('id');
            var rid =  $(".trid").data("trace");
        
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
                        url : "del.php",
                        type : "POST",
                        data : {id:del},
                        success : function() {
                            $(".trid[data-trace='"+del+"']").remove();
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


        $(".pbtn").click(function(){
            var paginationbtn = $(this).attr('id');
            $(".pbtn").removeClass("bg-primary");
            $(this).addClass("addClass");
            $("#pnum").html("Page: "+paginationbtn);
            
            $.ajax({
                type: "POST",
                url: "pagination.php",
                data: {paginationbtn: paginationbtn},
                cache: false,
                success: function(data){
                    $("tbody").html(data);
                    console.log(data);
                    console.log("data changes");
                },
                error: function(xhr, status, error){
                    console.log("problem in pagination");
                },
            });
        });
    
    
});