<?php
session_start();
require 'src/config/database.php';

$title = "Inscription";
$nav = "./register.php";

require "./header.php";

$message = "";

$query = "SELECT * FROM villes";
$stmt = $pdo->query($query);
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = htmlspecialchars(trim($_POST['nom']));
    $prenom = htmlspecialchars(trim($_POST['prenom']));
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $password = password_hash($_POST['mot_de_passe'], PASSWORD_DEFAULT);
    $age = (int) $_POST['age'];
    $ville_id = (int) $_POST['ville_id'];

 
    $checkPseudo = $pdo->prepare("SELECT id_user FROM users WHERE pseudo = ?");
    $checkPseudo->execute([$pseudo]);

    if ($checkPseudo->rowCount() > 0) {
        $message = "⚠️ Ce pseudo est déjà utilisé, veuillez en choisir un autre.";
    } else {

        $stmt = $pdo->prepare("INSERT INTO users (nom, prenom, pseudo, mot_de_passe, age, id_ville) 
                               VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt->execute([$nom, $prenom, $pseudo, $password, $age, $ville_id])) {
            $message = "✅ Inscription réussie ! Vous pouvez maintenant vous connecter.";
        } else {
            $message = "❌ Erreur lors de l'inscription.";
        }
    }
}
?>

<div class="main-content">
    <div class="container__login">
        <h1>Inscription</h1>

        <?php if (!empty($message)) { ?>
            <p style="color: red; font-weight: bold;"><?= $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Nom:</label>
            <input type="text" name="nom" value="Admin" required><br>

            <label>Prénom:</label>
            <input type="text" name="prenom" value="User" required><br>

            <label>Pseudo:</label>
            <select name="pseudo" required>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select><br>

            <label>Mot de passe:</label>
            <select name="mot_de_passe" required>
                <option value="admin">admin</option>
                <option value="user">user</option>
            </select><br>

            <label>Âge:</label>
            <input type="number" name="age" value="30" required><br>

            <label>Ville:</label>
            <select name="ville_id" required>
                <option value="">-- Sélectionnez votre ville --</option>
                <?php foreach ($villes as $ville) { ?>
                    <option value="<?= $ville['id_ville'] ?>"><?= htmlspecialchars($ville['nom']) ?></option>
                <?php } ?>
            </select><br>

            <button type="submit">S'inscrire</button>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
