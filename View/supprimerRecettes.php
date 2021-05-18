<?php
include "../controller/RecettesC.php";

$AlimentC = new RecetteC();
if (isset($_POST["id_recette"])) {
    $AlimentC->supprimerRecette($_POST["id_recette"]);
    header('Location:afficherRecette.php');
}
?>
