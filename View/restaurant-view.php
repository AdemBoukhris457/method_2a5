<?php 
include "../Controller/restaurantC.php";
include "../Controller/ReviewC.php";
$RestaurantC =new restaurantC;
$view= $RestaurantC->recupererRestaurant($_POST["nom_resto1"]);
$ReviewC =new ReviewC;
$liste=$ReviewC->recupererReview($_POST["id_restoboy"]);
?>
<?php  
$check=false;
if (
  isset($_POST["nom"]) &&
  isset($_POST["description"]) &&
  isset($_POST["score"])

) {
  if (
      !empty($_POST["nom"]) &&
      !empty($_POST["description"]) &&
      !empty($_POST["score"]) 
    
      
  ) {
      $upper=$_POST["nom"][0];
      if(ctype_upper($upper) && $_POST["score"]>=0 && $_POST["score"]<=5 && is_numeric($_POST["nom"])==false){
      $check=true;
      }
          if(ctype_upper($upper)==false)
          {
              $error1="Entrer un nom majuscule";
          }
          if($_POST["score"]>5 || $_POST["score"]<0){
              $error2="Entrer un score entre 0 et 5";
          }
          
      $user = new Review(
          $_POST['nom'],
          $_POST['description'],
          intval($_POST['score']),
          date("Y/m/d"),
          ($_POST['id_restaurant'])
          
      );
      if($_POST['action'] == 'Ajouter' && $check==true) {
          $ReviewC->ajouterReview($user);
          $view= $RestaurantC->recupererRestaurant($_POST["nom_resto1"]);
          $ReviewC =new ReviewC;
          $liste=$ReviewC->recupererReview($_POST["id_restoboy"]);
           
      }
      
  }
else
      $error = "Missing information";
}
?>


<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en">  
   <head>
      <meta charset="utf-8">
      <!-- <title>Responsive Drop-down Menu Bar</title> -->
      
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Roboto:wght@300;400&display=swap"
        rel="stylesheet">
      
      <link rel="stylesheet" href="css/style.min.css">
      <link rel="stylesheet" href="css/styles-merged.css">
      <link rel="stylesheet" href="css/main.css">
      
    
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      
   </head>
   <body>
      <nav>
         <div class="logo">
            Recipes for Days
         </div>
         <label for="btn" class="icon">
         <span class="fa fa-bars"></span>
         </label>
         <input type="checkbox" id="btn">
         <ul>
            <li><a href="./home.php">Home</a></li>
            <li>
               <a href="#">Recettes/Produits</a>
               <input type="checkbox" id="btn-1">
               <ul>
                  <li><a href="#">Recettes</a></li>
                  <li><a href="#">Produits</a></li>
               </ul>
            </li>
            <li>
               <a href="./afficher-resto.php">Restaurants</a>
               <input type="checkbox" id="btn-2">
               <ul>
                  <li><a href="#">Restaurants</a></li>
                  <li><a href="#">Reviews</a></li>
                  
               </ul>
            </li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contact</a></li>
         </ul>
      </nav>
      <section class="bg-light text-center">
        <div class="container">
            <?php
            foreach($view as $resto){ ?>
           <header class="text-center"><?php echo $resto['nom'] ?></header> 
        
          <div class="split">
            <div>
            <h2 class="text-center"> <?php echo $resto['description'] ?></h2>
            </div>
            <div>
            <img src="../images/<?php echo $resto['image'];?>" width="600px" height="350px">
            </div>
          </div>
        
        </div>
      </section>
      <section class="bg-primary">
        <div class="container">
          <div>
            <h2>
              Numero de telephone: <?php echo $resto['num_tel'] ?> <br>
              Specialité: <?php echo $resto['specialite'] ?> <br>
              Localisation: <?php echo $resto['localisation'] ?>
            </h2>
          </div>

        </div>

      </section>
      <section class="bg-light text-center">
                <div class="container ">
                <form action="#" method="POST" class="text-center">
                  <table>
                    <tr><h2>Ajouter un commentaire</h2></tr>
                  <tr>
                    <td><label for="nom" class="">Nom:</label></td>
                    <td><input type="text" name="nom" id="nom" maxlength="20" class="form-control" ></td>
                  </tr>
                <tr>
                  <td><label for="description"></label></td>
                <td><textarea name="description" id="description" cols="50" rows="10" placeholder="Ajouter un commentaire"></textarea></td>
              
              </tr>
                <tr>
                  <td><label for="Score" class="">Score:</label></td>
                  <td><input type="number" name="score" placeholder="Entre 0 et 5" class="form-control"></td>
                </tr>
                <tr>
                  <td>
                <input type="submit" name="action" value="Ajouter" class="btn-primary btn-lg"> </td></tr>
                <input type="hidden" value=<?PHP echo $_POST['id_restoboy']; ?> name="id_restaurant">
                <input type="hidden" value=<?PHP echo $_POST['id_restoboy']; ?> name="id_restoboy">
                <input type="hidden" value=<?PHP echo $_POST['nom_resto1']; ?> name="nom_resto1">

                  </table>
                </form>
                </div>
        
        

      </section>
      <?php foreach($liste as $comment){ ?>
      <section class="">
        <div class="container">
            <div class="split">
              <div>
                <img src="../images/profile.png" width="50px" height="50px"   >
                <p>Nom: <?php echo $comment["nom"] ?> <br>
                Commentaire:
                <?php echo $comment["description"] ?><br>
                Score:<?php echo $comment["score"] ?>
              
                </p>
                <p>Updated: <?php $date=strtotime(date("Y/m/d"));
                $date1=strtotime($comment["date"]);
                $current=($date - $date1)/60/60/24;
                echo $current ?> days ago </p>
                <hr style="color:black">
              </div>
              
            </div>
        </div>
      </section>
      <?php }} ?>
      <script>
         $('.icon').click(function(){
           $('span').toggleClass("cancel");
         });
      </script>
   </body>
</html>
