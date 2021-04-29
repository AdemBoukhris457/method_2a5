<?php
include "../Controller/restaurantC.php";
include "../Controller/ReviewC.php";

$RestaurantC = new RestaurantC();
$listeResto = $RestaurantC->afficherRestaurants();
$ReviewC =new ReviewC();
$listeReviews = $ReviewC->afficherReviews();
?>
<?php

$error = "";

// create user
$check=false;
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
        $upper=$_POST["nom"][0];
        if(ctype_upper($upper) && $_POST["score"]>=0 && $_POST["score"]<=5 && is_numeric($_POST["specialite"])==false ){
        $check=true;
        }
            if(ctype_upper($upper)==false)
            {
                $error.="Entrer un nom majuscule\n";
            }
            if($_POST["score"]>5 || $_POST["score"]<0){
                $error.="Entrer un score entre 0 et 5\n";
            }
            if(is_numeric($_POST["specialite"])==true){
                $error.="Verifier le champ specialité\n";
            }
        $user = new restaurant(
            $_POST['nom'],
            $_POST['description'],
            intval($_POST['score']),
            $_POST['specialite'],
            $_POST['localisation'],
            intval($_POST['num_tel']),
            $_POST['image'],
        );
        if($_POST['action'] == 'Ajouter'&&$check) {
            $RestaurantC->ajouterRestaurant($user);
            header('location:dashboard-restaurants.php');
        }
        
    }
  else
        $error= "Missing information";
}


