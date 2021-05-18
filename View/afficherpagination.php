<?php
include "../controller/ProduitC.php";
$Alimento = new ProduitC();
if (isset($_POST["id_produit"])) {
    $Alimento->supprimerProduit($_POST["id_produit"]);
    header('Location:afficherAlimentss.php');
}
$AlimentC = new ProduitC();
$Alim = new ProduitC();
$listeAliments = $Alim->afficherProduits();
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $listep = $AlimentC->afficherrech($valueToSearch);
} else {
    $listep = $AlimentC->afficherProduits();
}
$pC = new ProduitC();

$num_per_page = 05;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
    

$num_per_page = 05;
$start_from = ($page - 1) * 05;
$listep = $pC->afficherpagin($start_from, $num_per_page);
if (isset($_POST['search'])) {
    $valueToSearch = $_POST['valueToSearch'];
    $listep = $AlimentC->afficherrech($valueToSearch);
} else {
    $listep = $pC->afficherpagin($start_from, $num_per_page);
}
    $numa = 05;
    $star = ($page - 1) * 05;
    if (isset($_POST['ASC'])) {
        $AlimentC = new ProduitC();
        $listep = $AlimentC->afficherpagintri($star, $numa);
    } 
?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste aliments </title>
    <link rel="stylesheet" href="aliments.css">
    <style>
        table {

            width: 600px;

            box-shadow: -1px 12px 12px -6px rgba(0, 0, 0, 0.5);

        }

        table,
        td,
        th {

            padding: 20px;

            border: 1px solid lightgray;

            border-collapse: collapse;

            text-align: center;

            cursor: pointer;

        }

        td {

            font-size: 18px;

        }

        th {

            background-color: blue;

            color: white;

        }

        tr:nth-child(odd) {

            background-color: lightblue;

        }

        tr:nth-child(odd):hover {

            background-color: dodgerblue;

            color: white;

            transform: scale(1.5);

            transition: transform 300ms ease-in;

        }

        tr:nth-child(even) {

            background-color: #ededed;

        }

        tr:nth-child(even):hover {

            background-color: lightgray;

            transform: scale(1.5);

            transition: transform 300ms ease-in;


        }
    </style>
</head>

<body style="background-image: url('jjj.jpg'); background-repeat: no-repeat; background-size: cover;">
    <button><a href="ajouterAliments.php">Ajouter un Utilisateur</a></button>
    <hr>

    <form action="afficherpagination.php" method="post">
        <form action="afficherpagination.php" method="post">
            <input type="submit" name="ASC" value="Ascending"><br><br>
            <input type="submit" name="DESC" value="Descending"><br><br>
        </form>
        <form action="afficherpagination.php" method="post">
            <input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
            <input type="submit" name="search" value="Filter"><br><br>
        </form>
        <form method="POST" action="supprimerpag.php">
            <input type="submit" name="supprimer" value="supprimer">
            <input type="text" name="id_produit">
        </form>
        <table border=1 align='center' class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>nbre calories</th>
                    <th>poids</th>
                    <th>description</th>
                    <th>image</th>
                    <th>id_utilisateur</th>
                </tr>
            </thead>
            <tbody>
                <?PHP
                foreach ($listep as $user) {
                ?>
                    <tr>
                        <td><?PHP echo $user['id_produit']; ?></td>
                        <td><?PHP echo $user['nom']; ?></td>
                        <td><?PHP echo $user['nb_calories']; ?></td>
                        <td><?PHP echo $user['poids']; ?></td>
                        <td><?PHP echo $user['description']; ?></td>
                        <td><img src="../images/<?php echo $user['image']; ?>" width="200px" height="200px"></td>
                        <td><?PHP echo $user['id_utilisateur']; ?></td>
                        <td>

                        </td>
                        <td>
                            <a href="modifierAliments.php?id_produit=<?PHP echo $user['id_produit']; ?>"> Modifier </a>
                        </td>
                    </tr>
                <?PHP
                }
                ?>
            </tbody>
        </table>
    </form>
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
    <?php
    $liste = $AlimentC->afficherProduits();
    $total_record = $liste->rowCount();
    $total_page = ceil($total_record / $num_per_page);
    if ($page > 1) {
        echo "<a href='afficherpagination.php?page=" . ($page - 1) . "' class='btn btn-danger'>Previous</a>";
    }


    for ($i = 1; $i < $total_page + 3; $i++) {
        echo "<a href='afficherpagination.php?page=" . $i . "' class='btn btn-primary'>$i</a>";
    }

    if ($i > $page) {
        echo "<a href='afficherpagination.php?page=" . ($page + 1) . "' class='btn btn-danger'>Next</a>";
    }
    ?>

</body>

</html>