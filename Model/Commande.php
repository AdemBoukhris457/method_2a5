<?php
class Commande{
    private ?int $id_commande = null;
    private ?string $materiel = null;
    private ?int $quantite = null;
    private ?string $date = null;
    private ?int $id_utilisateur =null;
function __construct(string $materiel, int $quantite, string $date ,int $id_utilisateur)
{
    $this->materiel = $materiel;
    $this->quantite = $quantite;
    $this->date = $date;
    $this->id_utilisateur = $id_utilisateur;
}

function getID(): int{
    return $this->id_commande;
}
function getMateriel(): string{
    return $this->materiel;
}
function getquantite(): int{
    return $this->quantite;
}
function getDate(): string{
    return $this->date;
}


function setMateriel(string $materiel): void{
    $this->materiel=$materiel;
}
function setCitation(string $citation): void{
    $this->citation=$citation;
}
function setImage(string $image): void
{
    $this->image = $image;
}
function setDate(string $date): void{
    $this->date=$date;
}


    /**
     * Get the value of id_utilisateur
     */ 
    public function getId_utilisateur()
    {
            return $this->id_utilisateur;
    }

    /**
     * Set the value of id_utilisateur
     *
     * @return  self
     */ 
    public function setId_utilisateur($id_utilisateur)
    {
            $this->id_utilisateur = $id_utilisateur;

            return $this;
    }
}
