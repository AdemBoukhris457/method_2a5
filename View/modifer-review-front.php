<?php 
    include '../Controller/restaurantC.php';
    include '../Controller/ReviewC.php';
    $Restaurant= new ReviewC();
    if (
        isset($_POST["id_review"]) &&
        isset($_POST["nom1"]) &&
        isset($_POST["description1"]) &&
        isset($_POST["score1"])
    ) {
        if (
            !empty($_POST["id_review"]) &&
            !empty($_POST["nom1"]) &&
            !empty($_POST["description1"]) &&
            !empty($_POST["score1"]) 
            
        ) {
            
            
            $upper=$_POST["nom1"][0];
            if(ctype_upper($upper) && $_POST["score1"]>=0 && $_POST["score1"]<=5  ){
            $check=true;
            }
                if(ctype_upper($upper)==false)
                {
                    $error1="Entrer un nom majuscule";
                }
                if($_POST["score1"]>5 || $_POST["score"]<0){
                    $error2="Entrer un score entre 0 et 5";
                }
                
            $user = new Review(
                $_POST['nom1'],
                $_POST['description1'],
                intval($_POST['score1']),
                date("Y/m/d"),
                35,
            );
            if($_POST["action"] =="Modif"&&$check){
            $Restaurant->modifierReview($user,$_POST["id_review"]);
            header('location:afficher-review-front.php');
            }
            
        }
    else
    $error="Missing information";
    }
?>