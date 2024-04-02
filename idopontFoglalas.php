<?php
require_once('./fv/adatkezeles.php');
require_once('./config/config.php');

$servername = "localhost";
$user       = "root";
$pass       = "";
$database   = "vizsgaweb";

$conn = new mysqli($servername, $user, $pass, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (
    isset($_POST["vezetek-nev"]) &&
    isset($_POST["kereszt-nev"]) &&
    isset($_POST["telefon"]) &&
    isset($_POST["email"]) &&
    isset($_POST["megjegyzes"])
) {
    $vezetekNev = htmlspecialchars($_POST["vezetek-nev"]);
    $keresztNev = htmlspecialchars($_POST["kereszt-nev"]);
    $telefonSzam = htmlspecialchars($_POST["telefon"]);
    $emailCim = htmlspecialchars($_POST["email"]);
    $megjegyzes = htmlspecialchars($_POST["megjegyzes"]);

    //adatbeiras("adat.csv", $vezetekNev, $keresztNev, $telefonSzam, $emailCim, $megjegyzes);
    
    $sql = "INSERT INTO foglalas (vezeteknev, keresztnev, telefonszam, emailcim, megjegyzes)
    VALUES ('$vezetekNev', '$keresztNev', '$telefonSzam', '$emailCim', '$megjegyzes')";
    
}

    

    if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

/*$lineValues = adattartalom("adat.csv");
foreach ($lineValues as $key => $lineValue) {
    print("Név: $lineValue[0] <br> $lineValue[1] <br> $lineValue[2] <br> $lineValue[3] <br> $lineValue[4] <hr>");
}*/

mysqli_close($conn);