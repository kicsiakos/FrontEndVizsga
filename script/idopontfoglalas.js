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
    selectedDay;
    selectedDate;
    bookBtn;


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

    }

    build() {

        this.element = evalTpl(this.tpl);

        this.foglalasBtn = this.element.querySelector('.fodraszBtn');

        this.foglalasBtn.addEventListener('click', async () => {

            if (this.element.id === 'Olga') {
                this.renderTimes('Olga')
            }

            if (this.element.id === 'Vanda') {
                this.renderTimes('Vanda');
            }
        })

        this.parentElement.appendChild(this.element);

    }

    bemutatkozasFilter(text) {

        return `${text.substr(0, 150)}...`

    }

    date(element) {

        const today = new Date();
        for (let i = 0; i < array.length; i++) {
            const element = array[i];

        }


    }

    select() {

        const idokpontok = document.querySelector('.foglalas-idopontok');

        idokpontok.querySelectorAll('button').forEach(v => v.addEventListener('click', function () {

            let myitem = idokpontok.querySelector('.selected');

            if (myitem && myitem !== this) {

                this.classList.add('selected');
                myitem.classList.remove('selected');

            } else {

                this.classList.toggle('selected');

            }
        }))
    }


    foglalas() {

        this.bookBtn.addEventListener('click', function () {

            let guestName = document.querySelector('#guest-name').value;
            let guestPhone = document.querySelector('#guest-phone').value;
            let guestTime = document.querySelector('.selected').value;
            let user = document.querySelector('.foglalas-div').id;
            let date = document.querySelector('#idopont').selectedOptions[0].innerHTML;

            const xhttp = new XMLHttpRequest();
            xhttp.open("POST", "../idopontfoglalasOOP.php");
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    alert('SIKERES FOGLALÁS')
                }
            }
            xhttp.send(`nev=${guestName}&telefonszam=${guestPhone}&idopont=${guestTime}&user=${user}&nap=${date}`);
            console.log('katt');

        })

    }

    async renderTimes(user) {

        if (this.element.id === user) {

            let request = await fetch('./db/foglalasok.JSON');
            let myObj = await request.json();

            this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                                            <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                                            <div class="guest-details"><div><input type="text" id="guest-name" placeholder="Név"></div>
                                            <div><input type="number" id="guest-phone" placeholder="Telefonszám"></div></div>
                                            <div class="foglalas-datum"><select name="idopont" id="idopont"></select></div>
                                            <div class="foglalas-idopontok"></div>
                                            <div><button id="foglalas-button">Lefoglalom</button></div></div>`;

            /* this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                                <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                                <div class="foglalas-datum"><select name="idopont" id="idopont"></select></div>
                                <div class="datum-display">HÉTFŐ</div>
                                <div class="foglalas-idopontok"></div>
                                <div><button id="foglalas-button">Lefoglalom</button></div></div>`; */

            this.parentElement.innerHTML = "";
            this.parentElement.innerHTML = this.foglalasTpl;
            this.bookBtn = document.querySelector('#foglalas-button');
            this.bookBtn.onclick = this.foglalas();




            if (user == 'Vanda') {

                for (const napok of myObj.Vanda.nyitvatartas) {

                    document.querySelector('#idopont').innerHTML += `<option value="${napok.napIndex}">${napok.nap}</option>`

                }
            }

            if (user == 'Olga') {

                for (const napok of myObj.Olga.nyitvatartas) {

                    document.querySelector('#idopont').innerHTML += `<option value="${napok.napIndex}">${napok.nap}</option>`

                }
            }

            const selected = document.querySelector('#idopont');

            selected.addEventListener('change', () => {

                document.querySelector('.foglalas-idopontok').innerHTML = '';

                if (user == 'Vanda') {

                    for (const idopontok of myObj.Vanda.nyitvatartas) {

                        if (idopontok.napIndex == selected.value) {

                            for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                                document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${i}:00">${i}:00</button></div>`

                            }
                        }
                    }
                }

                if (user == 'Olga') {

                    for (const idopontok of myObj.Olga.nyitvatartas) {

                        if (idopontok.napIndex == selected.value) {

                            for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                                document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${i}:00">${i}:00</button></div>`

                            }
                        }
                    }
                }

                this.select();

            })

            if (user == 'Vanda') {

                for (const idopontok of myObj.Vanda.nyitvatartas) {

                    if (idopontok.napIndex == selected.value) {

                        for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                            document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${i}:00">${i}:00</button></div>`

                        }
                    }
                }
            }

            if (user == 'Olga') {

                for (const idopontok of myObj.Olga.nyitvatartas) {

                    if (idopontok.napIndex == selected.value) {

                        for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                            document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${i}:00">${i}:00</button></div>`

                        }
                    }
                }
            }
        }

        this.select();

    }

}

export {
    Kozmetikus
}