<?php 
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Formaulaire de claim</title>
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
      </ul>
	</header>


	<div id="container">
		<div class="navBar">
			<!--<div class="column1 logo">
			 <img src="logo.png">
			</div>-->
			<div class="column1 titre">
			  <h1>Formulaire de garantie <br> Claim form</h1>
			</div>
  <form  method="POST" action="send.php" >
			<div class="column1 tag">
				<label>TAG:</label> <p id="valeurTag" style="color: red; font-weight: bold;"></p>
			  	
			  	<input type="radio" name="MyRadio" value="Gatineau" required="required">&nbsp;<label>Gatineau</label> &nbsp;&nbsp;
  			    <input type="radio" name="MyRadio" value="Nepean">&nbsp;<label>Nepean</label>
			</div>
		 </div>


  	<div class="titre-section ">Information du client/ Client information:</div>

    <div class="name">
      <label >Nom/Name:</label>
      <input type="text" name="nom" >
    </div>
    <div class="tel">
      <label >Tél./Tel.:</label>
      <input type="tel" name="tel" onInput="this.value = phoneFormat(this.value)" required >
    </div>


    <div class="adresse">
      <label >Adresse :</label>
      <input type="text" name="adresse" required>
    </div>
    <div class="email">
      <label >Email :</label>
      <input type="email" name="email" required>
    </div>

    <div class="row-Adresse">
	    <div class="column ville">
	      <label>Ville/City :</label>
	      <input type="text" name="ville" required>
	    </div>
	    <div class="column province">
	      <label>Province/State:</label>

	      <select name="province" required>
		    <option value="">---</option>
		    <option value="ON">ON</option>
		    <option value="QC">QC</option>
		 </select>
	    </div>
	    <div class="column codePostal">
	      <label> Code postal /Zip code:</label>
	      <input type="text" name="codePostal" id="codePostal" onInput="this.value = zipFormat(this.value)" required >
	    </div>
	    <div class="column numeroFacture">
	      <label> #Facture/Invoice:</label>
	      <input type="text" name="numeroFacture" required>
	    </div>
	</div>

		  	<div class="titre-section2">Information du produit/ Product information:</div>

	<div class="row-infoProduit">
		    <div class="column modeleProduit">
		      <label>Modèle/Model:</label>
		      <input type="text" name="modeleProduit" required>
		    </div>
		    <div class="column numeroSerie">
		      <label>Numéro série/Serial Number:</label>
		      <input type="text" name="numeroSerie" required>
		    </div>	    
		    <div class="column dateBris">
		      <label>Date bris/Faillure date:</label>
		      <input type="date" name="dateBris" required>
		    </div>
		    <div class="column dateInstallation">
		      <label>Date inst./Inst.date:</label>
		      <input type="date" name="dateInstallation" required>
		    </div>	 
	</div>

	<div class="titre-section3">Description du problème/Description of the problem:</div>
	<div class="row-descriptionPorbleme">
		        <div class="descProbleme">
			      <textarea name="descProbleme" id="descProbleme" required></textarea>
			      <span id="countNumber1"></span> <span>mots</span>/</span><span> 50 mots(maximum)</span>
			      <span id="tailleSuperieur1" style="color: red"></span>
			</div>
	</div> <br>

	 <div class="titre-section4">Service effectué/Service performed:</div>
   	<div class="row-serviceEffectue">
	        <div class="serviceEffectue">
		      <textarea name="serviceEffectue" id="serviceEffectue"  required></textarea>
		      <span id="countNumber2"></span> <span>mots</span>/</span><span> 50 mots(maximum)</span>
		      <span id="tailleSuperieur2" style="color: red"></span>
		    </div>
	</div>

<div class="column-block3">
 		<div class=" column-mainOeuvre">
		      <div class="titre-section">Main d'oeuvre/Labor (temps/time):</div>
			  <label >Début/Beginning:</label>
			  <input type="date" name="dateDebut_mainOeuvre" required>
		      <label>Fin/End:</label>
		      <input type="date" name="dateFin_mainOeuvre" required>

		      <label><b>Total</b>:</label>
		      <input type="text" name="total" required>
	    </div> 

		<div class=" column-fraisGarantie">
	    	<div class="titre-section">Frais de garantie/Warranty charges: #Aut./Aut.:</div>
				<table style="width:100%">
				  <tr>
				    <th class="col1">Qté/Qty</th>
				    <th class="col2">#Pièce/Part</th>
				    <th class="col3">Description</th>
				  </tr>

				  <tr>
				    <td><input type="number" name="quantity-row1" required></td>
				    <td><input type="text" name="numeroPiece-row1" required></td>
				    <td><input type="text" name="description-row1" required></td>
				  </tr>

				  <tr>
				    <td><input type="number" name="quantity-row2"></td>
				    <td><input type="text" name="numeroPiece-row2"></td>
				    <td><input type="text" name="description-row2"></td>
				  </tr>

				  <tr>
				    <td><input type="number" name="quantity-row3"></td>
				    <td><input type="text" name="numeroPiece-row3"></td>
				    <td><input type="text" name="description-row3"></td>
				  </tr>
				</table>
		</div>
</div>

	<div class="row-infoTechnicien">
			  	<div class="titre-section">Information du Technicien/Technician information:</div>

			    <div class="dateService">
			      <label>Date du service/Service date:</label>
			      <input type="date" name="dateService" required>
			    </div>	
			    <div class="nomTechnicien">
			      <label>Nom/Name:</label>
			      <input type="text" name="nomTechnicien" required>
			    </div>	
			    <div class="signature">
			      <label>Signature:</label>
			      <input type="text" name="signature" required>
			    </div>	     
		</div>

  		  <input type="submit" value="Valider claim" id="form_button" >


  </form><!-- // End form -->

</div><!-- // End #container -->


</body>
	<script src="countWord.js"></script> <!-- // Script pour compter le nombre de mot dans les textarea -->
	<script type="text/javascript" src="phoneNumberFormat.js"></script> <!-- script pour formatter lors de l'entrée du tel-->

	<script type="text/javascript">
function isValidPostalCode(postalCode, countryCode) {
    switch (countryCode) {
        case "US":
            postalCodeRegex = /^([0-9]{5})(?:[-\s]*([0-9]{4}))?$/;
            break;
        case "CA":
            postalCodeRegex = /^([A-Z][0-9][A-Z])\s*([0-9][A-Z][0-9])$/;
            break;
        default:
            postalCodeRegex = /^(?:[A-Z0-9]+([- ]?[A-Z0-9]+)*)?$/;
    }
    return postalCodeRegex.test(postalCode);
}
	</script>
</html>

<?php  
}else {
	header("Location:loginPage.php"); // si les infos de connection sont bonne, l'user est rediriger vers la page de formulaire
	exit();
}

?>
