
<?php 
session_start();

include 'db_conn.php';

$id = $_GET['idClaim'];
$sql = "SELECT * FROM `claim` WHERE id='$id'";

$result = mysqli_query($conn, $sql); // Validation de la requete


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

  		<h1>METTRE A JOUR <br> Update</h1>

<form method="POST" action="updateClaim.php?idClaim=<?php echo $id; ?>">
<div class="" id="container_claimClient">	
	<div>

		<?php
			while($row = $result->fetch_assoc())
			 {
			 	echo "<h2>"."Mettre à jour/Update"." - "."#Claim: ".$row['id']." "."</h2>"."<br><br>"; 
				echo "<label>".'Email:'."</label>".''. "<input type='text' name='email' value='".$row['email']."' >";
				echo "<label>".'Téléphone/Phone number:'."</label>".''. "<input type='text' name='tel' value='".$row['telephone']."' onInput='this.value = phoneFormat(this.value)'/>";
				echo "<label>"."Ajouter une note/Add note"."</label>";
				echo "<textarea name='addNote' >".$row['note']."</textarea><br><br>";
			}
		?>
		<br><br><label>Changer le statut/Change status</label>
		 <select name="statut" required>
			<option value="">---</option>
		    <option value="Créer">Aucun changement</option>
		    <option value="En traitement">En traitement</option>
		    <option value="Approuver">Approuver</option>
		 </select>


	</div>

  	<br><br><input type="submit" value="Mettre à jour" id="form_button" >
</form>	
</body>

<script type="text/javascript" src="phoneNumberFormat.js"></script> <!-- script pour formatter lors de l'entrée du tel-->
</html>

<?php  
}else {
	header("Location:loginPage.php"); // si les infos de connection sont bonne, l'user est rediriger vers la page de formulaire
	exit();
}