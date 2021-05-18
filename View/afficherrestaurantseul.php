<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";
include "../Controller/LikesC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {
    $array=array();
    $RestaurantC = new restaurantC;
    $listeResto = $RestaurantC->afficherRestaurants();
    $num = $RestaurantC->count_table();
    $it = 0;
    if (isset($_POST["nom_resto"]) && !empty($_POST['nom_resto'])) {
        if ($_POST["action"] == "Go") {
            $listeResto = $RestaurantC->recupererRestaurant($_POST["nom_resto"]);
            
        }
    }
    if (isset($_POST["recherche-specialite"]) && !empty($_POST['recherche-specialite'])) {
        if ($_POST["action"] == "Go") {
            $listeResto = $RestaurantC->recupererRestaurantbySpecialite($_POST["recherche-specialite"]);
            
        }
    }
    if (isset($_POST["recherche-localisation"]) && !empty($_POST['recherche-localisation'])) {
        if ($_POST["action"] == "Go") {
            $listeResto = $RestaurantC->recupererRestaurantbyLocalisation($_POST["recherche-localisation"]);
        }
    }
    if (isset($_POST["action"]) && $_POST["action"] == "Trier") {
        $listeResto = $RestaurantC->TriSelon_Score();
        
    }


?>
<?php 
    if(isset($_POST['like']) && isset($_POST['id_review_like']) ){
        $likee= new LikesC();
        $punt=$likee->update_like($_POST['id_review_like']);
        $array=$_POST['like_array'];
        $key=array_search($_POST['id_review_like'],$array);
        $array[$key]="no";
        
        

    }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/all.min.css">

    <!-- Box icons -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <title>Boy’s T-Shirt - Codevo</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Crimson+Text:400,700');










        a {}

        .universal {
            code {
                background: #C3DDD7;
                padding: .25em;
            }
        }

        .adjacent-sibling .box {
            height: 75px;
            width: 75px;
            background: rgba(0, 0, 0, .5);
            display: inline-block;
        }

        .general-sibling .box {
            height: 75px;
            width: 75px;
            background: rgba(0, 0, 0, .5);
            display: inline-block;
        }
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
        .comments{
            position: relative;
            background: white;
            left: 35%;
            width: 30vw;
            text-align: left;
        }
        .comments input{
            position: relative;
            left: 50%;
            color: blue;
            background: beige;
        }
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@600&display=swap");


