"use strict";

function rahuz() {
  var x = document.getElementsByClassName("nav-horgonyok")[0];

  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}
/* function lehuz() {
    document.getElementById("nav-horgonyok").style.display = "none"
} */

/* document.addEventListener('DOMContentLoaded', function() {
    const navList = document.querySelector('#nav-horgonyok');
    const hamburgerMenu = document.querySelector('.hamburger');

    // Toggle the class 'active' on click of the hamburger menu
    hamburgerMenu.addEventListener('click', function() {
        navList.classList.toggle('active');
    });

    // Hide the menu if the user clicks outside of it
    document.addEventListener('click', function(event) {
        const isClickInsideMenu = navList.contains(event.target);
        const isClickOnHamburger = hamburgerMenu.contains(event.target);

        if (!isClickInsideMenu && !isClickOnHamburger) {
            navList.classList.remove('active');
        }
    });
}); */