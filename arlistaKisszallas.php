<!DOCTYPE html>
<html lang="hu">

<?php require_once './config/config.php' ?>;


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tóth Horti Vanda - Sminktetováló</title>
    <link rel="stylesheet" href="arlistaKisszallas.css">
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
                <div class="hamburger" onclick="rahuz()"><svg xmlns="http://www.w3.org/2000/svg" width="40" height="40"
                        viewBox="0 0 24 24">
                        <path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z" />
                    </svg></div>
                <ul class="nav-horgonyok">
                    <li><a href="index.html">Bemutatkozás</a></li>
                    <li class="dropdown"><a href="valaszto2.html" class="dropdown-button">Sminktetoválás <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="interlash.html">Szempillatetoválás</a>
                            <a href="aquarellelips.html">Ajaktetoválás</a>
                            <a href="softliner.html">Szemhéjtetoválás</a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="russianlips.html" class="dropdown-button">Esztétika <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="russianlips.html">Ajakfeltöltés</a>
                            <!--  <a href="#">Skinbooster</a>
                            <a href="#">Lokális zsírbontás</a> -->
                        </div>
                    </li>
                    <li><a href="galeria.html">Galéria</a></li>
                    <li class="dropdown"><a href="valaszto.html" class="dropdown-button">Árlista <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="arlistaMiklos.php">Szigetszentmiklós</a>
                            <a href="arlistaKisszallas.php">Kisszállás</a>
                        </div>
                    </li>
                    <li><a href="idopontfoglalas.html">Időpontfoglalás</a></li>
                </ul>
            </nav>
            <h2 class="hely">Sminktetoválás - Kisszállás</h2>
        </header>
        <main>


            <?php

            $conn = new mysqli($servername, $user, $pass, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            ;

            $sql = "SELECT eljaras_nev, eljaras_tipus, eljaras_ar FROM arlista_sminktetovalas_kisszallas";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sorok[] = $row;
                }
            }


            ?>

            <?php for ($i = 0; $i < count($sorok); $i++) { ?>

                <div class="szektor">
                    <div class="szektor-nev">
                        <h2>
                            <?php print ($sorok[$i]['eljaras_nev']) ?>
                        </h2>
                        <h2>
                            <?php print ($sorok[$i]['eljaras_tipus']) ?>
                        </h2>
                    </div>
                    <div class="szektor-ar">
                        <p>
                            <?php print ($sorok[$i]['eljaras_ar']) ?>
                        </p>
                    </div>
                </div>

                <?php
            }
            ?>


            <!--  <div class="szektor">
                <div class="szektor-nev">
                    <h2>Magic Shading</h2>
                    <h2>Szemöldöktetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>35.000 Ft</p>
                </div>
            </div>
            <div class="szektor">
                <div class="szektor-nev">
                    <h2>Aquarelle lips</h2>
                    <h2>Ajaktetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>40.000 Ft</p>
                </div>
            </div>
            <div class="szektor">
                <div class="szektor-nev">
                    <h2>Frozen lips</h2>
                    <h2>Ajaktetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>45.000 Ft</p>
                </div>
            </div>
            <div class="szektor">
                <div class="szektor-nev">
                    <h2>3d lips</h2>
                    <h2>Ajaktetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>50.000 Ft</p>
                </div>
            </div>
            <div class="szektor">
                <div class="szektor-nev">
                    <h2>Soft liner</h2>
                    <h2>Füstös szemhéjtetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>30.000 Ft</p>
                </div>
            </div>
            <div class="szektor">
                <div class="szektor-nev">
                    <h2>Interlash</h2>
                    <h2>Szempillasűrítő tetoválás</h2>
                </div>
                <div class="szektor-ar">
                    <p>15.000 Ft</p>
                </div>
            </div> -->

    </div>
    <div class="korrekcio">
        <div class="honap">
            <p>korrekció 1-3 hónap között 15.000 Ft / tetoválás</p>
        </div>
        <div class="frissites">
            <p>frissítés 1 éven belül - 20% kedvezmény</p>
        </div>
    </div>
    <div class="esztetika-arlista">
        <h2 class="hely2">Esztétika - Kisszállás</h2>

        <?php $sql2 = "SELECT eljaras_nev, eljaras_tipus, eljaras_ar FROM arlista_esztetika_kisszallas";
        $result2 = $conn->query($sql2);

        if ($result2->num_rows > 0) {
            while ($row2 = $result2->fetch_assoc()) {
                $sorok2[] = $row2;
            }
        }


        ?>

        <?php for ($i = 0; $i < count($sorok2); $i++) { ?>

            <div class="szektor">
                <div class="szektor-nev">
                    <h2>
                        <?php print ($sorok2[$i]['eljaras_nev']) ?>
                    </h2>
                    <h2>
                        <?php print ($sorok2[$i]['eljaras_tipus']) ?>
                    </h2>
                </div>
                <div class="szektor-ar">
                    <p>
                        <?php print ($sorok2[$i]['eljaras_ar']) ?>
                    </p>
                </div>
            </div>

            <?php
        }
        ?>


        <!-- <div class="szektor">
            <div class="szektor-nev">
                <h2>Russian lips</h2>
                <h2>0.55 ml / 1.1 ml</h2>
            </div>
            <div class="szektor-ar">
                <p>40.000 Ft / 60.000 Ft</p>
            </div>
        </div>
        <div class="szektor">
            <div class="szektor-nev">
                <h2>NTCF 135</h2>
                <h2>Skinbooster</h2>
            </div>
            <div class="szektor-ar">
                <p>30.000 Ft / ampulla</p>
            </div>
        </div>
        <div class="szektor">
            <div class="szektor-nev">
                <h2>Lemon bottle</h2>
                <h2>Zsírbontó injekció</h2>
            </div>
            <div class="szektor-ar">
                <p>35.000 Ft / ampulla</p>
            </div>
        </div> -->
    </div>
    </main>
    </div>
    <script src="app.js"></script>
</body>

<?php $conn->close(); ?>;

</html>