<?php
require_once ('./fv/adatkezeles.php');
require_once ('./config/config.php');

$servername = "localhost";
$user = "root";
$pass = "";
$database = "phpvizsga";

$conn = new mysqli($servername, $user, $pass, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}



if (
    isset($_POST["vezetek-nev"]) &&
    isset($_POST["kereszt-nev"]) &&
    isset($_POST["telefon"]) &&
    isset($_POST["email"]) &&
    isset($_POST["megjegyzes"])
) {
    $vezetekNev = test_input($_POST["vezetek-nev"]);
    $keresztNev = test_input($_POST["kereszt-nev"]);
    $telefonSzam = test_input($_POST["telefon"]);
    $emailCim = test_input($_POST["email"]);
    if (!filter_var($emailCim, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Helytelen e-mail formátum!";
    }
    $megjegyzes = htmlspecialchars($_POST["megjegyzes"]);
    $sql = "INSERT INTO foglalasok (vezeteknev, keresztnev, telefonszam, emailcim, megjegyzes)
            VALUES ('$vezetekNev', '$keresztNev', '$telefonSzam', '$emailCim', '$megjegyzes')";
}

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);