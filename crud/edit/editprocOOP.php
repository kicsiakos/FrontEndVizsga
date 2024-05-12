<?php
session_start();
class EditOOP
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