<?php session_start() ?>
<?php require_once ('conf.php') ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Admin felület</title>
</head>

<header>
    <a href="index.php" id="logOut">KIJELENTKEZÉS</a>
</header>

<body>
    <div class="container">
        <div class="table">
            <table>
                <?php

                $conn = new mysqli($servername, $user, $pass, $database);
                $_SESSION['tabla'] = "arlista";
                $sql = "SELECT  id,
                                eljaras_neve,
                                megjegyzes,
                                eljaras_helyszine,
                                eljaras_ara,
                                eljaras_mod FROM " . $_SESSION['tabla'];

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sorok[] = $row;
                    }
                }

                ?>
                <tr>
                    <th colspan="8">Árlista</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Eljárás neve</th>
                    <th>Megjegyzés</th>
                    <th>Eljárás helyszíne</th>
                    <th>Eljárás ára</th>
                    <th>Esztétika/Tetoválás</th>
                </tr>
                <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                    <tr>
                        <td><b><?php print ($sorok[$i]['id']) ?></b></td>
                        <td><?php print ($sorok[$i]['eljaras_neve']) ?></td>
                        <td><?php print ($sorok[$i]['megjegyzes']) ?></td>
                        <td><?php print ($sorok[$i]['eljaras_helyszine']) ?></td>
                        <td><?php print ($sorok[$i]['eljaras_ara']) ?></td>
                        <td><?php print ($sorok[$i]['eljaras_mod']) ?></td>

                        <td>
                            <form action="delete.php" method="POST">
                                <input type="hidden" name="myId" value="<?php print ($sorok[$i]['id']) ?>">
                                <button type="submit">TÖRLÉS
                                    <svg class="delete" xmlns="http://www.w3.org/2000/svg" width="10" height="10"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z" />
                                    </svg></button>
                            </form>
                        </td>

                        <td>
                            <form action="edit.php" method="POST">
                                <input type="hidden" name="myId" value="<?php print ($sorok[$i]['id']) ?>">
                                <input type="hidden" name="myName" value="<?php print ($sorok[$i]['eljaras_neve']) ?>">
                                <input type="hidden" name="myNote" value="<?php print ($sorok[$i]['megjegyzes']) ?>">
                                <input type="hidden" name="myLoc" value="<?php print ($sorok[$i]['eljaras_helyszine']) ?>">
                                <input type="hidden" name="myPrice" value="<?php print ($sorok[$i]['eljaras_ara']) ?>">
                                <input type="hidden" name="myMode" value="<?php print ($sorok[$i]['eljaras_mod']) ?>">
                                <?php
                                $sorok[$i]['id'] = $_SESSION['id'];
                                ?>
                                <button>MÓDOSÍTÁS</button>
                            </form>
                        </td>
                    <?php } ?>

                </tr>
                <?php mysqli_close($conn) ?>
                <?php unset($sorok) ?>

            </table>
        </div>
        <div class="table">
            <table>
                <?php

                $conn = new mysqli($servername, $user, $pass, $database);
                $_SESSION['foglalasTabla'] = "foglalasok";
                $sql = "SELECT  id,
                                vezeteknev,
                                keresztnev,
                                telefonszam,
                                emailcim,
                                megjegyzes FROM " . $_SESSION['foglalasTabla'];

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sorok[] = $row;
                    }
                }

                ?>
                <tr>
                    <th colspan="8">Foglalások</th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Vezetéknév</th>
                    <th>Keresztnév</th>
                    <th>Telefonszám</th>
                    <th>E-mail cím</th>
                    <th>Megjegyzés</th>
                </tr>
                <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                    <tr>
                        <td><b><?php print ($sorok[$i]['id']) ?></b></td>
                        <td><?php print ($sorok[$i]['vezeteknev']) ?></td>
                        <td><?php print ($sorok[$i]['keresztnev']) ?></td>
                        <td><?php print ($sorok[$i]['telefonszam']) ?></td>
                        <td><?php print ($sorok[$i]['emailcim']) ?></td>
                        <td><?php print ($sorok[$i]['megjegyzes']) ?></td>
                    <?php } ?>

                </tr>
                <?php mysqli_close($conn) ?>
                <?php unset($sorok) ?>

            </table>
        </div>
    </div>
</body>

</html>