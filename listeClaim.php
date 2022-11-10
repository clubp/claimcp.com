
<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>


<!DOCTYPE html>
<html>
<head>
	<title>Liste Claim</title>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><!--icone-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> <!--JQUERY-->

</head>
<body>
	<header class="header">
		<h1 class="logo"><a href="index.php"><img src="logo3.png"></a></h1>
      <ul class="main-nav">
		  <li><a href="index.php">Créer claim/Create claim</a></li>
		  <li><a href="listeClaim.php">Liste claim/Claim list</a></li>
          <li><a href="logout.php"><i class="fa fa-sign-out"></i>Déconnexion/Log out</a></li></ul>
      </ul>

	</header>
<div class="column1 titre">
			  <h1>Liste claim <br>Claim list</h1>
			</div>

<div>

	<div class="searchbar">
						<?php 
							if(isset($_GET['message'])){
							    echo"<p style='color: 	#25a244; background-color: #fff; padding:10px; border: 1px solid; border-radius:10px;'>" . $_GET['message']. "</p>";
							}
						?>
		<p>Faire une recherche <input type="text" name="searchbar" id="searchbar" class="fa" placeholder="&#xf002" oninput="mySearchFunction()"></p>

	</div>
	<div class="filterBox">
		<p>Filtrer <select  name="filterBox" id="filterBox"  onchange="myFilterFunction()">
						<option value=""   selected>----</option>
						<option value="créer">Créer</option>
						<option value="en traitement">En traitement</option>
						<option value="approuvé">Approuvé</option>
					</select>
		</p>
	</div>
</div>


<table id="tableClaim">

 <tr>
	 <th> #Claim</th>
	 <th> #Facture/#Invoice</th>
	 <th> Nom client/Customer name</th>
	 <th> Tél/Tel</th>
	 <th> Adresse</th>
	 <th> Email</th>
	 <th> Ville/City</th>
	 <th> Province/State</th>
	 <th> Code postal/Zip code</th>
	 <th> Statut</th>
	 <th > Détails/Details</th>
 </tr>




<?php
include 'db_conn.php';
$sql = "SELECT * FROM `claim`";
$result = mysqli_query($conn, $sql); // Validation de la requete

if($result != "zero")
{
 
 while($row = $result->fetch_assoc())
 {
	 echo "<tr>";
	 echo "<td ><a style='color: 	#4682B4' href='claimClient.php?idClaim=".$row['id']."'>" . $row['id']. "</a></td>";
	 echo "<td>" . $row['numeroFacture']. "</td>";
	 echo "<td>" . $row['nomClient']. "</td>";
	 echo "<td>" . $row['telephone']. "</td>";
	 echo "<td>" . $row['adresse']. "</td>"; 
	 echo "<td>" . $row['email']. "</td>";
	 echo "<td>" . $row['ville']. "</td>"; 
	 echo "<td>" . $row['province']. "</td>";
	 echo "<td>" . $row['codePostale']. "</td>";
	 echo "<td>" . $row['statut']. "</td>";
	 echo "<td><a style='color: 	#4682B4' href='claimClient.php?idClaim=".$row['id']."'>".'<i class="fa fa-eye"></i>'. "</td>";

	 echo "</tr>";
 }
 
 
}
else
{
 echo $result;
}
?>
 </table>

</body>



<script type="text/javascript">

/*Cette function permet de faire une recherche avec la barre de recherche*/
function mySearchFunction()  {
  let txtValue, filter;
  const input = document.getElementById("searchbar");
  const table = document.getElementById("tableClaim");
  filter = input.value.toUpperCase();
  for (tr of table.getElementsByTagName("tr"))   // on passe a travers toutes les LIGNES du tableau
    for(td of tr.getElementsByTagName("td"))	// on passe a travers toutes les COLONNES du tableau
        if (td) {  
            txtValue = td.textContent || td.innerText; // on récupère les valeurs des 'td'            
            if (txtValue.toUpperCase().indexOf(filter) > -1){ // si la valeur entré correspond a une valeur d'un élement du tableau on l'affiche.
                tr.style.display = "";
                break;
            }
            else 
                tr.style.display = "none"; 
        }   
}

/*Cette function permet de faire une recherche avec le filtre*/
function myFilterFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("filterBox");
  filter = input.value.toUpperCase();
  table = document.getElementById("tableClaim");
  tr = table.getElementsByTagName("tr");
    for (tr of table.getElementsByTagName("tr")) // on passe a travers toutes les LIGNES du tableau
    for(td of tr.getElementsByTagName("td"))	// on passe a travers toutes les COLONNES du tableau
        if (td) {
            txtValue = td.textContent || td.innerText; // on récupère les valeurs des 'td'
            if (txtValue.toUpperCase().indexOf(filter) > -1){ // si la valeur entré correspond a une valeur d'un élement du tableau on l'affiche
                tr.style.display = "";
                break;
            }
            else 
                tr.style.display = "none"; 
        }   
}
	
</script>
</html>

<?php  
}else {
	header("Location:loginPage.php"); // si les infos de connection sont bonne, l'user est rediriger vers la page de formulaire
	exit();
}

?>

