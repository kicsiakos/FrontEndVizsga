<?php
require_once ('config/conf.php');

class IdopontfoglalasOOP
{

    private $conn;
    private $servername = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "phpvizsga";

    private $emailErr = '';
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
            isset($_POST["vezetek-nev"]) &&
            isset($_POST["kereszt-nev"]) &&
            isset($_POST["telefon"]) &&
            isset($_POST["email"]) &&
            isset($_POST["megjegyzes"])
        ) {
            $vezetekNev = $this->test_input($_POST["vezetek-nev"]);
            $keresztNev = $this->test_input($_POST["kereszt-nev"]);
            $telefonSzam = $this->test_input($_POST["telefon"]);
            $emailCim = $this->test_input($_POST["email"]);
            if (!filter_var($emailCim, FILTER_VALIDATE_EMAIL)) {
                $this->emailErr = "Helytelen e-mail formátum!";
            }
            $megjegyzes = htmlspecialchars($_POST["megjegyzes"]);
            $sql = "INSERT INTO foglalasok (vezeteknev, keresztnev, telefonszam, emailcim, megjegyzes)
            VALUES ('$vezetekNev', '$keresztNev', '$telefonSzam', '$emailCim', '$megjegyzes')";
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