import {
    evalTpl,
    getElement
} from "./atools.js";

class Kozmetikus {

    parentElement;
    element;
    nev;
    titulus;
    bemutatkozas;
    kepSrc;
    tpl;
    foglalasTpl;
    foglalasBtn;
    fodraszId;
    selectedUser;
    json;


    constructor(nev, titulus, bemutatkozas, kepSrc, parent) {
        this.nev = nev;
        this.titulus = titulus;
        this.bemutatkozas = bemutatkozas;
        this.kepSrc = kepSrc;
        this.parentElement = getElement(parent);

        this.tpl = `<div class="fodrasz-div" id='${this.nev}'>
                    <div class="fodrasz-img" style="background-image: url(${this.kepSrc});"></div>
                    <div class="fodrasz-nev">${this.nev}</div>
                    <div class="fodrasz-titulus">${this.titulus}</div>
                    <div class="fodrasz-bemutatkozas">${this.bemutatkozasFilter(this.bemutatkozas)}</div>
                    <div><button class="fodraszBtn">Foglalás</button></div>
                </div>`;

        this.build();
        /*         this.foglalas();
         */


    }

    build() {
        this.element = evalTpl(this.tpl);

        this.foglalasBtn = this.element.querySelector('.fodraszBtn');

        this.foglalasBtn.addEventListener('click', async () => {
            /*             this.foglalas();
                        this.fodraszId = this.element.id;
                        console.log(this.fodraszId); */

            if (this.element.id === 'Olga') {
                let request = await fetch('./db/foglalasok.JSON');
                let myObj = await request.json();
                console.log(myObj);

                this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                                    <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                                    <div class="foglalas-datum"><select name="idopont" id="idopont"></select></div>
                                    <div class="foglalas-idopontok"></div>
                                    <div><button id="foglalas-button">Lefoglalom</button></div></div>`;


                this.parentElement.innerHTML = "";
                this.parentElement.innerHTML = this.foglalasTpl;

                for (const napok of myObj.Olga.nyitvatartas) {
                    console.log(napok.nap);
                    document.querySelector('#idopont').innerHTML += `<option value="${napok.napIndex}">${napok.nap}</option>`

                }

                const selectedVal = document.querySelector('#idopont').value;

                for (const idopontok of myObj.Olga.nyitvatartas) {

                    console.log(idopontok.nap);

                    if (idopontok.napIndex == selectedVal) {

                        for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                            console.log(i);

                            document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}">${i}:00</button></div>`

                        }

                    }



                }
            }

            if (this.element.id === 'Vanda') {
                let request = await fetch('./db/foglalasok.JSON');
                let myObj = await request.json();
                console.log(myObj);


                this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                            <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                            <div class="foglalas-datum"></div>
                            <div class="foglalas-idopontok"></div>
                            <div><button id="foglalas-button">Lefoglalom</button></div></div>`;

                this.parentElement.innerHTML = "";
                this.parentElement.innerHTML = this.foglalasTpl;
            }

        })

        this.parentElement.appendChild(this.element);
    }

    async foglalas() {

        /* const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {

                const response = JSON.parse(this.responseText);
                console.log(response);

            }

        }
        xhr.open("GET", './db/foglalasok.JSON');
        xhr.send(); */

        let request = await fetch('./db/foglalasok.JSON');
        let myObj = await request.json();
        console.log(myObj);


        this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                            <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                            <div class="foglalas-datum"><select name="idopont" id="idopont"><option value=""></option></select></div>
                            <div class="foglalas-idopontok">${myObj.Olga.nyitvatartas[0].nap}</div>
                            <div><button id="foglalas-button">Lefoglalom</button></div></div>`;

        this.parentElement.innerHTML = "";
        this.parentElement.innerHTML = this.foglalasTpl;

    }

    bemutatkozasFilter(text) {
        return `
            ${
                text.substr(0, 150)
            }...`
    }




}


class Foglalas extends Kozmetikus {

    today;
    todayStamp;
    json;
    myObj;

    constructor() {

        super();
        this.today = new Date();
        this.todayStamp = this.today.getTime();

        this.myObj = [{
            neve: "Vanda",
            szabadIdopontok: [{
                nap: "Hétfő",
                napIndex: 1,
                tol: "10",
                ig: "15:30"
            }, {
                nap: "Szerda",
                napIndex: 3,
                tol: "9",
                ig: "14:30"
            }, {
                nap: "Szombat",
                napIndex: 6,
                tol: "10",
                ig: "13"
            }]
        }]

        this.generate(this.myObj)

    }

    generate(obj) {
        this.json = JSON.stringify(obj)
    }

}

export {
    Kozmetikus
}