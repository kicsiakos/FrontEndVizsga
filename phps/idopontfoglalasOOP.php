<?php

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
            isset($_POST["telefonszam"]) &&
            isset($_POST["idopont"]) &&
            isset($_POST["user"]) &&
            isset($_POST["nap"])
        ) {
            $nev = $this->test_input($_POST["nev"]);
            $telefonSzam = $this->test_input($_POST["telefonszam"]);
            $idopont = $this->test_input($_POST["idopont"]);
            $user = $this->test_input($_POST["user"]);
            $nap = $this->test_input($_POST["nap"]);

            $sql = "INSERT INTO foglalasok (nev, telefonszam, nap, idopont, fodrasz)
            VALUES ('$nev', '$telefonSzam','$nap', '$idopont', '$user')";
        }

        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }

        mysqli_close($this->conn);
    }
}

$idopont = new IdopontfoglalasOOP();
$idopont->foglalas();