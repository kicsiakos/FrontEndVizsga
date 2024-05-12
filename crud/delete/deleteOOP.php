<?php
session_start();
class DeleteOOP
{

    private $conn;


    function __construct()
    {
        $servername = "localhost";
        $user = "root";
        $pass = "";
        $database = "phpvizsga";

        try {
            $this->conn = new mysqli($servername, $user, $pass, $database);
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

