<?php
session_start();
require_once ('./config/conf.php');

$conn = new mysqli($servername, $user, $pass, $database);

$id = (int) $_POST['myId'];
$tabla = $_SESSION['foglalasTabla'];
$sql = "DELETE FROM $tabla WHERE id='" . $id . "'";

if (mysqli_query($conn, $sql)) {
    header("Location: admin.php");
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);