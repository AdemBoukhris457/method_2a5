<?php
include "../controller/ProduitC.php";
$AlimentC = new ProduitC();
$listeAliments = $AlimentC->afficherProduits();
if (isset($_POST['ASC'])) {
    $AlimentC = new ProduitC();
    $listeAliments = $AlimentC->affichertri();
} elseif (isset($_POST['DESC'])) {
    $AlimentC = new ProduitC();
    $listeAliments = $AlimentC->afficherProduits();
}
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $listeAliments = $AlimentC->afficherrech($valueToSearch);
} else {
    $listeAliments = $AlimentC->afficherProduits();
}
$pC = new ProduitC();
$num_per_page = 05;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$num_per_page = 05;
$start_from = ($page - 1) * 05;
$listeAliments = $pC->afficherpagin($start_from, $num_per_page);
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $listeAliments = $AlimentC->afficherrech($valueToSearch);
} else {
    $listeAliments = $pC->afficherpagin($start_from, $num_per_page);
}
$numa = 05;
$star = ($page - 1) * 05;
if (isset($_POST['ASC'])) {
    $AlimentC = new ProduitC();
    $listeAliments = $AlimentC->afficherpagintri($star, $numa);
}

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
            <li style="background-image: url(slideproduit1.jpg)" class="overlay" data-stellar-background-ratio="0.5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                <h3 class="secondary-heading">Liste des produits</h3>


                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li style="background-image: url(slideproduit2.jpg)" class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                <h3 class="secondary-heading">Liste des produits</h3>


                            </div>
                        </div>
                    </div>
                </div>

            </li>
            <li style="background-image: url(slideproduit3.jpg)" class="overlay">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="probootstrap-slider-text text-center probootstrap-animate probootstrap-heading">
                                <h3 class="secondary-heading">Liste des produits</h3>


                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </section>
    <a href="ajouterAliments.php"> ajout </a>
    <form action="affichernew.php" method="post">
        <input type="submit" name="ASC" value="Ascending"><br><br>
        <input type="submit" name="DESC" value="Descending"><br><br>
    </form>
    <form action="affichernew.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
        <input type="submit" name="search" value="Filter"><br><br>
    </form>
    <button class="btn btn-primary" id="download"> download pdf</button>
    <section class="probootstrap-section" id="btttt">
        <button onclick="printContent('btttt')">Print Content</button>
        <div class="container" id="invoice">
            <div class="row">
                <?PHP
                foreach ($listeAliments as $user) {
                ?>
                    <div class="col-md-4 col-sm-4 probootstrap-animate">
                        <div class="probootstrap-block-image">

                            <figure><img src="../images/<?php echo $user['image']; ?>"></figure>
                            <div class="text">
                                <td><span class="date"><?PHP echo $user['nb_calories']; ?> calories</span>
                                    <span class="date"><?PHP echo $user['poids']; ?> grammes</span>
                                    <h3><a href="#"><?PHP echo $user['nom']; ?></a></h3>
                                    <p><?PHP echo $user['description']; ?></p>


                                    <a href="afficherproduitseulvisiteur.php?id_produit=<?PHP echo $user['id_produit']; ?>"> details </a>


                            </div>
                        </div>
                    </div>
                <?PHP
                }
                ?>

            </div>
        </div>
    </section>

    </section>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
    <script src="js/scripts.min.js"></script>
    <script src="js/custom.min.js"></script>
    <center>
        <?php
        $liste = $AlimentC->afficherProduits();
        $total_record = $liste->rowCount();
        $total_page = ceil($total_record / $num_per_page);
        if ($page > 1) {
            echo "<a href='affichernew.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
        }


        for ($i = 1; $i < $total_page + 3; $i++) {
            echo "<a href='affichernew.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
        }

        if ($i > $page) {
            echo "<a href='affichernew.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
        }
        ?>
    </center>
    <br>
    <br>
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
</body>

</html>