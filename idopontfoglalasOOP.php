<?php
require_once('config/conf.php');

class IdopontfoglalasOOP
{

    private $conn;
    private $servername = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "phpvizsga";
    function __construct()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->user, $this->pass, $this->database);
        } catch (exception $ex) {
            throw new Exception("Hibaüzenet : " . $this->conn->connect_error);
        }

    }
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function foglalas()
    {

        if (
            isset($_POST["nev"]) &&
            isset($_POST["telefon"]) &&
            isset($_POST["idopont"])
        ) {
            $nev = $this->test_input($_POST["nev"]);
            $telefonSzam = $this->test_input($_POST["telefon"]);
            $idopont = $this->test_input($_POST["idopont"]);
            
            $sql = "INSERT INTO foglalasok (vezeteknev, keresztnev, telefonszam, emailcim, megjegyzes)
            VALUES ('$nev', '$telefonSzam', '$idopont')";
        }

        if (mysqli_query($this->conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }

        mysqli_close($this->conn);
    }
}

$idopont = new IdopontfoglalasOOP();
$idopont->foglalas();