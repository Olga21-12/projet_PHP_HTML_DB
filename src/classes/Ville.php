<?php
require_once __DIR__ . '/../config/database.php'; 

class Ville {
    private int $idVille;
    private string $nom;
    private string $pays;
    private bool $capitale;
    private string $nationalite;
    private ?PDO $pdo; 

    //  Constructeur : Initialise l'objet avec la connexion à la BDD
    public function __construct(?PDO $pdo, int $unIdVille = null) {
        $this->pdo = $pdo;
        if ($pdo && $unIdVille) {
            $this->loadFromDatabase($unIdVille);
        }
    }

    private function loadFromDatabase(int $idVille): void {
        $query = "SELECT * FROM villes WHERE id_ville = ?";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([$idVille]);
        if ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->idVille = $data['id_ville'];
            $this->nom = $data['nom'];
            $this->pays = $data['pays'];
            $this->capitale = (bool)$data['capitale'];
            $this->nationalite = $data['nationalite'];
        }
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

    // Getters
    public function getIdVille(): int {
        return $this->idVille;
    }

    public function getNom(): string {
        return $this->nom;
    }

    public function getPays(): string {
        return $this->pays;
    }

    public function isCapitale(): bool {
        return $this->capitale;
    }

    public function getNationalite(): string {
        return $this->nationalite;
    }

    // Setters
    public function setIdVille(int $nouvelIdVille): void {
        $this->idVille = $nouvelIdVille;
    }

    public function setNom(string $nouveauNom): void {
        $this->nom = $nouveauNom;
    }

    public function setPays(string $nouveauPays): void {
        $this->pays = $nouveauPays;
    }

    public function setCapitale(bool $nouvelleCapitale): void {
        $this->capitale = $nouvelleCapitale;
    }

    public function setNationalite(string $nouvelleNationalite): void {
        $this->nationalite = $nouvelleNationalite;
    }

    // toString
    public function __toString(): string {
        return "ID Ville : " . $this->idVille . "<br>" .
               "Nom : " . $this->nom . "<br>" .
               "Pays : " . $this->pays . "<br>" .
               "Capitale : " . ($this->capitale ? "Oui" : "Non") . "<br>" .
               "Nationalité : " . $this->nationalite . "<br>";
    }
}

?>
