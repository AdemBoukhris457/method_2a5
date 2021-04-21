<?php

include '../controller/RecettesC.php';
include_once '../model/Recettes.php';

$error = "";
$AlimentC = new RecetteC();
$Alimente = new RecetteC();
$listeAliments = $Alimente->afficherProd();
if (
    isset($_POST["nom"]) &&
    isset($_POST["ingredients"]) &&
    isset($_POST["description"]) &&
    isset($_POST["specialite"]) &&
    isset($_POST["image"]) &&
    isset($_POST["id_produit"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["ingredients"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["specialite"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["id_produit"])
    ) {
        $user = new Recettes(
            $_POST['nom'],
            $_POST['ingredients'],
            $_POST['description'],
            $_POST['specialite'],
            $_POST['image'],
            $_POST['id_produit']
        );
        $AlimentC->modifierRecette($user, $_GET['id_recette']);
        header('Location:afficherRecette.php');
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
    <title>ajout aliments</title>
    <link rel="stylesheet" type="text/css" href="styleformulaire.css">
    <link rel="stylesheet" href="aliments.css">
</head>

<body style="background-image: url('jjj.jpg'); background-repeat: no-repeat; background-size: cover;">

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_GET['id_recette'])) {
        $user = $AlimentC->recupererUtilisateur($_GET['id_recette']);

    ?>
        <div class="cont">
            <div class="form sign-in">
                <form action="" method="POST">
                    <label>
                        <span>id recette</span>
                        <input type="text" name="id_recette" id="id_recette" value="<?php echo $user['id_recette']; ?>">
                    </label>
                    <label>
                        <span>nom</span>
                        <input type="text" name="nom" id="nom" maxlength="20">
                    </label>
                    <label>
                        <span>ingrediants</span>
                        <input type="text" name="ingredients" id="ingredients" maxlength="20">
                    </label>
                    <label>
                        <span>description</span>
                        <input type="text" name="description" id="description">
                    </label>
                    <label>
                        <span>specialité</span>
                        <input type="text" name="specialite" id="specialite">
                    </label>
                    <label>
                        <span>image</span>
                        <input type="file" name="image" id="image">
                    </label>
                    <label>
                        <span>id produit</span>
                        <select name="id_produit" id="id_produit">
                            <?PHP
                            foreach ($listeAliments as $us) {
                            ?>
                                <option value="<?PHP echo $us['id_produit']; ?>"><?PHP echo $us['id_produit']; ?></option>
                            <?PHP
                            }
                            ?>
                        </select>
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