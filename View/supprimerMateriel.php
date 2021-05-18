<?php
include "../controller/MaterielC.php";

$AlimentC = new MaterielC();
if (isset($_POST["id_materiel"])) {
    $AlimentC->supprimerMateriel($_POST["id_materiel"]);
    header('Location:affichermateriel.php');
}
?>