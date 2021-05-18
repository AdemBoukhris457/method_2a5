<?php 
class Review{
    private ?int $id_review=null;
    private ?string $nom =null;
    private ?string $description =null;
    private ?int $score =null;
    private ?string $date =null;
    private ?int $id_utilisateur =null;
    private ?int $id_restaurant =null;


    function __construct(string $nom,string $description,int $score,string $date,int $id_restaurant,int $id_utilisateur)
    {
        $this->nom=$nom;
        $this->description=$description;
        $this->score=$score;
        $this->date=$date;
        $this->id_restaurant=$id_restaurant;
        $this->id_utilisateur = $id_utilisateur;
    }




    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of score
     */ 
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set the value of score
     *
     * @return  self
     */ 
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
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

    /**
     * Get the value of id_restaurant
     */ 
    public function getId_restaurant()
    {
        return $this->id_restaurant;
    }

    /**
     * Set the value of id_restaurant
     *
     * @return  self
     */ 
    public function setId_restaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;

        return $this;
    }

    /**
     * Get the value of id_review
     */ 
    public function getId_review()
    {
        return $this->id_review;
    }
}
