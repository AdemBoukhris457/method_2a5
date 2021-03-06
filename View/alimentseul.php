<?php

include '../controller/RecettesC.php';
include_once '../model/Recettes.php';

$error = "";
$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
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
    $name = $_POST["nom"];
    $length = strlen($name);
    if (empty($_POST["nom"])) {
        $nameErr = "Name is required";
    } else
    if (!preg_match("/^[a-zA-z]*$/", $name)) {
        $nameErr = "seules les alphabets et les espaces sont permises";
    }
    $ingrediants = $_POST["ingredients"];
    $length = strlen($ingrediants);
    if (empty($_POST["ingredients"])) {
        $agreeErr = "Name is required";
    } else
    if (!preg_match("/^[a-zA-z]*$/", $ingrediants)) {
        $agreeErr = "seules les alphabets et les espaces sont permises";
    }
    $specialite = $_POST["specialite"];
    $length = strlen($specialite);
    if (empty($_POST["specialite"])) {
        $emailErr = "Name is required";
    } else
    if (!preg_match("/^[a-zA-z]*$/", $specialite)) {
        $emailErr = "seules les alphabets et les espaces sont permises";
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
        !empty($_POST["ingredients"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["specialite"]) &&
        !empty($_POST["image"]) &&
        !empty($_POST["id_produit"]) &&
        preg_match("/^[a-zA-z]*$/", $name) &&
        preg_match("/^[a-zA-z]*$/", $ingrediants) &&
        preg_match("/^[a-zA-z]*$/", $specialite) &&
        $length > 3 &&
        in_array($rest, $people)
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
                        <span>nom</span>
                        <input type="text" name="nom" id="nom" maxlength="20" value="<?php echo $user['nom']; ?>">
                        <span><?PHP echo $user['nom']; ?> calories</span>

                    </label>
                    <label>
                        <span>ingrediants</span>
                        <input type="text" name="ingredients" id="ingredients" maxlength="20" value="<?php echo $user['ingredients']; ?>">
                    </label>
                    <label>
                        <span>description</span>
                        <input type="text" name="description" id="description" value="<?php echo $user['description']; ?>">
                    </label>
                    <label>
                        <span>specialit??</span>
                        <input type="text" name="specialite" id="specialite" value="<?php echo $user['specialite']; ?>">

                    </label>
                    <label>
                        <span>image</span>
                        <img src="../images/<?php echo $user['image']; ?>" width="200px" height="200px">
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
                        <p>2-il faut que le nom du produit corespand ?? l'image</p>
                    </div>

                </div>

            </div>
        </div>
    <?php
    };
    ?>
</body>

</html>