/**link for this script source 
* <script src="QRG-Universal-scripts.js"> </script>
**/

// Important Onload function for non-homepage pages
//makes the page load after 1 second by gradually increasing opacity from 0 to // 1
/* window.onload = function() {
*setTimeout(function(){ 
*document.getElementById("Document_container").style.opacity = "1";}, 1000);
*}; 
*/

//Side nav bar toggle function
function opensidenav(x) {
x.classList.toggle("change");
document.getElementById("sidenavbar_universal").style.marginRight = "0px";
document.getElementById("Document_container").style.opacity = "0.1";
}
//Side nav bar toggle function
function closesidenav(x) {
document.getElementById("sidenavbar_universal").style.marginRight = "-360px";
document.getElementById("opennavbutton").classList.toggle("change");
document.getElementById("Document_container").style.opacity = "1";
}
//Side nav bar toggle function

//The following is the progress bar you see placed inside of the footer at the bottom of the page
// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

function myFunction() {
var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
var height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
var scrolled = (winScroll / height) * 100;
document.getElementById("myBar").style.width = scrolled + "%";
}
//End of progress bar  


