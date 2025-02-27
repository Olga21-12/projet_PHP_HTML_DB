<?php
require_once "config/database.php"; 

$query = $pdo->query("SELECT * FROM villes");
$villes = $query->fetchAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <h1>Bienvenue sur notre site</h1>

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

    <h2>Liste des pays enregistrés</h2>
    <table border="1">
        <tr><th>Nom</th><th>Pays</th><th>Capitale</th></tr>
        <?php foreach ($villes as $ville) { ?>
            <tr>
                <td><?= htmlspecialchars($ville['nom']) ?></td>
                <td><?= htmlspecialchars($ville['pays']) ?></td>
                <td><?= htmlspecialchars($ville['capitale']) ?></td>
            </tr>
        <?php } ?>
    </table>

    <?php include 'footer.php'; ?>
</body>
</html>
