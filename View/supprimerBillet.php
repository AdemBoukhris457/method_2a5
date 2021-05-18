<?php
   
   include '../Controller/billetC.php';
   $billeterieC = new billeterieC() ;
       if (isset($_POST["id_billet"])){
       $billeterieC->supprimerbilleterie($_POST["id_billet"]);
       header('Location:dashboard-modbillet.php');
   }

?>
