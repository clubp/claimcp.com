<?php 
	class ClaimVO {

		protected $id;
		protected $nomClient;
		protected $telephone;
		protected $adresse;


		public function getId(){
			return $this->id;
		  
		}

		public function getNomClient(){
			return $this->nomClient;
		  
		}
		public function getTelephone(){
			return $this->telephone;
		  
		}

		public function getAdresse(){
			return $this->adresse;
		  
		}

	  
	


	}




 ?>