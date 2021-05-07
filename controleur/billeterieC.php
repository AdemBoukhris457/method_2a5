<?PHP
include "../config.php";
require_once '../model/billeterie.php';

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
        $sql="insert into billeterie (nom,email,cni,nombre)
        values (:nom,:email,:cni,:nombre)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'nom'=>$billeterie->getnom(),
              'email'=>$billeterie->getemail(),
            'cni'=>$billeterie->getcni(),
                'nombre'=>$billeterie->getnombre(),
                                                                      




            ]);
        }
        catch(Exeption $e)
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
 function modifierbilleterie($billeterie, $id_billet){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPcni nom billeterie SET
                    nom = :nom,
                    email = :email,
                    cni= :cni,
                    nombre = :nombre,
             
                   
                
                    
                WHERE id_billet = :id_billet'
            );
            $query->execute([
                'nom'=>$billeterie->getnom(),
              'email'=>$billeterie->getemail(),
              'cni'=>$billeterie->getcni(),
              'nombre'=>$billeterie->getnombre(),
             
        
              
                                                                         
            ]);
            echo $query->rowCount() .'alerte("records updated successfully <br>")';
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
     function recupererbilleterie($id_billet){
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
    function recupererbilleterie1($id_billet){
            $sql="SELECT * from billeterie where id_billet=$id_billet";
            $db = config::getConnexion();
            try{
                $query=$db->prepare($sql);
                $query->execute();
               
                $billeterie = $query->fetch(PDO::FETCH_OBJ);
                return $billeterie;
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }
        }
        function aaa($id_event){

            $sql="SELECT id_billet, titre,nom,email FROM `billeterie` b INNER JOIN evenement e  where b.id_event=e.id_event  GROUP by b.id_billet";
            $db = config::getConnexion();
            try{
                $req=$db->prepare($sql);
                $req->bindValue(':id_event',$id_event);
                
        $req->execute();
            return $req->fetchALL();
            }
            catch (Exception $e){
                die('Erreur: '.$e->getMessage());
            }	
        }  
        
}

?>