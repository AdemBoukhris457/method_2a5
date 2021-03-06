<?php
include_once '../model/billet.php';
include_once '../Controller/billetC.php';

$error = "";
$success = 0;

// create user
$billeterie = null;
$idC = new billeterieC();
// create an instance of the controller
$billeterieC = new billeterieC();
if (
    isset($_POST["email"]) &&
    isset($_POST["cni"]) &&
    isset($_POST["nombre"]) &&
    isset($_POST["id_evenement"])


) {
    if (
        !empty($_POST["email"]) &&
        !empty($_POST["cni"]) &&
        !empty($_POST["nombre"]) &&
        !empty($_POST["id_evenement"])



    ) {

        $billeterie = new billeterie(
            $_POST['email'],
            $_POST['cni'],
            $_POST['nombre'],
            $_POST['id_evenement'],





        );
        $billeterieC->ajouterbilleterie($billeterie);
        header('Location:afficherEvenements.php');
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
    <title>book ticket</title>

    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
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
            background-image: url(tickets.jpg);
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
            background-image: url(tickets.jpg);
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


    <div id="error">
        <?php echo $error; ?>
    </div>
    <?php
    if (isset($_GET['id_evenement'])) {
        $user = $idC->recuperereventID($_GET['id_evenement']);

    ?>
        <div class="cont">
            <div class="form sign-in">
                <form onsubmit="return validate()" action="" method="POST" id="myForm">

                    <label>
                        <span>email</span>
                        <input type="text" name="email" id="email">
                    </label>
                    <label>
                        <span>cni</span>
                        <input type="text" name="cni" id="cni">
                    </label>
                    <label>
                        <span>nombre</span>
                        <input type="number" name="nombre" id="nombre">
                    </label>
                    <label>
                        <span>id evenement</span>
                        <input type="number" name="id_evenement" id="id_evenement" value="<?php echo $user['id_evenement']; ?>">
                    </label>

                    <label>
                        <input type="submit" value="Envoyer" class="btn">
                    </label>
                </form>
            </div>
        <?php
    };
        ?>
        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">

                </div>

            </div>

        </div>
        <script>
            function validate() {

                var nom = document.getElementById("nom").value;
                var email = document.getElementById("email").value;
                var nombre = document.getElementById("nombre").value;
                var cni = document.getElementById("cni").value;






                if (nom.length < 5) {

                    alert("Please Enter valid name");

                    return false;
                }
                if (email.indexOf("@") == -1 || email.length < 6) {
                    alert("Please Enter valid mail");
                    return false;
                }

                if (nombre <= 0) {


                    alert("le nombre de ticket doit etre positive");

                    return false;

                }

                if (cni.length < 8) {

                    alert(" v??rifier votre cni");

                    return false;

                }

            }
        </script>
        </div>

</body>