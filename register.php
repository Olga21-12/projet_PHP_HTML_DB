<?php
session_start();
require 'src/config/database.php';

$title = "Inscription";
$nav = "./register.php";

require "./header.php";

$message = "";
// Récupération de la liste des villes depuis la base de données
$query = "SELECT * FROM villes";
$stmt = $pdo->query($query);
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Sécurisation des entrées utilisateur
    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $date_naissance = $_POST['date_naissance'];
    $ville_id = (int) $_POST['ville_id'];

 // Vérification de la disponibilité du pseudo
    $checkPseudo = $pdo->prepare("SELECT id_user FROM users WHERE pseudo = ?");
    $checkPseudo->execute([$pseudo]);

    if ($checkPseudo->rowCount() > 0) {
        $message = "⚠️ Ce pseudo est déjà utilisé, veuillez en choisir un autre.";
    } else {
            // Gestion de l'upload de la photo (facultatif)
        $photoData = null; // Par défaut, pas de photo
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photoTmp = $_FILES['photo']['tmp_name'];
            $photoData = file_get_contents($photoTmp); // Lecture du fichier image
        }
        // Insertion de l'utilisateur dans la base de données
        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, pseudo, mot_de_passe, date_naissance, photo, description, id_ville) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nom, $prenom, $pseudo, $password, $date_naissance, $photoData ?: null, '', $ville_id])) {
            $message = "✅ Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } else {
            $message = "❌ Erreur lors de l'inscription.";
        }
    }
}
?>

<div class="main-content">
    <div class="container__inscription">
        <h1>Inscription</h1>

        <?php if (!empty($message)) { ?>
            <p style="color: red; font-weight: bold;"><?= $message; ?></p>
        <?php } ?>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nom:</label>
                <input type="text" name="nom" required><br>
            </div>

            <div class="form-group">
                <label>Prénom:</label>
                <input type="text" name="prenom" required><br>
            </div>

            <div class="form-group">
                <label>Pseudo:</label>
                <input type="text" name="pseudo" required><br>
            </div>
            
            <div class="form-group">
                <label>Mot de passe:</label>
                <input type="password" name="mot_de_passe" required><br>
            </div>

            <div class="form-group">
                <label>Date de naissance:</label>
                <input type="date" name="date_naissance" required><br>
            </div>

            <div class="form-group">
                <label>Ville:</label>
                <select name="ville_id" required>
                    <option value="">-- Sélectionnez votre ville --</option>
                <?php foreach ($villes as $ville) { ?>
                    <option value="<?= $ville['id_ville'] ?>"><?= htmlspecialchars($ville['nom']) ?></option>
                <?php } ?>
                    </select>
            </div>        

            <div class="form-group">
                <label>Photo (optionnel):</label>
                <input type="file" name="photo" accept="image/*">
            </div>        
            <p class="photo-hint">Ce champ est facultatif.</p>
            
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
