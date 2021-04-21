<?php 
include '../Controller/restaurantC.php';
$Restaurant= new restaurantC();
if (
    isset($_POST["id1"]) &&
    isset($_POST["nom1"]) &&
    isset($_POST["description1"]) &&
    isset($_POST["score1"]) &&
    isset($_POST["specialite1"]) &&
    isset($_POST["localisation1"]) &&
    isset($_POST["num_tel1"]) &&
    isset($_POST["image1"])
) {
    if (
        !empty($_POST["id1"]) &&
        !empty($_POST["nom1"]) &&
        !empty($_POST["description1"]) &&
        !empty($_POST["score1"]) &&
        !empty($_POST["specialite1"]) &&
        !empty($_POST["localisation1"]) &&
        !empty($_POST["num_tel1"]) &&
        !empty($_POST["image1"])
        
    ) {
        $user = new restaurant(
            $_POST['nom1'],
            $_POST['description1'],
            intval($_POST['score1']),
            $_POST['specialite1'],
            $_POST['localisation1'],
            intval($_POST['num_tel1']),
            $_POST['image1'],
        );
        
        $Restaurant->modifierRestaurant($user,$_POST['id1']);
        header('location:dashboard-restaurants.php');
        
    }
else
$error="Missing information";
}
?>