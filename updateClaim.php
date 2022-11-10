<?php

include 'db_conn.php';
setlocale(LC_CTYPE, 'en_US');

	$tel= ($_POST['tel']);
	$email= ($_POST['email']);
	$statut= ($_POST['statut']);
	$addNote= ($_POST['addNote']);

	$addNoteEscape = $conn -> real_escape_string($_POST['addNote']); // On echappe les spéciale caractères comme les apostrophes

	$id = $_GET['idClaim']; // on recupere le id du claim envoyer via le lien 

if(isset($_POST['statut']) || isset($_POST['tel']) || isset($_POST['email']) || isset($_POST['addNote'])  ){	
		// Requete pour UPDATE les données dans la table 'claim'
		$sql = "UPDATE claim SET telephone='$tel', email='$email', statut='$statut', note='$addNoteEscape' WHERE id='$id'";

		$res = mysqli_query($conn, $sql); // Validation de la requete
		// Si les données sont insérer on redirige directement vers le formulaire de claim au format PDF
		if ($res) {
  		   $message = "*Claim ".$id." mis a jour avec succès!";
 		   header("Location: claimClient.php?idClaim=$id?message=$message");
 		   //header("Location : claimClient.php?idClaim=".$id);
		}
}
else{
	    //echo "Error deleting record: " . mysqli_error($conn);
		header("Location:pageUpdateClaim.php?");
}
mysqli_close($conn); 
?>