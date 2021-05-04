<?php

include '../controller/ProduitC.php';
include_once '../model/Produit.php';


$error = "";
$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";

// create user
$AlimentC = new ProduitC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["nb_calories"]) &&
    isset($_POST["poids"]) &&
    isset($_POST["description"]) &&
    isset($_POST["image"])
) {
    $name = $_POST["nom"];
    $length = strlen($name);
    if (empty($_POST["nom"])) {
        $nameErr = "Name is required";
    } else
    if (!preg_match("/^[a-zA-z]*$/", $name)) {
        $nameErr = "seules les alphabets et les espaces sont permises";
    }
    $des = $_POST["description"];
    $length = strlen($des);
    if ($length == 0) {
        $genderErr = "Name is required";
    } else
    if (!preg_match("/^[a-zA-z]*$/", $des)) {
        $genderErr = "seules les alphabets et les espaces sont permises";
    } else
    if ($length < 3) {
        $genderErr = "plus de 3 caracteres";
    }
    $image = $_POST["image"];
    $people = array("jpg", "png");
    $rest = substr($image, -3);
    if (in_array($rest, $people)) {
        $websiteErr = "c'est une image";
    } else {
        $websiteErr = "ajouter une image de forme jpg ou png";
    }

    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["nb_calories"]) &&
        !empty($_POST["poids"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["image"]) &&
        preg_match("/^[a-zA-z]*$/", $name) &&
        $length > 3 &&
        in_array($rest, $people)
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
    <style>
        .error {
            font-size: 9px;
            border: 1px solid;
            margin: 5px 0px;
            padding: 5px 2px 5px 2px;
            color: #D8000C;
            background-color: #FFBABA;
            background-repeat: no-repeat;
            background-position: 4px center;
        }
    </style>
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
                        <?php if (isset($nameErr) && !empty($nameErr)) { ?> <span class="error"><?php echo $nameErr;
                                                                                            } ?></span>

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
                        <?php if (isset($genderErr) && !empty($genderErr)) { ?> <span class="error"><?php echo $genderErr;
                                                                                                } ?></span>
                    </label>
                    <label>
                        <span>image</span>
                        <input type="file" name="image" id="image">
                        <?php if (isset($websiteErr) && !empty($websiteErr)) { ?> <span class="error"><?php echo $websiteErr;
                                                                                                    } ?></span>
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