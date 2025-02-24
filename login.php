<?php
$title = "Login";
$nav = "./login.php";

require "./header.php";
?>
<div class="main-content">
    <div class="container__login">
            <h1>Login</h1>
            <?php //if (!empty($message)) echo "<p style='color: red;'>$message</p>"; ?>
            <form action="login.php" method="POST">
                <label for="pseudo">Votre pseudo</label>
                <p><input type="text" name="username" placeholder="Votre login/pseudo" required></p>
                <label for="mot_de_passe">Votre mot de passe</label>
                <p><input type="password" name="password" placeholder="Votre mot de passe" required></p>
                <p><button type="submit" class="btn btn-primary">Se connecter</button></p>
            </form>
            <p class="pas_encore">Pas encore de compte? <br><a href="./register.php">S'inscrire </a>👈🏾</p>
    </div>
</div>

<?php
require "./footer.php";
?>