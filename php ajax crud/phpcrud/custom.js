$(document).ready(function(){

    $.ajax({    
        type: "GET",
        url: "select.php",                 
        success: function(data){                    
            $(".show").html(data); 
        }
    });


    $("#btn-add").click(function(){
        var profilepic = $("#profilepic").val();
        var fname = $("#fname").val();
        var lname = $("#lname").val();
        var email = $("#email").val();
        var gender = $("#gender").val();
        var course = $("#courses :selected").text();
        var description = $("#description").val();
        var hobbies = new Array();
            $('input[name="hobbies[]"]:checked').each(function(){
            hobbies.push($(this).val());
        });
        var dataString = ''+ hobbies;
        var password = $("#password").val();
        console.log(password);
        $.ajax({
                type: "POST",
                url: "insert.php",
                data : {
                    profilepic: profilepic,
                    fname: fname,
                    lname: lname,
                    email: email,
                    gender: gender,
                    course: course,
                    description: description,
                    dataString: dataString,
                    password: password,
                },
                cache: false,
                success: function(data){
                    $(".show").html(data);
                    console.log("inserted");
                },
                error: function(xhr, status, error){
                    console.log(xhr);
                }
        });
    })



    
});