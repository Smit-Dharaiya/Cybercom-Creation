/*
document.getElementById("wlcm").onmouseover = function() {mouseOver()};
function mouseOver(){
	alert("Welcome to my WebPage");
}
*/

/*
This code is by using jquery  for that we have to import this js file
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
$(document).ready(function(){
    $("h1").hover(function(){
        alert("Welcome to my WebPage !!!");
    })
})*/

document.getElementById("wlcm").addEventListener("mouseover", mouseOver);
function mouseOver(){
	alert("Welcome to my WebPage !!!");
}