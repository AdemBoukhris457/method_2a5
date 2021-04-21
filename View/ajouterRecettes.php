<?php
include_once '../model/restaurant.php';
include_once '../controller/restaurantC';


$error = "";

// create user
$user = null;
$RestaurantC = new restaurantC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["specialite"]) &&
    isset($_POST["score"]) &&
    isset($_POST["descriptiona"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["nbre_calories"]) &&
        !empty($_POST["poids"]) &&
        !empty($_POST["descriptiona"]) &&
        !empty($_POST["imagea"])
    ) {
        $user = new AlimentC(
            $_POST['nom'],
            $_POST['nbre_calories'],
            $_POST['poids'],
            $_POST['descriptiona'],
            $_POST['imagea']
        );
        $AlimentC->ajouterAliment($user);
        header('Location:afficherAliments.php');
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
    <link rel="stylesheet" href="aliments.css">
</head>

<body style="background-image: url('jjj.jpg'); background-repeat: no-repeat; background-size: cover;">
    <section class="hero" id="hero">
        <button><a href="afficherAliments.php">afficher les aliments</a></button>

        <hr>

        <div id="error">
            <?php echo $error; ?>
        </div>
        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="nom">Nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" maxlength="20"></td>
                <tr>
                    <td>
                        <label for="nbre_calories">nbre_calories:
                        </label>
                    </td>
                    <td><input type="number" name="nbre_calories" id="nbre_calories" maxlength="20"></td>
                </tr>

                <tr>
                    <td>
                        <label for="poids">poids:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="poids" id="poids">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="descriptiona">descriptiona:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="descriptiona" id="descriptiona">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="imagea">image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="imagea" id="imagea">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Envoyer">
                    </td>
                    <td>
                        <input type="reset" value="Annuler">
                    </td>
                </tr>
            </table>
        </form>
    </section>
</body>

</html>