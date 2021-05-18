<?php
include "../controller/BlogC.php";

$AlimentC = new BlogC();
$listeBlog = $AlimentC->afficherBlog();

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste aliments </title>
    <link rel="stylesheet" href="styl.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="style.css">
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

</head>

<body>
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
    <section class="flexslider" data-section="welcome">
        <ul class="slides">
            <li style="background-image: url(img/hero_bg_1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                <h3 class="secondary-heading">Le blog</h3>

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
                                <h3 class="secondary-heading">Le blog</h3>

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
                                <h3 class="secondary-heading">Le blog</h3>

                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <br>
    <br>
    <?PHP
    foreach ($listeBlog as $user) {
    ?>
        <div class="blog-card">
            <div class="meta">
                <div class="photo"><img src="../images/<?php echo $user['image']; ?>"></div>
                <ul class="details">
                    <li class="date"><?PHP echo $user['date']; ?></li>
                </ul>
            </div>
            <div class="description">
                <h1><?PHP echo $user['titre']; ?></h1>
                <h2><?PHP echo $user['id_utilisateur']; ?></h2>
                <h2>citation</h2>

                <p><?PHP echo $user['citation']; ?></p>
                <p class="read-more">
                <h1>vous pouvez participier dans ce blog en connectant</h1>
                </p>
            </div>
        </div>

    <?PHP
    }
    ?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>