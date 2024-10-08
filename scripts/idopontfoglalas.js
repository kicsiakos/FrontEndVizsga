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
    napok = ["Vasárnap", "Hétfő", "Kedd", "Szerda", "Csütörtök", "Péntek", "Szombat"];
    honapok = ["Január", "Február", "Március", "Április", "Május", "Június", "Július", "Augusztus", "Szeptember", "Október", "November", "December"];

    // A constructor paramétereinek megadásával létrehozzuk az új 'dolgozót'. A display úgy lett kialakítva, ha később 
    // egy vagy több új kozmetikust is hozzáadunk, a megjelenítés szépen rendeződik.

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

    // ez a metódus építi fel az első lépés felületét.

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

    // ez a függvény a bemutatkozó szöveg megjelenitését limitálja le 150 karakterre

    bemutatkozasFilter(text) {

        return `${text.substr(0, 150)}...` 

    }

    // ez a metódus a kozmetikusok munkaidejeinek (<options>)-ba való generálását segíti, meg kell adni hogy először, hogy hová
    // aztán hogy hány darab dátumból, és hogy mely napindexű napokat (azokat a napokat amikor ők dolgoznak a JSONban megírva),
    // tegye bele a listába.

    date(element, dayNum, ...dayIndex) {

        let today = new Date();
        let year = today.getFullYear();
        let month = today.getMonth();
        let day = today.getDate();

        for (let i = 0; i < dayNum; i++) {

            let newDate = new Date(year, month, day + i);
            let newDateDayIndex = newDate.getDay();

            dayIndex.forEach(v => {

                if (newDateDayIndex == v) {

                    element.innerHTML += `<option value="${newDateDayIndex}">${year}-${month+1}-${day+i}</option>`

                }
            })
        }
    }

    // ez a sigleSelectért felelős az időpont kiválasztásánál

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

    // ez felelős magáért a foglalásért, a foglalás gombra kattintva betölti a JSON adatokat, majd előállítja a foglaláshoz
    // szükséges adatokat és, ha minden ki van töltve az objektumot átküldi az 'update.php' filenak. A php file felelős
    // azért, hogy az ellenőrzések után beleírjon a JSONbe. Emellett küldünk adatokat az 'idopontfoglalasOOP.php'-nak is 
    // aki pedig a mySqlbe írja bele a foglalásokat, hogy később onnan az admin felületen meglehessen jeleníteni azokat.
    // az adatok localStoragebe is rögzitésre kerülnek, de mivel szerveroldalon is meg van irva, talán ez nem is lenne szükséges.

    foglalas() {

        this.bookBtn.addEventListener('click', async function () {

            let request = await fetch('../db/foglalasok.JSON');
            let myObj = await request.json();

            console.log(myObj);

            let guestName = document.querySelector('#guest-name').value;
            let guestPhone = document.querySelector('#guest-phone').value;
            let guestTime = '';
            if (document.querySelector('.selected')) {
                guestTime = document.querySelector('.selected').value;
            } else {
                alert('Időpontot választani közelező!')
            }
            let user = document.querySelector('.foglalas-div').id;
            let date = document.querySelector('#idopont').selectedOptions[0].innerHTML;

            const nameRegExp = /[A-ZÖÜÓŐÚÉÁŰÍ][a-zöüóőúéáűí]+([-\s]+[A-ZÖÜÓŐÚÉÁŰÍ][a-zöüóőúéáűí]+)+/g;
            const phoneRegExp = /((\+36)|(06))((1)|(20)|(30)|(70))[0-9]{7}/gm;

            if (nameRegExp.test(guestName) && phoneRegExp.test(guestPhone) && guestTime && user && date) {

                const userObj = {

                    nev: guestName,
                    datum: date,
                    ora: guestTime,
                    telefon: guestPhone,
                    fodrasz: user

                }

                try {

                    const response = await fetch('../phps/update.php', {

                        method: 'POST',
                        headers: {

                            'Content-Type': 'application/json',

                        },

                        body: JSON.stringify(userObj)

                    });

                    if (response.ok) {

                        const result = await response.text();
                        console.log(result);

                    } else {

                        console.error('Hiba történt az adatok küldése közben.');

                    }
                } catch (error) {

                    console.error('Hiba történt:', error);

                };

                const xhttp = new XMLHttpRequest();
                xhttp.open("POST", "../phps/idopontfoglalasOOP.php");
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.onreadystatechange = () => {

                    console.log(xhttp.readyState);
                    console.log(xhttp.status);


                    if (xhttp.readyState == 4 && xhttp.status == 200) {

                        localStorage.setItem(`foglalas-${localStorage.length}`, JSON.stringify(userObj));

                        console.log('Sql OK');

                        console.log(this);

                        let text = `Köszönöm a foglalást! Várjuk szeretettel a választott időpontban.
                                        A foglalás lemondása legkésőbb 48 órával az időpont előtt lehetséges!`;

                        const finalTpl = `<div class="maindiv" id="${this.parentElement.parentElement.id}">
                                        <div class="textdiv">
                                            <div class="text">${text}</div>
                                            <div><button class="backbutton">Vissza a főoldalra</button></div>
                                        </div>
                                    </div>`;


                        let img = this.parentElement.parentElement.children[0];

                        this.parentElement.parentElement.parentElement.innerHTML = '';
                        document.querySelector('.main').innerHTML = finalTpl;
                        document.querySelector('.maindiv').insertAdjacentElement('afterbegin', img);
                        document.querySelector('.backbutton').addEventListener('click', function () {
                            window.location.assign('../index.php')
                        })
                        console.log(img);


                    }
                }

                xhttp.send(`nev=${guestName}&telefonszam=${guestPhone}&idopont=${guestTime}&user=${user}&nap=${date}`);

            } else {
                alert('Hibás kitöltés!')
            }

        })
    }

    // ez a metódus generálja ki az időpontfoglalás második lépését, az azt követő részt miután kiválasztjuk a kivánt fodrászt.
    // kigenerálja az elérhető időpontokat, amik még szabadok.

    async renderTimes(user) {

        if (this.element.id === user) {

            let request = await fetch('../db/foglalasok.JSON');
            let myObj = await request.json();

            this.foglalasTpl = `<div class="foglalas-div" id='${this.nev}'>
                                <div class="user-img" style="background-image: url(${this.kepSrc});"></div>
                                <div class="guest-details">
                                    <div><input type="text" id="guest-name" placeholder="Név"></div>
                                    <div><input type="tel" id="guest-phone" placeholder="Telefonszám"></div>
                                </div>
                                <div class="foglalas-datum"><select name="idopont" id="idopont"></select></div>
                                <div class="datum-display"></div>
                                <div class="foglalas-idopontok"></div>
                                <div><button id="foglalas-button">Lefoglalom</button></div>
                                </div>`;

            this.parentElement.innerHTML = "";
            this.parentElement.innerHTML = this.foglalasTpl;
            this.bookBtn = document.querySelector('#foglalas-button');
            this.bookBtn.onclick = this.foglalas();

            document.querySelector('#guest-name').required = true;



            const selected = document.querySelector('#idopont');

            if (user == 'Vanda') {

                this.date(document.querySelector('#idopont'), 20, 1, 3, 5);

            }

            if (user == 'Olga') {

                this.date(document.querySelector('#idopont'), 20, 2, 4, 6);

            }

            selected.addEventListener('change', () => {

                document.querySelector('.foglalas-idopontok').innerHTML = '';

                const foglalasok = user === 'Vanda' ? myObj.Vanda.idopontfoglalasok : myObj.Olga.idopontfoglalasok;
                const foglaltIdopontok = foglalasok.filter(booking => booking.datum === selected.selectedOptions[0].innerHTML).map(booking => booking.ora);
                const selectedDay = selected.value;
                const nyitvatartas = user === 'Vanda' ? myObj.Vanda.nyitvatartas : myObj.Olga.nyitvatartas;

                for (const idopontok of nyitvatartas) {

                    if (idopontok.napIndex == selectedDay) {

                        for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                            const time = `${i}:00`;

                            if (!foglaltIdopontok.includes(time)) {

                                document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${time}">${time}</button></div>`;

                            }
                        }
                    }
                }

                let selectedDate = new Date(document.querySelector('#idopont').selectedOptions[0].innerHTML);
                document.querySelector('.datum-display').innerHTML = this.napok[selectedDate.getDay()];
                this.select();

            });

            const aktivNap = selected.value;
            const foglalasok = user === 'Vanda' ? myObj.Vanda.idopontfoglalasok : myObj.Olga.idopontfoglalasok;
            const foglaltIdopontok = foglalasok.filter(booking => booking.datum === selected.selectedOptions[0].innerHTML).map(booking => booking.ora);
            const nyitvatartas = user === 'Vanda' ? myObj.Vanda.nyitvatartas : myObj.Olga.nyitvatartas;

            for (const idopontok of nyitvatartas) {

                if (idopontok.napIndex == aktivNap) {

                    for (let i = parseInt(idopontok.tol); i < parseInt(idopontok.ig); i++) {

                        const time = `${i}:00`;
                        if (!foglaltIdopontok.includes(time)) {

                            document.querySelector('.foglalas-idopontok').innerHTML += `<div><button id="${i}" value="${time}">${time}</button></div>`;

                        }
                    }
                }
            }

            let selectedDate = new Date(document.querySelector('#idopont').selectedOptions[0].innerHTML);
            document.querySelector('.datum-display').innerHTML = this.napok[selectedDate.getDay()];

            this.select();
        }
    }
}

export {
    Kozmetikus
}



