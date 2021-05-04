<?php
include_once '../model/Produit.php';
include_once '../controller/ProduitC.php';

$error = "";
$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr = $agreeErr = "";
// create user
$user = null;
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
        $AlimentC->ajouterProduit($user);
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
    <title>ajout aliments</title>
    <link rel="stylesheet" type="text/css" href="styleformulaire.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
    <script>
        function validate() {
            var name = document.getElementById('nom');
            var nb_calories = document.getElementById('nb_calories');

            if (name.value.trim() == "") {
                alert("no blank values");
                document.getElementById("monid").children[1].style.display = "unset";
                document.getElementById("monid").children[4].style.display = "unset";
                return false;
            } else {
                true;
            }
        }
    </script>
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
    <style>
        ul {
            color: #ff0000;
        }

        #i1 {
            display: none;
        }

        #i2 {
            display: none;
        }

        #i3 {
            display: none;
        }

        #i4 {
            display: none;
        }

        #i5 {
            display: none;
        }

        #i6 {
            display: none;
        }

        #i7 {
            display: none;
        }
    </style>
</head>

<body>


    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="cont">
        <div class="form sign-in">
            <form onsubmit="return validate()" action="" method="POST" id="myForm">
                <h2>ajout Produit</h2>
                <label>
                    <span>nom</span>
                    <input type="text" name="nom" id="nom" maxlength="20">
                    <?php if (isset($nameErr) && !empty($nameErr)) { ?> <span class="error"><?php echo $nameErr;
                                                                                        } ?></span>

                </label>
                <label>
                    <span>nbre calories</span>
                    <input type="number" name="nb_calories" id="nb_calories" maxlength="20">
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
                    <input type="submit" value="Envoyer" class="btn">
                </label>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>voulez ajouter un produit?</h2>
                    <ul id="monid">
                        <li id="i1">Le nom doit commencer par une lettre Majuscule</li>
                        <li id="i2">Le prenom doit commencer par une lettre Majuscule</li>
                        <li id="i3">La date est obligatoire</li>
                        <li id="i4">Numéro de téléphone erroné</li>
                        <li id="i5">Veuillez indiquer votre profession</li>
                        <li id="i6">Veuillez sélectionner au moins deux styles musicaux</li>
                        <li id="i7">Veuillez vérifiez le mot de passe saisi</li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</body>

</html>