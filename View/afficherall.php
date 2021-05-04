<?php
include "../controller/RecettesC.php";

$AlimentC = new RecetteC();
$listeAliments = $AlimentC->afficherRecette();
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
    <table border=1 align='center' id="example">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>ingredients</th>
                <th>description</th>
                <th>specialité</th>
                <th>image</th>
                <th>id_Produit</th>
            </tr>
        </thead>
        <tbody>
            <?PHP
            foreach ($listeAliments as $user) {
            ?>

                <tr>
                    <td><?PHP echo $user['id_recette']; ?></td>
                    <td><?PHP echo $user['nom']; ?></td>
                    <td><?PHP echo $user['ingredients']; ?></td>
                    <td><?PHP echo $user['description']; ?></td>
                    <td><?PHP echo $user['specialite']; ?></td>
                    <td><img src="../images/<?php echo $user['image']; ?>" width="200px" height="200px"></td>
                    <td><?PHP echo $user['id_produit']; ?></td>
                    <td>
                        <form method="POST" action="supprimerRecettes.php">
                            <input type="submit" name="supprimer" value="supprimer">
                            <input type="hidden" value=<?PHP echo $user['id_recette']; ?> name="id_recette">
                        </form>
                    </td>
                    <td>
                        <a href="modifierRecette.php?id_recette=<?PHP echo $user['id_recette']; ?>"> Modifier </a>
                    </td>
                    <td>
                        <a href="alimentseul.php?id_recette=<?PHP echo $user['id_recette']; ?>"> Modifier </a>
                    </td>
                </tr>
            <?PHP
            }
            ?>
        </tbody>
    </table>
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
</body>

</html>