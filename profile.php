<?php
/*
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}*/
$title = "Mon profil";
$nav = "./profile.php"; 

require "./header.php";
?>

<div class="main-content">
    <div class="container__profil">
            <h1>Profil (prénom + nom)</h1>
            <div class="profil__info">
                <img src="#" alt="photo" title="photo">
                <div class="profil__details">
                    <ul>
                        <li>Pseudo :</li>
                        <li>Ville :</li>
                        <li>Nationalite :</li>
                        <li>Date de naissance :</li>
                        <li>Age :</li>
                    </ul>
                </div>
            </div>
            <div class="about__me">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et magni velit distinctio repellat. Quisquam nostrum odio, et nobis obcaecati incidunt amet ipsa accusantium alias error.</p>
            </div>
           
    </div>
</div>


<?php
require "./footer.php";
?>