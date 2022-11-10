<?php

include 'db_conn.php';
setlocale(LC_CTYPE, 'en_US');
require('fpdf/fpdf.php'); // libarairie pour convertir en pdf


	$nomClient= ($_POST['nom']);
	$telephone= ($_POST['tel']);
	$adresse= ($_POST['adresse']);
	$email= ($_POST['email']);
	$ville= ($_POST['ville']);
	$province= ($_POST['province']);
	$codePostale= ($_POST['codePostal']);
	$numeroFacture= ($_POST['numeroFacture']);
	$modeleProduit= ($_POST['modeleProduit']);
	$numeroSerie= ($_POST['numeroSerie']);
	$dateBris= ($_POST['dateBris']);
	$dateInstallation= ($_POST['dateInstallation']);
	$descProbleme= ($_POST['descProbleme']);
	$serviceEffectue= ($_POST['serviceEffectue']);
	$dateDebut_mainOeuvre= ($_POST['dateDebut_mainOeuvre']);
	$dateFin_mainOeuvre= ($_POST['dateFin_mainOeuvre']);
	$total= ($_POST['total']);
	$quantityRow1= ($_POST['quantity-row1']);
	$numeroPieceRow1= ($_POST['numeroPiece-row1']);
	$descriptionRow1= ($_POST['description-row1']);
	$dateService= ($_POST['dateService']);
	$nomTechnicien= ($_POST['nomTechnicien']);
	$signature= ($_POST['signature']);

	$magasin= ($_POST['MyRadio']);
	$dateDebut = $_POST['dateService'];

	$quantityRow2= $_POST['quantity-row2'];
	$numeroPieceRow2 = $_POST['numeroPiece-row2'];
	$descriptionRow2 = $_POST['description-row2'];

	$quantityRow3= $_POST['quantity-row3'];
	$numeroPieceRow3 = $_POST['numeroPiece-row3'];
	$descriptionRow3 = $_POST['description-row3'];


