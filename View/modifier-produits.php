<?php 
include '../Controller/ProduitC.php';
$produit= new ProduitC();
if (
    isset($_POST["id1"]) &&
    isset($_POST["nom1"]) &&
    isset($_POST["description1"]) &&
    isset($_POST["nb_calories1"]) &&
    isset($_POST["poids1"]) &&
    isset($_POST["image1"])
) {
    if (
        !empty($_POST["id1"]) &&
        !empty($_POST["nom1"]) &&
        !empty($_POST["description1"]) &&
        !empty($_POST["nb_calories1"]) &&
        !empty($_POST["poids1"]) &&
        !empty($_POST["image1"])
        
    ) {
        $user = new Produit(
            $_POST['nom1'],
            $_POST['nb_calories1'],
            intval($_POST['poids1']),
            $_POST['description1'],
            $_POST['image1'],
        );
        
        $produit->modifierProduit($user,$_POST['id1']);
        header("location:dashboard-produits.php");
        
    }
else
$error="Missing information";
}
?>