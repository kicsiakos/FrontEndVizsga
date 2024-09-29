<?php
session_start();
require_once('../db/config/conf.php');


class LoginprocOOP
{
    private $username = '';
    private $password = '';
    private $servername = "localhost";
    private $user = "root";
    private $pass = "";
    private $database = "phpvizsga";

    private $salt = "4lm4f4";
    public function login()
    {

        if (isset($_POST['username']) && isset($_POST['password'])) {
            if (filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
                $this->username = $_POST['username'];
            }

            $this->password = $_POST['password'];

            $conn = new mysqli($this->servername, $this->user, $this->pass, $this->database);
            if (!$conn) {
                $errorMessage = date("Y.m.d H:i:s") . " Nem sikerült kapcsolódni az adatbázishoz!\n";
                $myFile = fopen("errorLog.txt", "a") or die("Nem lehet megnyitni a file-t!");
                fwrite($myFile, $errorMessage);
                fclose($myFile);
                header('Location: login.php');
            }
            $sql = "SELECT id, email, jelszo FROM felhasznalok WHERE email = '" . $this->username . "'";
            $result = $conn->query($sql);
            if ($result) {
                if ($result->num_rows === 1) {
                    $row = $result->fetch_assoc();
                    if (password_verify($this->password, $row['jelszo'])) {

                        $_SESSION['id'] = $row['id'];
                        $_SESSION['logindate'] = date('YYYY.MM.DD');
                        header('Location: admin.php');

                    } else {
                        $errorMessage = date("Y.m.d H:i:s") . " E-mail cím jó de a jelszó helytelen\n";
                        $myFile = fopen("errorLog.txt", "a") or die("Nem lehet megnyitni a file-t!");
                        fwrite($myFile, $errorMessage);
                        fclose($myFile);
                        $_SESSION['error'] = "Helytelen e-mail cím vagy jelszó!";
                        header('Location: login.php');
                    }
                } else {
                    $errorMessage = date("Y.m.d H:i:s") . " E-mail cím helytelen ($this->username) " . "IP: " . $_SERVER['REMOTE_ADDR'] . "\n";
                    $myFile = fopen("errorLog.txt", "a") or die("Nem lehet megnyitni a file-t!");
                    fwrite($myFile, $errorMessage);
                    fclose($myFile);
                    $_SESSION['error'] = "Helytelen e-mail cím vagy jelszó!";
                    header('Location: login.php');
                }
            } else {
                $errorMessage = date("Y.m.d H:i:s") . " Adatbázis hiba!\n";
                $myFile = fopen("errorLog.txt", "a") or die("Nem lehet megnyitni a file-t!");
                fwrite($myFile, $errorMessage);
                fclose($myFile);
                header('Location: login.php');
            }
            $conn->close();
        }
    }
}

$login = new LoginprocOOP();
$login->login();