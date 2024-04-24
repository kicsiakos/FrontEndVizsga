<?php require_once ('conf.php') ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin felület</title>
    <style>
        table,
        td,
        th {
            border: 2px solid black;
        }
    </style>
</head>

<body>
    <div class="table">
        <table>
            <?php

            $conn = new mysqli($servername, $user, $pass, $database);
            $sql = "SELECT  eljaras_nev,
                                eljaras_tipus,
                                eljaras_ar,
                                hely FROM arlista_esztetika_kisszallas";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sorok[] = $row;
                }
            }

            ?>
            <tr>
                <th colspan="6">Esztétika árlista Kisszállás</th>
            </tr>
            <tr>
                <th>Eljárás neve</th>
                <th>Eljárás típusa</th>
                <th>Eljárás ára</th>
                <th>Eljárás helyszíne</th>
            </tr>
            <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                <tr>
                    <td><?php print ($sorok[$i]['eljaras_nev']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_tipus']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_ar']) ?></td>
                    <td><?php print ($sorok[$i]['hely']) ?></td>
                    <td><button>TÖRLÉS</button></td>
                    <td><button>MÓDOSÍTÁS</button></td>
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
            $sql = "SELECT  eljaras_nev,
                                eljaras_tipus,
                                eljaras_ar,
                                hely FROM arlista_esztetika_szigetszentmiklos";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sorok[] = $row;
                }
            }

            ?>
            <tr>
                <th colspan="6">Esztétika árlista Szigetszentmiklós</th>
            </tr>
            <tr>
                <th>Eljárás neve</th>
                <th>Eljárás típusa</th>
                <th>Eljárás ára</th>
                <th>Eljárás helyszíne</th>
            </tr>
            <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                <tr>
                    <td><?php print ($sorok[$i]['eljaras_nev']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_tipus']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_ar']) ?></td>
                    <td><?php print ($sorok[$i]['hely']) ?></td>
                    <td><button>TÖRLÉS</button></td>
                    <td><button>MÓDOSÍTÁS</button></td>
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
            $sql = "SELECT  eljaras_nev,
                                eljaras_tipus,
                                eljaras_ar,
                                hely FROM arlista_sminktetovalas_kisszallas";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sorok[] = $row;
                }
            }

            ?>
            <tr>
                <th colspan="6">Sminktetoválás árlista Kisszállás</th>
            </tr>
            <tr>
                <th>Eljárás neve</th>
                <th>Eljárás típusa</th>
                <th>Eljárás ára</th>
                <th>Eljárás helyszíne</th>
            </tr>
            <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                <tr>
                    <td><?php print ($sorok[$i]['eljaras_nev']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_tipus']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_ar']) ?></td>
                    <td><?php print ($sorok[$i]['hely']) ?></td>
                    <td><button>TÖRLÉS</button></td>
                    <td><button>MÓDOSÍTÁS</button></td>
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
            $sql = "SELECT  eljaras_nev,
                                eljaras_tipus,
                                eljaras_ar,
                                hely FROM arlista_sminktetovalas_szigetszentmiklos";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $sorok[] = $row;
                }
            }

            ?>
            <tr>
                <th colspan="6">Sminktetoválás árlista Szigetszentmiklós</th>
            </tr>
            <tr>
                <th>Eljárás neve</th>
                <th>Eljárás típusa</th>
                <th>Eljárás ára</th>
                <th>Eljárás helyszíne</th>
            </tr>
            <?php for ($i = 0; $i < count($sorok); $i++) { ?>
                <tr>
                    <td><?php print ($sorok[$i]['eljaras_nev']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_tipus']) ?></td>
                    <td><?php print ($sorok[$i]['eljaras_ar']) ?></td>
                    <td><?php print ($sorok[$i]['hely']) ?></td>
                    <td><button>TÖRLÉS</button></td>
                    <td><button>MÓDOSÍTÁS</button></td>
                <?php } ?>

            </tr>
            <?php mysqli_close($conn) ?>
            <?php unset($sorok) ?>
            
        </table>
    </div>
</body>

</html>