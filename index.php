<?php
require 'src/config/database.php';

//  requête pour récupérer les villes
$query = "SELECT * FROM villes";
$stmt = $pdo->query($query);
$villes = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = "Accueil";
$nav = "./index.php";

require "./header.php";
?>
<div class="main-content">
    <div class="container__login">
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

        <h2>Liste des villes enregistrées</h2>
        <table border="1">
            <tr>
                <th>Nom</th>
                <th>Pays</th>
                <th>Capitale</th>
            </tr>
            <?php foreach ($villes as $ville) { ?>
                <tr>
                    <td><?= htmlspecialchars($ville['nom']) ?></td>
                    <td><?= htmlspecialchars($ville['pays']) ?></td>
                    <td><?= ($ville['capitale'] == 1) ? "Oui" : "Non"; ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>

    <?php include 'footer.php'; ?>
</body>
</html>
