"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

/* function uzenet() {
    alert("Köszönjük foglalását, kollégánk hamarosan felveszi Önnel a kapcsolatot!")
} */
function rahuz() {
  var x = document.getElementsByClassName("nav-horgonyok")[0];

  if (x.style.display === "none") {
    x.style.display = "flex";
  } else {
    x.style.display = "none";
  }
}

var Kozmetikus = function Kozmetikus(nev, titulus, bemutatkozas, kepSrc) {
  _classCallCheck(this, Kozmetikus);

  this.nev = nev;
  this.titulus = titulus;
  this.bemutatkozas = bemutatkozas;
  this.kepSrc = kepSrc;
};