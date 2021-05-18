<?php
   
   include '../Controller/ReviewC.php';
   $review = new ReviewC() ;
       if (isset($_POST["id_review"])){
       $review->supprimerReview($_POST["id_review"]);
       header('Location:dashboard-reviews.php');
   }
?>