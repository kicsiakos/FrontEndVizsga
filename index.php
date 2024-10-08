<?php
session_start()
    ?>

<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tóth Horti Vanda - Sminktetováló </title>
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sacramento&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
</head>

<body>
    <div class="content">
        <header>
            <nav>
                <?php require_once('./view/nav.php') ?>
            </nav>
            <div class="fejlec">
                <p class="fejlec-nev">Tóth-Horti Vanda</p>
                <p class="fejlec-titulus">Sminktetoválás és Esztétika</p>
            </div>
            <div class="kapcsolat">
                <div class="insta">
                    <a href="https://www.instagram.com/vandatothhorti_pmuartist/" target="_blank"><svg
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg></a>
                </div>
                <div class="facebook">
                    <a href="https://www.facebook.com/profile.php?id=100089909156559" target="_blank"><svg
                            xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24">
                            <path
                                d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-2 10h-2v2h2v6h3v-6h1.82l.18-2h-2v-.833c0-.478.096-.667.558-.667h1.442v-2.5h-2.404c-1.798 0-2.596.792-2.596 2.308v1.692z" />
                        </svg></a>
                </div>
                <div class="mail">
                    <a href="mailto:vandatothhort@outlook.com" target="_blank"><svg xmlns="http://www.w3.org/2000/svg"
                            width="40" height="40" viewBox="0 0 24 24">
                            <path
                                d="M0 3v18h24v-18h-24zm21.518 2l-9.518 7.713-9.518-7.713h19.036zm-19.518 14v-11.817l10 8.104 10-8.104v11.817h-20z" />
                        </svg></a>
                </div>
                <div class="telefon">
                    <a href="tel:+36306758044"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                            viewBox="0 0 24 24">
                            <path
                                d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.5 17.311l-1.76-3.397-1.032.505c-1.12.543-3.4-3.91-2.305-4.497l1.042-.513-1.747-3.409-1.053.52c-3.601 1.877 2.117 12.991 5.8 11.308l1.055-.517z" />
                        </svg></a>
                </div>
            </div>
        </header>
        <main>
            <div class="logo"></div>
            <div class="main-content">
                <p>Köszöntelek az oldalamon!</p>
                <p>Tóth<b>-</b>Horti Vanda vagyok, kozmetikus, sminktetováló és esztéta. Kozmetikai tanulmányaim
                    befejezése után szinte rögtön belevágtam az igazi álmom megvalósításába, és elvégeztem számos
                    sminktetováló és esztéta képzést Magyarországon és külföldön egyaránt. Szerencsém volt a szakma
                    legjobb mestereitől tanulni, mellyel szert tettem egy igazán kivételes és különleges tudásra.
                    <br>
                    Határozottan úgy gondolom, hogy „jó pap is holtáig tanul” így a mai napig rendszeresen járok
                    különféle előadásokra és tanfolyamokra, fejlesztve önmagam és a tudásom.
                </p>
                <p>„Tudod ki fog Neked mindent megadni? <b>-</b> Te magad!”</p>
                <p>Azt gondolom nőként és férfiként egyaránt kell időt szánnunk magunkra, szépségünkre és
                    boldogságunkra. Hiszen így képesek leszünk másoknak is átadni saját örömünket. Ha ehhez egy
                    szépészeti beavatkozásra van szükséged, hogy Te elégedett légy a testedben, én boldogan leszek
                    részese, hogy együtt megtervezve kiegészítsük a szépséged.</p>
            </div>

            <footer>
                <div class="footer-szoveg">
                    <p>Várlak sok szeretettel,
                        <br>
                        Vanda <b>-</b> a Te sminktetoválód és esztétád.
                    </p>
                </div>
                <div class="profil">
                    <img src="./images/galeria/vanda.jpg" alt="">
                </div>
            </footer>
        </main>
    </div>
    <script src="./scripts/main.js" type="module"></script>
</body>

</html>