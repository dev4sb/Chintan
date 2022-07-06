$(document).ready(function(){
    $(".btn-text").click(function(){
        $("p").text("Hrllo");
    });
});

var par = document.getElementById("pTag");
var btn = document.getElementById("changecolor");
function changeColor(){
    par.style.color = "red";
}