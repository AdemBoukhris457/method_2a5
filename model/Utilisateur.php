<?PHP
	class Utilisateur{
		private ?int $id_utilisateur = null;
		private ?string $nom_utilisateur = null;
		private ?string $password = null;
		private ?string $email = null;
		private ?string $prenom_utlisateur = null;
		private ?int $code_postal = null;
		private ?string $pays = null;
		private ?int $numero_tel = null;
		private ?string $type = null;


		function __construct(string $nom_utilisateur, string $prenom_utlisateur, string $email, string $type, string $password, int $code_postal, string $pays, int $numero_tel){
			
			$this->nom_utilisateur=$nom_utilisateur;
			$this->prenom_utlisateur=$prenom_utlisateur;
			$this->email=$email;
			$this->type=$type;
			$this->password=$password;
			$this->code_postal = $code_postal;
			$this->pays = $pays;
			$this->numero_tel = $numero_tel;
		}

		function getId(): int{
			return $this->id_utilisateur;
		}
		function getNom(): string{
			return $this->nom_utilisateur;
		}
		function getPassword(): string{
			return $this->password;
		}
		function getEmail(): string{
			return $this->email;
		}
		function getPrenom(): string{
			return $this->prenom_utlisateur;
		}
		function getCodepostal(): int{
			return $this->code_postal;
		}
		function getPays(): string{
			return $this->pays;
		}
		function getType(): string{
			return $this->type;
		}
		function getNumerotel(): int{
			return $this->numero_tel;
		}
        
		function setNom(string $nom_utilisateur): void{
			$this->nom_utilisateur=$nom_utilisateur;
		}
		function setPrenom(string $prenom_utlisateur): void{
			$this->prenom=$prenom_utlisateur;
		}
		function setType(string $type): void{
			$this->type=$type;
		}
		function setEmail(string $email): void{
			$this->email=$email;
		}
		function setPassword(string $password): void{
			$this->password=$password;
		}
	function setCodepostal(int $code_postal): void
	{
		$this->code_postal = $code_postal;
	}
	function setPays(string $pays): void
	{
		$this->pays = $pays;
	}
	function setNumerotel(int $numero_tel): void
	{
		$this->numero_tel = $numero_tel;
	}


	}
?>