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
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Favicon -->
  <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">

  <!-- Box icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" />

  <!-- Glidejs -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css" />
  <!-- Custom StyleSheet -->
  <link rel="stylesheet" href="./css/styles.css" />
  <title>Boy’s T-Shirt - Codevo</title>
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-default navbar-fixed-top probootstrap-navbar">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html" title="uiCookies:FineOak">FineOak</a>
      </div>

      <div id="navbar-collapse" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="./afficherAlimentss.php" style="font-size:12px;">produits/recettes</a></li>
          <li><a href="#" data-nav-section="specialties" style="font-size:12px;">restaurants/reviews</a></li>
          <li><a href="#" data-nav-section="menu" style="font-size:12px;">evenements/workshop</a></li>
          <li><a href="#" data-nav-section="reservation" style="font-size:12px;">commandes</a></li>
          <li><a href="#" data-nav-section="events" style="font-size:12px;">Events</a></li>
          <li><a href="#" data-nav-section="contact" style="font-size:12px;">Contact</a></li>
          <li><a href="#" data-nav-section="events" style="font-size:12px;">Events</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <?php
  if (isset($_GET['id_recette'])) {
    $user = $AlimentC->recupererUtilisateur($_GET['id_recette']);

  ?>
    <!-- Product Details -->
    <section class="section product-detail">
      <div class="details container-md">
        <div class="left">
          <div class="main">
            <img src="../images/<?php echo $user['image']; ?>" alt="" width="450px" height="585px">
          </div>

        </div>
        <div class="right">
          <h1><?PHP echo $user['nom']; ?></h1>
          <div class="price"><?PHP echo $user['ingredients']; ?></div>
          <div class="price"><?PHP echo $user['specialite']; ?></div>


          <form class="form">
            <input type="text" placeholder="1">
          </form>
          <h2>description de la recette</h2>
          <p><?PHP echo $user['description']; ?></p>
        </div>
      </div>
    </section>
  <?php
  };
  ?>
  <!-- Related -->


  <!-- Footer -->

  <!-- End Footer -->

  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js"></script>
  <!-- Custom Script -->
  <script src="./js/index.js"></script>
</body>

</html>