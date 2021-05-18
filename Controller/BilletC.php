<?PHP
include "../config.php";
require_once '../model/Billet.php';

class billeterieC
{
 public function afficherbilleterie()
    {  $sql= " SELECT * FROM billeterie" ;
      $db = config::getConnexion();
      try{
        $listebilleterie = $db->query($sql);
        return $listebilleterie ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
   
     }

     public function ajouterbilleterie($billeterie)
    {
        $sql="insert into billeterie (email,cni,nombre,id_evenement)
        values (:email,:cni,:nombre,:id_evenement)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'email'=>$billeterie->getemail(),
                'cni'=>$billeterie->getcni(),
                'nombre'=>$billeterie->getnombre(),
                'id_evenement' => $billeterie->getid_event(),                                                    




            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function supprimerbilleterie($id_billet)
    {
$sql="DELETE FROM billeterie WHERE id_billet= :id_billet";
$db = config::getConnexion();
$req=$db->prepare($sql);
$req->bindValue(':id_billet',$id_billet);
try{
$req->execute();
}
catch (Exception $e){
die('Erreur: '.$e->getMessage());
}
}

    function modifierbillet($billeterie, $id_billet){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE billeterie SET 
                            email = :email, 
					    	cni = :cni, 
						    nombre = :nombre,
						    id_evenement = :id_evenement
					    WHERE id_billet = :id_billet'
            );
            $query->execute([
                'email' => $billeterie->getemail(),
                'cni' => $billeterie->getcni(),
                'nombre' => $billeterie->getnombre(),
                'id_evenement' => $billeterie->getid_event(),
                'id_billet' => $id_billet
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function recupererbillet($id_billet){
        $sql="SELECT * from billeterie where id_billet=$id_billet";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $billeterie=$query->fetch();
            return $billeterie;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
    function recuperereventID($id_evenement)
    {
        $sql = "SELECT * from evenements where id_evenement=$id_evenement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $billeterie = $query->fetch();
            return $billeterie;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
        
        
}
