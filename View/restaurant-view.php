<!DOCTYPE html>
<!-- Created By CodingNepal - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <!-- <title>Responsive Drop-down Menu Bar</title> -->
      <link rel="stylesheet" href="./style.css">
      <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  user-select: none;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  background: #f2f2f2;
}
nav{
  background: #337ab7;
}
nav:after{
  content: '';
  clear: both;
  display: table;
}
nav .logo{
  float: left;
  color: white;
  font-size: 27px;
  font-weight: 600;
  line-height: 70px;
  padding-left: 60px;
}
nav ul{
  float: right;
  margin-right: 40px;
  list-style: none;
  position: relative;
}
nav ul li{
  float: left;
  display: inline-block;
  background: #337ab7;
  margin: 0 5px;
}
nav ul li a{
  color: white;
  line-height: 70px;
  text-decoration: none;
  font-size: 18px;
  padding: 8px 15px;
}
nav ul li a:hover{
  color: cyan;
  border-radius: 5px;
 
}
nav ul ul li a:hover{
  box-shadow: none;
}
nav ul ul{
  position: absolute;
  top: 90px;
  border-top: 3px solid cyan;
  opacity: 0;
  visibility: hidden;
  transition: top .3s;
}
nav ul ul ul{
  border-top: none;
}
nav ul li:hover > ul{
  top: 70px;
  opacity: 1;
  visibility: visible;
}
nav ul ul li{
  position: relative;
  margin: 0px;
  width: 150px;
  float: none;
  display: list-item;
  border-bottom: 1px solid rgba(0,0,0,0.3);
}
nav ul ul li a{
  line-height: 50px;
}
nav ul ul ul li{
  position: relative;
  top: -60px;
  left: 150px;
}
.show,.icon,input{
  display: none;
}
.fa-plus{
  font-size: 15px;
  margin-left: 40px;
}
@media all and (max-width: 968px) {
  nav ul{
    margin-right: 0px;
    float: left;
  }
  nav .logo{
    padding-left: 30px;
    width: 100%;
  }
  .show + a, ul{
    display: none;
  }
  nav ul li,nav ul ul li{
    display: block;
    width: 100%;
  }
  nav ul li a:hover{
    box-shadow: none;
  }
  .show{
    display: block;
    color: white;
    font-size: 18px;
    padding: 0 20px;
    line-height: 70px;
    cursor: pointer;
  }
  .show:hover{
    color: cyan;
  }
  .icon{
    display: block;
    color: white;
    position: absolute;
    top: 0;
    right: 40px;
    line-height: 70px;
    cursor: pointer;
    font-size: 25px;
  }
  nav ul ul{
    top: 70px;
    border-top: 0px;
    float: none;
    position: static;
    display: none;
    opacity: 1;
    visibility: visible;
  }
  nav ul ul a{
    padding-left: 40px;
  }
  nav ul ul ul a{
    padding-left: 80px;
  }
  nav ul ul ul li{
    position: static;
  }
  [id^=btn]:checked + ul{
    display: block;
  }
  nav ul ul li{
    border-bottom: 0px;
  }
  span.cancel:before{
    content: '\f00d';
  }
}
.content{
  z-index: -1;
  position: absolute;
  top: 20%;
  left: 50%;
  transform: translate(-50%,-50%);
  text-align: center;
}
header{
  font-size: 35px;
  font-weight: 600;
  padding: 10px 0;
}
p{
  font-size: 30px;
  font-weight: 500;
}

      </style>
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
            <li><a href="./afficher-resto.php">Home</a></li>
            <li>
               <label for="btn-1" class="show">Features +</label>
               <a href="#">Features</a>
               <input type="checkbox" id="btn-1">
               <ul>
                  <li><a href="#">Pages</a></li>
                  <li><a href="#">Elements</a></li>
                  <li><a href="#">Icons</a></li>
               </ul>
            </li>
            <li>
               <label for="btn-2" class="show">Services +</label>
               <a href="#">Services</a>
               <input type="checkbox" id="btn-2">
               <ul>
                  <li><a href="#">Web Design</a></li>
                  <li><a href="#">App Design</a></li>
                  <li>
                     <label for="btn-3" class="show">More +</label>
                     <a href="#">More <span class="fa fa-plus"></span></a>
                     <input type="checkbox" id="btn-3">
                     <ul>
                        <li><a href="#">Submenu-1</a></li>
                        <li><a href="#">Submenu-2</a></li>
                        <li><a href="#">Submenu-3</a></li>
                     </ul>
                  </li>
               </ul>
            </li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">Contact</a></li>
         </ul>
      </nav>
      <div class="content">
         <header>Responsive Drop-down Menu Bar</header>
         <p>HTML and CSS (Media Query)</p>
      </div>
      <script>
         $('.icon').click(function(){
           $('span').toggleClass("cancel");
         });
      </script>
   </body>
</html>
