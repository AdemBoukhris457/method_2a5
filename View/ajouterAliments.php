<?php
include_once '../model/Produit.php';
include_once '../controller/ProduitC.php';

$error = "";

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

            if(name.value.trim() == "")
            {
                alert("no blank values");
                return false;
            }
            else
            {
                true;
            }
        }
    </script>

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
                </label>
                <label>
                    <span>image</span>
                    <input type="file" name="image" id="image">
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
                    <p>1-le nom ne doit pas contenir des chiffres</p>
                    <p>2-il faut que le nom du produit corespand à l'image</p>
                </div>

            </div>

        </div>
    </div>

</body>

</html>