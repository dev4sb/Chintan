    if(btn == "up0"){
        $("#lf").animate({bottom: '120', }, 6000);

        // $(".up1").css("display", "block");
        // $(".down1").css("display", "none");
        // $(".up2").css("display", "block");
        // $(".down2").css("display", "none");
        // $(".up3").css("display", "block");
        // $(".down3").css("display", "none");
    }else if(btn == "up1"){
        // farray.push(btn);
        if(btn == "up1"){
            $("#lf").animate({bottom: '230px', }, 6000);
        }else{
            $("#lf").stop();
        }

        // $(".down2").css("display", "none");
        // $(".up2").css("display", "block");
    }else if(btn == "up2"){
        // farray.push(btn);
        if(btn == "up1"){
            $("#lf").animate({bottom: '230px', }, 6000);
        }
        else{
            $("#lf").animate({bottom: '340px', }, 6000);
            if(btn == up1){
                $("#lf").animate({bottom: '230px', }, 6000);
            }
            
            // $("#lf").stop();
        }
        
        // $(".down1").css("display", "block");
        // $(".up1").css("display", "none");
        // $(".down3").css("display", "none");
        // $(".up3").css("display", "block");
    }else if(btn == "up3"){
        if(btn == "up2"){
            $("#lf").stop();
        }else{
            $("#lf").animate({bottom: '450px', }, 6000);
        }
        // farray.push(btn);
        
        // $(".down2").css("display", "block");
        // $(".down1").css("display", "block");
        // $(".up2").css("display", "none");
        // $(".up1").css("display", "none");
    }else if(btn == "up4"){
        // farray.push(btn);
        $("#lf").animate({bottom: '560px', }, 6000);
        
        // $(".up1").css("display", "none");
        // $(".up2").css("display", "none");
        // $(".up3").css("display", "none");
        // $(".down1").css("display", "block");
        // $(".down2").css("display", "block");
        // $(".down3").css("display", "block");
    }else if(btn == 5){
        $("#lf").animate({bottom: '560px', }, );
    }






    if(btn == "up1"){
        farray.push(btn);
        $("#lf").animate({bottom: '230px', }, {duration: 6000, complete: function(){$("#h2").text("1")}});
        // $("#lf").stop();
    }else if(btn == "up2"){
        farray.push(btn);

        if($("#h2").text() != "2" && btn == "up1"){
            $("#lf").animate({top: '230px', }, {duration: 7000, complete: function(){$("#h2").text("1")}});
        }else{
            $("#lf").animate({bottom: '340px', }, {duration: 6000, complete: function(){$("#h2").text("2")}});
        }
        // $("#lf").stop();
        // $("#lf").animate({bottom: '340px', }, 6000);

    }else if(btn == "up3"){
        $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
        // if($("#h2").text() == "" && btn == "up1"){
        //     $("#lf").animate({bottom: '230px', }, {duration: 7000, complete: function(){$("#h2").text("1")}});
        //     // $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
        // }if($("#h2").text() == "" && btn == "up2"){
        //     $("#lf").stop();
        //     $("#lf").animate({bottom: '340px', }, {duration: 7000, complete: function(){$("#h2").text("2")}});
        //     // $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
        // }else{
        //     $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
        // }
        
        // $("#lf").stop();

        farray.push(btn);
    }else if(btn == "up4"){
        farray.push(btn);
        $("#lf").animate({bottom: '560px', }, {duration: 6000, complete: function(){$("#h2").text("4")}});

    }else if(btn == 5){
        $("#lf").animate({bottom: '560px', }, );
    }
    // console.log(count);
    console.log(farray);







    for(var i=0;i<rfarray; i++){
        if(btn == "up1")
        console.log(rfarray[i]);
        if(rfarray.indexOf("up1") == 0){
            // if(rfarray.indexOf("up1" == 0)){
                $("#lf").animate({bottom: '230px', }, {duration: 6000, complete: function(){$("#h2").text("1")}});
                return false;
            // }
            
            
        }else if(rfarray.indexOf("up2") > 0){
            if(rfarray.indexOf(btn) > rfarray[i]){
                $("#lf").animate({bottom: '230px', }, {duration: 6000, complete: function(){$("#h2").text("1")}});
                $("#lf").delay(9000);
                $("#lf").animate({bottom: '340px', }, {duration: 6000, complete: function(){$("#h2").text("2")}});
                return false;
            }else{
                $("#lf").animate({bottom: '340px', }, {duration: 6000, complete: function(){$("#h2").text("2")}});
                return false;
            }
            
            
        }else if(rfarray[i] == "up3"){
            if($("#h2").text()!= "up3"){

            }
            $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
            $("#lf").delay("slow");
        }else{
            $("#lf").animate({bottom: '560px', }, {duration: 6000, complete: function(){$("#h2").text("4")}});
            $("#lf").delay("slow");
        }
    }