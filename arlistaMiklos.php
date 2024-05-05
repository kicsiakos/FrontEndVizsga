<!DOCTYPE html>
<html lang="hu">

<?php require_once './config/conf.php' ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tóth Horti Vanda - Sminktetováló</title>
    <link rel="stylesheet" href="arlistaMiklos.css">
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
                    <li><a href="index.php">Bemutatkozás</a></li>
                    <li class="dropdown"><a href="valaszto2.php" class="dropdown-button">Sminktetoválás <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="interlash.php">Szempillatetoválás</a>
                            <a href="aquarellelips.php">Ajaktetoválás</a>
                            <a href="softliner.php">Szemhéjtetoválás</a>
                        </div>
                    </li>
                    <li class="dropdown"><a href="russianlips.php" class="dropdown-button">Esztétika <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="russianlips.php">Ajakfeltöltés</a>
                        </div>
                    </li>
                    <li><a href="galeria.php">Galéria</a></li>
                    <li class="dropdown"><a href="valaszto.php" class="dropdown-button">Árlista <svg
                                xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24">
                                <path d="M0 7.33l2.829-2.83 9.175 9.339 9.167-9.339 2.829 2.83-11.996 12.17z" />
                            </svg></a>
                        <div class="dropdown-content">
                            <a href="arlistaMiklos.php">Szigetszentmiklós</a>
                            <a href="arlistaKisszallas.php">Kisszállás</a>
                        </div>
                    </li>
                    <li><a href="idopontfoglalas.html">Időpontfoglalás</a></li>
                    <li><a href="login.php">ADMIN Felület</a></li>
                </ul>
            </nav>
            <h2 class="hely">Sminktetoválás - Szigetszentmiklós</h2>
        </header>
        <main>

            <?php

            $conn = new mysqli($servername, $user, $pass, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            ;

            $sql = "SELECT eljaras_neve, megjegyzes, eljaras_ara FROM arlista WHERE eljaras_helyszine = 'Szigetszentmiklós' AND eljaras_mod = 'Tetoválás'";
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
                            <?php print ($sorok[$i]['eljaras_neve']) ?>
                        </h2>
                        <h2>
                            <?php print ($sorok[$i]['megjegyzes']) ?>
                        </h2>
                    </div>
                    <div class="szektor-ar">
                        <p>
                            <?php print ($sorok[$i]['eljaras_ara']) ?>
                        </p>
                    </div>
                </div>

                <?php
            }
            ?>

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
        <h2 class="hely2">Esztétika - Szigetszentmiklós</h2>


        <?php $sql2 = "SELECT eljaras_neve, megjegyzes, eljaras_ara FROM arlista WHERE eljaras_helyszine = 'Szigetszentmiklós' AND eljaras_mod = 'Esztétika'";
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
                        <?php print ($sorok2[$i]['eljaras_neve']) ?>
                    </h2>
                    <h2>
                        <?php print ($sorok2[$i]['megjegyzes']) ?>
                    </h2>
                </div>
                <div class="szektor-ar">
                    <p>
                        <?php print ($sorok2[$i]['eljaras_ara']) ?>
                    </p>
                </div>
            </div>

            <?php
        }
        ?>

        </main>
    </div>
    <script src="app.js"></script>
</body>

<?php $conn->close(); ?>;

</html>