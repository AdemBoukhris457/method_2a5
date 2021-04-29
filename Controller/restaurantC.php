<?php 
    include_once "../config.php";
    require_once "../Model/restaurant.php";
class restaurantC {

    public function afficherRestaurants()
    {  $sql= " SELECT * FROM restaurants" ; 
      $db = config ::getConnexion();
      try{
        $listeresto = $db->query($sql);
        return $listeresto ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }
     public function ajouterRestaurant($restaurant)
     {
         
         $sql ="INSERT into restaurants (nom,description,score,specialite,localisation,num_tel,image)
         VALUES (:nom,:description,:score,:specialite,:localisation,:num_tel,:image)";
         $db=config::getConnexion();
 
         try
         {
             $query=$db->prepare($sql);
             $query->execute([
                 'nom'=>$restaurant->getNom(),
                 'description'=>$restaurant->getDescription(),
                 'score'=>$restaurant->getScore(),
                 'specialite'=>$restaurant->getSpecialite(),
                 'localisation'=>$restaurant->getLocalisation(),
                 'num_tel'=>$restaurant->getNum_tel(),
                 'image'=>$restaurant->getImage(),
                 
             ]);
         }
         catch(Exception $e)
         {
             die('Erreur: '.$e->getMessage());
         }
     }
     function supprimerRestaurant($id)
    {
			$sql="DELETE FROM restaurants WHERE id_restaurant= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
	}
    public function modifierRestaurant(restaurant $restaurant,$id_restaurant){
        try {
            $db = config::getConnexion();
            $nom=$restaurant->getNom();
            $query = $db->prepare(
                'UPDATE restaurants SET nom = :nom,
                description = :description,
                score = :score,
                specialite = :specialite,
                localisation = :localisation,
                num_tel = :num_tel,
                image = :image where id_restaurant = :id_restaurant'
            );
            $query->execute([ 
                'description' => $restaurant->getDescription(),
                'score' => $restaurant->getScore(),
                'specialite' => $restaurant->getSpecialite(),
                'localisation' => $restaurant->getLocalisation(),
                'num_tel' => $restaurant->getNum_tel(),
                'image'=> $restaurant->getImage(),
                'nom' => $nom,
                'id_restaurant' => $id_restaurant
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (Exception $e) {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function modifresto(restaurant $restaurant, $nom){
        $description= $restaurant->getDescription();
        $score= $restaurant->getScore();
        $specialite =$restaurant->getSpecialite();
        $localisation =$restaurant->getLocalisation();
        $num_tel=$restaurant->getNum_tel();
        $image=$restaurant->getImage();
        $db= config::getConnexion();
        $sql="UPDATE restaurants SET description = :description,score = :score,specialite = :specialite,localisation = :ocalisation,num_tel = :num_tel,image = :image where nom = :nom "; 
        $req=$db->prepare($sql);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':description',$$description);
        $req->bindValue(':specialite',$specialite);
        $req->bindValue(':score',$score);
        $req->bindValue(':localisation',$localisation);
        $req->bindValue(':image',$image);
        $req->bindValue(':num_tel',$num_tel);

        try{
            $req->execute();

        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }



    }
    function recupererRestaurant($nom){
        $sql='SELECT * from restaurants where nom = "'.$nom.'"';
        $db = config::getConnexion();
        try{
            $listeresto = $db->query($sql);
            return $listeresto ;

      } catch (Exception $e) {die ('erreur : '.$e->getMessage());}
    
     }
    

function count_table(){
    $sql="SELECT count(*) as total from restaurants";
    $db = config::getConnexion();
    try{
        $query=$db->prepare($sql);
        $query->execute();
        $num=$query->fetch();
        return $num;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }

}


}
?>