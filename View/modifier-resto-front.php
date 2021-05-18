<?php 
    include '../Controller/restaurantC.php';
    include "../Controller/ReviewC.php";
    session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {
    $check = true;
    $Restaurant= new restaurantC();
    
    
    if (
        isset($_POST["id_restaurant"]) &&
        isset($_POST["nom"]) &&
        isset($_POST["description"]) &&
        isset($_POST["score"]) &&
        isset($_POST["specialite"]) &&
        isset($_POST["localisation"]) &&
        isset($_POST["num_tel"]) &&
        isset($_POST["image"]) &&
        isset($_POST["id_utilisateur"])
    ) {
        if (
            !empty($_POST["id_restaurant"]) &&
            !empty($_POST["nom"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["score"]) &&
            !empty($_POST["specialite"]) &&
            !empty($_POST["localisation"]) &&
            !empty($_POST["num_tel"]) &&
            !empty($_POST["image"]) &&
            !empty($_POST["id_utilisateur"])
        ) {
            $user = new restaurant(
                $_POST['nom'],
                $_POST['description'],
                intval($_POST['score']),
                $_POST['specialite'],
                $_POST['localisation'],
                intval($_POST['num_tel']),
                $_POST['image'],
                $_POST['id_utilisateur']
            );
            
            $Restaurant->modifierRestaurant($user,$_POST["id_restaurant"]);
            header('Location:afficherrestaurantseul.php');
            
            
        }
    else
    $error="Missing information";
    }

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
        

      nav:after {
        content: '';
        clear: both;
        display: table;
      }

      nav .logo {
        float: left;
        color: Black;
        font-size: 20px;
        font-weight: 600;
        line-height: 100px;
        padding-top: 20px;
        width: 110px;
        height: 100px;

      }
nav ul {
        float: right;
        margin-right: 40px;
        list-style: none;
        position: relative;
      }

      nav ul li {
        float: left;
        display: inline-block;
        background: transparent;
        margin: 0 5px;
      }

      nav ul li a {
        color: black;
        line-height: 70px;
        text-decoration: none;
        font-size: 18px;
        padding: 8px 15px;
      }

      nav ul li a:hover {
        color: cyan;
        border-radius: 5px;

      }

      nav ul ul li a:hover {
        box-shadow: none;
      }

      nav ul ul {
        position: absolute;
        top: 90px;
        border-top: 3px solid cyan;
        opacity: 0;
        visibility: hidden;
        transition: top .3s;
      }

      nav ul ul ul {
        border-top: none;
      }

      nav ul li:hover>ul {
        top: 70px;
        opacity: 1;
        visibility: visible;
      }

      nav ul ul li {
        position: relative;
        margin: 0px;
        width: 150px;
        float: none;
        display: list-item;
        border-bottom: 1px solid rgba(0, 0, 0, 0.3);
      }

      nav ul ul li a {
        line-height: 50px;
      }

      nav ul ul ul li {
        position: relative;
        top: -60px;
        left: 150px;
      }

      .show,
      .icon {
        display: none;
      }

      nav input {
        display: none;
      }

      .fa-plus {
        font-size: 15px;
        margin-left: 40px;
      }

      @media all and (max-width: 968px) {
        nav ul {
          margin-right: 0px;
          float: left;
        }

        nav .logo {
          padding-left: 30px;
          width: 100%;
        }

        .show+a,
        ul {
          display: none;
        }

        nav ul li,
        nav ul ul li {
          display: block;
          width: 100%;
        }

        nav ul li a:hover {
          box-shadow: none;
        }

        .show {
          display: block;
          color: white;
          font-size: 18px;
          padding: 0 20px;
          line-height: 70px;
          cursor: pointer;
        }

        .show:hover {
          color: cyan;
        }

        .icon {
          display: block;
          color: white;
          position: absolute;
          top: 0;
          right: 40px;
          line-height: 70px;
          cursor: pointer;
          font-size: 25px;
        }

        nav ul ul {
          top: 70px;
          border-top: 0px;
          float: none;
          position: static;
          display: none;
          opacity: 1;
          visibility: visible;
        }

        nav ul ul a {
          padding-left: 40px;
        }

        nav ul ul ul a {
          padding-left: 80px;
        }

        nav ul ul ul li {
          position: static;
        }

        [id^=btn]:checked+ul {
          display: block;
        }

        nav ul ul li {
          border-bottom: 0px;
        }

        span.cancel:before {
          content: '\f00d';
        }
      }
      
    </style>
</head>

<body>

  <!-- Fixed navbar -->

  <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
            <div class="container">
              <div id="navbar-collapse" class="navbar-collapse collapse">
                <div class="logo">
                  <a href="index.php"> <img src="ll.png" alt="" style="max-width: 100%; margin-bottom: 50px; "></a>
                </div>
                <input type="checkbox" id="btn">
                <ul class="nav  navbar-right">
                  <li><a href="#" style="font-size:15px; color:#B0B0B0">Recettes/Produits</a>
                    <input type="checkbox" id="btn-1">
                    <ul>
                      <li><a href="afficherrecette.php">Recettes</a></li>
                      <li><a href="afficherproduit.php">Produits</a></li>
                    </ul>
                  </li>
                  <li>
                    <a href="afficherrestaurantseul.php" style="font-size:15px; color:#B0B0B0">Restaurants</a>
                  </li>
                  <li>
                    <a href="afficherEvenements.php" style="font-size:15px; color:#B0B0B0">Evenements</a>
                  </li>
                  <li>
                    <a href="#" style="font-size:15px; color:#B0B0B0">Materiels/Commandes</a>
                    <input type="checkbox" id="btn-1">
                    <ul>
                      <li><a href="affichermateriel.php">Materiels</a></li>
                      <li><a href="afficherCommandes.php">Commandes</a></li>
                    </ul>
                  </li>
                  <li><a href="#" style="font-size:15px; color:#B0B0B0">Blog/Reclamations</a>
                    <input type="checkbox" id="btn-1">
                    <ul>
                      <li><a href="afficherBlog.php">Blog</a></li>
                      <li><a href="afficherReclamations.php">Reclamations</a></li>
                    </ul>
                  </li>
                  <li><a href="deconnexion.php" style="font-size:15px; color:#B0B0B0">se deconnecter</a></li>
                </ul>
              </div>
            </div>
          </nav>


  <br>
    <br>
    
    <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center probootstrap-animate">
          <?php 
          if (isset($_POST['id_restaurant'])) {
            $RestaurantC = new restaurantC();
            $resto = $RestaurantC->recupererRestaurantid($_POST['id_restaurant'],);
            foreach ($resto as $comment) {
          ?>
        <div class="probootstrap-heading dark">
                                <h1 class="primary-heading"><?PHP echo $comment['nom']; ?></h1>
                                <span class="date">
                                    <?PHP echo $comment['score']; ?> etoiles
                                </span>
                                <span class="seperator">* * *</span>
                                <div>
                                <p class="date">
                                    Specialité : <?PHP echo $comment['specialite']; ?>
                                </p>
                                
                                <span class="seperator">* * *</span>
                                </div>
                            </div>
                            <p><?PHP echo $comment['description']; ?> </p> <h5 style="font-size: 20px;"> <?php 
                            $reviews = new ReviewC();
                            $nb_reviews=$reviews->count_reviews_per_restaurant($comment["id_restaurant"]);
                            foreach($nb_reviews as $views)
                            echo $views;
                            ?> Reviews</h4>
                           
                            <p><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="probootstrap-custom-link">Retour</a></p>
                            
        <?php } }?>
        </div>
        <div class="col-md-6 col-md-push-1 probootstrap-animate">
          <form action="#" method="POST" class="probootstrap-form" name="fs" id="form">
            <div class="form-group">
              <label for="c_name">Nom du restaurant</label>
              <div class="form-field">
                <input type="text"  name="nom" class="form-control" id="nom">
              </div>
              <?php if(isset($error1) && !empty($error1)){ ?><div class="error"> <?php echo $error1;  ?></div><?php } ?>
            </div>
            <div class="form-group">
              <label for="c_message">Description</label>
              <div class="form-field">
                <textarea   cols="30" rows="10" class="form-control" name="description" id="description"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="c_email">Score</label>
              <div class="form-field">
                <input type="number" class="form-control" name="score" id="score">
              </div>
              <?php if(isset($error2) && !empty($error2)){ ?><div class="error"> <?php echo $error2;  ?></div> <?php } ?>
            </div>
            <div class="form-group">
              <label for="c_name">Specialité</label>
              <div class="form-field">
                <input type="text"  name="specialite" class="form-control" id="specialite" > 
              </div>
              <?php if(isset($error3) && !empty($error3)){ ?><div class="error"> <?php echo $error3; ?></div> <?php } ?>
              <div class="form-group">
              <label for="c_name">Localisation</label>
              <div class="form-field">
                <input type="text"  name="localisation" class="form-control" id="localisation">
              </div>
              <div class="form-group">
              <label for="c_name">Numero de telephone</label>
              <div class="form-field">
                <input type="number"  name="num_tel" class="form-control" pattern="[0-9]{2}[0-9]{3}[0-9]{3}" placeholder="93945321" id="num_tel">
              </div>
              <div class="form-group">
              <label for="c_name">Image</label>
              <div class="form-field">
                <input type="file"  name="image" class="form-control" id="image">
              </div>
              <br>
            <div class="form-group">
                <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['lista']; ?>" autofocus>
                <input type="hidden" name="id_restaurant" value="<?php echo $_POST['id_restaurant']; ?>" autofocus>
                <center><input type="submit" name="action" value="Modifier" class="btn btn-primary btn-lg "></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section class="probootstrap-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6 probootstrap-animate">
                    <div class="probootstrap-footer-widget">
                        <h3>Locations</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <p> 198 West 21th Street, Suite 721 <br> New York NY 10016</p>
                            </div>
                            <div class="col-md-6">
                                <p> 198 West 21th Street, Suite 721 <br> New York NY 10016</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 probootstrap-animate">
                    <div class="probootstrap-footer-widget">
                        <h3>Open Hours</h3>
                        <div class="row">
                            <div class="col-md-4">
                                <p>Monday - Thursday <br> 5:30pm - 10:00pm</p>
                            </div>
                            <div class="col-md-4">
                                <p>Friday - Sunday <br> 5:30pm - 10:00pm</p>
                            </div>
                            <div class="col-md-4">
                                <p>Available for Catering <br> Email or Call Us</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <script src="js/scripts.min.js"></script>
  <script src="js/custom.min.js"></script>
  <script src="js/error_msg.js"></script>

</body>
<?php } ?>
</html>
