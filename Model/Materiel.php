<?php 
    class Materiel{
        private ?int $id_materiel = null;
        private ?string $nom = null;
        private ?string $description = null;
        private ?string $image = null;
        private ?int $prix = null;
        private ?int $id_utilisateur =null;

    function __construct(string $nom, string $description,string $image, int $prix, int $id_utilisateur)
    {
        $this->nom = $nom;
        $this->description = $description;
        $this->image = $image;
        $this->prix = $prix;
        $this->id_utilisateur= $id_utilisateur;
    }

    function getID(): int{
        return $this->id_materiel;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getDescription(): string{
        return $this->description;
    }
    function getImage(): string{
        return $this->image;
    }
    function getPrix(): string
    {
        return $this->prix;
    }
    function getId_utilisateur(): int{
        return $this->id_utilisateur;
    }

    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setDescription(string $description): void{
        $this->description=$description;
    }
    function setImage(string $image): void{
        $this->image=$image;
    }
    function setPrix(int $prix): void
    {
        $this->prix = $prix;
    }
    function setId_utilisateur(int $id_utilisateur): void{
        $this->id_utilisateur = $id_utilisateur;
    }

        /**
         * Get the value of id_utilisateur
         */ 
        

        /**
         * Set the value of id_utilisateur
         *
         * @return  self
         */ 
        
    }
?>