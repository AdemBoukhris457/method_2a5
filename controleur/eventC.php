<?PHP
include "../config.php";
require_once '../model/event.php';

class evenementC
{
 public function afficherevenement()
    {  $sql= " SELECT * FROM evenement" ;
      $db = config::getConnexion();
      try{
        $listeevenement = $db->query($sql);
        return $listeevenement ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
   
     }

     public function ajouterevenement($evenement)
    {
        $sql="insert into evenement (titre,description,date_debut,date_fin,image)
        values (:titre,:description,:date_debut,:date_fin,:image)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'titre'=>$evenement->gettitre(),
              'description'=>$evenement->getdescription(),
            'date_debut'=>$evenement->getdate_debut(),
                'date_fin'=>$evenement->getdate_fin(),
                 'image'=>$evenement->getimage()                                                                




            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerevenement($id_event)
    {
$sql="DELETE FROM evenement WHERE id_event= :id_event";
$db = config::getConnexion();
$query=$db->prepare($sql);
$query->bindValue(':id_event',$id_event);
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
                'UPDATE evenement SET
                    titre = :titre,
                    description = :description,
                    date_debut = :date_debut,
                    date_fin = :date_fin,
                    image= :image,
                    
                WHERE id_event = :id_event'
            );
            $query->execute([
                'titre'=>$evenement->gettitre(),
              'description'=>$evenement->getdescription(),
            'date_debut'=>$evenement->getdate_debut(),
                'date_fin'=>$evenement->getdate_fin(),
                 'image'=>$evenement->getimage(),                                                            
            ]);
            echo $query->rowCount() .'alerte("records UPDATED successfully <br>")';
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     function recupererevenement($id_event){
        $sql="SELECT * from evenement where id_event=$id_event";
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
    function recupererevenement1($id_event){
            $sql="SELECT * from evenement where id_event=$id_event";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
               
                $evenement = $query->fetch(PDO::FETCH_OBJ);
                return $evenement;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
      
}

?>