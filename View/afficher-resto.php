<?php
include "../Controller/ReviewC.php";
include "../Controller/restaurantC.php";


$RestaurantC =new restaurantC;
$listeResto = $RestaurantC->afficherRestaurants();
$num= $RestaurantC->count_table();
$it=0;
if(isset($_POST["nom_resto"])&& !empty($_POST['nom_resto'])){
if($_POST["action"] =="Go"){
    $listeResto = $RestaurantC->recupererRestaurant($_POST["nom_resto"]);
    $page = $_SERVER['PHP_SELF'];
    $sec = "10";
    header("Refresh: $sec; url=$page");
}
}
if(isset($_POST["recherche-specialite"])&& !empty($_POST['recherche-specialite'])){
    if($_POST["action"] =="Go"){
        $listeResto = $RestaurantC->recupererRestaurantbySpecialite($_POST["recherche-specialite"]);
        $page = $_SERVER['PHP_SELF'];
        $sec = "10";
        header("Refresh: $sec; url=$page");
    }
    }
    if(isset($_POST["recherche-localisation"])&& !empty($_POST['recherche-localisation'])){
        if($_POST["action"] =="Go"){
            $listeResto = $RestaurantC->recupererRestaurantbyLocalisation($_POST["recherche-localisation"]);
            $page = $_SERVER['PHP_SELF'];
            $sec = "10";
            header("Refresh: $sec; url=$page");
        }
        }
if(isset($_POST["action"])&& $_POST["action"] =="Trier")
{
    $listeResto=$RestaurantC->TriSelon_Score();
    $page = $_SERVER['PHP_SELF'];
    $sec = "30";
    header("Refresh: $sec; url=$page");

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>recipes for days</title>
  <meta name="description" content="Free Bootstrap Theme by uicookies.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Pinyon+Script" rel="stylesheet">
  <link rel="stylesheet" href="css/styles-merged.css">
  <link rel="stylesheet" href="css/style.min.css">
  

  <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    <style>
          body{
        display: flex;
        overflow: hidden;
        margin-bottom: 100px;
    }
    .card{
        display: grid;
        grid-template-columns: 300px;
        grid-template-rows: 210px 210px 80px;
        grid-template-areas: "image" "text" "stats";

        font-family: roboto;
        border-radius: 18px;
        background:whitesmoke;
        box-shadow: 5px 5px 15px rgba(0,0,0,0.9);
        text-align: center;
        transition: 0.5s ease;
        cursor: pointer;

    }
.card-image{
    grid-area: image;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    background-size: cover;
    
}
.card-text{
    grid-area: text;
    margin: 25px;
}
.card-text .date{
    color: rgb(255,7,110);
    font-size: 15px;
}
.card-text h2{
    margin-top: 0px;
    font-size: 28px;
}
.card-stats{
    grid-area: stats;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    grid-template-rows: 1fr;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
    background: rgb(255,7,110);

}
.card-stats .stat{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    color: whitesmoke;
}
.card-stats .type{
    font-size:11px;
    font-weight: 300px;
    text-transform: uppercase;
}
.card-stats .value{
    font-size: 22px;
    font-weight: 500;
}
.card-stats .border{
    border-left: 1px solid rgb(172,26,87);
    border-left: 1px solid rgb(172,26,87);

}
.card-stats .value sup{
    font-size: 12px;

}
.card:hover{
    transform: scale(1.05);
    box-shadow: 5px 5px 15px rgba(0,0,0,0.6);
}
.hoy{
    position: absolute;
    top: 30%;
    left: 20%;
    bottom: 10%;
    margin-bottom: 100px;
}
.hoy .card{
    margin: 50px 0;
    margin-left: 20px;
    margin-right: 20px;
}
.card .btn{
    display: inline-block;
    color: white;
    text-align: center;
    justify-content: center;
    background-color: #5969ff;
    border-color: #5969ff;
    text-decoration: none;
    margin-top: 15px;
    padding: 10px 5px;
}
.button{
   position: absolute;
   top: 20%;
   left: 30%;
   bottom: 10%;
   margin-bottom: 100px;
}
.button input label{
    display: inline-block;
    color: white;
    text-align: center;
    justify-content: center;
    background-color: #5969ff;
    border-color: #5969ff;
    text-decoration: none;
    margin-top: 15px;
    padding: 10px 5px;
    font-size: 28px;

}
.button .btn{
    position: relative;
    display: flexbox;
    color: white;
    text-align: center;
    justify-content: center;
    background-color: #5969ff;
    border-color: #5969ff;
    
}

      
    </style>
</head>

<body>

  <!-- Fixed navbar -->

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

  
      <section >
      
              <div class="hoy">
                      <table>
                        <?php foreach($listeResto as $resto){ ?>
                            <?php if($it % 3==0){  ?>
                                <tr><?php } ?>
                              <td>
                                  <div class="card">
                                        <img class="card-image" src="../images/<?php echo $resto['image'];?>" width="300px" height="210px"></img>
                                        <div class="card-text">
                                            <span class="date">Updated 4days ago</span>
                                            <h2><?php echo $resto['nom'] ?></h2>
                                            <p><?php echo $resto['description'] ?> </p>
                                        </div>
                                        <div class="card-stats">
                                            <div class="stat">
                                            <div class="value">4<sup>m</sup></div>
                                            <div class="type">read</div>
                                            </div>
                                            <div class="stat border">
                                            <div class="value"><?php echo $resto['score'] ?></div>
                                            <div class="type">Score</div>
                                            </div>
                                            <div class="stat">
                                            <div class="value">32</div>
                                            <div class="type">reviews</div>
                                            </div>
                                        </div>
                                        
                                        <form action="supprimer-restaurants-front.php" method="POST">
                                            <input type="submit" name="action" value="supprimer" class="btn">
                                            <input type="submit" name="action" value="modifier" class="btn">
                                            <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restaurant">
                                        </form>
                                        <form action="restaurant-view.php" method="POST">
                                        <div>
                                        <input type="submit" name="action" value="View" class="btn form-control">
                                        <input type="hidden" value=<?PHP echo $resto['nom']; ?> name="nom_resto1">
                                        <input type="hidden" value=<?PHP echo $resto['id_restaurant']; ?> name="id_restoboy">
                                        </div>
                                        </form>
                                    </div>
                                    <?php $it++; ?>
                              </td>
                              <?php } ?>
                          </tr>
                          <?php  ?>
                      </table>
                  </div>
              </div>
              <div class="button">
              <form action="#" method="POST">
                  
                      <label for="Search">Rechercher:</label>
                      <input type="text" name="nom_resto" id="nom_resto">
                      
                      <input type="text" name="recherche-specialite" id="specialite-search" placeholder="Specialité">
                      <input type="text" name="recherche-localisation" id="recherche-specialite-search" placeholder="Localisation">
                      
                      <input type="submit" name="action" value="Go" class="btn">
                      <input type="submit" name="action" Value="Trier" class="btn">
                      
                      
                      
                  
              </form>
              
              </div>

               
                
      
      </section>
  

  <script src="js/scripts.min.js"></script>
  <script src="js/custom.min.js"></script>
  

</body>

</html>