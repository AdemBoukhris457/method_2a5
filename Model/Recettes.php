<?php 
    class Recettes{
        private ?int $id_recette = null;
        private ?string $nom = null;
        private ?string $ingrediants = null;
        private ?string $description = null;
        private ?string $specialite = null;
        private ?string $image = null;
        private ?int $id_produit = null;

    function __construct(string $nom, string $ingrediants, string $description, string $specialite, string $image, int $id_produit)
    {
        $this->nom = $nom;
        $this->ingrediants = $ingrediants;
        $this->description = $description;
        $this->specialite = $specialite;
        $this->image = $image;
        $this->id_produit = $id_produit;
    }

    function getID(): int{
        return $this->id_recette;
    }
    function getNom(): string{
        return $this->nom;
    }
    function getIngrediants(): string{
        return $this->ingrediants;
    }
    function getDescription(): string{
        return $this->description;
    }
    function getSpec(): string{
        return $this->specialite;
    } 
    function getImage(): string{
        return $this->image;
    }
    function getIDproduit(): int{
        return $this->id_produit;
    }

    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setIngrediants(string $ingrediants): void{
        $this->ingrediants=$ingrediants;
    }
    function setDescription(string $description): void{
        $this->descriptionr=$description;
    }
    function setSpec(string $specialite): void{
        $this->specialite=$specialite;
    }
    function setImage(string $image): void{
        $this->image=$image;
    }
    function setIDproduit(int $id_produit): void{
        $this->id_produit=$id_produit;
    }
}

?>