?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/vector-map/jqvmap.css">
    <link href="assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css" />
    <title>Admin Dashboard</title>
    <style> 

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.8em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: left;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 8px 10px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}</style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="#">Recipes for days</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li>
                        <li class="nav-item dropdown notification">
                            <a class="nav-link nav-icons" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-fw fa-bell"></i> <span class="indicator"></span></a>
                            <ul class="dropdown-menu dropdown-menu-right notification-dropdown">
                                <li>
                                    <div class="notification-title"> Notification</div>
                                    <div class="notification-list">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-2.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jeremy Rakestraw</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-3.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">John Abraham </span>is now following you
                                                        <div class="notification-date">2 days ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-4.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Monaan Pechi</span> is watching your main repository
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="#" class="list-group-item list-group-item-action">
                                                <div class="notification-info">
                                                    <div class="notification-list-user-img"><img src="assets/images/avatar-5.jpg" alt="" class="user-avatar-md rounded-circle"></div>
                                                    <div class="notification-list-user-block"><span class="notification-list-user-name">Jessica Caruso</span>accepted your invitation to join the team.
                                                        <div class="notification-date">2 min ago</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-footer"> <a href="#">View all notifications</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown connection">
                            <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fas fa-fw fa-th"></i> </a>
                            <ul class="dropdown-menu dropdown-menu-right connection-dropdown">
                                <li class="connection-list">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/github.png" alt=""> <span>Github</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dribbble.png" alt=""> <span>Dribbble</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/dropbox.png" alt=""> <span>Dropbox</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/bitbucket.png" alt=""> <span>Bitbucket</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/mail_chimp.png" alt=""><span>Mail chimp</span></a>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 ">
                                            <a href="#" class="connection-item"><img src="assets/images/slack.png" alt=""> <span>Slack</span></a>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="conntection-footer"><a href="#">More</a></div>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/avatar-1.jpg" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-cog mr-2"></i>Setting</a>
                                <a class="dropdown-item" href="#"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Restaurants et reviews</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Produits et Recettes<span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-produits.php">produits</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-recettes.php">recettes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Restaurants et Reviews</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-restaurants.php">Restaurants<span class="badge badge-secondary">New</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-reviews.php">Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Reclamations et Blog</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-c3.html">Reclamations</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/chart-chartist.html">Blog</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Evenements et Workshop</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-elements.html">Evenements</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/form-validation.html">Workshop</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Utilisateurs</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/general-table.html">Utilisateurs</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-6" aria-controls="submenu-6"><i class="fas fa-fw fa-file"></i>Commandes</a>
                                <div id="submenu-6" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="pages/blank-page.html">Commandes</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid dashboard-content">
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-10">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="page-header" id="top">
                                <div id="error" class="error">
                                     <h3><?php echo nl2br($error); ?></h3>
                                </div>
                                    <h2 class="pageheader-title">Restaurants </h2>
                                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                                        <div class="page-breadcrumb">
                                            <nav aria-label="breadcrumb">
                                                <ol class="breadcrumb">
                                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                                    <li class="breadcrumb-item active" aria-current="page">Form Elements</li>
                                                </ol>
                                            </nav>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end pageheader  -->
                        <!-- ============================================================== -->
                        
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <div class="card">
                                        <h3 class="card-header" id="ajout" >Ajouter</h3>
                                        <form action="dashboard-restaurants.php" method="POST" >
                                            <table  class="table">
                                                    <tr>
                                                        <td>
                                                        <label for="nom">Nom:
                                                </label>
                                                </td>
                                                <td><input type="text" class="form-control" name="nom" id="nom" maxlength="50" placeholder="Entrer un nom majuscule"></td>
                                                <tr>
                                                <td>
                                                <label for="description">Description:
                                                </label>
                                                </td>
                                                <td><textarea class="form-control" type="textarea" name="description" id="description" cols="30" rows="10" ></textarea></td>
                                                </tr>
                        
                                                <tr>
                                                <td>
                                                <label for="score">Score:
                                                </label>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" name="score" id="score" placeholder="Entre 0 et 5">
                                                </td>
                                                </tr>
                                                <tr>
                                                <td>
                                                    <label for="specialite">Specialité:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="specialite" id="specialite">
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="localisation">Localisation:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="text" class="form-control" name="localisation" id="localisation">
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="num_tel">Numéro Telephone:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="tel" class="form-control" name="num_tel" id="num_tel" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3}" placeholder="93-345-678">
                                                </td>
                                                                </tr>
                                                                <tr>
                                                <td>
                                                    <label for="image">Image:
                                                    </label>
                                                </td>
                                                <td>
                                                    <input type="file" class="form-control" name="image" id="image">
                                                </td>
                                                                </tr>
                                                                    <tr>
                                                                        <td></td>
                                                                        <td >
                                                                            <input type="submit" value="Ajouter" name="action" class="btn-primary btn-lg">
                                                                        </td>
                                                                    </tr>
                                            </table>
                                        </form>
                                    </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                        <h3 class="card-header" id="Modif">Modification</3>
                                        <form action="modifierRestaurants.php" method="POST">
                                            <table  class="table">
                                                <tr>
                                                    <td>
                                                        <label for="id">ID:
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <input type="number" name="id1" id="id1">
                                                    </td>
                                                </tr>
                                                <tr>
                                                                    <td>
                                                                    <label for="nom">Nom:
                                                </label>
                                            </td>
                                            <td><input type="text" class="form-control" name="nom1" id="nom1" maxlength="50" placeholder="Entrer un nom Majuscule"></td>
                                                            <tr>
                                            <td>
                                                <label for="description">Description:
                                                </label>
                                            </td>
                                            <td><textarea class="form-control" type="textarea" name="description1" id="description1" cols="30" rows="10" ></textarea></td>
                                                            </tr>
                        
                                                            <tr>
                                            <td>
                                                <label for="score">Score:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="score1" id="score1" placeholder="Entre 0 et 5">
                                            </td>
                                                            </tr>
                                                            <tr>
                                            <td>
                                                <label for="specialite">Specialité:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="specialite1" id="specialite1">
                                            </td>
                                                            </tr>
                                                            <tr>
                                            <td>
                                                <label for="localisation">Localisation:
                                                </label>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="localisation1" id="localisation1">
                                                </td>
                                                            </tr>
                                                            <tr>
                                                <td>
                                                <label for="num_tel">Numéro Telephone:
                                                </label>
                                                    </td>
                                                <td>
                                                <input type="tel" class="form-control" name="num_tel1" id="num_tel1" pattern="[0-9]{2}-[0-9]{3}-[0-9]{3} " placeholder="93-345-678">
                                                </td>
                                                            </tr>
                                                            <tr>
                                                <td>
                                                <label for="image">Image:
                                                </label>
                                                </td>
                                                <td>
                                                <input type="file" class="form-control" name="image1" id="image1">
                                                </td>
                                            </tr>
                                                <tr>
                                                    <td></td>
                                                    <td >
                                                        <input type="submit" value="Modifier" name="action" class="btn-primary btn-lg">
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                </div>
                            </div>
                        </div>
                        
                        
                            <div class="row">
                            <!-- ============================================================== -->
                            <!-- ap and ar balance  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                                    <h3 class="card-header" id="Affichage">Affichage
                                    </h5>
                                    <div class="card">
                                    <table  class="content-table">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Nom</th>
                                            <th>Description</th>
                                            <th>Score</th>
                                            <th>Specialite</th>
                                            <th>Localisation</th>
                                            <th>Numero Telephone</th>
                                            <th>Image</th>
                                            <th>Supprimer</th>
                                        </tr>
                                        </thead>
                                        <?PHP
                                        foreach ($listeResto as $user) {
                                        ?>
                                            <tbody>
                                            <tr class="active-row">
                                                <td><?PHP echo $user['id_restaurant']; ?></td>
                                                <td><?PHP echo $user['nom']; ?></td>
                                                <td><textarea class="form-control"><?PHP echo $user['description']; ?></textarea></td>
                                                <td><?PHP echo $user['score']; ?></td>
                                                <td><?PHP echo $user['specialite']; ?></td>
                                                <td><?PHP echo $user['localisation']; ?></td>
                                                <td><?PHP echo $user['num_tel']; ?></td>
                                                <td><img src="../images/<?php echo $user['image'];?>" width="200px" height="200px" class="figure-img"> </td>
                        
                                                <td >
                                                    <form method="POST" action="supprimer-restaurants.php" class="form">
                                                        <input type="submit" name="supprimer" value="supprimer" class="btn-light btn-lg">
                                                        <input type="hidden" value=<?PHP echo $user['id_restaurant']; ?> name="id_restaurant">
                                                    </form>
                                                </td>
                                            </tr>
                                        <?PHP
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                             </div>
                            </div>
                        </div>
                        
                        <!-- end ap and ar balance  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- gross profit  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- end gross profit  -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- profit margin  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
                        <div class="sidebar-nav-fixed">
                            <ul class="list-unstyled">
                                <li><a href="#Ajout" class="active">Ajout</a></li>
                                <li><a href="#Modif">Modification</a></li>
                                <li><a href="#Affichage">Affichage</a></li>
                                
                            </ul>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end profit margin -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- earnings before interest tax  -->
                    <!-- ============================================================== -->


                    <!-- ============================================================== -->
                    <!-- end inventory turnover -->
                    <!-- ============================================================== -->
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
                    
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <!-- bootstap bundle js -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <!-- slimscroll js -->
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <!-- chart chartist js -->
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/Chartistjs.js"></script>
    <script src="assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js"></script>
    <!-- chart C3 js -->
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <!-- chartjs js -->
    <script src="assets/vendor/charts/charts-bundle/Chart.bundle.js"></script>
    <script src="assets/vendor/charts/charts-bundle/chartjs.js"></script>
    <!-- sparkline js -->
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    <!-- dashboard finance js -->
    <script src="assets/libs/js/dashboard-finance.js"></script>
    <!-- main js -->
    <script src="assets/libs/js/main-js.js"></script>
    <!-- gauge js -->
    <script src="assets/vendor/gauge/gauge.min.js"></script>
    <!-- morris js -->
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morrisjs.html"></script>
    <!-- daterangepicker js -->
    <script src="../../../../cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="../../../../cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
            });
        });
    </script>
</body>

</html>