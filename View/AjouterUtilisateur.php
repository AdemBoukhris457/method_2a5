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
        header('Location:indexvisiteur.php');
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
    <link rel="stylesheet" href="stylecompte.css">
</head>

<body>
    <div id="error">
        <?php echo $error; ?>
    </div>
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box">
                        <label for="nom_utilisateur">Nom:
                        </label>
                        <input type="text" name="nom_utilisateur" id="nom_utiisateur" maxlength="20"></td>
                    </div>
                    <div class="input-box">
                        <label for="password">Password:
                        </label>
                        <input type="text" name="password" id="password" maxlength="20">
                    </div>
                    <div class="input-box">
                        <label for="email">Adresse mail:
                        </label>
                        <input type="email" name="email" id="email" pattern=".+@gmail.com|.+@esprit.tn">
                    </div>
                    <div class="input-box">
                        <label for="prenom_utilisateur">prenom:
                        </label>
                        <input type="text" name="prenom_utilisateur" id="prenom_utilisateur">
                    </div>
                    <div class="input-box">
                        <label for="code_postal">code postal:
                        </label>
                        <input type="number" name="code_postal" id="code_postal">
                    </div>
                    <div class="input-box">
                        <label for="pays">pays:
                        </label>
                        <input type="text" name="pays" id="pays">
                    </div>
                    <div class="input-box">
                        <label for="numero_tel">numero:
                        </label>
                        <input type="number" name="numero_tel" id="numero_tel">
                    </div>
                    <div class="input-box">
                        <label for="type">type:
                        </label>
                        <input type="text" name="type" id="type">
                    </div>
                </div>
                <div class="button">
                    <input type="submit" value="Envoyer">

                </div>
            </form>
        </div>
    </div>
</body>

</html>