if(isset($_POST['nom']) && isset($_POST['tel']) && isset($_POST['adresse']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['province']) && isset($_POST['codePostal']) && isset($_POST['numeroFacture']) && isset($_POST['modeleProduit']) && isset($_POST['numeroSerie']) && isset($_POST['dateBris']) && 
	isset($_POST['dateInstallation']) && isset($_POST['descProbleme'])&& isset($_POST['serviceEffectue'])&& isset($_POST['dateDebut_mainOeuvre']) && isset($_POST['dateFin_mainOeuvre']) && isset($_POST['total']) && isset($_POST['quantity-row1']) && isset($_POST['numeroPiece-row1']) && isset($_POST['description-row1']) && isset($_POST['dateService']) && isset($_POST['nomTechnicien']) && isset($_POST['signature'])){
	
		// Requete pour insérer les données dans la table 'claim'
		$sql = "INSERT INTO `claim`( `nomClient`, `telephone`, `adresse`, `email`, `ville`, `province`, `codePostale`, `numeroFacture`, `modeleProduit`, `numeroSerie`, `dateBris`, `dateInstallation`, `descriptionProbleme`, `serviceEffectue`, `dateDebut_mainOeuvre`, `dateFin_mainOeuvre`, `total`, `qte1`, `numeroPiece1`, `description1`, `qte2`, `numeroPiece2`, `description2`, `qte3`, `numeroPiece3`, `description3`, `dateService`, `nomTechnicien`, `signature`)
			VALUES('$nomClient', '$telephone',  '$adresse',  '$email', '$ville', '$province',  '$codePostale', '$numeroFacture', '$modeleProduit',  '$numeroSerie',  '$dateBris', '$dateInstallation',  '$descProbleme',  '$serviceEffectue',  '$dateDebut_mainOeuvre', '$dateFin_mainOeuvre', '$total', '$quantityRow1', '$numeroPieceRow1',  '$descriptionRow1', '$quantityRow2', '$numeroPieceRow2',  '$descriptionRow2','$quantityRow3', '$numeroPieceRow3',  '$descriptionRow3', '$dateService',  '$nomTechnicien', '$signature')";

		$res = mysqli_query($conn, $sql); // execution de la requete

		// Si les données sont insérer on redirige directement vers le formulaire de claim au format PDF
		if ($res) {

			$numeroClaim = $conn->insert_id; // pour obtenir le dernier 'id' inserer dans la table

			if($_POST){

				$image1 = "logo.png";

				$title =utf8_decode('FORMULAIRE DE GARANTIE');

				$pdf = new FPDF();
				$pdf -> AddPage();
				$pdf -> SetTitle($title);

				$pdf -> SetFont('Arial', '', 11);
				$w = $pdf -> GetStringWidth($title) + 6;


				$pdf->Cell( 30, 30, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 15.78), 0, 0, 'L', false );

				$pdf -> SetX((210-$w)/2);

				//color of frame
				$pdf -> SetDrawColor(221,221,221,1);
				$pdf->SetFillColor(193,229,252); // BLUE color
				$pdf -> SetTextColor(000, 000, 000,1);

				// tchikness of frame (1mm)
				$pdf -> SetLineWidth(0.3);

				$pdf -> Cell($w, 9, $title, 1, 1, 'C');

				$pdf -> SetX((360-$w)/2); 
				$pdf -> Cell(28, 5, 'TAG:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $numeroClaim, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf -> SetX((360-$w)/2); 
				$pdf -> Cell(28, 5, 'Magasin/Store:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $magasin, 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'	

				// Line break
				$pdf -> Ln(10);

				$pdf -> SetTextColor(0,0,0,0);
				$w = $pdf -> GetStringWIdth($title)+50;


				$pdf -> Cell(190, 9, 'Information du client/ Client information:', 1, 'L',1, true);
				$pdf -> Ln(4);
				$pdf -> Cell(20, 5, 'Nom:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $nomClient, 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				$pdf -> Cell(20, 5, 'Tel:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $telephone, 0, 0, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center

				$pdf -> Ln(10);
				$pdf -> Cell(20, 5, 'Adresse:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $adresse, 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				$pdf -> Cell(20, 5, 'Email:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $email, 0, 0, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center

				$pdf -> Ln(10);
				$pdf -> Cell(20, 5, 'Ville/City:', 0, 0, 'L');
				$pdf -> Cell(85, 5, $ville.',', 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				$pdf -> Cell(25, 5, 'Prov/State:', 0, 0, 'L');
				$pdf -> Cell(10, 5, $province.',', 0, 0, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center
				

				$pdf -> Cell(40, 5, 'Code postal/Zip code:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $codePostale, 0, 0, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center
				
				$pdf -> Ln(10);
				$pdf -> Cell(35, 5, '#Facture/invoice:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $numeroFacture, 0, 1, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center				
				$pdf -> Ln(6);

				/*******************/
				$pdf -> Cell(190, 9, 'Information du produit/ Product information:', 1, 'L', 1, true);
				$pdf -> Ln(4);
				$pdf -> Cell(30, 5, 'Modele/Model:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $modeleProduit, 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				$pdf -> Cell(20, 5, '#Serie:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $numeroSerie, 0, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				$pdf -> Ln(10);
				$pdf -> Cell(63, 5, "Date bris" ."\n"."/Faillure date:" , 0, 0, 'L');
				$pdf -> Cell(40, 5, $dateBris, 0, 0, 'L'); 


				$pdf -> Cell(45, 5, 'Date ins./Ins. date:', 0, 0, 'L');
				$pdf -> Cell(35, 5, $dateInstallation, 0, 1, 'L'); // longeur cellule, hauteur cellule, vleur a afficher, border of box, position(gauche ou droite), center

				/*******************/
				$pdf -> Ln(6);
				$title1 = utf8_decode('Description du problème/Description of the problem:');

				$pdf -> Cell(190, 9, $title1, 1, 'L', 1, true);
				$pdf -> Ln(5);
				$pdf -> MultiCell(190, 5, $descProbleme, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				/*******************/
				$pdf -> Ln(4);
				$title2 = utf8_decode( 'Service effectué/Service performed:');


				$pdf -> Cell(190, 9, $title2, 1, 'L', 1,true);
				$pdf -> Ln(5);
				$pdf -> MultiCell(190, 5, $serviceEffectue, 0, 'L'); // width, height, 'Text', border, new line, 'Text align'


				/*******************/
				$pdf -> Ln(4);
				$pdf -> Cell(190, 9, "Main d'oeuvre / Labor (temps/time)", 1, 'L', 1, true);
				$pdf -> Ln(18);

				$title3 = utf8_decode('Début/Beginning:');
				$pdf -> Cell(32, 5, $title3, 0, 0, 'L');
				$pdf -> Cell($w, 5, $dateDebut_mainOeuvre, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf -> Ln(5);
				$pdf -> Cell(32, 5, 'Fin/End :', 0, 0, 'L');
				$pdf -> Cell($w, 5, $dateFin_mainOeuvre, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf -> Ln(5);
				$pdf -> Cell(32, 5, 'total:', 0, 0, 'L');
				$pdf -> Cell($w, 5, $total, 0, 0, 'L'); 
				$pdf -> Ln(10);

			/*********************************************************************/
				
				$width_cell=array(15,21,85,30);

				$pdf -> SetFillColor(220,220,220,1); // GRAY color
			 
				// Header starts /// 
				$pdf -> SetY(-99); $pdf -> SetX((260-$w)/2); 
				$pdf -> Cell(90, 6, " Frais de garantie/Warranty charges: #Aut./Aut.:", 0, 'L');

				$title4 =  utf8_decode('Qté/Qty');

				$title5 =  utf8_decode('#Pièce/part');
				$pdf->Cell($width_cell[0],10,$title4,1,0,'C',true); // First header column 
				$pdf->Cell($width_cell[1],10,$title5,1,0,'C',true); // Second header column
				$pdf->Cell($width_cell[2],10,'Description',1,0,'C',true); // Third header column 

				$pdf -> SetFont('Arial', '', 11);
				// First row of data 
				$pdf -> SetY(-82); $pdf -> SetX((260-$w)/2); 
				$pdf->Cell($width_cell[0],10,$quantityRow1,1,0,'C',false); // First column of row 1 
				$pdf->Cell($width_cell[1],10,$numeroPieceRow1,1,0,'C',false); // Second column of row 1 
				$pdf->MultiCell($width_cell[2],10,$descriptionRow1,1,'C'); // Third column of row 1 
				//  First row of data is over 

				// First row of data 
				$pdf -> SetY(-72); $pdf -> SetX((260-$w)/2); 
				$pdf->Cell($width_cell[0],10,$quantityRow2,1,0,'C',false); // First column of row 1 
				$pdf->Cell($width_cell[1],10,$numeroPieceRow2,1,0,'C',false); // Second column of row 1 
				$pdf->Cell($width_cell[2],10,$descriptionRow2,1,'C'); // Third column of row 1 
				//  First row of data is over 

					// First row of data 
				$pdf -> SetY(-62); $pdf -> SetX((260-$w)/2); 
				$pdf->Cell($width_cell[0],10,$quantityRow3,1,0,'C',false); // First column of row 1 
				$pdf->Cell($width_cell[1],10,$numeroPieceRow3,1,0,'C',false); // Second column of row 1 
				$pdf->Cell($width_cell[2],10,$descriptionRow3,1,'C',false); // Third column of row 1 
				//  First row of data is over 
				$pdf->SetFillColor(193,229,252); // BLUE color

				$pdf -> Ln(5);
				$pdf -> Cell(190, 9, "Information du Technicien/Technician information:", 1, 'L', 1, true);
				$pdf -> Ln(2);
				$title3 = utf8_decode('Date service/service date:');
				$pdf -> Cell(48, 4, $title3, 0, 0, 'L');
				$pdf -> Cell($w, 5, $dateDebut, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf -> Cell(48, 4, 'Nom/Name :', 0, 0, 'L');
				$pdf -> Cell($w, 5, $nomTechnicien, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf -> Cell(48, 4, 'Signature', 0, 0, 'L');
				$pdf -> Cell($w, 5, $signature, 0, 1, 'L'); // width, height, 'Text', border, new line, 'Text align'

				$pdf->Output();
			}
		} else {
			echo "ERREURE";
		}		
}else{
	echo "string "+ $nomClient;;
}
mysqli_close($conn);
 ?>