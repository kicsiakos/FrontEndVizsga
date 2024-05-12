<?php
session_start();
class DeleteOOP
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
    public function deleteLine()
    {
        $id = (int) $_POST['myId'];
        $tabla = $_SESSION['tabla'];
        $sql = "DELETE FROM $tabla WHERE id='" . $id . "'";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        $this->conn->close();
        exit();
    }
}

$Line = new DeleteOOP();
$Line->deleteLine();

