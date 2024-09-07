<?php

$path = './db/foglaltIdopontok.JSON';
$jsonString = file_get_contents($path);
$jsonData = json_decode($jsonString, true);
var_dump($jsonData);

$conn;
$servername = "localhost";
$user = "root";
$pass = "";
$database = "phpvizsga";

$conn = new mysqli($servername, $user, $pass, $database);
$_SESSION['foglalasTabla'] = "foglalasok";
$sql = "SELECT                  id,
                                nev,
                                telefonszam,
                                nap,
                                idopont,
                                fodrasz FROM " . $_SESSION['foglalasTabla'];

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sorok[] = $row;
    }
}

for ($i = 0; $i < count($sorok); $i++) {

    $jsonData = [
        [
            "foglalas[$i]" => [
                "nap" => $sorok[$i]['nap'],
                "ora" => $sorok[$i]['idopont']
            ]
        ]
    ];

    $nap = $sorok[$i]['nap'];
    $ora = $sorok[$i]['idopont'];

    print ($nap . " " . $ora . '<br>');

}

$jsonString = json_encode($jsonData, JSON_PRETTY_PRINT);
// Write in the file
$fp = fopen($path, 'w');
fwrite($fp, $jsonString);
fclose($fp);

mysqli_close($conn);
unset($sorok);