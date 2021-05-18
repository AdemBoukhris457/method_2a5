<?php 
    class Produit{
        private ?int $id_produit = null;
        private ?string $nom = null;
        private ?int $nb_calories = null;
        private ?int $poids = null;
        private ?string $description = null;
        private ?string $image = null;
        private ?int $id_utilisateur =null;

    function __construct(string $nom, int $nb_calories, int $poids, string $description, string $image, int $id_utilisateur)
    {
        $this->nom = $nom;
        $this->nb_calories = $nb_calories;
        $this->poids = $poids;
        $this->description = $description;
        $this->image = $image;
        $this->id_utilisateur= $id_utilisateur;
    }

    function getID(): int{
        return $this->id_produit;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getNC(): int{
        return $this->nb_calories;
    }
    function getPoids(): int{
        return $this->poids;
    }
    function getDescription(): string{
        return $this->description;
    }
    function getImage(): string{
        return $this->image;
    }
    function getId_utilisateur(): int{
        return $this->id_utilisateur;
    }

    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setNC(int $nb_calories): void{
        $this->nb_calories=$nb_calories;
    }
    function setPoids(int $poids): void{
        $this->poids=$poids;
    }
    function setDescription(string $description): void{
        $this->description=$description;
    }
    function setImage(string $image): void{
        $this->image=$image;
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

