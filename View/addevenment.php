<?php
    include_once '../model/event.php';
    include_once '../Controleur/eventC.php';

    $error = "";
    $success = 0;

    // create user
    $evenement = null;

    // create an instance of the controller
    $evenementC = new evenementC();
    if (
        isset($_POST["titre"]) && 
        isset($_POST["description"])&&
                isset($_POST["date_debut"])&&
                                isset($_POST["date_fin"])&&
                                isset($_POST["image"])



    ) {
        if (
            !empty($_POST["titre"]) && 
            !empty($_POST["description"]) &&
            !empty($_POST["date_debut"])&&
                        !empty($_POST["date_fin"])&&
                        !empty($_POST["image"])
                        

        ) 
            {
           
            $evenement = new evenement(
                $_POST['titre'],
                $_POST['description'],
                $_POST['date_debut'],
                  $_POST['date_fin'],
                  $_POST['image'],
           


              
            );
            $evenementC->ajouterevenement($evenement);
          // header('Location:login.php');

           
       }
           
    
        else
            $error = "Missing information";
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
    
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body>

        <div>
            <?php 
                if ($success === 1) {
                    $evenementC->afficherevenement ($evenement); 
                }
                
            ?>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                
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
                    <a class="d-xl-none d-lg-none" href="#">produits et recettes</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>
                        
                        
                    
                            <li class="nav-item ">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-4" aria-controls="submenu-4"><i class="fab fa-fw fa-wpforms"></i>Evenements et billetrie</a>
                                <div id="submenu-4" class="collapse submenu" style="">
                              
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="addevenment.php">Evenements</a>
                                         
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="afficher_billeterie.php">billeterie</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-5" aria-controls="submenu-5"><i class="fas fa-fw fa-table"></i>Utilisateurs</a>
                                <div id="submenu-5" class="collapse submenu" style="">
                                   
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
            <div class="dashboard-finance">
                <div class="container-fluid dashboard-content">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h3 class="mb-2">Events </h3>
                                <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <div class="container-fluid">
                <!--main content-->
                <div class="row">  
                  
                                   
                                <span class="pull-right">
                                    <i class="glyphicon glyphicon-chevron-up showhide clickable"></i>
                                    <i class="glyphicon glyphicon-remove removepanel"></i>
                                </span>
                            </div>
                            
                    <div class="row">
                        <div class="col-xl-9 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">ajout</h5>
                                <form onsubmit="return validateForm()"  action="" method="POST" id="myForm">
                                
      
        
                       
        
     
                                <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                   <div class="form-group">
                                <input class="form-control"  id="titre" name="titre" type="text" placeholder="titre"   />
                  
                
                    </div>
                    <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" name="description"  id="description" placeholder="description *"  ></textarea>
       
                            </div>
                            <div class="form-group">

<input class="form-control"  id="date_debut" name="date_debut" type="datetime-local"   placeholder="date_debut"   />
                           </div>
                             <div class="form-group">
              
              
                                              
 <input class="form-control"  id="date_fin" name="date_fin" type="datetime-local" placeholder="date_fin"   />
                            </div>
                           
                            <div class="form-group">
                                
                                <input class="form-control"  id="image" name="image" type="file" placeholder="image"   />
                                                           </div>
              
            
               
           
               
                                                           <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase"  type="submit">submit</button>
                   
                    
              
                      <a href="export.php"class="btn btn-warning" >export data</a>
                          <a href="showevenement.php"class="btn btn-warning" >view</a>
                          </div>
                      </div>
                       
                       </div>
                                    </table>
                                </form>
                            </div>
                        </div>

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                

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
      
</table>
        </form>
        <script>
                    function convertDateToUTC(date) { 
    return new Date(date.getUTCFullYear(), date.getUTCMonth(), date.getUTCDate(), date.getUTCHours(), date.getUTCMinutes(), date.getUTCSeconds()); 
}
function validateForm() {
      var titre = document.forms["myForm"]["titre"].value;

    var description = document.forms["myForm"]["description"].value;
     

    var image = document.forms["myForm"]["image"].value;
        var dateTimeStr = document.forms["myForm"]["date_debut"].value;
         var dateTimeStrfin = document.forms["myForm"]["date_fin"].value;

var date_debut = convertDateToUTC(new Date(dateTimeStr));
var date_fin = convertDateToUTC(new Date(dateTimeStrfin));
var now = new Date();
  if (titre == "") {
    alert("titre vide");
    return false;
  }
  
    if (description == "") {
    alert("description vide");
    return false;
  }
    if (isNaN(date_debut.getTime()) ) {

    alert("date_debut vide");
    return false;
  }
    if ( date_debut < now ) {

    alert("date_debut erreur");
    return false;
  }
 
    if (isNaN(date_fin.getTime()) ) {

    alert("date_fin vide");
    return false;
  }
    if ( date_fin < now ) {

    alert("date_fin erreur");
    return false;
  }
    if ( date_fin <= date_debut ) {

    alert("date_fin doit etre sup a date debut");
    return false;
  }
   

  
   
      if (image == "") {

    alert("image vide");
    return false;
  }

 
    
}
</script>

    </body>
</html>

          