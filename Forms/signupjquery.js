$(document).ready(function(){
    
    // change theme
    $(".btn-theme").click(function(){
        var lable = $(".btn-theme").text().trim();
        if(lable == "Dark") {
            $(".btn-theme").text("Light");
            $(".form, .desc, .mail, .fname, .lname, .pass, .hob, .gen, .ppic, .btn-theme").css({"background-color": "rgba(4,9,30,0.9)", "color": "white", "transition": "1s"}),
            $("login-btn").css({"background-color": "#f53f51", "color": "white", "transition": "1s"});
            
        }
        else {
            $(".btn-theme").text("Dark");
            $(".form, .desc, .mail, .fname, .lname, .pass, .hob, .gen, .ppic, .btn-theme").css({"background-color": "white","color":"black"}),
            $(".login-btn").css({"background-color": "#f53f51","color":"white"});
            
        }
    });

    // for background
    $(".bg").change(function(){
        var bgcolor = $(this).find('option:selected').val();
        $(".form").css("background-color",bgcolor);
    });

    // for fonts
    $(".font").change(function(){
        var fontcolor = $(this).find('option:selected').val();
        $(".form").css("color",fontcolor);
    });

    $('input[type=file]').change(function(e){
        var file = $(this).val();
        var ext = file.split('.').pop();
        if(ext != "png" && ext != "jpg" && ext != "jpeg"){
            $(".ppicmsg").css("color", "red");
            $(".ppicmsg").text("select valid image");
        }else{
            $(".ppicmsg").css("color", "green");
            $(".ppicmsg").text("ok");
        }
        // $(".ppicmsg").text(ext);
      });

    // // validate

    // // img type validation
    // $('input[type=file]').change(function(e){
    //     var file = $(this).val();
    //     var ext = file.split('.').pop();
    //     if(ext != "png" && ext != "jpg" && ext != "jpeg"){
    //         $(".ppicmsg").text("select valid image");
    //     }else{
    //     $(".ppicmsg").text("ok");
    //     }
    //     // $(".ppicmsg").text(ext);
    // });


    // $(".signup-btn").click(function(e){
    //     // e.preventDefault();

    //     if($(".ppic").val() == ""){
    //         e.preventDefault();
    //         $(".ppicmsg").text("Select Profile Pic");
    //     }else if($(".fname").val() == ""){
    //         e.preventDefault();
    //         $(".fnamemsg").text("Enter First Name");
    //     }else if($(".lname").val() == ""){
    //         e.preventDefault();
    //         $(".lnamemsg").text("Enter Last Name");
    //     }else if($(".mail").val() == ""){
    //         e.preventDefault();
    //         $(".mailmsg").text("Enter Last Name");
    //     }else if($(".gen").val() == ""){
    //         e.preventDefault();
    //         $(".genmsg").text("Enter Last Name");
    //     }else if($(".desc").val() == ""){
    //         e.preventDefault();
    //         $(".textareamsg").text("Enter Last Name");
    //     }else if($(".hob").val() == ""){
    //         e.preventDefault();
    //         $(".hobmsg").text("Enter Last Name");
    //     }else if($(".pass").val() == ""){
    //         e.preventDefault();
    //         $(".passmsg").text("Enter Last Name");
    //     }
    //     else{
    //         window.replace("file:///E:/Chintan/Forms/login.html", '_blank');
    //     }
    // });
    
    
    //   jquery plugin validation

    $('#signupform').validate({ // initialize the plugin
        rules: {
            profilepic: {
                required: true,
                accept: "jpg|jpeg|png|ico|bmp",
            },
            fname: "required",
            lname: "required",
            email: {
                required: true,
                email: true,
            },
            gender: "required",
            description: "required",
            hobbies: "required",
            password: {
                required: true,
                minlength: 8,
            },
            confpassword: {
                required: true,
                minlength: 8,
                equalTo: "#password",
            },
            messages:{
                profilepic: "Select Profile Image",
                fname: "Enter First Name",
                lnme: "Enter Last Name",
                email: "Enter E-mail",
                gender: "Select Your Gender",
                description: "Enter Description",
                hobbies: "Select Your Hobbies",
                password: "Enter Password With min 8 Char",
                confpassword: "Enter Confirm Password",
            },errorElement : '.hobbies',
            errorLabelContainer: '.hobmsg'
        }
    });


    
});


function consol(){
    var theme = document.getElementById("themeid").text;
    console.log(theme);
}
