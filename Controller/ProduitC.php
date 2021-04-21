<?php 
    include "../config.php";
    require_once '../Model/Produit.php';

    class ProduitC {
        function ajouterProduit($Prod){
            $sql="INSERT INTO produits (nom, nb_calories, poids, description , image , id_utilisateur) 
            VALUES (:nom,:nb_calories,:poids,:description,:image,:id_utilisateur)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom'=>$Prod->getNom(),
                    'nb_calories'=>$Prod->getNC(),
                    'poids' => $Prod->getPoids(),
                    'description' => $Prod->getDescription(),
                    'image' => $Prod->getImage(),
                    'id_utilisateur' => $Prod->getId_utilisateur(),
                ]);
            }
            catch (Exception $e){
                    echo 'Erreur: ' . $e->getMessage();
            }
        }

        function afficherProduits(){
            $sql = "SELECT * FROM produits";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }	
        }

        function supprimerProduit($nom){
            $sql = "DELETE FROM produits WHERE nom=$nom";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            try {
                $req->execute();
            } 
            catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        function modifierProduit(Produit $Prod, $id_produit){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                        'UPDATE produits SET 
					    	nom = :nom, 
						    nb_calories = :nb_calories,
						    poids = :poids,
						    description = :description,
						    image = :image WHERE id_produit = :id_produit'
                );
                $query->execute([
                    'nom' => $Prod->getNom(),
                    'nb_calories' => $Prod->getNC(),
                    'poids' => $Prod->getPoids(),
                    'description' => $Prod->getDescription(),
                    'image' => $Prod->getImage(),
                    'id_produit' => $id_produit
                ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
            } 
            catch (Exception $e) {
                die('Erreur: '.$e->getMessage());
            }
        }

        function showProduit($nom){
            $sql = "SELECT * from produits where nom=$nom";
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
    function recupererUtilisateur($id)
    {
        $sql = "SELECT * from utilisateur where id_utilisateur=$id";
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

    function recupererUtilisateur1($id)
    {
        $sql = "SELECT * from produits where id_aliment=$id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $user = $query->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    }
?>