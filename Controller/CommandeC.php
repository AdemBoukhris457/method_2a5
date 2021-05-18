<?php
include "../config.php";
require_once '../Model/Commande.php';

class  CommandeC
{
    function ajouterCommande($Prod)
    {
        $sql = "INSERT INTO commande (materiel, quantite, date, id_utilisateur) 
            VALUES (:materiel,:quantite,:date,:id_utilisateur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'materiel' => $Prod->getMateriel(),
                'quantite' => $Prod->getquantite(),
                'date' => $Prod->getDate(),
                'id_utilisateur' => $Prod->getId_utilisateur(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }
    function afficherNomMateriel()
    {
        $sql = "SELECT * FROM materiels";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherCommandes($id_utilisateur)
    {
        $sql = "SELECT * FROM commande where id_utilisateur=$id_utilisateur";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherCommandesadmin()
    {
        $sql = "SELECT * FROM commande ";
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
    function afficherpagin1($start_from, $num_per_page, $idd)
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
    function supprimerCommande($id)
    {
        $sql = "DELETE FROM commande WHERE id_commande=$id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierCommande($Prod, $id_commande)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE commande SET 
					    	materiel = :materiel, 
						    quantite = :quantite,
						    date = :date,
                            id_utilisateur = :id_utilisateur
					    WHERE id_commande = :id_commande'
            );
            $query->execute([
                'materiel' => $Prod->getMateriel(),
                'quantite' => $Prod->getquantite(),
                'date' => $Prod->getDate(),
                'id_utilisateur' => $Prod->getId_utilisateur(),
                'id_commande' => $id_commande
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showProduit($nom)
    {
        $sql = "SELECT * from produits where nom=$nom";
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
    function recupererUtilisateur($id)
    {
        $sql = "SELECT * from commande where id_commande=$id";
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
