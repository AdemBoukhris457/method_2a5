<?php 
    class Recettes{
        private ?int $id_recette = null;
        private ?string $nom = null;
        private ?string $ingrediants = null;
        private ?string $descriptionr = null;
        private ?string $specialite = null;
        private ?string $image = null;
        private ?int $id_utilisateur=1;

    function __construct(string $nom, string $ingrediants, string $descriptionr, string $specialite, string $image)
    {
        $this->nom = $nom;
        $this->ingrediants = $ingrediants;
        $this->descriptionr = $descriptionr;
        $this->specialite = $specialite;
        $this->image=$image;
    }
    function getImage():string{
        return $this->image;
    }
    function setImage(string $image): void{
        $this->image=$image;
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
        return $this->descriptionr;
    }
    function getSpec(): string{
        return $this->specialite;
    } 

    function setNom(string $nom): void{
        $this->nom=$nom;
    }
    function setIngrediants(string $ingrediants): void{
        $this->ingrediants=$ingrediants;
    }
    function setDescription(string $descriptionr): void{
        $this->descriptionr=$descriptionr;
    }
    function setSpec(string $specialite): void{
        $this->specialite=$specialite;
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