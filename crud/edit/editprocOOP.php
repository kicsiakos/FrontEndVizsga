<?php
session_start();
class EditOOP
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
    public function editLine()
    {
        $id = (int) $_POST['id'];
        $sql = "UPDATE arlista SET  eljaras_neve        = '" . $_POST['eljarasNeve'] . "',
                                    megjegyzes          = '" . $_POST['megjegyzes'] . "',
                                    eljaras_helyszine   = '" . $_POST['eljarasHelyszine'] . "',
                                    eljaras_ara         = '" . $_POST['eljarasAra'] . "',
                                    eljaras_mod         = '" . $_POST['esztetikaTetovalas'] . "'
                WHERE id='" . $id . "'";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        $this->conn->close();
        exit();
    }
}

$editLine = new EditOOP();
$editLine->editLine();