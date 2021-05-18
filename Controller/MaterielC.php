<?php 
    include "../config.php";
    require_once '../Model/Produit.php';

    class MaterielC {
        function ajouterMateriel($materiel){
            $sql="INSERT INTO materiels (nom, description, image, prix, id_utilisateur) 
            VALUES (:nom,:description,:image,:prix,:id_utilisateur)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'nom'=> $materiel->getNom(),
                    'description' => $materiel->getDescription(),
                    'image' => $materiel->getImage(),
                    'prix' => $materiel->getPrix(),
                    'id_utilisateur' => $materiel->getId_utilisateur(),
                ]);
            }
            catch (Exception $e){
                    echo 'Erreur: ' . $e->getMessage();
            }
        }

        function afficherMateriels(){
            $sql = "SELECT * FROM materiels";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }	
        }
    function afficherMaterielsutilisateur($id_utilisateur)
    {
        $sql = "SELECT * FROM materiels WHERE id_utilisateur=$id_utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherProduitsUtilisateur($id_utilisateur)
    {
        $sql = "SELECT * FROM produits WHERE id_utilisateur=$id_utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherrech($valueToSearch)
    {
        $sql = "SELECT * FROM produits WHERE CONCAT(`nom`, `nb_calories`, `poids`, `description`) LIKE '%" . $valueToSearch . "%'";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function affichertri()
    {
        $sql = "SELECT * FROM produits order by nom";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherpagin($start_from, $num_per_page)
    {
        $sql = "SELECT * FROM produits limit $start_from,$num_per_page";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherpagin1($start_from, $num_per_page,$idd)
    {
        $sql = "SELECT * FROM produits where id_utilisateur=$idd limit $start_from,$num_per_page";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherpagintri($start_from, $num_per_page)
    {
        $sql = "SELECT * FROM produits order by nom limit $start_from,$num_per_page";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function aff()
    {
        $sql = "SELECT COUNT(*) FROM produits";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
        function supprimerMateriel($id){
            $sql = "DELETE FROM materiels WHERE id_materiel=$id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            try {
                $req->execute();
            } 
            catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        function modifierMateriel($materiel, $id_materiel){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                'UPDATE materiels SET 
					    	nom = :nom, 
						    description = :description,
						    image = :image,
                            prix = :prix,
                            id_utilisateur = :id_utilisateur
					    WHERE id_materiel = :id_materiel'
                );
                $query->execute([
                    'nom' => $materiel->getNom(),
                    'description' => $materiel->getDescription(),
                    'image' => $materiel->getImage(),
                    'prix' => $materiel->getPrix(),
                    'id_utilisateur' => $materiel->getId_utilisateur(),
                    'id_materiel' =>  $id_materiel
                ]);
                    echo $query->rowCount() . " records UPDATED successfully <br>";
            } 
            catch (PDOException $e) {
            $e->getMessage();
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
        $sql = "SELECT * from materiels where id_materiel=$id";
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
        $sql = "SELECT * from produits where id_produit=$id";
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