.like__btn {
  padding: 10px 15px;
  background: #0080ff;
  font-size: 18px;
  font-family: "Open Sans", sans-serif;
  border-radius: 5px;
  color: #e8efff;
  outline: none;
  border: none;
  cursor: pointer;
}
nav {
        background: white;
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
    <!-- Navigation -->
    <section>
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
    </section>
    <section class="flexslider" data-section="welcome">
      <ul class="slides">
        <li style="background-image: url(img/hero_bg_1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Bienvenu</h1>
                </div>
              </div>
            </div>
          </div>
        </li>
        <li style="background-image: url(img/hero_bg_2.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Dans notre</h1>
                  <h3 class="secondary-heading">site web</h3>

                </div>
              </div>
            </div>
          </div>

        </li>
        <li style="background-image: url(img/hero_bg_3.jpg)" class="overlay">
          <div class="container">
            <div class="row">
              <div class="col-md-8 col-md-offset-2">
                <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                  <h1 class="primary-heading">Recipes</h1>
                  <h3 class="secondary-heading">for days</h3>

                </div>
              </div>
            </div>
          </div>
        </li>
      </ul>
    </section>
    <?php
    if (isset($_GET['id_restaurant'])) {
        $resto = $RestaurantC->recupererRestaurantid($_GET['id_restaurant'],);
        foreach ($resto as $comment) {
    ?>
            <section class="probootstrap-section probootstrap-bg-white">
                <div class="container">
                    <div class="row">
                        <!-- Product Details -->
                        <div class="col-md-6 col-md-push-1 probootstrap-animate">
                            <p><img src="../images/<?php echo $comment['image']; ?>" alt="" width="450px" height="585px" class="img-responsive"></p>
                        </div>
                        <div class="col-md-5 text-center probootstrap-animate">
                            <div class="probootstrap-heading dark">
                                <h1 class="primary-heading"><?PHP echo $comment['nom']; ?></h1>
                                <h3 >
                                    <?PHP echo $comment['score']; ?> étoiles
                                </span>
                                <span class="seperator"><?php for($i=0;$i<$comment['score'];$i++){ ?>* <?php } ?></span>
                                <div>
                                <p class="date">
                                    Specialité : <?PHP echo $comment['specialite']; ?>
                                </p>
                                
                                <span class="seperator"><?php for($i=0;$i<$comment['score'];$i++){ ?>* <?php } ?></span>
                                </div>
                            </div>
                            <p style="font-size: 16px;"><?PHP echo $comment['description']; ?> </p> <h5 style="font-size: 20px;"> <?php 
                            $reviews = new ReviewC();
                            $nb_reviews=$reviews->count_reviews_per_restaurant($comment["id_restaurant"]);
                            foreach($nb_reviews as $views)
                            echo $views;
                            ?> Reviews</h4>
                            <h2>Localisation: <br> <?php echo $comment['localisation']; ?></h2>
                            <p><a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" class="probootstrap-custom-link">Retour</a></p>
                        </div>


                    </div>
                </div>
                <!-- END row -->

            </section>
    <?php
        }
    };
    ?>
    <?php if(isset($_GET['id_restaurant'])) { ?>
    <section class="probootstrap-section probootstrap-bg-white" data-section="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center probootstrap-animate">
          <div class="probootstrap-heading dark">
            <h1 class="primary-heading">Ajouter un commentaire</h1>
            <h3 class="secondary-heading">Let's Socialize</h3>
          </div>
          <p>Voluptatibus quaerat laboriosam fugit non Ut consequatur animi est molestiae enim a voluptate totam natus modi debitis dicta impedit voluptatum quod sapiente illo saepe explicabo quisquam perferendis labore et illum suscipit</p>
        </div>
        <div class="col-md-6 col-md-push-1 probootstrap-animate">
          <form action="#" method="POST" class="probootstrap-form">
            <div class="form-group">
              <label for="c_name">Your Name</label>
              <div class="form-field">
                <input type="text"  name="nom_review" class="form-control">
              </div>
              <?php if(isset($error1) && !empty($error1)){ ?><div class="error"> <?php echo $error1;  ?></div><?php } ?>
            </div>
            <div class="form-group">
              <label for="c_email">Score</label>
              <div class="form-field">
                <input type="number" class="form-control" name="score_review">
              </div>
              <?php if(isset($error2) && !empty($error2)){ ?><div class="error"> <?php echo $error2;  ?></div> <?php } ?>
            </div>
            <div class="form-group">
              <label for="c_message">Description</label>
              <div class="form-field">
                <textarea   cols="30" rows="10" class="form-control" name="description_review"></textarea>
              </div>
            </div>
            <div class="form-group">
                <input type="hidden" name="id_restaurant_review"  value="<?php echo $_GET['id_restaurant']; ?>" autofocus>
                <input type="hidden" name="id_utilisateur_review" value="<?php echo $_SESSION['lista']; ?>" autofocus>
                <center><input style="color: blue;" type="submit" name="action" value="Ajouter" class="btn btn-primary btn-lg "></center>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
    <?php }?>
    <?php  
    $check=false;
    $error="";
    $user=null;
    $ReviewC = new ReviewC();
    //check=false;
        if (
            isset($_POST["nom_review"]) &&
            isset($_POST["description_review"]) &&
            isset($_POST["score_review"]) &&
            isset($_POST["id_restaurant_review"]) &&
            isset($_POST['id_utilisateur_review'])
          
          ) {
            if (
                !empty($_POST["nom_review"]) &&
                !empty($_POST["description_review"]) &&
                !empty($_POST["score_review"]) &&
                !empty($_POST["id_restaurant_review"]) &&
                !empty($_POST["id_utilisateur_review"])
              
                
            ) {
                $upper = $_POST["nom_review"][0];
                if (ctype_upper($upper) && $_POST["score_review"] >= 0 && $_POST["score_review"] <= 5 && is_numeric($_POST["nom_review"]) == false) {
                    $check = true;
                }
                if (ctype_upper($upper) == false || is_numeric($_POST["nom_review"]) == false) {
                    $error1 = "Entrer un nom majuscule";
                }
                if ($_POST["score_review"] > 5 || $_POST["score_review"] < 0) {
                    $error2 = "Entrer un score entre 0 et 5";
                }
                $user = new Review(
                    $_POST['nom_review'],
                    $_POST['description_review'],
                    $_POST['score_review'],
                    date("Y/m/d"),
                    $_POST['id_restaurant_review'],
                    $_POST['id_utilisateur_review']
                    
                );
                
                
                if($_POST['action'] == 'Ajouter' && $check) {
                     $ReviewC->ajouterReview($user);
                     $poggy=$ReviewC->recupererReviewByName($_POST['nom_review']);
                     foreach($poggy as $pog){
                     $like = new LikesC();
                     $like->ajouter_like($pog['id_review'],$_POST['id_utilisateur_review']);
                     }
                }
                
            }
          else
                $error = "Missing information";
          }
        
    ?>
    <section style="background-color: white;">
      <div class="container probootstrap-heading dark">
        <div class="comments" style="color: sandybrown;">
         <center> <h3 class="primary-heading">Comments</h3></center>
        </div>
      </div>
    </section>
    <?php
    
    if (isset($_GET['id_restaurant'])) {
        $test=123;
        $resto = $RestaurantC->afficherRestaurantReview($_GET['id_restaurant']);
        foreach ($resto as $comment) {
            if((count($array)==0)|| $test==1 ){
            $array[]=$comment['id_review'];
            $test=1;
            }


    ?>
            <section style="background: white;">
                    <div class="container">
                    <div class="comments">
                        <hr>
                        <h3> <?PHP echo $comment['nom']; ?></h2>
                        <h4 style="font-size: 16px;"><?PHP echo $comment['description']; ?></p>
                        <h4 style="font-size: 18px;">Score:<?PHP echo $comment['score']; ?></p>
                        <h4 style="font-size: 18px;"> Updated: <?php $date=strtotime(date("Y/m/d"));
                        $date1=strtotime($comment["date"]);
                        $current=($date - $date1)/60/60/24;
                        echo $current ?> days ago </p>
                        <?php 
                        if(in_array($comment['id_review'],$array)){
                        ?>
                        <form action="#" method="POST">
                            <button class="like__btn" type="submit">
                            <span id="icon"><i class="far fa-thumbs-up"></i></span>
                            <span id="count"><?php
                            $like = new LikesC();
                            $list=$like->recup_like($comment['id_review']);
                            foreach($list as $up){echo $up['nb_likes'];}
                            ?></span> Like
                            <input type="hidden" name="like" value="<?php echo $comment['id_review'] ?>">
                            <input type="hidden" value=<?PHP echo $comment['id_review']; ?> name="id_review_like">
                            <input type="hidden" value=<?PHP echo $comment['id_restaurant']; ?> name="id_restaurant_like">
                            <?php foreach($array as $elemento){ ?>
                            <input type="hidden" value=<?PHP echo $elemento; ?> name="like_array[]">
                            <?php } ?>
                            </button>
                            
                        </form>
                        <?php }
                        else{ ?>
                        <button class="like__btn" >
                            <span id="icon"><i class="far fa-thumbs-up"></i></span>
                            <span id="count"><?php
                            $like = new LikesC();
                            $list=$like->recup_like($comment['id_review']);
                            foreach($list as $up){echo $up['nb_likes'];}
                            ?></span> Like
                            <input type="hidden" name="like" value="<?php echo $comment['id_review'] ?>">
                            <input type="hidden" value=<?PHP echo $comment['id_review']; ?> name="id_review_like">
                            <input type="hidden" value=<?PHP echo $comment['id_restaurant']; ?> name="id_restaurant_like">
                            
                            </button>
                        <?php } ?>

                        <?php if($comment['id_utilisateur']==  $_SESSION['lista'] ) {?>
                        <form action="supprimer-reviews-front.php" method="POST">
                            <input type="submit" name="action" value="supprimer" class="btn">
                            <input type="submit" name="action" value="modifier" class="btn">
                            <input type="hidden" value=<?PHP echo $comment['id_review']; ?> name="id_review">
                            <input type="hidden" value=<?PHP echo $comment['id_restaurant']; ?> name="id_restaurant">
                        </form>
                        <?php } ?>
                        
                    </div>
                    <!-- END row -->
                </div>
                <br>
            </section>
    <?php
        }
        
    };
    ?>
    
    
    
    <section style="background-color: whitesmoke;" class="probootstrap-section" id="btttt">
        <center>
        <a style="font-size: 20px;" class="btn btn-primary" href="ajouterRestaurant.php">Ajouter un Restaurant</a>
        <br>
        <br>
        <br>
        <hr>
        <div class="row">
        <form action="#" method="POST">
                  
                      <label style="font-size: 20px;" for="Search">Rechercher:</label>
                      <input style="font-size: 20px;" type="text" name="nom_resto" id="nom_resto" placeholder="Nom du restaurant">
                      
                      <input style="font-size: 20px;" type="text" name="recherche-specialite" id="specialite-search" placeholder="Specialité">
                      <input style="font-size: 20px;" type="text" name="recherche-localisation" id="recherche-specialite-search" placeholder="Localisation">
                      
                      <input style="font-size: 20px;" type="submit" name="action" value="Go" class="btn btn-primary">
                      <input style="font-size: 20px;" type="submit" name="action" Value="Trier" class="btn btn-primary">
                      
                      
                      
                  
              </form>
              <br>
        </div>
        </center>
        
        <div class="container" id="invoice">
            <div class="row">
                <?php foreach ($listeResto as $resto) { ?>
                    <?php if ($it % 3 == 0) {  ?>
                    <?php } ?>

                    <div class="col-md-4 col-sm-4 probootstrap-animate">
                        <div class="probootstrap-block-image probootstrap-heading">

                            <figure><img class="card-image" src="../images/<?php echo $resto['image']; ?>"></img></figure>
                            <div class="text">
                                <center>
                                <h3 style="font-size:30px;" class="primary-heading"><?php echo $resto['nom'] ?></h3><br>
                                </center>
                                <h4 style="font-size: 18px; color:salmon">Description :  <?php echo $resto['description'] ?></p>
                                    <h4 style="font-size: 18px; color:turquoise">Score : <?php echo $resto['score'] ?></span><br>
                                    <h4 style="font-size: 18px; color:darkkhaki">Specialité : <?php echo $resto['specialite'] ?></span><br> </h4>
                                    


                                <?php if($resto['id_utilisateur'] == $_SESSION['lista']){ ?>
                                <form action="supprimer-restaurants-front.php" method="POST">
                                  <br>
                                    <input type="submit" name="action" value="supprimer" class="btn">
                                    <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restaurant">
                                </form>
                                <br>
                                <form action="modifier-resto-front.php" method="POST">
                                    <input type="submit" name="action" value="modifier" class="btn">
                                    <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restaurant">
                                </form>
                                <?php } ?>
                                 <br>
                                 <center>
                                 <a style="font-size: 20px;" href="afficherrestaurantseul.php?id_restaurant=<?PHP echo $resto['id_restaurant']; ?>"> View </a>
                                 </center>
                                

                            </div>
                        </div>
                    </div>
                    <?php $it++; ?>

                <?php }} ?>

                <?php  ?>
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
    <script>
        const likeBtn = document.querySelector(".like__btn");
        let likeIcon = document.querySelector("#icon"),
        count = document.querySelector("#count");
        likes=document.querySelector("#like_id");

        let clicked = false;


        likeBtn.addEventListener("click", () => {
        if (!clicked) {
            clicked = true;
            likeIcon.innerHTML = `<i class="fas fa-thumbs-up"></i>`;
        } else {
            clicked = false;
            likeIcon.innerHTML = `<i class="far fa-thumbs-up"></i>`;
            
        }
        });

    </script>

</body>

</html>