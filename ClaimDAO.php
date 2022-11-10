<?php 

	include("ClaimVO.php");



	class ClaimDAO{


		protected $connect;
		protected $db;
		protected $id;


		public function ClaimDAO() {
			$this->connect = mysqli_connect("localhost", "root", "") or die("Erreur de connexion".mysqli_error());
			$this->db = mysqli_select_db($this->connect, "test_db");

		}


		protected function execute($sql) {
	$this->connect = mysqli_connect("localhost", "root", "") or die("Erreur de connexion".mysqli_error());
			$this->db = mysqli_select_db($this->connect, "test_db");

			
			$res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
		}


		protected function executeInfoClaim($sql) {
			$this->connect = mysqli_connect("localhost", "root", "") or die("Erreur de connexion".mysqli_error());
			$this->db = mysqli_select_db($this->connect, "test_db");

			$res = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));

			if(mysqli_num_rows($res)>0) {
				for ($i=0; $i < mysqli_num_rows($res); $i++) { 
					$row= mysqli_fetch_assoc($res);

					$claimvo[$i] = new ClaimVO();
					$claimvo[$i]->getNomClient($row['nomClient']);
					$claimvo[$i]->getTelephone($row['telephone']);
					$claimvo[$i]->getAdresse($row['adresse']);

				}
			}
			return $claimvo;		
		}

		public function getListeClaim() {
			$sql = "SELECT * FROM `claim`";
			return $this->executeInfoClaim($sql);


		}

		public function getInfoClaim() {
			$id= mysqli_real_escape_string()
			$sql = "SELECT * FROM `claim`";
			return $this->executeInfoClaim($sql);


		}



	}





 ?>