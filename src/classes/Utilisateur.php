<?php
class Utilisateur{
    private int $idUser;
    private string $nom;
    private string $prenom;
    private string $pseudo;
    private string $motDePasse;
    private string $dateNaissance;
    private int $idVille;

    public function __construct(int $unIdUser, string $unNom, string $unPrenom, string $unPseudo, string $unMotDePasse, string $uneDateNaissance, int $unIdVille){
        $this->idUser=$unIdUser;
        $this->nom=$unNom;
        $this->prenom=$unPrenom;
        $this->pseudo=$unPseudo;
        $this->motDePasse=$unMotDePasse;
        $this->dateNaissance=$uneDateNaissance;
        $this->idVille=$unIdVille;        
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

}


?>