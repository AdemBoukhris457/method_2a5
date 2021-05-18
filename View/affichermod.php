<?php
include "../controller/ProduitC.php";

$AlimentC = new ProduitC();
$listeAliments = $AlimentC->afficherProduits();
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste aliments </title>
    <link rel="stylesheet" href="styl.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
</head>

<body>
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
    <section class="section all-products" id="products">
        <div class="product-center container">
            <?PHP
            foreach ($listeAliments as $user) {
            ?>
                <div class="product">
                    <div class="product-header">
                        <img src="../images/<?php echo $user['image']; ?>" width="200px" height="200px">
                        <ul class="icons">
                            <form method="POST" action="supprimerAliments.php">
                                <input type="submit" name="supprimer" value="supprimer">
                                <input type="hidden" value=<?PHP echo $user['id_produit']; ?> name="id_produit">
                            </form>

                            <a href="modifierAliments.php?id_produit=<?PHP echo $user['id_produit']; ?>"> Modifier </a>
                        </ul>
                    </div>
                    <div class="product-footer">
                        <table>
                            <tr>
                                <td>
                                    <FONT size="1">nom</FONT>
                                </td>
                                <td>
                                    <FONT size="1"><?PHP echo $user['nom']; ?></FONT>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <FONT size="1">nom</FONT>
                                </td>
                                <td>
                                    <FONT size="1"><?PHP echo $user['nb_calories']; ?></FONT>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <FONT size="1">nom</FONT>
                                </td>
                                <td>
                                    <FONT size="1"><?PHP echo $user['poids']; ?></FONT>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <FONT size="1">nom</FONT>
                                </td>
                                <td>
                                    <FONT size="1"><?PHP echo $user['description']; ?></FONT>
                                </td>
                            </tr>
                        </table>
                        <form method="POST" action="supprimerAliments.php">
                            <input type="submit" name="supprimer" value="supprimer">
                            <input type="hidden" value=<?PHP echo $user['id_produit']; ?> name="id_produit">
                        </form>

                        <a href="modifierAliments.php?id_produit=<?PHP echo $user['id_produit']; ?>"> Modifier </a>
                    </div>
                </div>
            <?PHP
            }
            ?>
        </div>

    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>
</body>

</html>