<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>
        
    <?php

$current_page = basename($_SERVER['PHP_SELF']);

        if(isset($title)){ 
            echo $title; 
        }else{
            echo "Mon site";
        }
    ?>
  </title> 
    
</head>
<body>


<div class="wrapper">
  <div>
    
  <div class="nav_bar">
      <ul class="menu-list">
        <li><a href="./index.php" class="<?= ($current_page == 'index.php') ? 'active' : '' ?>">HOME</a></li>
        <li><a href="./profile.php" class="<?= ($current_page == 'profile.php') ? 'active' : '' ?>">MON PROFIL</a></li>
      </ul>
      
      <div class="logotip">
        <img src="./assets/img/logo_ao4.png" alt="logo" title="logo">
      </div>

      <ul class="menu-list">
        <li><a href="./register.php">INSCRIPTION</a></li>
        <?php if (isset($_SESSION['user'])): ?>
          <li><a href="./logout.php" class="<?= ($current_page == 'logout.php') ? 'active' : '' ?>">LOGOUT</a></li>
        <?php else: ?>
          <li><a href="./login.php" class="<?= ($current_page == 'login.php') ? 'active' : '' ?>">LOGIN</a></li>
        <?php endif; ?>
      </ul>
    </div>
</div>
    

