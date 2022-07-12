$(document).ready(function(){

    var count = 0;
    var uparray = [0,1,2,3,4];
    var downarray = [4,3,2,1,0];
    var farray = []

    


    $(".iup").click(function(e){
        e.preventDefault();
        var btn = $(this).attr("id");
            $(this).each(function(){
            farray.push($(this).attr('id'));
        });
        console.log(farray);
        
        // console.log(btn);
        var rfarray = farray.reverse();

        console.log(rfarray);
        
        for(i=0;i<rfarray.length;i++){
            // console.log(rfarray[i])
            if(rfarray[i]=="up1"){
                $("#lf").animate({bottom: '230px', }, {duration: 8000, complete: function(){$("#h2").text("1")}});
                rfarray = [];
            }else if(rfarray[i]=="up2"){
                if(($(".iup").click(function(){
                    $(this).attr("id")
                })) == "up1"){
                    $("#lf").animate({bottom: '230px', }, {duration: 8000, complete: function(){$("#h2").text("1")}});
                    $("#lf").delay(10000);
                    $("#lf").animate({bottom: '340px', }, {duration: 8000, complete: function(){$("#h2").text("2")}});
                    rfarray = [];
                }else{
                    $("#lf").animate({bottom: '340px', }, {duration: 8000, complete: function(){$("#h2").text("2")}});
                    rfarray= [];
                }
            }else if(rfarray[i] == "up3"){
                $("#lf").animate({bottom: '450px', } , {duration: 6000, complete: function(){$("#h2").text("3")}});
            }
        }
        
        });
        


    });

    $(".cdown").click(function(e){
        // e.preventDefault();
        var btnd = $(this).attr("id");
        if(btnd == "down0"){
            $("#lf").animate({bottom: '120px', }, 6000);
        }else if(btnd == "down3"){
            $("#lf").animate({bottom: '125px', }, 6000);
        }else if(btnd == "down0"){
            $("#lf").animate({bottom: '120px', }, 6000);
        }else if(btnd == "down2"){
            $("#lf").animate({top: '235px', }, 6000);
        }

    });



