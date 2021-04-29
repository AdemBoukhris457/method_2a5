<?php
   
   include '../Controller/restaurantC.php';
   include '../Controller/ReviewC.php';
   $restaurant = new ReviewC() ;
       if (isset($_POST["id_review"])&& $_POST["action"] == "supprimer" ){
       $restaurant->supprimerReview($_POST["id_review"]);
       header('Location:afficher-review-front.php');
   }
   else{
       $id=$_POST['id_review'];
   
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modifier Restaurants</title>
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
        label{
            color:white;
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
              <h3 class="secondary-heading">Modifier Restaurant</h3>
                <form action="modifer-review-front.php" method="POST">
                                    <table class="table">
                                        <tr>
                                                        <td>
                                                        <label for="nom">Nom:
                                                </label>
                                                </td>
                                                <td><input type="text" class="form-control" name="nom1" id="nom1" maxlength="50" placeholder="Entrer un nom majuscule"><?php if(isset($error1)&&!empty($error1)){ ?> <div class="error"><?php echo $error1;} ?></div>
                                            </td>
                                        </tr>
                                                <tr>
                                                <td>
                                                <label for="description">Description:
                                                </label>
                                                </td>
                                                <td><textarea class="form-control" type="textarea" name="description1" id="description1" cols="30" rows="10" ></textarea></td>
                                                </tr>
                        
                                                <tr>
                                                <td>
                                                <label for="score">Score:
                                                </label>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="score1" id="score1" placeholder="Entre 0 et 5" autofocus><?php if(isset($error2)&&!empty($error2)){ ?> <div class="error"><?php echo $error2;} ?></div>
                                                </td>
                                                </tr>
                                                
                                                    <input type="hidden" value=<?PHP echo $_POST['id_review']; ?> name="id_review">
                                                </td>
                                                                </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td >
                                                                            <input type="submit" value="Modif" name="action" class="btn-primary btn-lg">
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
<?php } ?>
</body>

</html>