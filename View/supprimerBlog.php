<?php
include "../controller/BlogC.php";

$AlimentC = new BlogC();
if (isset($_POST["id_blog"])) {
    $AlimentC->supprimerBlog($_POST["id_blog"]);
    header('Location:afficherBlog.php');
}
?>