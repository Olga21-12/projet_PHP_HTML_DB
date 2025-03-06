<?php
require_once __DIR__ . '/../config/database.php'; 

class Ville {
    private $id_ville;
    private $nom;
    private $pays;
    private $capitale;
    private $nationalite;
    private $pdo; 

    //  Constructeur : Initialise l'objet avec la connexion à la BDD
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

   
    public function getAllVilles() {
        $query = "SELECT * FROM villes";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVilleById($id_ville) {
        $query = "SELECT * FROM villes WHERE id_ville = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$id_ville]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    //  Ajout ville en base de données
    public function addVille($nom, $pays, $capitale, $nationalite) {
        $query = "INSERT INTO villes (nom, pays, capitale, nationalite) VALUES (?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($query);
        return $stmt->execute([$nom, $pays, $capitale, $nationalite]);
    }

    //  pour ID
    public function getId() {
        return $this->id_ville;
    }

    //  Nom
    public function getNom() {
        return $this->nom;
    }

    // Pays
    public function getPays() {
        return $this->pays;
    }

    //  Capitale
    public function isCapitale() {
        return $this->capitale;
    }

    //  Nationalité
    public function getNationalite() {
        return $this->nationalite;
    }
}
