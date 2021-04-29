<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";

$ReviewC = new ReviewC();
$listeReviews = $ReviewC->afficherReviews();
$RestaurantC =new restaurantC;
$listeResto = $RestaurantC->afficherRestaurants();
?>
<?php

$error = "";

// create user
$check=false;
$user = null;
$ReviewC = new ReviewC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["score"])&&
    isset($_POST['id_restaurant'])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["score"]) &&
        !empty($_POST["id_restaurant"])
      
        
    ) {
        $upper=$_POST["nom"][0];
        if(ctype_upper($upper) && $_POST["score"]>=0 && $_POST["score"]<=5 && is_numeric($_POST["nom"])==false){
        $check=true;
        }
            if(ctype_upper($upper)==false)
            {
                $error.="Entrer un nom majuscule\n";
            }
            if($_POST["score"]>5 || $_POST["score"]<0){
                $error.="Entrer un score entre 0 et 5\n";
            }
            
        $user = new Review(
            $_POST['nom'],
            $_POST['description'],
            intval($_POST['score']),
            date("Y/m/d"),
            ($_POST['id_restaurant'])
            
        );
        if($_POST['action'] == 'Ajouter' && $check==true) {
            $ReviewC->ajouterReview($user);
            header('location:home.php');
        }
        
    }
  else
        $error = "Missing information";
}


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>recipes for days</title>
  <meta name="description" content="Free Bootstrap Theme by uicookies.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
  <link rel="stylesheet" href="css/styles-merged.css">
  <link rel="stylesheet" href="css/style.min.css">

  <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style>
        body{
            margin: 0;
            padding: 0;
            background-image: url(img/hero_bg_2.jpg);
            background-size: cover;
            background-position: center;
           font-family: sans-serif;
        }
    </style>
</head>

<body>

  <!-- Fixed navbar -->

  <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html" title="uiCookies:FineOak">FineOak</a>
      </div>

      <div id="navbar-collapse" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="./afficherAlimentss.php" style="font-size:12px;">produits/recettes</a></li>
          <li><a href="#" data-nav-section="specialties" style="font-size:12px;">restaurants/reviews</a></li>
          <li><a href="#" data-nav-section="menu" style="font-size:12px;">evenements/workshop</a></li>
          <li><a href="#" data-nav-section="reservation" style="font-size:12px;">commandes</a></li>
          <li><a href="#" data-nav-section="events" style="font-size:12px;">Events</a></li>
          <li><a href="#" data-nav-section="contact" style="font-size:12px;">Contact</a></li>
          <li><a href="#" data-nav-section="events" style="font-size:12px;">Events</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <section class="flexslider" data-section="welcome">
  <div class="container">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <div class="probootstrap-slider-text probootstrap-animate probootstrap-heading">
              <h4><?php echo nl2br($error); ?></h4>
              <h3 class="secondary-heading">Ajouter un review</h3>
                <form action="#" method="POST">
                                        <table class="table">
                                            <tr>
                                                <td>
                                                <label style="color:honeydew" for="nom">Nom:
                                                    </label>
                                                </td>
                                                <td><input type="text" name="nom" id="nom" maxlength="20" placeholder="Entrer un nom majuscule"></td>
                                            <tr>
                                                <td>
                                                    <label  style="color:honeydew"for="description">Description:
                                                    </label>
                                                </td>
                                                <td><textarea class="form-control" type="textarea" name="description" id="description" cols="30" rows="10" ></textarea></td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label style="color:honeydew" for="score">Score:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="number" name="score" id="score" placeholder="Entre 0 et 5">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <label style="color:honeydew" for="score">Restaurant_Id:
                                                    </label>
                                                </td>
                                                <td>
                                                <select name="id_restaurant" id="id_restaurant">
                                                    <?PHP
                                                     foreach ($listeResto as $us) {
                                                    ?>
                                                     <option value="<?PHP echo $us['id_restaurant']; ?>"><?PHP echo $us['id_restaurant'] ,' Nom du restaurant : ',$us['nom']; ?></option>
                                                     <?PHP
                                                    }
                                                    ?>
                                                </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <input type="submit" value="Ajouter" name="action" class="btn-primary btn-lg">
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                
              </div>
            </div>
          </div>
        </div>

      </li>
  </section>

  <script src="js/scripts.min.js"></script>
  <script src="js/custom.min.js"></script>

</body>

</html>