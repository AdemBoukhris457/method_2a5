<?php
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';

$error = "";

// create user
$user = null;

// create an instance of the controller
$userC = new UtilisateurC();
if (
    isset($_POST["nom_utilisateur"]) &&
    isset($_POST["password"]) &&
    isset($_POST["email"]) &&
    isset($_POST["prenom_utilisateur"]) &&
    isset($_POST["code_postal"]) &&
    isset($_POST["pays"]) &&
    isset($_POST["numero_tel"]) &&
    isset($_POST["type"])
) {
    if (
        !empty($_POST["nom_utilisateur"]) &&
        !empty($_POST["password"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["prenom_utilisateur"]) &&
        !empty($_POST["code_postal"]) &&
        !empty($_POST["pays"]) &&
        !empty($_POST["numero_tel"]) &&
        !empty($_POST["type"])
    ) {
        $user = new Utilisateur(
            $_POST['nom_utilisateur'],
            $_POST['prenom_utilisateur'],
            $_POST['email'],
            $_POST['type'],
            $_POST['password'],
            $_POST['code_postal'],
            $_POST['pays'],
            $_POST['numero_tel']
            
        );
        $userC->ajouterUtilisateur($user);
        header('Location:afficherUtilisateur.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="afficherUtilisateurs.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="nom_utilisateur">Nom:
                    </label>
                </td>
                <td><input type="text" name="nom_utilisateur" id="nom_utiisateur" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="password">Password:
                    </label>
                </td>
                <td><input type="text" name="password" id="password" maxlength="20"></td>
            </tr>

            <tr>
                <td>
                    <label for="email">Adresse mail:
                    </label>
                </td>
                <td>
                    <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="prenom_utilisateur">prenom:
                    </label>
                </td>
                <td>
                    <input type="text" name="prenom_utilisateur" id="prenom_utilisateur">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="code_postal">code postal:
                    </label>
                </td>
                <td>
                    <input type="number" name="code_postal" id="code_postal">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="pays">pays:
                    </label>
                </td>
                <td>
                    <input type="text" name="pays" id="pays">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="numero_tel">numero:
                    </label>
                </td>
                <td>
                    <input type="number" name="numero_tel" id="numero_tel">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">type:
                    </label>
                </td>
                <td>
                    <input type="text" name="type" id="type">
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
</body>

</html>