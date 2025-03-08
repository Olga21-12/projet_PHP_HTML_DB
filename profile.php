<?php
session_start();
require 'src/config/database.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$title = "Mon profil";
$nav = "./profile.php";

require 'src/classes/Utilisateur.php';
require "./header.php";

$user_id = $_SESSION['user_id'];

// Obtenir les données utilisateur
$stmt = $pdo->prepare("SELECT pseudo, nom, prenom, date_naissance, description, photo, id_ville FROM users WHERE id_user = ?");
$stmt->execute([$user_id]);
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

// Créer un objet Utilisateur
$user = new Utilisateur($pdo, $user_id, $userData['nom'], $userData['prenom'], $userData['pseudo'], '', $userData['date_naissance'], $userData['id_ville']);

// Calcul de l'âge
$birthDate = new DateTime($userData['date_naissance']);
$today = new DateTime();
$age = $today->diff($birthDate)->y;

// Définition de photo
$photoSrc = (!empty($userData['photo'])) 
    ? 'data:image/jpeg;base64,' . base64_encode($userData['photo']) 
    : 'uploads/profile_photo/default-profile.jpg'; // Photo standard

?>

<div class="main-content">
    <div class="container__profil">
    <h1><?= htmlspecialchars($user->getPrenom() . ' ' . $user->getNom()) ?></h1>
        
        <div class="profil__info">
            <img src="<?= $photoSrc ?>" alt="Photo de profil" title="Photo de profil" class="profil__photo">
            <div class="profil__details">
                <ul>
                    <li>Pseudo :<?= htmlspecialchars($user->getPseudo()) ?></li>
                    <li>Ville :<?= htmlspecialchars($user->getVille()->getNom()) ?></li>
                    <li>Nationalité :<?= htmlspecialchars($user->getNationalite()) ?></li>
                    <li>Date de naissance :<?= htmlspecialchars($user->getDateNaissance()) ?></li>
                    <li>Âge :<?= $age ?> ans</li>
                </ul>
            </div>
        </div>
        
        
    </div>
</div>

<?php
require "./footer.php";
?>