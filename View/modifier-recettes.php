<?php 
include '../Controller/RecettesC.php';
$Recette= new RecetteC();
if (
    isset($_POST["id1"]) &&
    isset($_POST["nom1"]) &&
    isset($_POST["description1"]) &&
    isset($_POST["ingredients1"]) &&
    isset($_POST["specialite1"]) &&
    isset($_POST["image1"])
) {
    if (
        !empty($_POST["id1"]) &&
        !empty($_POST["nom1"]) &&
        !empty($_POST["description1"]) &&
        !empty($_POST["ingredients1"]) &&
        !empty($_POST["specialite1"]) &&
        !empty($_POST["image1"])
        
    ) {
        $user = new Recettes(
            $_POST['nom1'],
            $_POST['ingredients1'],
            $_POST['description1'],
            $_POST['specialite1'],
            $_POST['image1'],
        );
        
        $Recette->modifierRecette($user,$_POST['id1']);
        header("location:dashboard-recettes.php");
        
        
    }
else
$error="Missing information";
}
?>