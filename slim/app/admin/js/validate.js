$(document).ready(function(){


    // form validation
    $("#btn-addupdate").click(function(){
        $("#signupeditform").validate({
            rules:{
                profilepic: "required",
                fname: "required",
                lname: "required",
                email:{
                    required: true,
                    email: true,
                },
                gender: "required",
                course: "required",
                description: "required",
                hobbies: "required",
                password: "required",
                password2: "required",
            },
            submitHandler: function(form) {
                form.submit(e);
                e.preventDefault();
                
            }
        });
    });
    

    // hide and show data in form for add and update
    $("#insert").click(function(){
        $("form").trigger("reset");
        $("#btn-update").hide();
        $("#btn-addupdate").show();
        $("#passrow").show();
        $("#oldimgtxt").hide();
        $("#oldimg").hide();
        $(".form").attr("id", "signupeditform");
    });


    // insert data
    $(document).on('submit', "#signupeditform", function(e){
        e.preventDefault();
        var formData = new FormData(this);
        console.log($(".form").attr("id"));

        $.ajax({
            type: "POST",
            url: "../src/public/insert",
            data: formData,
            
            success: function(data){
                console.log(data);
                $('#exampleModal').modal('toggle'); 

                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../src/public/view",
                    success: function(data){
                        // console.log(data);
                        var html = '';
                        $.each(data,function(key,value){
                            html +="<tr class='trid' data-trace='"+value.id+"'>";
                            html +='<td>'+ value.id + '</td>';
                            html +="<td><img height='100' width='100' src='../src/public/uploads/"+ value.profilePic + "'</td>";
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
                    },
                    error: function(xhr, status, error){
                        console.log(xhr);
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                });
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });


    // select data

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "../src/public/view",
            success: function(data){
                // console.log(data);
                var html = '';
                $.each(data,function(key,value){
                    html +="<tr class='trid' data-trace='"+value.id+"'>";
                    html +='<td>'+ value.id + '</td>';
                    html +="<td><img height='100' width='100' src='../src/public/uploads/"+ value.profilePic + "'</td>";
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
            },
            error: function(xhr, status, error){
                console.log(xhr);
            },
            cache: false,
            contentType: false,
            processData: false,
        });



        // delete
        $(document).on('click','.delete', function(){
            
            var del = $(this).data('id');
        
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
                        url : "../src/public/delete",
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
                    swal("Poof! Your data has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your imaginary file is safe!");
                }
            });
        });



        // count pages for pagination
        $.ajax({
            type: "GET",
            url: "../src/public/countRecords",
            success: function(data){
                // var pageSize = data / 5;
                // var ceildata = Math.ceil(pageSize);
                // $("#pagesize").html(ceildata);
            },
            error: function(xhr, status, error){
                console.log("record not counted");
            },
        });


        var rowi ;

        // edit data
        $(document).on('click','.edit', function(){
            $("#btn-addupdate").hide();
            $("#btn-update").show();
            $("#passrow").hide();
            $("#oldimgtxt").show();
            $("#oldimg").show();
            $(".form").attr("id", "formupdate");
            console.log($("#signupeditform").attr("id", "editform"));
            editid = $(this).data('id');
            // console.log(editid);
            rowi = $(this).closest("tr").attr("data-trace");

            $.ajax({
                dataType: "json",
                type: "POST",
                url: "../src/public/edit",
                data: {editi: editid,},
                success: function(data){
                    var id =''
                    var ppic =''
                    var fname =''
                    var lname =''
                    var email =''
                    var gender =''
                    var course =''
                    var description =''
                    var hobbies = ''
                    $.each(data,function(key,value){
                        id +=value.id;
                        ppic +=value.profilePic;
                        fname +=value.firstName;
                        lname +=value.lastName;
                        email +=value.email;
                        gender +=value.gender;
                        course +=value.course;
                        description +=value.description;
                        hobbies +=value.hobbies;
                    });
                    var imgpath = "../src/public/uploads/"+ppic;
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
                
                // console.log($("#formupdate").attr("id"));
                var formData = new FormData(this);
                $.ajax({
                    type: "POST",
                    dataType: "json",
                    url: "../src/public/update",
                    data: formData,
                    success: function(data){
                        console.log("Updated");
                        // console.log(data);
                        // var row = $(".trid[data-trace='"+rowi+"']");
                        
                        var html = '';
                        $.each(data,function(key,value){
                            html +='<td>'+ value.id + '</td>';
                            html +="<td><img height='100' width='100' src='../src/public/uploads/"+ value.profilePic + "'</td>";
                            html +='<td>'+ value.firstName + '</td>';
                            html +='<td>'+ value.lastName + '</td>';
                            html +='<td>'+ value.email + '</td>';
                            html +='<td>'+ value.gender + '</td>';
                            html +='<td>'+ value.course + '</td>';
                            html +='<td>'+ value.description + '</td>';
                            html +="<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ value.id +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ value.id +">Delete</button></td>";
                            
                        });
                        $(".trid[data-trace='"+rowi+"']").html(
                            "<td>"+ rowi +"</td>"+ "<td><img height='100' width='100' src='../src/public/uploads/"+ data['profilePic'] + "'</td>" +"<td>"+ data['firstName'] +"</td>"+"<td>"+ data['lastName'] +"</td>" + "<td>"+ data['email'] +"</td>"+"<td>"+ data['gender'] +"</td>"+"<td>"+ data['course'] +"</td>"+"<td>"+ data['description'] +"</td>"+"<td><button class='edit bg-light text-dark py-0 px-2' data-id="+ rowi +" data-bs-toggle='modal' data-bs-target='#exampleModal'>Edit</button><button class='delete bg-light text-dark py-0 px-2' data-id="+ rowi +">Delete</button></td>"
                        );

                    },error: function(xhr, status, error){
                        console.log("problem in updating");
                    },
                    cache: false,
                    contentType: false,
                    processData: false,
                });
        });



        // search data
        $("#searchform").submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: "POST",
                url: "../src/public/search",
                cache: false,
                data: formData,
                cache: false,
                dataType: "json",
                success: function(data){
                    console.log(data);
                    var html = '';
                    $.each(data,function(key,value){
                        html +="<tr class='trid' data-trace='"+value.id+"'>";
                        html +='<td>'+ value.id + '</td>';
                        html +="<td><img height='100' width='100' src='../src/public/uploads/"+ value.profilePic + "'</td>";
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
                    },
                error: function(xhr, status, error){
                    console.log("Problem");
                },
                contentType: false,
                processData: false,
            })
        });


});