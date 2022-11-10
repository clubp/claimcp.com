
<?php 
session_start();

include 'db_conn.php';

$id = $_GET['idClaim'];
$sql = "SELECT * FROM `claim` WHERE id='$id'";
//$sqlDelete = "DELETE FROM `claim` WHERE id='$id'";

$result = mysqli_query($conn, $sql); // Validation de la requete
//$resultDelete = mysqli_query($conn, $sqlDelete); // Validation de la requete


if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icone-->
</head>
<body>

	<header class="header">
		<h1 class="logo"><a href="index.php"><img src="logo3.png"></a></h1>
      <ul class="main-nav">
		  <li><a href="index.php">Créer claim/Create claim</a></li>
		  <li><a href="listeClaim.php">Liste claim/Claim list</a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i>Déconnexion/Log out</a></li>
    </header>
				<?php 
 					if(!empty($_GET['message'])) {
					    $message = $_GET['message'];
					      echo '<p class="message"> '.$_GET['message'].'</p>';
					}
				?>
  		<h1>Détail claim client <br> Customer claim detail </h1>

<div class="" id="container_claimClient">	
	<div>
		<p><a style='margin-left: 15px; float: right' href="deleteClaim.php?idClaim=<?php echo $id; ?>"onclick="return confirm('Voulez-vous vraiment supprimer? Cette action est irréversible.')">Supprimer</a></p>
		<p><a  style='margin-left: 15px; float: right' href="pageUpdateClaim.php?idClaim=<?php echo $id; ?>">Modifier</a></p>
				
		<?php
			while($row = $result->fetch_assoc())
			 {
				echo "<h3>"."#Claim: ".$row['id']." -  "."Statut/Status: ".$row['statut']."</h3><br>"; 
				echo	"<h2>"."Information du client/client information:"."</h2>";

				echo "<p><label>"."Nom/Name: "."</label>".$row['nomClient']."</p>";
				echo "<p><label>"."Tél./Tel.: "."</label>".$row['telephone']."</p>";
				echo "<p><label>"."Adresse : "."</label>".$row['adresse']."</p>"; 
				echo "<p><label>"."Email: "."</label>".$row['email']."</p>"; 
				echo "<p><label>"."Ville/City: "."</label>".$row['ville']."</p>"; 
				echo "<p><label>"."Province/State: "."</label>".$row['province']."</p>"; 
				echo "<p><label>"."Code postal /Zip code: "."</label>".$row['codePostale']."</p>"; 
				echo "<p><label>"." #Facture/Invoice: "."</label>".$row['numeroFacture']."</p>"; 
			}
		?>
	</div><hr>

	<div>
		<h2>Information du produit/Product information:</h2>		
		<?php
			mysqli_data_seek($result, 0); // on remet le pointeur de la loop précedente a 0 pour commencer une nouvelle
			while($row = $result->fetch_assoc())
			 {
				echo "<p><label>"."Modèle/Model: "."</label>".$row['modeleProduit']."</p>";
				echo "<p><label>"."Numéro série/Serial Number: "."</label>".$row['numeroSerie']."</p>";
				echo "<p><label>"."Numéro série/Serial Number: "."</label>".$row['dateBris']."</p>"; 
				echo "<p><label>"."Date bris/Faillure date: "."</label>".$row['dateBris']."</p>"; 
				echo "<p><label>"."Date inst./Inst.date: "."</label>".$row['dateInstallation']."</p>"; 			
			}
		?>
	</div>

	<div ><hr>
		<h2>Service effectué/Service performed:</h2>
		<?php
			mysqli_data_seek($result, 0); // on remet le pointeur de la loop précedente a 0 pour commencer une nouvelle
			while($row = $result->fetch_assoc())
			 {
				echo "<p>".$row['serviceEffectue']."</p>";
			}
		?>
			  
	</div>
	<div ><hr>
		<h2>Description du problème/Description of the problem:</h2>
		<?php
			mysqli_data_seek($result, 0); // on remet le pointeur de la loop précedente a 0 pour commencer une nouvelle
			while($row = $result->fetch_assoc())
			 {
				echo "<p>".$row['descriptionProbleme']."</p>";
			}
		?>			  
	</div>

	<div ><hr>
		<h2>Main d'oeuvre/Labor(temps/time):</h2>
		<?php
			mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc())
			 {
				echo "<p><label>"."Début/Beginning: "."</label>".$row['dateDebut_mainOeuvre']."</p>";
				echo "<p><label>"."Fin/End: "."</label>".$row['dateFin_mainOeuvre']."</p>";
				echo "<p><label>"."Total: "."</label>".$row['total']."</p>"; 			
			}
		?>
			  
	</div>

	<div ><hr>
			   <h2>Frais de garantie/Warranty charges: #Aut./Aut.:</h2>
			   <table id="table">
					 <tr>
						 <th> Qté/Qty </th>
						 <th> #Pièce/Part</th>
						 <th> Description</th>
					 </tr>

					<?php

					$result = mysqli_query($conn, $sql); // Validation de la requete

					if($result != "zero")
					{
					 
					 while($row = $result->fetch_assoc())
					 {
						 echo "<tr>";
						 echo "<td >". $row['qte1']. "</a></td>";
						 echo "<td>" . $row['numeroPiece1']. "</td>";
						 echo "<td>" . $row['description1']. "</td>";
						 echo "</tr>";
					 }
					 mysqli_data_seek($result, 0);
					 while($row = $result->fetch_assoc())
					 {
						 echo "<tr>";
						 echo "<td >" . $row['qte2']. "</a></td>";
						 echo "<td>" . $row['numeroPiece2']. "</td>";
						 echo "<td>" . $row['description2']. "</td>";
						 echo "</tr>";
					 }
					 mysqli_data_seek($result, 0);
					 while($row = $result->fetch_assoc())
					 {
						 echo "<tr>";
						 echo "<td >" . $row['qte3']. "</a></td>";
						 echo "<td>" . $row['numeroPiece3']. "</td>";
						 echo "<td>" . $row['description3']. "</td>";
						 echo "</tr>";
					 }
					 
					 
					}
					else
					{
					 echo $result;
					}
					?>
 </table>
	
			  
	</div>
	<div ><hr>
		<h2>Information du Technicien/Technician information:</h2>
		<?php
			mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc())
			 {
				echo "<p><label>"."Date du service/Service date: "."</label>".$row['dateService']."</p>";
				echo "<p><label>"."Nom/Name: "."</label>".$row['nomTechnicien']."</p>";
				echo "<p><label>"."Signature: "."</label>".$row['signature']."</p>"; 			
			}
		?>
			  
	</div>
		<div ><hr>
		<h2>NOTE:</h2>
		<?php
			mysqli_data_seek($result, 0);
			while($row = $result->fetch_assoc())
			 {
				echo "<p style='width:100%;'>".$row['note']."</p>"; 			
			}
		?>
			  
	</div>
</div>	

	
</body>
</html>

<?php  
}else {
	header("Location:loginPage.php"); // si les infos de connection sont bonne, l'user est rediriger vers la page de formulaire
	exit();
}