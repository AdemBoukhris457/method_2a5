<?PHP
include "../controller/UtilisateurC.php";

$utilisateurC = new UtilisateurC();
$listeUsers = $utilisateurC->afficherUtilisateurs();

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Afficher Liste Utilisateurs </title>
</head>

<body>

    <button><a href="AjouterUtilisateur.php">Ajouter un Utilisateur</a></button>
    <hr>
    <table border=1 align='center'>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Password</th>
            <th>Email</th>
            <th>prenom</th>
            <th>code postal</th>
            <th>pays</th>
            <th>numero tel</th>
            <th>type</th>
            <th>supprimer</th>
            <th>modifier</th>
        </tr>

        <?PHP
        foreach ($listeUsers as $user) {
        ?>
            <tr>
                <td><?PHP echo $user['id_utilisateur']; ?></td>
                <td><?PHP echo $user['nom_utilisateur']; ?></td>
                <td><?PHP echo $user['password']; ?></td>
                <td><?PHP echo $user['email']; ?></td>
                <td><?PHP echo $user['prenom_utilisateur']; ?></td>
                <td><?PHP echo $user['code_postal']; ?></td>
                <td><?PHP echo $user['pays']; ?></td>
                <td><?PHP echo $user['numero_tel']; ?></td>
                <td><?PHP echo $user['type']; ?></td>
                <td>
                    <form method="POST" action="supprimerUtilisateur.php">
                        <input type="submit" name="supprimer" value="supprimer">
                        <input type="hidden" value=<?PHP echo $user['id_utilisateur']; ?> name="id_utilisateur">
                    </form>
                </td>
                <td>
                    <a href="modifierUtilisateur.php?id=<?PHP echo $user['id_utilisateur']; ?>"> Modifier </a>
                </td>
            </tr>
        <?PHP
        }
        ?>
    </table>
</body>

</html>