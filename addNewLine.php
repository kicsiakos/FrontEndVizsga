<?php
session_start();
require_once ('config/conf.php');

$conn = new mysqli($servername, $user, $pass, $database);

$sql = "INSERT INTO arlista (eljaras_neve, megjegyzes, eljaras_helyszine, eljaras_ara, eljaras_mod)
        VALUES ('" . $_POST['newEljarasNeve'] . "',
                '" . $_POST['newMegjegyzés'] . "',
                '" . $_POST['newEljarasHelyszine'] . "',
                '" . $_POST['newEljarasAra'] . "',
                '" . $_POST['newEsztetikaTetovalas'] . "');";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);