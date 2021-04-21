<?php 
include "../config.php";
require_once "../Model/review.php";
class ReviewC{

    
    public function afficherReviews()
    {  $sql= " SELECT * FROM reviews" ; 
      $db = config ::getConnexion();
      try{
        $listeresto = $db->query($sql);
        return $listeresto ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }
     public function ajouterReview(Review $review)
     {
         
         $sql ="INSERT into reviews (nom,description,score,date,id_restaurant,id_utilisateur)
         VALUES (:nom,:description,:score,:date,:id_restaurant,:id_utilisateur)";
         $db=config::getConnexion();
 
         try
         {
             $query=$db->prepare($sql);
             $query->execute([
                 'nom'=>$review->getNom(),
                 'description'=>$review->getDescription(),
                 'score'=>$review->getScore(),
                 'date'=>$review->getDate(),
                 'id_restaurant'=>$review->getId_restaurant(),
                 'id_utilisateur'=>$review->getId_utilisateur()
                
                 
             ]);
         }
         catch(Exception $e)
         {
             die('Erreur: '.$e->getMessage());
         }
     }
     function supprimerReview($id_review)
    {
			$sql="DELETE FROM reviews WHERE id_review= :id_review";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id_review',$id_review);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
    public function modifierReview(Review $review,$id_review){
        try {
            $db = config::getConnexion();
            $nom=$review->getNom();
            $query = $db->prepare(
                'UPDATE reviews SET nom = :nom,
                description = :description,
                score = :score,
                date = :date,
                id_restaurant = :id_restaurant,
                id_utilisateur = :id_utilisateur where id_review = :id_review'
            );
            $query->execute([ 
                'description' => $review->getDescription(),
                'score' => $review->getScore(),
                'date' => $review->getdate(),
                'id_restaurant' => $review->getid_restaurant(),
                'id_utilisateur' => $review->getid_utilisateur(),
                'nom' => $review->getNom(),
                'id_review' => $id_review
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>