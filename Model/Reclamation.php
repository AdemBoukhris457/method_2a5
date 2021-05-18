<?php
class Reclamation{
    private ?int $id_reclamation = null;
    private ?string $titre = null;
    private ?string $citation = null;
    private ?string $date = null;
    private ?int $id_utilisateur =null;
function __construct(string $titre, string $citation,string $date, int $id_utilisateur)
{
    $this->titre = $titre;
    $this->citation = $citation;
    $this->date = $date;
    $this->id_utilisateur = $id_utilisateur;
}

function getID(): int{
    return $this->id_reclamation;
}
function getTitre(): string{
    return $this->titre;
}
function getCitation(): string{
    return $this->citation;
}
function getDate(): string{
    return $this->date;
}


function setTitre(string $titre): void{
    $this->titre=$titre;
}
function setCitation(string $citation): void{
    $this->citation=$citation;
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

?>
