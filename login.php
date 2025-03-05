<?php
session_start();
include 'src/config/database.php';

$title = "Login";
$nav = "./login.php";

require "./header.php";

$message = ""; // Переменная для отображения сообщений

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, заполнены ли все поля
    if (empty($_POST['pseudo']) || empty($_POST['mot_de_passe'])) {
        $message = "Veuillez remplir tous les champs.";
    } else {
        $pseudo = trim($_POST['pseudo']);
        $mot_de_passe = $_POST['mot_de_passe'];

        // Подготавливаем запрос к базе
        $stmt = $conn->prepare("SELECT id_user, mot_de_passe FROM users WHERE pseudo = ?");
        $stmt->bind_param("s", $pseudo);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            // Привязываем результат к переменным
            $stmt->bind_result($id_user, $hash);
            $stmt->fetch();

            // Проверяем пароль
            if (password_verify($mot_de_passe, $hash)) {
                $_SESSION['user'] = $pseudo;
                $_SESSION['user_id'] = $id_user; // Сохраняем ID пользователя
                header("Location: profile.php");
                exit;
            }
        }

        // Если логин или пароль неверные
        $message = "Pseudo ou mot de passe incorrect.";
        $stmt->close();
        $conn->close();
    }
}
?>

<div class="main-content">
    <div class="container__login">
        <h1>Login</h1>
        
        <?php if (!empty($message)): ?>
            <div class="message-error">
                <?php echo $message; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="pseudo">Votre pseudo</label>
            <p><input type="text" name="pseudo" placeholder="Votre login/pseudo" required></p>
            <label for="mot_de_passe">Votre mot de passe</label>
            <p><input type="password" name="mot_de_passe" placeholder="Votre mot de passe"></p>
            <p><button type="submit" class="btn btn-primary">Se connecter</button></p>
        </form>

        <p class="pas_encore">Pas encore de compte? <br><a href="./register.php">S'inscrire</a> 👈🏾</p>
    </div>
</div>

<?php 
require "./footer.php"; 
?>