<?php
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
  // Si inexistante ou nulle, on redirige vers le formulaire de login
  header('Location: connexion.php');
} else {

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
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
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

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center probootstrap-animate">
            <div class="probootstrap-heading dark">
              <h1 class="primary-heading">Discouvrez</h1>
              <h3 class="secondary-heading">notre histoire</h3>
              <span class="seperator">* * *</span>
            </div>
            <p>Recipes for days est né le 17 mai 2021. Un savoureux mélange de tout ce qui est relié à la cuisine, recipes for days rehausse la saveur de vos fruits et légumes.vous donne une idée sur les restaurants,les materiels de cuisine,les evenements et les recetts.</p>

          </div>
          <div class="col-md-6 col-md-push-1 probootstrap-animate">
            <p><img src="img/im.jpg" alt="Free Bootstrap Template by uicookies.com" class="img-responsive"></p>
          </div>
        </div>
        <!-- END row -->
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/hero_bg_2.jpg);" data-stellar-background-ratio="0.5" data-section="specialties">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discouvrez</h2>
              <h3 class="secondary-heading">Nos restaurants</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- probootstrap-bg-white -->
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="probootstrap-cell-retro">
            <div class="half">

              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto4.jpg);"></div>
                <div class="text text-center">
                  <h3>Maido</h3>
                  <p>Fusion parfaite entre la cuisine nippone et péruvienne axée sur les produits de la mer.</p>
                  <p class="price">Pérou</p>
                </div>
              </div>
              <div class="probootstrap-cell reverse probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto5.jpg);"></div>
                <div class="text text-center">
                  <h3>Disfrutar</h3>
                  <p>Un mélange de saveurs avec panache. Dans ce restaurant catalan, attendez-vous à être surpris !</p>
                  <p class="price">Espagne</p>
                </div>
              </div>
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto6.jpg);"></div>
                <div class="text text-center">
                  <h3>Arpège</h3>
                  <p>dirigé par le très célèbre chef français Alain Passard, trois étoiles au guide Michelin. il a reçu le prix du choix des chefs.</p>
                  <p class="price">France</p>
                </div>
              </div>

            </div>
            <div class="half">

              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto1.jpg);"></div>
                <div class="text text-center">
                  <h3>Mugaritz</h3>
                  <p>vant-gardiste et porté sur l’innovation, a pour but premier de vous ouvrir l’esprit à des expériences nouvelles.</p>
                  <p class="price">Espagne</p>
                </div>
              </div>
              <div class="probootstrap-cell reverse probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto2.jpg);"></div>
                <div class="text text-center">
                  <h3>Géranium</h3>
                  <p>Un style détaillé, minutieux pour une cuisine qui l’est tout autant,au cœur du menu de dégustation</p>
                  <p class="price">Danemark</p>
                </div>
              </div>
              <div class="probootstrap-cell probootstrap-animate" data-animate-effect="fadeIn">
                <div class="image" style="background-image: url(img/resto3.jpg);"></div>
                <div class="text text-center">
                  <h3>Gaggan</h3>
                  <p>Premier restaurant asiatique de ce classement prestigieux,Une belle marque de reconnaissance prestigieuse</p>
                  <p class="price">Thaïlande</p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section-bg overlay" style="background-image: url(img/recipes.jpg);" data-stellar-background-ratio="0.5" data-section="menu">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">Discouvrez</h2>
              <h3 class="secondary-heading">notre menu</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="probootstrap-section probootstrap-bg-white">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <ul class="menus">
              <li>
                <figure class="image"><img src="img/tt.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité alemande</span>
                  </h4>
                  <h3>foret noire</h3>
                  <p>fraise / chocolat / vanille</p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette1.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité américaine</span>
                  </h4>
                  <h3>Salade césar</h3>
                  <p>lettue / mayonnaise / poulet</p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette2.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité turc</span>
                  </h4>
                  <h3>poulet grillé</h3>
                  <p>poulet / tomate /piment</p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette3.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité gréc</span>
                  </h4>
                  <h3>Salade à la creme</h3>
                  <p>tomate / lettue / creme</p>
                </div>
              </li>
            </ul>
          </div>
          <div class="col-md-6">
            <ul class="menus">
              <li>
                <figure class="image"><img src="img/recette4.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité francaise</span>
                  </h4>
                  <h3>Salade de fruits</h3>
                  <p>banane / orange /fraise</p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette5.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité chinoise</span>
                  </h4>
                  <h3>riz</h3>
                  <p>riz / poulet </p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette6.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité méxicaine</span>
                  </h4>
                  <h3>guacamole</h3>
                  <p>avocat / piment / oignons</p>
                </div>
              </li>
              <li>
                <figure class="image"><img src="img/recette7.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
                <div class="text">
                  <h4>
                    <span class="price">specialité tunisienne</span>
                  </h4>
                  <h3>Couscous</h3>
                  <p>couscous / tomate / piment</p>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-section-bg overlay" style="background-image: url(img/evenement.jpg);" data-stellar-background-ratio="0.5" data-section="events">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center probootstrap-animate">
            <div class="probootstrap-heading">
              <h2 class="primary-heading">decouvrez</h2>
              <h3 class="secondary-heading">nos evenements</h3>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="probootstrap-section">
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="event1.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">aout 20, 2021</span>
                <h3><a href="#">La Tomatina</a></h3>
                <p>Si vous aimez être en désordre, vous devez vous rendre à Buñol, à l'extérieur de Valence, pour le dernier mercredi d'août.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="event2.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">Mai 25, 2021</span>
                <h3><a href="#">montréal en Lumière</a></h3>
                <p>La belle ville célèbre toutes les facettes de sa culture lors de ce festival, mais elle met en lumière sa scène gastronomique inimitable.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4 probootstrap-animate">
            <div class="probootstrap-block-image">
              <figure><img src="event3.jpg" alt="Free Bootstrap Template by uicookies.com"></figure>
              <div class="text">
                <span class="date">Juin 29, 2021</span>
                <h3><a href="#">Salon du Chocolat</a></h3>
                <p>il comprenait des pâtissiers, des chocolatiers, des pâtissiers, des designers et des experts en chocolat.</p>
              </div>
            </div>
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
<?PHP
}
?>