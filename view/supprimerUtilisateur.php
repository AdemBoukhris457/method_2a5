<?PHP
	include "../controller/UtilisateurC.php";

	$utilisateurC=new UtilisateurC();
	
	if (isset($_POST["id_utilisateur"])){
		$utilisateurC->supprimerUtilisateur($_POST["id_utilisateur"]);
		header('Location:afficherUtilisateur.php');
	}
