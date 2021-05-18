<?php

include '../controller/EvenementC.php';
include_once '../model/Evenement.php';
session_start();
// On teste si la variable de session existe et contient une valeur
if (empty($_SESSION['e'])) {
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: connexion.php');
} else {

    $error = "";

    // create user
    $AlimentC = new EvenementC();
    $ProduitC = new EvenementC();
    $listeProduits = $ProduitC->afficherevenement();
    if (
        isset($_POST["titre"]) &&
        isset($_POST["description"]) &&
        isset($_POST["date_debut"]) &&
        isset($_POST["date_fin"]) &&
        isset($_POST["image"]) &&
        isset($_POST["id_utilisateur"])
    ) {
        if (
            !empty($_POST["titre"]) &&
            !empty($_POST["description"]) &&
            !empty($_POST["date_debut"]) &&
            !empty($_POST["date_fin"]) &&
            !empty($_POST["image"]) &&
            !empty($_POST["id_utilisateur"])
        ) {
            $user = new Evenement(
                $_POST['titre'],
                $_POST['description'],
                $_POST['date_debut'],
                $_POST['date_fin'],
                $_POST['image'],
                $_POST['id_utilisateur'],
            );
            $AlimentC->modifierevenement($user, $_GET['id_evenement']);
            header('Location:dashboard-modevent.php');
        } else
            $error = "Missing information";
    }
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
        }
    </style>
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
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
                                <a class="dropdown-item" href="deconnexion.php"><i class="fas fa-power-off mr-2"></i>Logout</a>
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
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link active" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fa fa-fw fa-user-circle"></i>Produits/Recettes <span class="badge badge-success">6</span></a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-2" aria-controls="submenu-1-2">Produits</a>
                                            <div id="submenu-1-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-produits.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modprod.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1-1" aria-controls="submenu-1-1">Recettes</a>
                                            <div id="submenu-1-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-recettes.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modRe.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fa fa-fw fa-rocket"></i>Restaurants/Reviews</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-restaurants.php" aria-expanded="false" data-target="#submenu-2-1" aria-controls="submenu-2-1">Restaurants</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-reviews.php" aria-expanded="false" data-target="#submenu-2-2" aria-controls="submenu-2-2">Reviews</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3" aria-controls="submenu-3"><i class="fas fa-fw fa-chart-pie"></i>Evenements/billets</a>
                                <div id="submenu-3" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3-1" aria-controls="submenu-3-1">Evenements</a>
                                            <div id="submenu-3-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-Evenements.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modevent.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-3-2" aria-controls="submenu-3-2">Billets</a>
                                            <div id="submenu-3-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modbillet.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Materiels/Commandes</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4-1" aria-controls="submenu-4-1">Materiels</a>
                                            <div id="submenu-4-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-materiel.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modmateriel.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4-2" aria-controls="submenu-4-2">Commandes</a>
                                            <div id="submenu-4-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-commande.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modcommande.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Blog/Reclamations</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5-1" aria-controls="submenu-5-1">Blog</a>
                                            <div id="submenu-5-1" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-blog.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modBlog.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5-2" aria-controls="submenu-5-2">Reclamations</a>
                                            <div id="submenu-5-2" class="collapse submenu" style="">
                                                <ul class="nav flex-column">
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-reclamation.php">ajouter</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link" href="dashboard-modreclamation.php">modifier</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="nav-divider">
                                Features
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-7" aria-controls="submenu-7"><i class="fas fa-fw fa-inbox"></i>Gestion des comptes <span class="badge badge-secondary">New</span></a>
                                <div id="submenu-7" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-utilisateur.php">ajouter</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="dashboard-modutilisateur.php">modifier</a>
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
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Evenements </h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->

                    <div class="row">

                        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Modification</h5>
                                <div id="error">
                                    <?php echo $error; ?>
                                </div>
                                <div id="error">
                                    <?php echo $error; ?>
                                </div>
                                <?php
                                if (isset($_GET['id_evenement'])) {
                                    $user = $AlimentC->recupererevenement($_GET['id_evenement']);

                                ?>
                                    <form action="" method="POST">
                                        <table border="1" align="center">
                                            <div class="form-group">

                                                <label for="id_produit">id:
                                                </label>

                                                <input type="text" name="id_evenement" id="id_evenement" value="<?php echo $user['id_evenement']; ?>">
                                            </div>
                                            <tr>
                                                <div class="form-group">
                                                    <input class="form-control" id="titre" name="titre" type="text" placeholder="titre" />


                                                </div>
                                                <div class="form-group form-group-textarea mb-md-0">
                                                    <textarea class="form-control" name="description" id="description" placeholder="description *"></textarea>

                                                </div>
                                                <div class="form-group">

                                                    <input class="form-control" id="date_debut" name="date_debut" type="datetime-local" placeholder="date_debut" />
                                                </div>
                                                <div class="form-group">



                                                    <input class="form-control" id="date_fin" name="date_fin" type="datetime-local" placeholder="date_fin" />
                                                </div>

                                                <div class="form-group">

                                                    <input class="form-control" id="image" name="image" type="file" placeholder="image" />
                                                </div>

                                                <div class="form-group">

                                                    <input class="form-control" id="id_utilisateur" name="id_utilisateur" type="number" placeholder="id" value="<?php echo $_SESSION['lista']; ?>" />
                                                </div>

                                            <tr>

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
                                <?php
                                };
                                ?>
                            </div>

                        </div>
                        
                        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Affichage</h5>
                                <table border=1 align='center' class="content-table" id="example">
                                    <thead>
                                        <tr>
                                            <th>Id evenement</th>
                                            <th>titre</th>
                                            <th>description</th>
                                            <th>date debut</th>
                                            <th>date fin</th>
                                            <th>image</th>
                                            <th>id_utilisateur</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?PHP
                                        foreach ($listeProduits as $user) {
                                        ?>
                                            <tr>
                                                <td><?PHP echo $user['id_evenement']; ?></td>
                                                <td><?PHP echo $user['titre']; ?></td>
                                                <td><?PHP echo $user['description']; ?></td>
                                                <td><?PHP echo $user['date_debut']; ?></td>
                                                <td><?PHP echo $user['date_fin']; ?></td>
                                                <td><img src="../images/<?php echo $user['image']; ?>" width="200px" height="200px"></td>
                                                <td><?PHP echo $user['id_utilisateur']; ?></td>
                                                <td>
                                                    <form method="POST" action="supprimerEvenement.php">
                                                        <input type="submit" name="supprimer" value="supprimer">
                                                        <input type="hidden" value=<?PHP echo $user['id_evenement']; ?> name="id_evenement">
                                                    </form>
                                                </td>
                                                <td>
                                                    <a href="dashboard-modevent.php?id_evenement=<?PHP echo $user['id_evenement']; ?>"> Modifier </a>
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
                </div>
            </div>
        </div>
        <center>
            <button class="btn btn-success" id="json">JSON</button>
            <button class="btn btn-success" id="pdf">PDF</button>
            <button class="btn btn-success" id="csv">CSV</button>
        </center>
        <script type="text/javascript" src="src/jquery-3.3.1.slim.min.js"></script>
        <script type="text/javascript" src="src/jspdf.min.js"></script>
        <script type="text/javascript" src="src/jspdf.plugin.autotable.min.js"></script>
        <script type="text/javascript" src="src/tableHTMLExport.js"></script>
        <script type="text/javascript">
            $("#json").on("click", function() {
                $("#example").tableHTMLExport({
                    type: 'json',
                    filename: 'sample.json'
                });
            });

            $("#pdf").on("click", function() {
                $("#example").tableHTMLExport({
                    type: 'pdf',
                    filename: 'sample.pdf'
                });
            });

            $("#csv").on("click", function() {
                $("#example").tableHTMLExport({
                    type: 'csv',
                    filename: 'sample.csv'
                });
            });
        </script>
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