<?php
class AddNewLineOOP
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
    public function addNewLine()
    {
        $sql = "INSERT INTO arlista (eljaras_neve, megjegyzes, eljaras_helyszine, eljaras_ara, eljaras_mod)
                VALUES ('" . $_POST['newEljarasNeve'] . "',
                        '" . $_POST['newMegjegyzés'] . "',
                        '" . $_POST['newEljarasHelyszine'] . "',
                        '" . $_POST['newEljarasAra'] . "',
                        '" . $_POST['newEsztetikaTetovalas'] . "');";

        if (mysqli_query($this->conn, $sql)) {
            header("Location: ../admin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($this->conn);
        }
        $this->conn->close();
        exit();
    }
}

$newLine = new AddNewLineOOP();
$newLine->addNewLine();

