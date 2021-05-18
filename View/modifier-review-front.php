<?php 
    include '../Controller/restaurantC.php';
    include '../Controller/ReviewC.php';
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {

    $Restaurant= new ReviewC();
    if (
        isset($_POST["id_review"]) &&
        isset($_POST["nom1"]) &&
        isset($_POST["description1"]) &&
        isset($_POST["score1"]) &&
        isset($_POST["id_restaurant"]) &&
        isset($_POST["id_utilisateur"])
    ) {
        if (
            !empty($_POST["id_review"]) &&
            !empty($_POST["nom1"]) &&
            !empty($_POST["description1"]) &&
            !empty($_POST["score1"]) &&
            !empty($_POST["id_restaurant"]) &&
            !empty($_POST["id_utilisateur"])
        ) {
            
            
            $upper=$_POST["nom1"][0];
            if(ctype_upper($upper) && $_POST["score1"]>=0 && $_POST["score1"]<=5  ){
            $check=true;
            }
                if(ctype_upper($upper)==false)
                {
                    $error1="Entrer un nom majuscule";
                }
                if($_POST["score1"]>5 || $_POST["score1"]<0){
                    $error2="Entrer un score entre 0 et 5";
                }
                
            $user = new Review(
                $_POST['nom1'],
                $_POST['description1'],
                intval($_POST['score1']),
                date("Y/m/d"),
                $_POST['id_restaurant'],
                $_POST['id_utilisateur']
            );
            if($_POST["action"] =="Modif"&&$check){
            $Restaurant->modifierReview($user,$_POST["id_review"]);
            header('location:afficherrestaurantseul.php'.'?id_restaurant=' .$_POST['id_restaurant']);
            }
            
        }
    else
    $error="Missing information";
    }
}
?>
