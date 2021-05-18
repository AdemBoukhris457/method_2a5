<?PHP
	include "../config.php";
	require_once '../Model/Utilisateur.php';

	class UtilisateurC {

        function ajouterUtilisateur($Utilisateur){
            $sql= "INSERT INTO Utilisateur (nom_utilisateur, password, email, prenom_utilisateur, code_postal, pays, numero_tel, type) 
			VALUES (:nom_utilisateur,:password,:email, :prenom_utilisateur, :code_postal, :pays, :numero_tel, :type)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom_utilisateur' => $Utilisateur->getNom(),
					'password' => $Utilisateur->getPassword(),
					'email' => $Utilisateur->getEmail(),
                    'prenom_utilisateur' => $Utilisateur->getPrenom(),
                    'code_postal' => $Utilisateur->getCodepostal(),
                    'pays' => $Utilisateur->getPays(),
					'numero_tel' => $Utilisateur->getNumerotel(),
                    'type' => $Utilisateur->getType()
                ]);
            }
            catch (Exception $e){
                echo 'Erreur: '.$e->getMessage();
            }
        }

		function afficherUtilisateurs(){
			$sql = "SELECT * FROM Utilisateur";
			$db = config::getConnexion();
			try {
				$liste = $db->query($sql);
				return $liste;
			} catch (Exception $e) {
				die('Erreur: ' . $e->getMessage());
			}
		}
	function supprimerUtilisateur($id)
	{
		$sql = "DELETE FROM Utilisateur WHERE id_utilisateur= :id_utilisateur";
		$db = config::getConnexion();
		$req = $db->prepare($sql);
		$req->bindValue(':id_utilisateur', $id);
		try {
			$req->execute();
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function recupererUtilisateur($id)
	{
		$sql = "SELECT * from Utilisateur where id_utilisateur=$id";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$user = $query->fetch();
			return $user;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}

	function recupererUtilisateur1($id)
	{
		$sql = "SELECT * from Utilisateur where id_utilisateur=$id";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$user = $query->fetch(PDO::FETCH_OBJ);
			return $user;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}


	function connexionUser1($email, $password)
	{
		$sql = "SELECT id_utilisateur FROM Utilisateur WHERE Email='" . $email . "' and Password = '" . $password . "'";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$user = $query->fetch();
			return $user;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function connexionUser2($email, $password)
	{
		$sql = "SELECT type FROM Utilisateur WHERE Email='" . $email . "' and Password = '" . $password . "'";
		$db = config::getConnexion();
		try {
			$query = $db->prepare($sql);
			$query->execute();

			$user = $query->fetch();
			return $user;
		} catch (Exception $e) {
			die('Erreur: ' . $e->getMessage());
		}
	}
	function modifierUtilisateur($Utilisateur, $id_utilisateur)
	{
		try {
			$db = config::getConnexion();
			$query = $db->prepare(
				'UPDATE Utilisateur SET 
					    	nom_utilisateur = :nom_utilisateur, 
						    password = :password,
                            email = :email,
						    prenom_utilisateur = :prenom_utilisateur,
							code_postal = :code_postal,
                            pays = :pays,
						    numero_tel = :numero_tel,
                            type = :type
					    WHERE id_utilisateur = :id_utilisateur'
			);
			$query->execute([
				'nom_utilisateur' => $Utilisateur->getNom(),
					'password' => $Utilisateur->getPassword(),
					'email' => $Utilisateur->getEmail(),
                    'prenom_utilisateur' => $Utilisateur->getPrenom(),
                    'code_postal' => $Utilisateur->getCodepostal(),
                    'pays' => $Utilisateur->getPays(),
					'numero_tel' => $Utilisateur->getNumerotel(),
                    'type' => $Utilisateur->getType(),
				'id_utilisateur' => $id_utilisateur
			]);
			echo $query->rowCount() . " records UPDATED successfully <br>";
		} catch (PDOException $e) {
			$e->getMessage();
		}
	}

		function connexionUser($email,$password){
            $sql="SELECT * FROM Utilisateur WHERE Email='" . $email . "' and Password = '". $password."'";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
                $count=$query->rowCount();
                if($count==0) {
                    $message = "pseudo ou le mot de passe est incorrect";
                } else {
                    $x=$query->fetch();
                    $message = $x['role'];
                }
            }
            catch (Exception $e){
                    $message= " ".$e->getMessage();
            }
          return $message;
        }
	
	
	

	}



?>