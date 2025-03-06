<?php
session_start();
require 'src/config/database.php';

//  requête pour récupérer les villes
$query = "SELECT * FROM villes";
$stmt = $pdo->query($query);
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = "Accueil";
$nav = "./index.php";

require "./header.php";
?>

<h1>Bienvenue sur notre site</h1>

<!-- video-->
<div style="text-align:center; margin-top: 20px;">
    <iframe width="560" height="315" 
        src="https://www.youtube.com/embed/gYO1uk7vIcc?si=EUexAaNKUweC9f-1" 
        title="YouTube video player" 
        frameborder="0" 
        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
        referrerpolicy="strict-origin-when-cross-origin" 
        allowfullscreen>
    </iframe>
</div>

<!-- Liste Villes -->
<div class="main-content">
    <div class="container__login">
        <h2>Liste des villes enregistrées</h2>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>Pays</th>
                <th>Capitale</th>
                <th>Nationalité</th>
            </tr>
            <?php foreach ($villes as $ville) { ?>
                <tr>
                    <td><?= htmlspecialchars($ville['nom']) ?></td>
                    <td><?= htmlspecialchars($ville['pays']) ?></td>
                    <td><?= ($ville['capitale'] == 1) ? "Oui" : "Non"; ?></td>
                    <td><?= htmlspecialchars($ville['nationalite']) ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

<!-- formulaire -->
<div class="main-content">
    <div class="container__login">
        <h1>Inscription</h1>

        <?php if (!empty($message)) { ?>
            <p style="color: red; font-weight: bold;"><?= $message; ?></p>
        <?php } ?>

        <form method="POST">
            <label>Nom:</label>
            <input type="text" name="nom" required><br>

            <label>Prénom:</label>
            <input type="text" name="prenom" required><br>

            <label>Pseudo:</label>
            <input type="text" name="pseudo" required><br>

            <label>Mot de passe:</label>
            <input type="password" name="mot_de_passe" required><br>

            <label>Âge:</label>
            <input type="number" name="age" min="1" required><br>

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
