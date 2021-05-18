<?php
include "../controller/CommandeC.php";

$AlimentC = new CommandeC();
if (isset($_POST["id_commande"])) {
    $AlimentC->supprimerCommande($_POST["id_commande"]);
    header('Location:afficherCommandes.php');
}
?>