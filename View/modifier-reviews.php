<?php 
include '../Controller/ReviewC.php';
$Review= new ReviewC();
if (
    isset($_POST["id1"]) &&
    isset($_POST["nom1"]) &&
    isset($_POST["description1"]) &&
    isset($_POST["score1"])
) {
    if (
        !empty($_POST["id1"]) &&
        !empty($_POST["nom1"]) &&
        !empty($_POST["description1"]) &&
        !empty($_POST["score1"])
        
    ) {
        $user = new Review(
            $_POST['nom1'],
            $_POST['description1'],
            intval($_POST['score1']),
            date("Y/m/d")
        );
        
        $Review->modifierReview($user,$_POST['id1']);
        header('location:dashboard-reviews.php');
        
    }
else
$error="Missing information";
}
?>