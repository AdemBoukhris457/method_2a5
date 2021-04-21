<?php

include '../controller/ProduitC.php';
include_once '../model/Produit.php';


$error = "";

// create user
$AlimentC = new ProduitC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["nb_calories"]) &&
    isset($_POST["poids"]) &&
    isset($_POST["description"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["nb_calories"]) &&
        !empty($_POST["poids"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["image"])
    ) {
        $user = new Produit(
            $_POST['nom'],
            $_POST['nb_calories'],
            $_POST['poids'],
            $_POST['description'],
            $_POST['image']
        );
        $AlimentC->modifierProduit($user, $_GET['id_produit']);
        header('Location:afficherAlimentss.php');
    } else
        $error = "Missing information";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="styleformulaire.css">
    <title>ajout aliments</title>
    <link rel="stylesheet" href="aliments.css">
</head>

<body>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_GET['id_produit'])) {
        $user = $AlimentC->recupererUtilisateur($_GET['id_produit']);

    ?>
        <div class="cont">
            <div class="form sign-in">
                <form action="" method="POST">
                    <label>
                        <span>id produit</span>
                        <input type="text" name="id_produit" id="id_produit" value="<?php echo $user['id_produit']; ?>">
                    </label>
                    <label>
                        <span>nom</span>
                        <input type="text" name="nom" id="nom" maxlength="20"></td>
                    </label>
                    <label>
                        <span>nbre de calories</span>
                        <input type="number" name="nb_calories" id="nb_calories" maxlength="20"></td>
                    </label>
                    <label>
                        <span>poids</span>
                        <input type="number" name="poids" id="poids">
                    </label>
                    <label>
                        <span>description</span>
                        <input type="text" name="description" id="description">
                    </label>
                    <label>
                        <span>image</span>
                        <input type="file" name="image" id="image">
                    </label>
                    <label>
                        <input type="submit" value="Envoyer">
                    </label>
                </form>
            </div>
            <div class="sub-cont">
                <div class="img">
                    <div class="img-text m-up">
                        <h2>voulez ajouter un produit?</h2>
                        <p>1-le nom ne doit pas contenir des chiffres</p>
                        <p>2-il faut que le nom du produit corespand à l'image</p>
                    </div>

                </div>

            </div>
        </div>
    <?php
    };
    ?>
</body>

</html>