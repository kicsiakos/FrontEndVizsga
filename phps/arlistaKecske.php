<!DOCTYPE html>
<html lang="hu">

<?php require_once '../db/config/conf.php' ?>


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tóth Horti Vanda - Sminktetováló</title>
    <link rel="stylesheet" href="../styles/arlistaMiklos.css">
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
                <?php require_once ('../view/nav.php') ?>
            </nav>
            <h2 class="hely">Sminktetoválás - Tiszakécske</h2>
        </header>
        <main>

            <?php

            $conn = new mysqli($servername, $user, $pass, $database);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            ;

            $sql = "SELECT eljaras_neve, megjegyzes, eljaras_ara FROM arlista WHERE eljaras_helyszine = 'Tiszakécske' AND eljaras_mod = 'Tetoválás'";
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
        <h2 class="hely2">Esztétika - Tiszakécske</h2>


        <?php $sql2 = "SELECT eljaras_neve, megjegyzes, eljaras_ara FROM arlista WHERE eljaras_helyszine = 'Tiszakécske' AND eljaras_mod = 'Esztétika'";
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
    <script src="./scripts/app.js"></script>
</body>

<?php $conn->close(); ?>;

</html>