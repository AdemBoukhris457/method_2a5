<?php
include "../config.php";
require_once '../Model/Blog.php';

class  BlogC
{
    function ajouterBlog($Prod)
    {
        $sql = "INSERT INTO Blog (titre, citation,image, date , id_utilisateur) 
            VALUES (:titre,:citation,:image,:date,:id_utilisateur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);

            $query->execute([
                'titre' => $Prod->getTitre(),
                'citation' => $Prod->getCitation(),
                'image' => $Prod->getImage(),
                'date' => $Prod->getDate(),
                'id_utilisateur' => $Prod->getId_utilisateur(),
            ]);
        } catch (Exception $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    function afficherBlog()
    {
        $sql = "SELECT * FROM Blog";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function afficherBlogutilisateur($id_utilisateur)
    {
        $sql = "SELECT * FROM Blog where id_utilisateur=$id_utilisateur";
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
    function supprimerBlog($id)
    {
        $sql = "DELETE FROM Blog WHERE id_Blog=$id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        try {
            $req->execute();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierBlog($Prod, $id_blog)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Blog SET 
					    	titre = :titre, 
						    citation = :citation,
                            image = :image,
						    date = :date,
                            id_utilisateur = :id_utilisateur
					    WHERE id_blog = :id_blog'
            );
            $query->execute([
                'titre' => $Prod->getTitre(),
                'citation' => $Prod->getCitation(),
                'image' => $Prod->getImage(),
                'date' => $Prod->getDate(),
                'id_utilisateur' => $Prod->getId_utilisateur(),
                'id_blog' => $id_blog
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
        $sql = "SELECT * from Blog where id_blog=$id";
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