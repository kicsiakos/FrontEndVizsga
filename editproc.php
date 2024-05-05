<?php
session_start();
require_once ('config/conf.php');

$conn = new mysqli($servername, $user, $pass, $database);

$id = (int) $_POST['id'];
$sql = "UPDATE arlista  SET     eljaras_neve        = '" . $_POST['eljarasNeve'] . "',
                                megjegyzes          = '" . $_POST['megjegyzes'] . "',
                                eljaras_helyszine   = '" . $_POST['eljarasHelyszine'] . "',
                                eljaras_ara         = '" . $_POST['eljarasAra'] . "',
                                eljaras_mod         = '" . $_POST['esztetikaTetovalas'] . "'
                        WHERE   id = $id;";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);