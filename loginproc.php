<?php
session_start();
require_once ('conf.php');
$username = '';
$password = '';
unset($_SESSION['error']);
if (isset($_POST['username']) && isset($_POST['password'])) {
    if (filter_var($_POST['username'], FILTER_VALIDATE_EMAIL)) {
        $username = $_POST['username'];
    }

    $password = $_POST['password'];

    $conn = new mysqli($servername, $user, $pass, $database);
    if (!$conn) {
        header('Location: login.php');
        //logba beírom a hibát
    }
    $sql = "SELECT id, email, jelszo FROM felhasznalok WHERE email = '" . $username ."'";
    $result = $conn->query($sql);
    if ($result) {
        if ($result->num_rows === 1) {
            $row = $result->fetch_assoc();
            if (password_verify($password.$salt, $row['jelszo'])) {

                $_SESSION['id'] = $row['id'];
                $_SESSION['logindate'] = date('YYYY.MM.DD');
                header('Location: index.php');

            } else {
                //logolni a sikertelen probalkozást email cím jó, jelszó nem jó
                $_SESSION['error'] = $login_error;
                header('Location: login.php');
            }
        } else {
            //logolni a sikertelen probalkozást email cím nem volt jó
            //IP cím érdemes tárolni
            //$_SERVER['REMOTE_ADDR'];
            $_SESSION['error'] = $login_error;
            header('Location: login.php');
        }
    } else {
        header('Location: login.php');
    }
    $conn->close();
}
