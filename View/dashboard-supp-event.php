 <?php

    include '../Controller/EvenementC.php';
    $evenementC = new EvenementC();
    if (isset($_POST["id_evenement"])) {
        $evenementC->supprimerevenement($_POST["id_evenement"]);
        header('Location:dashboard-modevent.php');
    }
    ?>