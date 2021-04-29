const toggleMenu = document.querySelector('.toggle');

// get header
const header = document.querySelector('header');
//get main
const main = document.querySelector('main');


toggleMenu.addEventListener('click', function(){
  // alert('hello');
  let navLinks = document.querySelectorAll('.nav-links');
  navLinks.forEach(function (navLink){
    if(navLink.classList.contains("active")){
      navLink.classList.remove("active");
    }
    else
    {
      navLink.classList.add("active");
    }
  });
  // console.log(header.offsetHeight);

});






