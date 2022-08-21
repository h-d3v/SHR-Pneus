<?php
	
	include_once(DOSSIER_BASE_INCLUDE.'model/DAO/connexionBD.class.php');

	interface DAO {	
		
		static public function chercher($cles); 
		static public function chercherTous(); 
		static public function chercherAvecFiltre($filtre); 
		static public function inserer($unObjet); 
		static public function modifier($unObjet); 
		static public function supprimer($unObjet); 
	}
?>