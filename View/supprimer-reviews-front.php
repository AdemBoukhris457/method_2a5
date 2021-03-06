<?php

include '../Controller/restaurantC.php';
include '../Controller/ReviewC.php';
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {
    $restaurant = new ReviewC();
    if (isset($_POST["id_review"]) && $_POST["action"] == "supprimer") {
        $restaurant->supprimerReview($_POST["id_review"]);
        
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $Restaurant= new ReviewC();
        if (
            isset($_POST["id_review"]) &&
            isset($_POST["nom"]) &&
            isset($_POST["description"]) &&
            isset($_POST["score"]) &&
            isset($_POST["id_restaurant"]) &&
            isset($_POST["id_utilisateur"])
        ) {
            if (
                !empty($_POST["id_review"]) &&
                !empty($_POST["nom"]) &&
                !empty($_POST["description"]) &&
                !empty($_POST["score"]) &&
                !empty($_POST["id_restaurant"]) &&
                !empty($_POST["id_utilisateur"])
            ) {
                
                
                    
                $user = new Review(
                    $_POST['nom'],
                    $_POST['description'],
                    intval($_POST['score']),
                    date("Y/m/d"),
                    $_POST['id_restaurant'],
                    $_POST['id_utilisateur']
                );
                
                $Restaurant->modifierReview($user,$_POST["id_review"]);
                header('location:afficherrestaurantseul.php'.'?id_restaurant=' .$_POST['id_restaurant']);
                
            }
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
                

                .error {
                    border: 1px solid;
                    margin: 10px 0px;
                    padding: 15px 10px 15px 50px;
                    color: #D8000C;
                    background-color: #FFBABA;
                    background-image: url('https://i.imgur.com/GnyDvKN.png');
                    background-repeat: no-repeat;
                    background-position: 10px center;
                }

                nav {
            background: whitesmoke;
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

            <section>
        <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
            <div class="container">
                <div id="navbar-collapse" class="navbar-collapse collapse">

                    <div class="logo">
                        <a href="indexvisiteur.php"> <img src="ll.png" alt="" style="max-width: 100%; margin-bottom: 50px; "></a>
                    </div>
                    <input type="checkbox" id="btn">
                    <ul class="nav  navbar-right">
                        <li><a href="#" style="font-size:15px; color:#B0B0B0">Recettes/Produits</a>
                            <input type="checkbox" id="btn-1">
                            <ul>
                                <li><a href="afficherrecettevisiteur.php">Recettes</a></li>
                                <li><a href="afficherproduitVisiteur.php">Produits</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="afficherRestaurantvisiteur.php" style="font-size:15px; color:#B0B0B0">Restaurants</a>

                        </li>
                        <li>
                            <a href="afficherEvenementsvisiteur.php" style="font-size:15px; color:#B0B0B0">Evenements</a>
                        </li>
                        <li>
                            <a href="affichermaterielvisiteur.php" style="font-size:15px; color:#B0B0B0">Materiels</a>
                        </li>
                        <li><a href="afficherBlogvisiteur.php" style="font-size:15px; color:#B0B0B0">Blog</a></li>
                        <li><a href="connexion.php" style="font-size:15px; color:#B0B0B0">se connecter</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

            
    <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center probootstrap-animate">
          <div class="probootstrap-heading dark">
            <h1 class="primary-heading">Modifier</h1>
            <h1 class="secondary-heading">Review</h3>
          </div>
          <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
        </div>
        <div class="col-md-6 col-md-push-1 probootstrap-animate">
          <form action="#" method="POST" class="probootstrap-form" name="form" id="form">
            <div class="form-group">
              <label for="c_name">Nom</label>
              <div class="form-field">
                <input type="text"  name="nom" class="form-control" id="nom">
              </div>
              <?php if(isset($error1) && !empty($error1)){ ?><div class="error"> <?php echo $error1;  ?></div><?php } ?>
            </div>
            <div class="form-group">
              <label for="c_email">Score</label>
              <div class="form-field">
                <input type="number" class="form-control" name="score" id="score">
              </div>
              <?php if(isset($error2) && !empty($error2)){ ?><div class="error"> <?php echo $error2;  ?></div> <?php } ?>
            </div>
            <div class="form-group">
              <label for="c_message">Description</label>
              <div class="form-field">
                <textarea   cols="30" rows="10" class="form-control" name="description" id="description"></textarea>
              </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="id_restaurant"  value="<?php echo $_POST['id_restaurant']; ?>" autofocus>
                <input type="hidden" name="id_utilisateur" value="<?php echo $_SESSION['lista']; ?>" autofocus>
                <input type="hidden" name="id_review" value="<?php echo $_POST['id_review']; ?>" autofocus>
                <center><input style="color: blue;" type="submit" name="action" value="Modifier" class="btn btn-primary btn-lg "></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

            <script src="js/scripts.min.js"></script>
            <script src="js/custom.min.js"></script>
            <script src="js/error_msg_review.js"></script>
    <?php }
} ?>
        </body>

        </html>