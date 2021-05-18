<?php 
    include "../config.php";
    require_once '../model/Recettes.php';

    class RecetteC {

        function ajouterRecette($Recette){
            $sql = "INSERT INTO recettes (nom, ingredients, description, specialite, image, id_produit) 
			VALUES (:nom,:ingredients,:description, :specialite, :image, :id_produit)";
            $db = config::getConnexion();
            try {
                $query = $db->prepare($sql);

                $query->execute([
                    'nom' => $Recette->getNom(),
                    'ingredients' => $Recette->getIngrediants(),
                    'description' => $Recette->getDescription(),
                    'specialite' => $Recette->getSpec(),
                    'image' => $Recette->getImage(),
                    'id_produit' => $Recette->getIDproduit(),
                ]);
            }
            catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
            }
        }

        function afficherRecette(){
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
    function afficherRecettetri()
    {
        $sql = "SELECT * FROM recettes order by nom";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    
        function afficherProd()
        {
            $sql = "SELECT * FROM produits";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
            }
        }

    function supprimerRecette($id)
    {
        $sql = "DELETE FROM Recettes WHERE id_recette=$id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
        function modifierRecette($Recette, $id){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                'UPDATE recettes SET 
				        	nom = :nom, 
					        ingredients = :ingredients,
					        description = :description,
					        specialite = :specialite,
                            image = :image,
                            id_produit = :id_produit
					WHERE id_recette = :id_recette'
                );
                $query->execute([
                    'nom' => $Recette->getNom(),
                    'ingredients' => $Recette->getIngrediants(),
                    'description' => $Recette->getDescription(),
                    'specialite' => $Recette->getSpec(),
                    'image' => $Recette->getImage(),
                    'id_produit' => $Recette->getIDproduit(),
                    'id_recette' => $id
                ]);
                echo $query->rowCount() . " records UPDATED successfully <br>";
            } 
            catch (PDOException $e) {
            $e->getMessage();
            }
        }

        function showUtilisateur($id){
            $sql = "SELECT * from recettes where id_recette=$id";
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
    function afficherpagin($start_from, $num_per_page)
    {
        $sql = "SELECT * FROM recettes limit $start_from,$num_per_page";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function recupererUtilisateur($id)
    {
        $sql = "SELECT * from recettes where id_recette=$id";
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
    function afficherrech($valueToSearch)
    {
        $sql = "SELECT * FROM recettes WHERE CONCAT(`nom`, `specialite`, `description`) LIKE '%" . $valueToSearch . "%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
        
    }
?>