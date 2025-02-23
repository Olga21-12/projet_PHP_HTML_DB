README.md

# Projet PHP : Système d'Authentification avec Profil Utilisateur

Ce projet est une application web développée en PHP qui permet aux utilisateurs de s'inscrire, de se connecter et d'afficher leur profil avec une photo de profil et une description. Lors de l'inscription, l'utilisateur choisit sa ville parmi une liste de 10 villes enregistrées dans la base de données.

## Fonctionnalités principales
✅ Inscription avec choix de la ville
✅ Connexion sécurisée avec pseudo et mot de passe
✅ Page de profil affichant : nom, prénom, pseudo, ville et nationalité
✅ Upload et affichage d’une photo de profil
✅ Affichage de la liste des 10 villes avec leur pays respectif sur la page d'accueil
✅ Déconnexion sécurisée avec gestion de session

 

## Technologies utilisées

✅ Langages : PHP, HTML, CSS
✅ Base de données : MySQL
✅ Architecture : Programmation Orientée Objet (POO)
✅ Accès à la base de données : PDO
✅ Modélisation :
	- Merise : MCD, MLD, MPD pour la conception de la base de données
	- UML : Diagramme de classes pour la structuration du code PHP
✅ Sécurité : Hashage des mots de passe avec password_hash()

## Structure du projet

/mon_site
│── 📄 index.php          # Page d'accueil avec liste des villes et vidéo  
│── 📄 login.php          # Formulaire de connexion  
│── 📄 register.php       # Formulaire d'inscription  
│── 📄 profile.php        # Page de profil (accessible uniquement après connexion)  
│── 📄 logout.php         # Déconnexion sécurisée  
│── 📄 header.php    	    # En-tête du site
│── 📄 footer.php    	    # Pied de page   
│  
├── 📂 assets/            # Ressources statiques  
│   ├── 📂 css/           # Fichiers CSS  
│   ├── 📂 img/           # Images statiques  
│   ├── 📂 js/            # Scripts JavaScript  
│  
├── 📂 src/               # Code PHP principal  
│   ├── 📂 config/        # Fichiers de configuration  
│   │   ├── database.php  # Connexion à la base de données  
│   │   ├── config.php    # Configuration générale  
│   ├── 📂 classes/       # Classes en PHP  
│   │   ├── Utilisateur.php  # Classe Utilisateur  
│   │   ├── Ville.php        # Classe Ville  
│  
├── 📂 database/          # Scripts SQL  
│   ├── 📄 init_db.sql    # Script de création de la base de données  
│  
├── 📂 uploads/           # Stockage des fichiers envoyés  
│   ├── 📂 profile_pictures/  # Dossier des photos de profil  
│  
└── 📄 README.md          # Documentation du projet  


## Utilisation

1️⃣ **S'enregistrer**  
- Aller sur `register.php`
- Remplir le formulaire et choisir une ville  
- Ajouter une photo de profil  
- Valider l'inscription  

2️⃣ **Se connecter**  
- Aller sur `login.php`  
- Entrer son pseudo et mot de passe  
- Être redirigé vers `profile.php`  

3️⃣ **Voir son profil**  
- Une fois connecté, `profile.php` affiche les informations et la nationalité  

4️⃣ **Se déconnecter**  
- Cliquer sur "Déconnexion" pour terminer la session  
