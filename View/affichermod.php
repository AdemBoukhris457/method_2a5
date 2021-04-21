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
</head>

<body>
    <button><a href="ajouterAliments.php">Ajouter un Utilisateur</a></button>
    <hr>
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
</body>

</html>