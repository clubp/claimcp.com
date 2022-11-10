<?php

include 'db_conn.php';

$id = $_GET['idClaim'];

$sql = "DELETE FROM claim WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    $msg = ("Claim ".$id." supprimer avec succès!");
    header("Location:listeClaim.php?message=.$msg");
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>
 
 ?>