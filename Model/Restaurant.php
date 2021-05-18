<?php 
class restaurant{

    private  ?int $id = null ;
	private  ?string $nom = null;
	private ?string $image =null; 
	private  ?string $localisation = null;
    private  ?string $description =null;
    private  ?int $num_tel =null;
    private  ?string $specialite =null;
    private  ?int $score=null;
    private ?int $id_utilisateur = null;
function __construct(string $nom,string $description,int $score,string $specialite,string $localisation,int $num_tel,string $image, int $id_utilisateur){
    $this->nom=$nom;
    $this->localisation=$localisation;
    $this->description=$description;
    $this->num_tel=$num_tel;
    $this->specialite=$specialite;
    $this->score=$score;
    $this->image=$image;
        $this->id_utilisateur = $id_utilisateur;

}






    /**
     * Get the value of id
     */ 
    public function getId():int
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

	/**
	 * Get the value of nom
	 */ 
	public function getNom():string
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
	 * Get the value of localisation
	 */ 
	public function getLocalisation():string
	{
		return $this->localisation;
	}

	/**
	 * Set the value of localisation
	 *
	 * @return  self
	 */ 
	public function setLocalisation($localisation)
	{
		$this->localisation = $localisation;

		return $this;
	}

    /**
     * Get the value of description
     */ 
    public function getDescription():string
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
     * Get the value of num_tel
     */ 
    public function getNum_tel():int
    {
        return $this->num_tel;
    }

    /**
     * Set the value of num_tel
     *
     * @return  self
     */ 
    public function setNum_tel($num_tel)
    {
        $this->num_tel = $num_tel;

        return $this;
    }

    /**
     * Get the value of specialite
     */ 
    public function getSpecialite():string
    {
        return $this->specialite;
    }

    /**
     * Set the value of specialite
     *
     * @return  self
     */ 
    public function setSpecialite($specialite)
    {
        $this->specialite = $specialite;

        return $this;
    }

    /**
     * Get the value of score
     */ 
    public function getScore():int
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
	 * Get the value of image
	 */ 
	public function getImage():string
	{
		return $this->image;
	}

	/**
	 * Set the value of image
	 *
	 * @return  self
	 */ 
	public function setImage($image)
	{
		$this->image = $image;

		return $this;
	}
    function getId_utilisateur(): int
    {
        return $this->id_utilisateur;
    }
    function setId_utilisateur(int $id_utilisateur): void
    {
        $this->id_utilisateur = $id_utilisateur;
    }
}
?>