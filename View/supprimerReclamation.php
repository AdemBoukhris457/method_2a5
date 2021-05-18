<?php
include "../controller/ReclamationC.php";

$AlimentC = new ReclamationC();
if (isset($_POST["id_reclamation"])) {
    $AlimentC->supprimerReclamation($_POST["id_reclamation"]);
    header('Location:afficherReclamations.php');
}
?>