<?php 
    include "../config.php";
    include '../model/Recettes.php';

    class RecetteC {

        function ajouterRecette($Recette){
            $sql = "INSERT INTO recettes (nom, ingredients, description, specialite, image, id_utilisateur) 
			VALUES (:nom,:ingredients,:description, :specialite, :image, :id_utilisateur)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);

                $query->execute([
                    'nom' => $Recette->getNom(),
                    'ingredients' => $Recette->getIngrediants(),
                    'description' => $Recette->getDescription(),
                    'specialite' => $Recette->getSpec(),
                    'image' =>$Recette->getImage(),
                    'id_utilisateur' => $Recette->getId_utilisateur()
                ]);
            }
            catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            }
        }

        function afficherRecettes(){
            $sql = "SELECT * FROM recettes";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } 
            catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
        }

        function supprimerRecette($id_recette){
            $sql = "DELETE FROM recettes WHERE id_recette= :id_recette";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id_recette', $id_recette);
            try {
                $req->execute();
            }
            catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
        }
        function modifierRecette($Recette, $id_recette){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                'UPDATE recettes SET 
				        	nom = :nom, 
					        ingredients = :ingredients,
					        description = :description,
					        specialite = :specialite,
                            image = :image WHERE id_recette = :id_recette'
                );
                $query->execute([
                    'nom' => $Recette->getNom(),
                    'ingredients' => $Recette->getIngrediants(),
                    'description' => $Recette->getDescription(),
                    'specialite' => $Recette->getSpec(),
                    'image' => $Recette->getImage(),
                    'id_recette' => $id_recette
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } 
            catch(Exception $e)
         {
             die('Erreur: '.$e->getMessage());
         }
        }

        function showRecette($id_recette){
            $sql = "SELECT * from recettes where id_recette=$id_recette";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);
                $query->execute();

                $user = $query->fetch();
                return $user;
            } 
            catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
        }
    }
?>