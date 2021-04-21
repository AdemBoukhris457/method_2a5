<?php
include "../controller/ProduitC.php";

$AlimentC = new ProduitC();
if (isset($_POST["id_produit"])) {
    $AlimentC->supprimerProduit($_POST["id_produit"]);
    header('Location:afficherAlimentss.php');
}
?>