<?php

require_once __DIR__ . '/../config/database.php';
require_once "Ville.php";
class Utilisateur{
    private int $idUser;
    private string $nom;
    private string $prenom;
    private string $pseudo;
    private string $motDePasse;
    private string $dateNaissance;
    private int $idVille;
    private ?Ville $ville;
    private ?PDO $pdo;

    public function __construct(?PDO $pdo, int $unIdUser, string $unNom, string $unPrenom, string $unPseudo, string $unMotDePasse, string $uneDateNaissance, int $unIdVille){
        $this->pdo = $pdo;
        $this->idUser=$unIdUser;
        $this->nom=$unNom;
        $this->prenom=$unPrenom;
        $this->pseudo=$unPseudo;
        $this->motDePasse=$unMotDePasse;
        $this->dateNaissance=$uneDateNaissance;
        $this->idVille=$unIdVille;        
    

    if ($pdo) {
        $this->ville = new Ville($pdo, $unIdVille);
        }
    }

    //geters

    public function getIdUser(): int{
        return $this->idUser;
    }

    public function getNom(): string{
            return $this->nom;
    }

    public function getPrenom(): string{
        return $this->prenom;
    }

    public function getPseudo(): string{
        return $this->pseudo;
    }

    public function getMotDePasse(): string{
        return $this->motDePasse;
    }

    public function getDateNaissance(): string{
        return $this->dateNaissance;
    }

    public function getIdVille(): int{
        return $this->idVille;
    }

    public function getVille(): ?Ville {
        return $this->ville;
    }

    public function getNationalite(): string {
        return $this->ville ? $this->ville->getNationalite() : "Non défini";
    }

// setters

    public function setIdUser(int $nouveauIdUser): void{
        $this-> idUser = $nouveauIdUser;
    }    

    public function setNom(string $nouveauNom): void{
        $this-> nom = $nouveauNom;
    }

    public function setPrenom(string $nouveauPrenom): void{
        $this-> prenom = $nouveauPrenom;
    }

    public function setPseudo(string $nouveauPseudo): void{
        $this-> pseudo = $nouveauPseudo;
    }

    public function setMotDePasse(string $nouveauMotDePasse): void{
        $this-> motDePasse = $nouveauMotDePasse;
    }

    public function setDateNaissance(string $nouvelleDateNaissance): void{
        $this-> dateNaissance = $nouvelleDateNaissance;
    }

    public function setIdVille(int $nouveauIdVille): void{
        $this-> idVille = $nouveauIdVille;
        if ($this->pdo) {
            $this->ville = new Ville($this->pdo, $nouveauIdVille);
        }
    }

    //toString
    public function __toString() : string{
        return  "ID : " . $this->idUser."<br>".
                "Nom : " . $this->nom."<br>".
                "Prenom : " . $this->prenom."<br>". 
                "Pseudo : " . $this->pseudo."<br>".
                "Mot De Passe : " . $this->motDePasse."<br>".
                "Date De Naissance : " . $this->dateNaissance."<br>".
                "Id Ville : " . $this->idVille."<br>";
} 

public function afficherProfil() {
    echo "Nom: " . $this->nom . "<br>";
    echo "Prénom: " . $this->prenom . "<br>";
    echo "Pseudo: " . $this->pseudo . "<br>";
    echo "Ville: " . ($this->ville ? $this->ville->getNom() : "Non défini") . "<br>";
    echo "Nationalité: " . $this->getNationalite() . "<br>";
}

}


?>