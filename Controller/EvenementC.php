<?PHP
include "../config.php";
require_once '../model/Evenement.php';

class EvenementC
{
 public function afficherevenement()
    {  $sql= " SELECT * FROM evenements" ;
      $db = config::getConnexion();
      try{
        $listeevenement = $db->query($sql);
        return $listeevenement ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
   
     }
    public function afficherevenementutilisateur($id_utilisateur)
    {
        $sql = " SELECT * FROM evenements where id_utilisateur=$id_utilisateur";
        $db = config::getConnexion();
        try {
            $listeevenement = $db->query($sql);
            return $listeevenement;
        } catch (Exception $e) {
            die('erreur : ' . $e->getMessage());
        }
    }

     public function ajouterevenement($evenement)
    {
        $sql="insert into evenements (titre,description,date_debut,date_fin,image,id_utilisateur)
        values (:titre,:description,:date_debut,:date_fin,:image,:id_utilisateur)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'titre'=>$evenement->gettitre(),
              'description'=>$evenement->getdescription(),
            'date_debut'=>$evenement->getdate_debut(),
                'date_fin'=>$evenement->getdate_fin(),
                 'image'=>$evenement->getimage(),
                'id_utilisateur' => $evenement->getId_utilisateur(),                                                              


            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerevenement($id_event)
    {
$sql="DELETE FROM evenements WHERE id_evenement= :id_evenement";
$db = config::getConnexion();
$query=$db->prepare($sql);
$query->bindValue(':id_evenement',$id_event);
try{
$query->execute();
}
catch (Exception $e){
die('Erreur: '.$e->getMessage());
}
}
function modifierevenement($evenement, $id_event){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenements SET 
                            titre = :titre, 
					    	description = :description, 
						    date_debut = :date_debut,
						    date_fin = :date_fin,
						    image = :image,
                            id_utilisateur = :id_utilisateur
					    WHERE id_evenement = :id_evenement'
            );
            $query->execute([
                'titre' => $evenement->gettitre(),
                'description' => $evenement->getdescription(),
                'date_debut' => $evenement->getdate_debut(),
                'date_fin' => $evenement->getdate_fin(),
                'image' => $evenement->getimage(),
                'id_utilisateur' => $evenement->getId_utilisateur(),
                'id_evenement' => $id_event
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
		}


        function recupererevenement($id_event){
			$sql="SELECT * from evenements where id_evenement=$id_event";
			$db = config::getConnexion();
			try{
				$query=$db->prepare($sql);
				$query->execute();

				$evenement=$query->fetch();
				return $evenement;
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}
      
}
