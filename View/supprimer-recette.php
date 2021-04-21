<?php
   
   include '../Controller/RecettesC.php';
   $recette = new RecetteC();
       if (isset($_POST["id_recette"])){
       $recette->supprimerRecette($_POST['id_recette']);
       header('Location:dashboard-recettes.php');
   }
?>