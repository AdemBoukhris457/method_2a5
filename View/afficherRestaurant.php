<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {

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
    <link rel="stylesheet" href="styl.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">


    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
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
        }
    </style>
    <script>
        function printContent(el) {
            var restorepage = document.body.innerHTML;
            var printcontent = document.getElementById(el).innerHTML;
            document.body.innerHTML = printcontent;
            window.print();
            document.body.innerHTML = restorepage;
        }
    </script>
    <script>
        var doc = new jsPDF();
        window.onload = function() {
            document.getElementById("download")
                .addEventListener("click", () => {
                    var invoice = this.document.getElementById("invoice");
                    doc.fromHTML(invoice);
                    doc.save("output.pdf");

                })
        }
    </script>
</head>

<body>

    <!-- Fixed navbar -->

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
                            <a href="afficherRestaurant.php" style="font-size:15px; color:#B0B0B0">Restaurants</a>

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
                                <h1 class="primary-heading">Saha</h1>
                                <h3 class="secondary-heading">Chribtek</h3>

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
                                <h1 class="primary-heading">Dine</h1>
                                <h3 class="secondary-heading">With Us</h3>

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
                                <h1 class="primary-heading">Enjoy</h1>
                                <h3 class="secondary-heading">With Us</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <section>

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




                                    <form action="supprimer-restaurants-front.php" method="POST">
                                        <input type="submit" name="action" value="supprimer" class="btn">
                                        <input type="submit" name="action" value="modifier" class="btn">
                                        <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restaurant">
                                    </form>
                                    <form action="afficherrestaurantseul.php" method="POST">
                                        <div>
                                            <input type="submit" name="action" value="View" class="btn form-control">
                                            <input type="hidden" value=<?PHP echo $resto['nom']; ?> name="nom_resto1">
                                            <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restoboy">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php $it++; ?>

                    <?php } ?>

                    <?php  ?>
                </div>
            </div>
        </section>
        <center>
            <button onclick="printContent('btttt')">Print Content</button>

            <div class="button">
                <form action="#" method="POST">

                    <label for="Search">Rechercher:</label>
                    <input type="text" name="nom_resto" id="nom_resto">

                    <input type="text" name="recherche-specialite" id="specialite-search" placeholder="Specialité">
                    <input type="text" name="recherche-localisation" id="recherche-specialite-search" placeholder="Localisation">

                    <input type="submit" name="action" value="Go" class="btn">
                    <input type="submit" name="action" Value="Trier" class="btn">




                </form>

            </div>
        </center>



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