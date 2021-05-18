<?php 
include_once "../Controller/ReviewC.php";
class LikesC{
    function ajouter_like($id_review,$id_utilisateur){
        $sql ="INSERT into likes (id_review,id_utilisateur,nb_likes)
        VALUES (:id_review,:id_utilisateur,:nb_likes)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'id_review'=>$id_review,
                'id_utilisateur'=>$id_utilisateur,
                'nb_likes'=> 0
                
               
                
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function recup_like($id_review){
        $sql='SELECT * from likes where id_review = "'.$id_review.'"';
        $db = config::getConnexion();
        try{
            $listeresto = $db->query($sql);
            return $listeresto ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }
     function update_like($id_review){
         $sql= 'UPDATE likes SET nb_likes = nb_likes +1 where id_review =  "'.$id_review.'"';
         $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute();
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
     }
    
}

?>