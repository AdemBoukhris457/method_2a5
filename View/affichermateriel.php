<?php
include "../controller/MaterielC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {
    $AlimentC = new MaterielC();
    $listeBlog = $AlimentC->afficherMaterielsutilisateur($_SESSION['lista']);
}
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste aliments </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
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


    <section class="probootstrap-section-bg overlay" style="background-image: url(img/evenement.jpg);" data-stellar-background-ratio="0.5" data-section="events">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center probootstrap-animate">
                    <div class="probootstrap-heading">
                        <h2 class="primary-heading">nos</h2>
                        <h3 class="secondary-heading">materiels</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <a href="ajouterMateriel.php" class="probootstrap-custom-link link-sm"> ajouter </a>
    <section class="probootstrap-section">
        <div class="container">
            <div class="row">
                <?PHP
                foreach ($listeBlog as $user) {
                ?>
                    <div class="col-md-4 col-sm-4 probootstrap-animate">
                        <div class="probootstrap-block-image">
                            <figure><img src="../images/<?php echo $user['image']; ?>"></figure>
                            <div class="text">
                            </div>
                            <div class="text">
                                <?PHP echo $user['id_materiel']; ?>
                                <?PHP echo $user['nom']; ?>
                                <?PHP echo $user['description']; ?>

                                <?PHP echo $user['prix']; ?>
                                <?PHP echo $user['id_utilisateur']; ?>
                                <form method="POST" action="supprimermateriel.php">
                                    <input type="submit" name="supprimer" value="supprimer">
                                    <input type="hidden" value=<?PHP echo $user['id_materiel']; ?> name="id_materiel">
                                </form>

                                <a href="modifierMateriel.php?id_materiel=<?PHP echo $user['id_materiel']; ?>" class="probootstrap-custom-link link-sm"> Modifier </a>
                            </div>
                        </div>
                    </div>
                <?PHP
                }
                ?>
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
    <section class="probootstrap-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <p class="copyright-text">&copy; 2017 <a href="https://uicookies.com/">uiCookies:Resto</a>. All Rights Reserved. Images by <a href="https://graphicburger.com/">GraphicBurger</a> &amp; <a href="https://unsplash.com/">Unsplash</a></p>
                </div>
                <div class="col-md-4">
                    <ul class="probootstrap-footer-social right">
                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                        <li><a href="#"><i class="icon-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>