import { Kozmetikus } from "./idopontfoglalas.js";

function rahuz() {
    var x = document.getElementsByClassName("nav-horgonyok")[0];
    if (x.style.display === "none") {
        x.style.display = "flex";
    } else {
        x.style.display = "none";
    }
}


const Vanda = new Kozmetikus('Vanda', 'Sminktetováló', 'Tóth-Horti Vanda vagyok, sminktetováló és esztéta. Kozmetikai és egészségügyi tanulmányaim befejezése után elvégeztem számos sminktetováló és esztéta képzést Magyarországon és külföldön egyaránt.', './img/galeria/vanda.jpg', '.main');
const Geza = new Kozmetikus('Olga', 'Fodrász', '10 éve dolgozom a szakmában és elmondhatom magamról, hogy a hobbim a munkám. Jó kommunikációs készséggel rendelkezem, ami azt gondolom elengedhetetlen a szépségipar ezen területén. Szeretem a kihívásokat legyen az egy új szín vagy frizura változtatás.', './img/galeria/gizi.jpg', '.main');
