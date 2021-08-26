window.onscroll=slideDown;
function slideDown() {


var nbar = document.getElementById('navbar');


  if (window.scrollY > 80) {
        
        nbar.setAttribute("style" , "top:0px");

    } 
    else {
       nbar.setAttribute("style" , "top:-56px");
    }
      
}
// apparaitre la navbar 
// si le top du css est en négatif
