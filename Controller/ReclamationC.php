<?php 
    include "../config.php";
    require_once '../Model/Reclamation.php';

    class  ReclamationC {
        function ajouterReclamation($Prod){
            $sql= "INSERT INTO reclamations (titre, citation, date , id_utilisateur) 
            VALUES (:titre,:citation,:date,:id_utilisateur)";
            $db = config::getConnexion();
            try{
                $query = $db->prepare($sql);

                $query->execute([
                    'titre'=>$Prod->getTitre(),
                    'citation'=>$Prod->getCitation(),
                    'date' => $Prod->getDate(),
                    'id_utilisateur' => $Prod->getId_utilisateur(),
                ]);
            }
            catch (Exception $e){
                    echo 'Erreur: ' . $e->getMessage();
            }
        }

        function afficherreclamations(){
            $sql = "SELECT * FROM reclamations";
            $db = config::getConnexion();
            try {
                $liste = $db->query($sql);
                return $liste;
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }	
        }
    function afficherreclamationsutilisateur($id_utilisateur)
    {
        $sql = "SELECT * FROM reclamations WHERE id_utilisateur=$id_utilisateur";
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
        function supprimerReclamation($id){
            $sql = "DELETE FROM reclamations WHERE id_reclamation=$id";
            $db = config::getConnexion();
            $req = $db->prepare($sql);
            try {
                $req->execute();
            } 
            catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

        function modifierReclamation($Prod, $id_reclamation){
            try {
                $db = config::getConnexion();
                $query = $db->prepare(
                'UPDATE reclamations SET 
					    	titre = :titre, 
						    citation = :citation,
						    date = :date,
                            id_utilisateur = :id_utilisateur
					    WHERE id_reclamation = :id_reclamation'
                );
                $query->execute([
                'titre' => $Prod->getTitre(),
                'citation' => $Prod->getCitation(),
                'date' => $Prod->getDate(),
                'id_utilisateur' => $Prod->getId_utilisateur(),
                'id_reclamation' => $id_reclamation
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
        $sql = "SELECT * from reclamations where id_reclamation=$id";
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
