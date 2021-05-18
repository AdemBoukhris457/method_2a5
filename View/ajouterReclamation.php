<?php
include_once '../model/Reclamation.php';
include_once '../controller/ReclamationC.php';

session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {
    $error = "";
    // create user
    $user = null;
    $AlimentC = new ReclamationC();
    if (
        isset($_POST["titre"]) &&
        isset($_POST["citation"]) &&
        isset($_POST["date"]) &&
        isset($_POST["id_utilisateur"])
    ) {
        if (
            !empty($_POST["titre"]) &&
            !empty($_POST["citation"]) &&
            !empty($_POST["date"]) &&
            !empty($_POST["id_utilisateur"])
        ) {
            $user = new Reclamation(
                $_POST['titre'],
                $_POST['citation'],
                date('Y-m-d', strtotime($_POST['date'])),
                $_POST['id_utilisateur'],
            );
            $AlimentC->ajouterReclamation($user);
            header('Location:afficherReclamations.php');
        } else
            $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ajout aliments</title>

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
    <style>
        *,
        *:before,
        *:after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Nunito', sans-serif;
        }

        body {
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background-image: url(reclamation.jpg);
            background-size: cover;
            -webkit-background-size: cover;
            background-repeat: no-repeat;
            font-family: 'Nunito', sans-serif;
        }

        input,
        button {
            border: none;
            outline: none;
            background: none;
        }

        .cont {
            overflow: hidden;
            position: relative;
            width: 900px;
            height: 550px;
            background: #fff;
            box-shadow: 0 19px 38px rgba(0, 0, 0, 0.30), 0 15px 12px rgba(0, 0, 0, 0.22);
        }

        .form {
            position: relative;
            width: 640px;
            height: 100%;
            padding: 50px 30px;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        h2 {
            width: 100%;
            font-size: 30px;
            text-align: center;
        }

        label {
            display: block;
            width: 260px;
            margin: 8px auto 0;
            text-align: center;
        }

        label span {
            font-size: 14px;
            font-weight: 600;
            color: #505f75;
            text-transform: uppercase;
        }

        input {
            display: block;
            width: 100%;
            margin-top: 5px;
            font-size: 16px;
            padding-bottom: 5px;
            border-bottom: 1px solid rgba(109, 93, 93, 0.4);
            text-align: center;
            font-family: 'Nunito', sans-serif;
        }

        button {
            display: block;
            margin: 0 auto;
            width: 260px;
            height: 36px;
            border-radius: 30px;
            color: #fff;
            font-size: 15px;
            cursor: pointer;
        }

        .submit {
            margin-top: 40px;
            margin-bottom: 30px;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Nunito', sans-serif;
            background: -webkit-linear-gradient(left, #7579ff, #b224ef);
        }

        .submit:hover {
            background: -webkit-linear-gradient(left, #b224ef, #7579ff);
        }

        .forgot-pass {
            margin-top: 15px;
            text-align: center;
            font-size: 14px;
            font-weight: 600;
            color: #0c0101;
            cursor: pointer;
        }

        .forgot-pass:hover {
            color: red;
        }

        .social-media {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }

        .social-media ul {
            list-style: none;
        }

        .social-media ul li {
            display: inline-block;
            cursor: pointer;
            margin: 25px 15px;
        }

        .social-media img {
            width: 40px;
            height: 40px;
        }

        .sub-cont {
            overflow: hidden;
            position: absolute;
            left: 640px;
            top: 0;
            width: 900px;
            height: 100%;
            padding-left: 260px;
            background: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out;
        }

        .cont.s-signup .sub-cont {
            -webkit-transform: translate3d(-640px, 0, 0);
            transform: translate3d(-640px, 0, 0);
        }

        .img {
            overflow: hidden;
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 260px;
            height: 100%;
            padding-top: 360px;
        }

        .img:before {
            content: '';
            position: absolute;
            right: 0;
            top: 0;
            width: 900px;
            height: 100%;
            background-image: url(reclamation.jpg);
            background-size: cover;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img:after {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.3);
        }

        .cont.s-signup .img:before {
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .img-text {
            z-index: 2;
            position: absolute;
            left: 0;
            top: 50px;
            width: 100%;
            padding: 0 20px;
            text-align: center;
            color: #fff;
            -webkit-transition: -webkit-transform 1.2s ease-in-out;
            transition: -webkit-transform 1.2s ease-in-out;
            transition: transform 1.2s ease-in-out, -webkit-transform 1.2s ease-in-out;
        }

        .img-text h2 {
            margin-bottom: 10px;
            font-weight: normal;
        }

        .img-text p {
            font-size: 14px;
            line-height: 1.5;
        }

        .cont.s-signup .img-text.m-up {
            -webkit-transform: translateX(520px);
            transform: translateX(520px);
        }

        .img-text.m-in {
            -webkit-transform: translateX(-520px);
            transform: translateX(-520px);
        }

        .cont.s-signup .img-text.m-in {
            -webkit-transform: translateX(0);
            transform: translateX(0);
        }


        .sign-in {
            padding-top: 65px;
            -webkit-transition-timing-function: ease-out;
            transition-timing-function: ease-out;
        }

        .cont.s-signup .sign-in {
            -webkit-transition-timing-function: ease-in-out;
            transition-timing-function: ease-in-out;
            -webkit-transition-duration: 1.2s;
            transition-duration: 1.2s;
            -webkit-transform: translate3d(640px, 0, 0);
            transform: translate3d(640px, 0, 0);
        }

        .img-btn {
            overflow: hidden;
            z-index: 2;
            position: relative;
            width: 100px;
            height: 36px;
            margin: 0 auto;
            background: transparent;
            color: #fff;
            text-transform: uppercase;
            font-size: 15px;
            cursor: pointer;
        }

        .img-btn:after {
            content: '';
            z-index: 2;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            border: 2px solid #fff;
            border-radius: 30px;
        }

        .img-btn span {
            position: absolute;
            left: 0;
            top: 0;
            display: -webkit-box;
            display: flex;
            -webkit-box-pack: center;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            -webkit-transition: -webkit-transform 1.2s;
            transition: -webkit-transform 1.2s;
            transition: transform 1.2s;
            transition: transform 1.2s, -webkit-transform 1.2s;
            ;
        }

        .img-btn span.m-in {
            -webkit-transform: translateY(-72px);
            transform: translateY(-72px);
        }

        .cont.s-signup .img-btn span.m-in {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        .cont.s-signup .img-btn span.m-up {
            -webkit-transform: translateY(72px);
            transform: translateY(72px);
        }

        .sign-up {
            -webkit-transform: translate3d(-900px, 0, 0);
            transform: translate3d(-900px, 0, 0);
        }

        .cont.s-signup .sign-up {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
        }

        .btn {
            text-align: center;
            font-family: "Roboto", sans-serif;
            font-size: 17px;
            font-weight: bold;
            background: #1E90FF;
            width: 160px;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            -webkit-transition-duration: 0.3s;
            transition-duration: 0.3s;
            -webkit-transition-property: box-shadow, transform;
            transition-property: box-shadow, transform;
        }

        .btn:hover,
        .btn:focus,
        .btn:active {
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            -webkit-transform: scale(1.1);
            transform: scale(1.1);
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
                    <span>titre</span>
                    <input type="text" name="titre" id="titre" maxlength="20">

                </label>
                <label>
                    <span>citation</span>
                    <input type="text" name="citation" id="citation" maxlength="20">
                </label>
                <label>
                    <span>date</span>
                    <input type="date" name="date" id="date">
                </label>
                <label>
                    <span>id utilisateur</span>
                    <input type="number" name="id_utilisateur" id="id_utilisateur" value="<?php echo $_SESSION['lista']; ?>">
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