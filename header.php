<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>
        
    <?php
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
        <li><a href="./index.php">HOME</a></li>
        <li><a href="./profile.php">MON PROFIL</a></li>
      </ul>
      
      <div class="logotip">
        <img src="" alt="logo" title="logo">
      </div>

      <ul class="menu-list">
        <li><a href="./register.php">INSCRIPTION</a></li>
        <li><a href="./login.php">LOGIN</a></li>
      </ul>
    </div>
</div>
    

