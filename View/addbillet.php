<?php
    include_once '../model/billeterie.php';
    include_once '../Controleur/billeterieC.php';

    $error = "";
    $success = 0;

    // create user
    $billeterie = null;

    // create an instance of the controller
    $billeterieC = new billeterieC();
    if (
        isset($_POST["nom"]) && 
        isset($_POST["email"])&&
                isset($_POST["cni"])&&
                                isset($_POST["nombre"])



    ) {
        if (
            !empty($_POST["nom"]) && 
            !empty($_POST["email"]) &&
            !empty($_POST["cni"])&&
                        !empty($_POST["nombre"])
                     
                        

        ) 
            {
           
            $billeterie = new billeterie(
                $_POST['nom'],
                $_POST['email'],
                $_POST['cni'],
                  $_POST['nombre'],
              
           


              
            );
            $billeterieC->ajouterbilleterie($billeterie);
          // header('Location:login.php');

           
       }
           
    
        else
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
    <link rel="stylesheet" type="text/css" href="styleformulaire.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
  


</head>

<body>


    <hr>

   
    <div class="cont">
        <div class="form sign-in">
        <form id="myform" onsubmit="return validate();">
           
                <label>
                    <span>nom</span>
                    <input type="text" name="nom" id="nom" maxlength="20">
                </label>
                <label>
                    <span>email</span>
                    <input type="text" name="email" id="email">
                </label>
                <label>
                <label>
                    
                    <span>nombre de personne</span>
                    <input type="number" name="nombre" id="nombre" maxlength="20">
                </label>
                <label>
                    <span>cni</span>
                    <input type="cni" name="cni" id="cni">
                </label>
                
                
                    <input type="submit" value="Envoyer" class="btn">
                </label>
                <td>
                      <a href="afficher_billeterie.php" >view</a>
                        </td>
            </form>
        </div>
        <div class="sub-cont">
            <div class="img">
                <div class="img-text m-up">
                    <h2>book your ticket now</h2>
               
                
                </div>

            </div>

        </div>
        <script>
 function validate(){
    
    var nom = document.getElementById("nom").value;
    var email = document.getElementById("email").value;
    var nombre = document.getElementById("nombre").value;
    var cni = document.getElementById("cni").value;

  

    
   

    if(nom.length < 5){
        
   alert("Please Enter valid name");
     
        return false;
      }
      if(email.indexOf("@") == -1 || email.length < 6){
        alert("Please Enter valid mail");
        return false;
      }
     
      if ( nombre <= 0) {
      
      
      alert("le nombre de ticket doit etre positive") ;
     
        return false;
        
      }
      
      if ( cni.length <8){
      
        alert( " vèrifier votre cni");           
    
        return false;
        
      }
    
  }
  
  </script>
    </div>

</body>
</html>