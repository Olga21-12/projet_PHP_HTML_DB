<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "init_db";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Erreur de connexion :" . $conn->connect_error);
}
?>