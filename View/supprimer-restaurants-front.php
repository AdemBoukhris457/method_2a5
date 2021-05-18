<?php

include '../Controller/restaurantC.php';
$restaurant = new restaurantC();

if ($_POST["action"] == "View") {
    header('location:restaurant-view.php');
}
if (isset($_POST["id_restaurant"]) && $_POST["action"] == "supprimer") {
    $restaurant->supprimerRestaurant($_POST["id_restaurant"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

?>

