////////////////////////////////////////////////////////////////
//Onload functions 
window.onload = function() {

//Timeout function that sets the opacity of the body to 1 to prevent a FOUC 
setTimeout(function(){ 
document.getElementById("Document_container").style.opacity = "1";}, 0);  
};
////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////
//On scroll function that controls the top nav bar
window.onscroll = function() {topnavfunction()};

function topnavfunction() {
if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
document.getElementById("tp_nav_br").style.backgroundColor = "rgba(0, 0, 33, 0.57)";
}
else {
document.getElementById("tp_nav_br").style.backgroundColor = "transparent";
}
}

function opensidenav(x){
//If function that triggers the closetopnav function if the nav's main body is visble and opensidenav if it's not
/* Reverting back to a visible color for the unused */
/*document.getElementById("tp_nv_br_mn_bd").style.left = "5000px";*/

if(document.getElementById("sd_nav_lightbox").style.opacity == "0"){
//Brings element into existence .1 seconds before everything else triggers
setTimeout(function(){
document.getElementById("sd_nav_lightbox_cover").style.zIndex = "1003";
document.getElementById("sd_nav_lightbox").style.zIndex = "1000";}, 0);
setTimeout(function(){
//Delays the opacity change on the side nav main container
setTimeout(function(){
document.getElementById("sd_nav_lightbox").style.opacity = "1";}, 910);
document.getElementById("sd_nav_lightbox_cover").style.transform = "rotateZ(45deg)translateY(-300%)scale(2)";
document.getElementById("sd_nav_bar1").style.opacity = "0";
document.getElementById("sd_nav_bar2").style.transform = "rotateZ(-45deg) translate(-20px)";
document.getElementById("sd_nav_bar3").style.transform = "rotateZ(45deg) translate(-15px)";
document.getElementById("sd_nav_bar3").style.width = "60px";
document.getElementById("sd_nav_bar1").style.backgroundColor = "#000021";
document.getElementById("sd_nav_bar2").style.backgroundColor = "#000021";
document.getElementById("sd_nav_bar3").style.backgroundColor = "#000021";
//Side nav link animations 
document.getElementById("sd_nav_link_1").style.transform = "translateX(0%)";
document.getElementById("sd_nav_link_2").style.transform = "translateX(0%)";
document.getElementById("sd_nav_link_3").style.transform = "translateX(0%)";
document.getElementById("sd_nav_link_4").style.transform = "translateX(0%)";
//Delays the opacity change on the side nav main container
setTimeout(function(){
document.getElementById("sd_nav_btn").style.left = "50%";
document.getElementById("sd_nav_btn").style.marginLeft = "-17px";}, 1100);
}, 100);
}
else{
closesidenav(x);
}
}
//Side nav bar toggle function
function closesidenav(x) {
document.getElementById("sd_nav_lightbox_cover").style.transform = "rotateZ(45deg)translateY(280%)scale(2)";
//Delays the opacity change on the side nav main container
setTimeout(function(){
document.getElementById("sd_nav_lightbox").style.opacity = "0";}, 1100);
//Gets rid of the element
setTimeout(function(){   
setTimeout(function(){
document.getElementById("sd_nav_lightbox").style.zIndex = "-1";}, 0);
}, 1100); 
document.getElementById("sd_nav_bar1").style.opacity = "1";
document.getElementById("sd_nav_bar3").style.transform = "rotateZ(-45deg) translate(0px)";
document.getElementById("sd_nav_bar2").style.transform = "rotateZ(-45deg) translate(0px)";
document.getElementById("sd_nav_bar3").style.transform = "rotateZ(-45deg) translate(0px)";
document.getElementById("sd_nav_bar1").style.backgroundColor = "white";
document.getElementById("sd_nav_bar2").style.backgroundColor = "white";
document.getElementById("sd_nav_bar3").style.backgroundColor = "white";
document.getElementById("sd_nav_bar3").style.width = "50px";
document.getElementById("sd_nav_btn").style.left = "auto";
document.getElementById("sd_nav_btn").style.marginLeft = "-17px";
//Side nav link animations 
document.getElementById("sd_nav_link_1").style.transform = "translateX(200%)";
document.getElementById("sd_nav_link_2").style.transform = "translateX(200%)";
document.getElementById("sd_nav_link_3").style.transform = "translateX(200%)";
document.getElementById("sd_nav_link_4").style.transform = "translateX(200%)";
}

window.addEventListener("resize", resizesidenavfunction);
function resizesidenavfunction() {
}

//Use Navigation Timing API to detect page refresh and force the client to the top of the page
//to prevent the user from seeing the unloaded content via lazy loading
if (performance.navigation.type == performance.navigation.TYPE_RELOAD) {
  location.href='#';
}
////////////////////////////////////////////////////////////////