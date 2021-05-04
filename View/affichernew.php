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

    <form action="affichernew.php" method="post">
        <input type="submit" name="ASC" value="Ascending"><br><br>
        <input type="submit" name="DESC" value="Descending"><br><br>
    </form>
    <form action="affichernew.php" method="post">
        <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
        <input type="submit" name="search" value="Filter"><br><br>
    </form>
    <button class="btn btn-primary" id="download"> download pdf</button>
    <section class="probootstrap-section">
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

                                        <form method="POST" action="supprimerAliments.php">
                                            <input type="submit" name="supprimer" value="supprimer">
                                            <input type="hidden" value=<?PHP echo $user['id_produit']; ?> name="id_produit">
                                        </form>

                                        <a href="modifierAliments.php?id_produit=<?PHP echo $user['id_produit']; ?>"> Modifier </a>
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
</body>

</html>