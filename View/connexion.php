<?php
session_start();
include_once '../Model/Utilisateur.php';
include_once '../Controller/UtilisateurC.php';
$message = "";
$t = "admin";
$userC = new UtilisateurC();
$userrC = new UtilisateurC();

if (
    isset($_POST["email"]) &&
    isset($_POST["password"])
) {
    if (
        !empty($_POST["email"]) &&
        !empty($_POST["password"])
    ) {
        $message = $userC->connexionUser($_POST["email"], $_POST["password"]);
        $ppp = $_POST["email"];
        $em = $_POST["password"];
        $user = $userrC->connexionUser1($_POST["email"], $_POST["password"]);
        $urr = $userrC->connexionUser2($_POST["email"], $_POST["password"]);
        $tt = $user;
        $test2 = $tt;

        $_SESSION['e'] = $_POST["email"];
        $_SESSION['password'] = $_POST["password"]; // on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur

        if ($message != 'pseudo ou le mot de passe est incorrect') {
            $_SESSION['l'] = implode($urr);
            if ($_SESSION['l'] != 'admin') {
                $_SESSION['lista'] = implode($test2);
                header('Location:index.php');
            } else {
                $_SESSION['lista'] = implode($test2);
                header('Location:dashboard-produits.php');
            }
        } else {
            $message = 'pseudo ou le mot de passe est incorrect';
        }
    } else
        $message = "Missing information";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styleconnexion.css" />
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form name="frmUser" method="post" action="" class="sign-in-form">
                    <h2 class="title">login</h2>
                    <div class="message">
                        <?php if ($message != "") {
                            echo $message;
                        } ?>
                    </div>

                    <div class="input-field">
                        <i class="fa fa-user absolute text-primarycolor text-xl"></i>
                        <input type="text" name="email" placeholder="Email">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <input type="submit" name="submit" value="connexion" class="btn solid">
                    <a href="AjouterUtilisateur.php"><input type="button" class="btn solid" value="creer un compte"></a>
                </form>

            </div>
            <div class="panels-container">
                <div class="panel left-panel">
                    <div class="content">
                        <h3>nouveau ici ?</h3>
                        <p>
                            Vous pouvez créer un compte si vous n'avez pas et vous pouvez connecter directement si vous avez un compte
                        </p>
                        <button class="btn transparent" id="sign-up-btn">
                            <a href="AjouterUtilisateur.php" style="text-decoration:none; color:white">Sign up</a>
                        </button>
                    </div>
                    <img src="Assetconnexion/sign.svg" class="image" alt="" height="400px" />
                </div>
            </div>
</body>

</html>