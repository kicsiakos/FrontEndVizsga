"use strict";

function uzenet() {
  alert("Köszönjük foglalását, kollégánk hamarosan felveszi Önnel a kapcsolatot!");
}

function rahuz() {
  var x = document.getElementsByClassName("nav-horgonyok")[0];

  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}