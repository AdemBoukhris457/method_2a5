<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";


$RestaurantC =new restaurantC;
$listeResto = $RestaurantC->afficherRestaurants();
?>
<?php

$error = "";
$error1="";
$error2="";
$error3="";


// create user
$check=false;
$user = null;
$RestaurantC = new restaurantC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["score"]) &&
    isset($_POST["specialite"]) &&
    isset($_POST["localisation"]) &&
    isset($_POST["num_tel"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["score"]) &&
        !empty($_POST["specialite"]) &&
        !empty($_POST["localisation"]) &&
        !empty($_POST["num_tel"]) &&
        !empty($_POST["image"])
        
    ) {
        $upper=$_POST["nom"][0];
        if(ctype_upper($upper) && $_POST["score"]>=0 && $_POST["score"]<=5 && is_numeric($_POST["specialite"])==false  && is_numeric($_POST["specialite"])==false){
        $check=true;
        }
            if(ctype_upper($upper)==false || is_numeric($_POST["nom"])==true)
            {
                $error1="Entrer un nom majuscule";
            }
            if($_POST["score"]>5 || $_POST["score"]<0){
                $error2="Entrer un score entre 0 et 5";
            }
            if(is_numeric($_POST["specialite"])==true){
                $error3="Verifier le champ specialité";
            }
        $user = new restaurant(
            $_POST['nom'],
            $_POST['description'],
            intval($_POST['score']),
            $_POST['specialite'],
            $_POST['localisation'],
            intval($_POST['num_tel']),
            $_POST['image'],
        );
        if($_POST['action'] == 'Ajouter'&&$check) {
            $RestaurantC->ajouterRestaurant($user);
            header('location:dashboard-restaurants.php');
        }
        
    }
  else
        $error= "Missing information";
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
        .error{
			border: 1px solid;
			margin: 10px 0px;
			padding: 15px 10px 15px 50px;
            color: #D8000C;
			background-color: #FFBABA;
			background-image: url('https://i.imgur.com/GnyDvKN.png');
            background-repeat: no-repeat;
			background-position: 10px center;
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
              <h3 class="secondary-heading">Ajouter un restaurant</h3>
                <form action="#" method="POST">
                                        <table class="table">
                                        <tr>
                                                        <td>
                                                        <label for="nom">Nom:
                                                </label>
                                                </td>
                                                <td><input type="text" class="form-control" name="nom" id="nom" maxlength="50" placeholder="Entrer un nom majuscule"><?php if(isset($error1)&&!empty($error1)){ ?> <div class="error"><?php echo $error1;} ?></div>
                                            </td>
                                                <tr>
                                                <td>
                                                <label for="description">Description:
                                                </label>
                                                </td>
                                                <td><textarea class="form-control" type="textarea" name="description" id="description" cols="30" rows="10" ></textarea></td>
                                                </tr>
                        
                                                <tr>
                                                <td>
                                                <label for="score">Score:
                                                </label>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="score" id="score" placeholder="Entre 0 et 5" autofocus><?php if(isset($error2)&&!empty($error2)){ ?> <div class="error"><?php echo $error2;} ?></div>
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    <label for="specialite">Specialité:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="specialite" id="specialite"autofocus><?php if(isset($error3)&&!empty($error3)){ ?> <div class="error"><?php echo $error3;} ?></div>
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="localisation">Localisation:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="localisation" id="localisation">
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="num_tel">Numéro Telephone:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="tel" class="form-control" name="num_tel" id="num_tel" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" placeholder="93-345-678">
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="image">Image:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" name="image" id="image">
                                                </td>
                                                                </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td >
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