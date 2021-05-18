<?php
   
   include '../Controller/restaurantC.php';
   $restaurant = new restaurantC() ;
       if (isset($_POST["id_restaurant"])){
       $restaurant->supprimerRestaurant($_POST["id_restaurant"]);
       header('Location:dashboard-restaurants.php');
   }
?>