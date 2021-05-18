<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";
include "../Controller/LikesC.php";
$RestaurantC = new restaurantC;
$listeResto = $RestaurantC->afficherRestaurants();
$num = $RestaurantC->count_table();
$it = 0;
if (isset($_POST["nom_resto"]) && !empty($_POST['nom_resto'])) {
    if ($_POST["action"] == "Go") {
        $listeResto = $RestaurantC->recupererRestaurant($_POST["nom_resto"]);
        $page = $_SERVER['PHP_SELF'];
        $sec = "10";
        header("Refresh: $sec; url=$page");
    }
}
if (isset($_POST["recherche-specialite"]) && !empty($_POST['recherche-specialite'])) {
    if ($_POST["action"] == "Go") {
        $listeResto = $RestaurantC->recupererRestaurantbySpecialite($_POST["recherche-specialite"]);
        $page = $_SERVER['PHP_SELF'];
        $sec = "10";
        header("Refresh: $sec; url=$page");
    }
}
if (isset($_POST["recherche-localisation"]) && !empty($_POST['recherche-localisation'])) {
    if ($_POST["action"] == "Go") {
        $listeResto = $RestaurantC->recupererRestaurantbyLocalisation($_POST["recherche-localisation"]);
        $page = $_SERVER['PHP_SELF'];
        $sec = "10";
        header("Refresh: $sec; url=$page");
    }
}
if (isset($_POST["action"]) && $_POST["action"] == "Trier") {
    $listeResto = $RestaurantC->TriSelon_Score();
    $page = $_SERVER['PHP_SELF'];
    $sec = "30";
    header("Refresh: $sec; url=$page");
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
    <title>Recipes For Days - Restaurants</title>
    <style>
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
        }
    </style>
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
    </style>
</head>

<body>
    <!-- Navigation -->
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
    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_2.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">Discover</h2>
                        <h3 class="secondary-heading">Our Specialties</h3>
                    </div>
                </div>
            </div>
        </div>
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
    <?php
    if (isset($_GET['id_restaurant'])) {
        $resto = $RestaurantC->afficherRestaurantReview($_GET['id_restaurant']);
        foreach ($resto as $comment) {
            


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
                        

                        
                        
                    </div>
                    <!-- END row -->
                </div>
                <br>
            </section>
    <?php
        }
        
    };
    ?>
    


    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_2.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">Discover</h2>
                        <h3 class="secondary-heading">Our Specialties</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="probootstrap-section" id="btttt">
        <div class="container" id="invoice">
            <div class="row">
                <?php foreach ($listeResto as $resto) { ?>
                    <?php if ($it % 3 == 0) {  ?>
                    <?php } ?>

                    <div class="col-md-4 col-sm-4 probootstrap-animate">
                        <div class="probootstrap-block-image">

                            <figure><img class="card-image" src="../images/<?php echo $resto['image']; ?>"></img></figure>
                            <div class="text">

                                <span class="date"><?php echo $resto['nom'] ?></span>
                                <p> <?php echo $resto['description'] ?></p>
                                <span class="date"><?php echo $resto['score'] ?></span>




                                
                                <a href="afficherrestaurantseulvisiteur.php?id_restaurant=<?PHP echo $resto['id_restaurant']; ?>"> details </a>

                            </div>
                        </div>
                    </div>
                    <?php $it++; ?>

                <?php } ?>

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

</body>

</html>