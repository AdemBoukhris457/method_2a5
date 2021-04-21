
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout Restaurant</title>
    <link rel="stylesheet" href="aliments.css">
</head>

<body style="background-image: url('jjj.jpg'); background-repeat: no-repeat; background-size: cover;">
    <section class="hero" id="hero">
        <button><a href="afficherAliments.php">afficher Restaurants</a></button>

        <hr>

        <div id="error">  
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
                        <label for="description">Description:
                        </label>
                    </td>
                    <td><input type="text" name="description" id="description" ></td>
                </tr>

                <tr>
                    <td>
                        <label for="score">Score:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="score" id="score">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="specialite">Specialité:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="specialite" id="specialite">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="localisation">Localisation:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="localisation" id="localisation">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="num_tel">Numéro Telephone:
                        </label>
                    </td>
                    <td>
                        <input type="number" name="num_tel" id="num_tel">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="image">Image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="image" id="image">
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
                <?php
include '../Model/restaurant.php';
include '../Controller/restaurantC.php';


$error = "";

// create user
$user = null;
$RestaurantC = new restaurantC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["description"]) &&
    isset($_POST["score"]) &&
    isset($_POST["specialite"]) &&
    isset($_POST["localisation"]) &&
    isset($_POST["num_tel"]) &&
    isset($_POST["image"])
) {
    if (
        !empty($_POST["nom"]) &&
        !empty($_POST["description"]) &&
        !empty($_POST["score"]) &&
        !empty($_POST["specialite"]) &&
        !empty($_POST["localisation"]) &&
        !empty($_POST["num_tel"]) &&
        !empty($_POST["image"])
        
    ) {
        $pog="Test works";
        $user = new restaurant(
            $_POST['nom'],
            $_POST['description'],
            $_POST['score'],
            $_POST['specialite'],
            $_POST['localisation'],
            $_POST['num_tel'],
            $_POST['image'],
        );
        $RestaurantC->ajouterRestaurant($user);

?>
    <tr>
            <th>Nom</th>
            <th>Description</th>
            <th>Score</th>
            <th>Specialité</th>
            <th>Localisation</th>
            <th>Tel_num</th>
            <th>Image</th>
        </tr>
        <tr>
                <td><?PHP echo $pog ?></td>
                <td><?PHP echo $user->getNom(); ?></td>
                <td><?PHP echo $user->getNom();  ?></td>
                <td><?PHP echo $user->getNom();  ?></td>
                <td><?PHP echo $user->getNom(); ?></td>
                <td><?PHP echo $user->getNom();  ?></td>
                <td><?PHP echo $user->getNom();  ?></td>
            </table>
<?php 
    } else
        $error = "Missing information";} ?>
        </form>
    </section>
</body>

</html>