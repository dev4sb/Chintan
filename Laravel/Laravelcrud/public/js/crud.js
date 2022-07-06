$(document).ready(function(){

    $("#insert").click(function(){
        $(".form").attr("id", "saveform");
        $(".form").trigger("reset");
        $("#update").hide();
        $("#save").show();
        $("#passrow").show();
        $("#oldimgtxt").hide();
        $("#oldimg").hide();
    });



    // show data
    $.ajax({
        type: "GET",
        url: "/showdata",
        dataType: "json",
        cache: false,
        success: function(data){
            // console.log(data);
            var html = '';
                $.each(data,function(key,value){
                    html +="<tr class='trid' data-trace='"+value.id+"'>";
                    html +='<td>'+ value.id + '</td>';
                    html +="<td><img height='100' width='100' src='images/"+ value.profilePic + "'</td>";
                    html +='<td>'+ value.firstName + '</td>';
                    html +='<td>'+ value.lastName + '</td>';
                    html +='<td>'+ value.email + '</td>';
                    html +='<td>'+ value.gender + '</td>';
                    html +='<td>'+ value.course + '</td>';
                    html +='<td>'+ value.description + '</td>';
                    html +="<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ value.id +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ value.id +">Delete</button></td>";
                    html +='</tr>';
                });
                $('table tbody').append(html);
        },error: function(xhr, status, error){
            console.log("problem in display data");
        },
        processData: false,
        contentType: false,
    });


    // insert data
    $(document).on('submit', '#saveform', function(e){
        e.preventDefault();
        alert("jQuery is working perfectly.");
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/myPage",
            cache: false,
            data: formData,
            success: function(data){
                // console.log(data);
                $.ajax({
                    type: "GET",
                    url: "/showdata",
                    dataType: "json",
                    cache: false,
                    success: function(data){
                        // console.log(data);
                        var html = '';
                            $.each(data,function(key,value){
                                html +="<tr class='trid' data-trace='"+value.id+"'>";
                                html +='<td>'+ value.id + '</td>';
                                html +="<td><img height='100' width='100' src='images/"+ value.profilePic + "'</td>";
                                html +='<td>'+ value.firstName + '</td>';
                                html +='<td>'+ value.lastName + '</td>';
                                html +='<td>'+ value.email + '</td>';
                                html +='<td>'+ value.gender + '</td>';
                                html +='<td>'+ value.course + '</td>';
                                html +='<td>'+ value.description + '</td>';
                                html +="<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ value.id +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ value.id +">Delete</button></td>";
                                html +='</tr>';
                            });
                            $('table tbody').html(html);
                    },error: function(xhr, status, error){
                        console.log("problem in display data");
                    },
                    processData: false,
                    contentType: false,
                });
            },error: function(xhr, status, error){
                console.log("Problem");
            },
            contentType: false,
            processData: false,
        });
    });


    // delete
    $(document).on('click', '.delete', function(){
        // console.log($(this).attr("data-id"));
        var del = $(this).attr('data-id');
        
            console.log(del);

            swal({
                title: "Are you sure?"+del,
                text: "Once deleted, you will not be able to recover your data!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url : "/delete",
                        type : "GET",
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
                    swal("Poof! Your data has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
    });

    var rowi;

    // edit data
    $(document).on('click', '.edit', function(){
        var editid = $(this).attr("data-id");
        rowi = $(this).closest("tr").attr("data-trace");
        $("#save").hide();
            $("#update").show();
            $("#passrow").hide();
            $("#oldimgtxt").show();
            $("#oldimg").show();
            $(".form").attr("id", "formupdate");
            $("#profilepic").val(null);
            $.ajax({
                dataType: "json",
                type: "GET",
                url: "/edit",
                data: {editi: editid,},
                success: function(data){
                    console.log(data['firstName']);
                    var id =data['id'];
                    var ppic =data['profilePic'];
                    var fname =data['firstName'];
                    var lname =data['lastName'];
                    var email =data['email'];
                    var gender =data['gender'];
                    var course =data['course'];
                    var description =data['description'];
                    var hobbies = data['hobbies'];
                
                    var imgpath = "images/"+ppic;
                    $('#nid').val(id);
                    $('#oldimgtxt').val(ppic);
                    $('#oldimg').attr("src", imgpath);
                    $('#fname').val(fname);
                    $('#lname').val(lname);
                    $('#email').val(email);
                    if(gender == "Male"){
                        $('#genderM').prop("checked", true);
                    }else{
                        $('#genderF').prop("checked", true);
                    }
                    $('#selected').val(course);
                    $('#selected').text(course);
                    $('#description').val(description);

                    var valNew = hobbies.split(',');
                    if(valNew.indexOf("Sports") != -1){
                        $("#hobbiess").attr("checked", true);
                    }else{
                        $("#hobbiess").attr("checked", false);
                    }
                    if(valNew.indexOf("Reading") != -1){
                        $("#hobbiesr").attr("checked", true);
                    }else{
                        $("#hobbiesr").attr("checked", false);
                    }
                    if(valNew.indexOf("Coding") != -1){
                        $("#hobbiesc").attr("checked", true);
                    }else{
                        $("#hobbiesc").attr("checked", false);
                    }
                    if(valNew.indexOf("music") != -1){
                        $("#hobbiesm").attr("checked", true);
                    }else{
                        $("#hobbiesm").attr("checked", false);
                    }

                },
                error: function(xhr, status, error){
                    console.log(xhr);
                },
                cache: false,
            });
    });

    
    // update data
    $(document).on('submit', '#formupdate', function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            dataType: "json",
            url: "/update",
            data: formData,
            success: function(data){
                console.log("Updated");
                // console.log(data);
                // var row = $(".trid[data-trace='"+rowi+"']");
                
                var html = '';
                $.each(data,function(key,value){
                    html +='<td>'+ value.id + '</td>';
                    html +="<td><img height='100' width='100' src='images/"+ value.profilePic + "'</td>";
                    html +='<td>'+ value.firstName + '</td>';
                    html +='<td>'+ value.lastName + '</td>';
                    html +='<td>'+ value.email + '</td>';
                    html +='<td>'+ value.gender + '</td>';
                    html +='<td>'+ value.course + '</td>';
                    html +='<td>'+ value.description + '</td>';
                    html +="<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ value.id +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ value.id +">Delete</button></td>";
                    
                });
                $(".trid[data-trace='"+rowi+"']").html(
                    "<td>"+ rowi +"</td>"+ "<td><img height='100' width='100' src='images/"+ data['profilePic'] + "'</td>" +"<td>"+ data['firstName'] +"</td>"+"<td>"+ data['lastName'] +"</td>" + "<td>"+ data['email'] +"</td>"+"<td>"+ data['gender'] +"</td>"+"<td>"+ data['course'] +"</td>"+"<td>"+ data['description'] +"</td>"+"<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ rowi +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ rowi +">Delete</button></td>"
                );

            },error: function(xhr, status, error){
                console.log("problem in updating");
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });

    // searching data
    $("#formid").submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/search",
            dataType: "json",
            data: formData,
            success: function(data){
                console.log(data);
                var html = '';
                $.each(data,function(key,value){
                    html +="<tr class='trid' data-trace='"+value.id+"'>";
                    html +='<td>'+ value.id + '</td>';
                    html +="<td><img height='100' width='100' src='images/"+ value.profilePic + "'</td>";
                    html +='<td>'+ value.firstName + '</td>';
                    html +='<td>'+ value.lastName + '</td>';
                    html +='<td>'+ value.email + '</td>';
                    html +='<td>'+ value.gender + '</td>';
                    html +='<td>'+ value.course + '</td>';
                    html +='<td>'+ value.description + '</td>';
                    html +="<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ value.id +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ value.id +">Delete</button></td>";
                    html +='</tr>';
                });
                $('table tbody').html(html);
            },error: function(xhr, status, error){
                console.log("Problem in search");
            },contentType: false,
            processData: false,
        })
    })

});