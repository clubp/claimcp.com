<?php
session_start();

include 'db_conn.php';

if (isset($_POST['uname']) && isset($_POST['password'])) {
	function validate($data){
		$data = trim($data);
		$data= stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$uname= validate($_POST['uname']);
	$password= validate($_POST['password']);
	
	if (empty($uname)) {
		header('Location:loginPage.php?error=Nom utilisateur requit');
		exit();
	} else if (empty($password)) {
		header('Location:loginPage.php?error=Mot de passe requit');
		exit();
	}else  {
		$sql = "SELECT * FROM `employe` WHERE user_name='$uname' AND password='$password'";

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) === 1){
			$row = mysqli_fetch_assoc($result);

			 if($row['user_name'] === $uname && $row['password'] === $password ){
				$_SESSION['user_name'] = $row['user_name'];
				$_SESSION['nom'] = $row['nom'];
				$_SESSION['id'] = $row['id'];
				header("Location:index.php"); // si les infos de connection sont bonne, l'user est rediriger vers la page de formulaire
				exit();
			}else{
				header("Location:loginPage.php?error=Mom d'utilisateur ou mot de passe invalide");
				exit();
			}

			//print_r($row);
		}else{
			header('Location:loginPage.php?error=Incorrect Username or password');
			exit();
		}
	}

	
	
} else {
	header('Location:loginPage.php');
	exit();
}


?>