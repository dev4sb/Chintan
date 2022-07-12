$(document).ready(function(){

    // var pos = $("#dm").position();
    // var left = pos.left;
    // var top = pos.top;

    $(".divWW, #dm").draggable({    
        drag: function(){

            var pos = $("#dm").position();
    var left = pos.left;
    var top = pos.top;

        var d1 = $("#div1").offset();
        var d2 = $("#div2").offset();
        var d3 = $("#div3").offset();
        var d4 = $("#div4").offset();
        var d5 = $("#div5").offset();
        var d6 = $("#div6").offset();
        var d7 = $("#div7").offset();
        
        var dl1 = Math.abs(d1.left-left);
        var dl2 = Math.abs(d2.left-left);
        var dl3 = Math.abs(d3.left-left);
        var dl4 = Math.abs(d4.left-left);
        var dl5 = Math.abs(d5.left-left);
        var dl6 = Math.abs(d6.left-left);
        var dl7 = Math.abs(d7.left-left);
        
        var dt1 = Math.abs(d1.top - top);
        var dt2 = Math.abs(d2.top - top);
        var dt3 = Math.abs(d3.top - top);
        var dt4 = Math.abs(d4.top - top);
        var dt5 = Math.abs(d5.top - top);
        var dt6 = Math.abs(d6.top - top);
        var dt7 = Math.abs(d7.top - top);
        
        var al =[];
        var at = [];
        al = [dl1,dl2,dl3,dl4,dl5,dl6,dl7];
        al2 = [dl1,dl2,dl3,dl4,dl5,dl6,dl7];
        at = [dt1,dt2,dt3,dt4,dt5,dt6,dt7];
        at2 = [dt1,dt2,dt3,dt4,dt5,dt6,dt7];
        
        var n = 3;
        var outarray=[];
        var min;
        for(i=0;i< n;i++){
            min = Math.min.apply(Math,al); 
            minl = al.indexOf(min);
            outarray.push(minl);
            al.splice(minl, 1);
            al.splice(minl, 0, 2000);
        }
        
        var d11 = ".div"+(outarray[0]+1);
        var d12 = ".div"+(outarray[1]+1);
        var d13 = ".div"+(outarray[2]+1);

        var d1 = (at2[outarray[0]] + al2[outarray[0]]);
        var d2 = (at2[outarray[1]] + al2[outarray[1]]);
        var d3 = (at2[outarray[2]] + al2[outarray[2]]);
        
        console.log("Div"+(outarray[0]+1)+ " " + d1);
        console.log("Div"+(outarray[1]+1)+ " " + d2);
        console.log("Div"+(outarray[2]+1)+ " " + d3);
        
        var near1 =  "Div"+(outarray[0]+1) + " is nearest Div";
        var near2 =  "Div"+(outarray[1]+1) + " is nearest Div";
        var near3 =  "Div"+(outarray[2]+1) + " is nearest Div";
        var between = "you are between Div"+(outarray[0]+1)+ " and Div"+(outarray[1]+1)+ " and Div"+(outarray[2]+1);
        
        // $("#clicktext").text(d11+"= "+d1+ " "+d12+ "= "+d2+ " "+d13+ "= "+d3);
        
        if(d2 < d1 && d2 < d3){
            console.log(near2);
            $(d12).css("border","5px solid red");
            $(d11).css("border","none");
            $(d13).css("border","none");
            // $("#nd").text(near2);
        }else if(d1 < d2 && d1 < d3){
            console.log(near1);
            $(d11).css("border","5px solid red");
            $(d13).css("border","none");
            $(d12).css("border","none");
            // $("#nd").text(near1);
        }else if(d3 < d2 && d3 < d1){
            console.log(near3);
            $(d13).css("border","5px solid red");
            $(d11).css("border","none");
            $(d12).css("border","none");
            // $("#nd").text(near3);
        }else{
            console.log(between);
            // $("#nd").text(between);
        }
        },
    // }),
    // $("#dm").draggable({    
    //     drag: function(){
    //         var pos = $("#dm").position();
    // var left = pos.left;
    // var top = pos.top;

    //     var d1 = $("#div1").offset();
    //     var d2 = $("#div2").offset();
    //     var d3 = $("#div3").offset();
    //     var d4 = $("#div4").offset();
    //     var d5 = $("#div5").offset();
    //     var d6 = $("#div6").offset();
    //     var d7 = $("#div7").offset();
        
    //     var dl1 = Math.abs(d1.left-left);
    //     var dl2 = Math.abs(d2.left-left);
    //     var dl3 = Math.abs(d3.left-left);
    //     var dl4 = Math.abs(d4.left-left);
    //     var dl5 = Math.abs(d5.left-left);
    //     var dl6 = Math.abs(d6.left-left);
    //     var dl7 = Math.abs(d7.left-left);
        
    //     var dt1 = Math.abs(d1.top - top);
    //     var dt2 = Math.abs(d2.top - top);
    //     var dt3 = Math.abs(d3.top - top);
    //     var dt4 = Math.abs(d4.top - top);
    //     var dt5 = Math.abs(d5.top - top);
    //     var dt6 = Math.abs(d6.top - top);
    //     var dt7 = Math.abs(d7.top - top);
        
    //     var al =[];
    //     var at = [];
    //     al = [dl1,dl2,dl3,dl4,dl5,dl6,dl7];
    //     al2 = [dl1,dl2,dl3,dl4,dl5,dl6,dl7];
    //     at = [dt1,dt2,dt3,dt4,dt5,dt6,dt7];
    //     at2 = [dt1,dt2,dt3,dt4,dt5,dt6,dt7];
        
    //     var n = 3;
    //     var outarray=[];
    //     var min;
    //     for(i=0;i< n;i++){
    //         min = Math.min.apply(Math,al); 
    //         minl = al.indexOf(min);
    //         outarray.push(minl);
    //         al.splice(minl, 1);
    //         al.splice(minl, 0, 2000);
    //     }
        
    //     var d11 = ".div"+(outarray[0]+1);
    //     var d12 = ".div"+(outarray[1]+1);
    //     var d13 = ".div"+(outarray[2]+1);

    //     var d1 = (at2[outarray[0]] + al2[outarray[0]]);
    //     var d2 = (at2[outarray[1]] + al2[outarray[1]]);
    //     var d3 = (at2[outarray[2]] + al2[outarray[2]]);
        
    //     console.log("Div"+(outarray[0]+1)+ " " + d1);
    //     console.log("Div"+(outarray[1]+1)+ " " + d2);
    //     console.log("Div"+(outarray[2]+1)+ " " + d3);
        
    //     var near1 =  "Div"+(outarray[0]+1) + " is nearest Div";
    //     var near2 =  "Div"+(outarray[1]+1) + " is nearest Div";
    //     var near3 =  "Div"+(outarray[2]+1) + " is nearest Div";
    //     var between = "you are between Div"+(outarray[0]+1)+ " and Div"+(outarray[1]+1)+ " and Div"+(outarray[2]+1);
        
    //     // $("#clicktext").text(d11+"= "+d1+ " "+d12+ "= "+d2+ " "+d13+ "= "+d3);
        
    //     if(d2 < d1 && d2 < d3){
    //         console.log(near2);
    //         $(d12).css("border","5px solid red");
    //         $(d11).css("border","none");
    //         $(d13).css("border","none");
    //         // $("#nd").text(near2);
    //     }else if(d1 < d2 && d1 < d3){
    //         console.log(near1);
    //         $(d11).css("border","5px solid red");
    //         $(d13).css("border","none");
    //         $(d12).css("border","none");
    //         // $("#nd").text(near1);
    //     }else if(d3 < d2 && d3 < d1){
    //         console.log(near3);
    //         $(d13).css("border","5px solid red");
    //         $(d11).css("border","none");
    //         $(d12).css("border","none");
    //         // $("#nd").text(near3);
    //     }else{
    //         console.log(between);
    //         // $("#nd").text(between);
    //     }
    
    // },
    // });
    })
});