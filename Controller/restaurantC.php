<?php 
    include "../config.php";
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
			$sql="DELETE FROM restaurants WHERE id= :id";
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
    function modifierRestaurant($restaurant, $nom){
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE restaurants SET 
                    nom = :nom, 
                    description = :description,
                    score =:score,
                    specialite =:specialite,
                    localisation =:localisation,
                    num_tel =:num_tel,
                    image = :image,


                WHERE nom = :nom'
            );
            $query->execute([
                 'nom'=>$restaurant->getNom(),
                 'description'=>$restaurant->getDescription(),
                 'score'=>$restaurant->getScore(),
                 'specialité'=>$restaurant->getSpecialite(),
                 'localisation'=>$restaurant->getLocalisation(),
                 'num_tel'=>$restaurant->getNum_tel(),
                 'image'=>$restaurant->getImage(),
                 'nom' => $nom,
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    function recupererRestaurant($nom){
        $sql="SELECT * from restaurants where nom=$nom";
        $db = config::getConnexion();
        try{
            $query=$db->prepare($sql);
            $query->execute();

            $restaurant=$query->fetch();
            return $restaurant;
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
}



?>