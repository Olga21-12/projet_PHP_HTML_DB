<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$title = "Mon profil";
$nav = "./profile.php";
require 'src/config/database.php';

require "./header.php";

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT pseudo, nom, prenom, date_naissance, description FROM users WHERE id_user = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<div class="main-content">
    <div class="container__profil">
            <h1><?= htmlspecialchars($user['prenom'] . ' ' . $user['nom']) ?></h1>
            <div class="profil__info">
                <img src="#" alt="photo" title="photo">
                <div class="profil__details">
                    <ul>
                        <li>Pseudo :<?= htmlspecialchars($user['pseudo']) ?></li>
                        <!--<li>Ville :</li>
                        <li>Nationalite :</li>
                        <li>Date de naissance :</li>
                        <li>Age :</li> -->
                    </ul>
                </div>
            </div>
            <div class="about__me">
                <p><?= nl2br(htmlspecialchars($user['description'])) ?></p>
            </div>
           
    </div>
</div>


<?php
require "./footer.php";
?>