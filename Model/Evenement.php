<?php

class Evenement {

private  $id_evenement = null ;
private  $titre = null;
private  $description= null;
private  $date_debut= null;
private  $date_fin= null;
private  $image= null;
private ?int $id_utilisateur = null;



function __construct( string $titre,  $description ,string $date_debut,string $date_fin,string $image, int $id_utilisateur){

$this->titre=$titre;
$this->description=$description;
$this->date_debut=$date_debut;
$this->date_fin=$date_fin;      
$this->image=$image;
        $this->id_utilisateur = $id_utilisateur;


}
function getid_event(): int{
return $this->id_evenement;
}
function gettitre(): string{
return $this->titre;
}
function getdescription(): string{
return $this->description;
}
function getdate_debut(): string{
return $this->date_debut;
}
function getdate_fin(): string{
return $this->date_fin;
}
function getimage(): string{
return $this->image;
}
    function getId_utilisateur(): int
    {
        return $this->id_utilisateur;
    }

    function settitre(string $titre): void{
$this->titre=$titre;
}
function setdescription(string $description): void{
$this->description;
}
function setdate_debut(string $date_debut): void{
$this->date_debut;
}
function setdate_fin(string $date_fin): void{
$this->date_fin;
}
function setimage(string $image): void{
$this->image;
}
    function setId_utilisateur(int $id_utilisateur): void
    {
        $this->id_utilisateur = $id_utilisateur;
    }



}
