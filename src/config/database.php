<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "init_db";

try {
    // Créer une connexion via PDO
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $user, $pass);
    // Définition des attributs pour la gestion des erreurs
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
