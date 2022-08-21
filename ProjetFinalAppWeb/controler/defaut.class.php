<?php

	include_once(DOSSIER_BASE_INCLUDE."controler/Controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."model/DAO/ItemDAO.class.php");


	class Defaut extends Controleur {
		// ******************* Attributs 
		private $tabLargeur = array();
		private $tabRatio = array();
		private $tabDiametre = array();
		private $tabIndiceCharge = array();
		private $tabIndiceVitesse = array();
		
		// ******************* Constructeur qui initialise son parent
		public function __construct(){
			parent::__construct();
		}

		// ******************* Getteurs ******************************
		public function getTabLargeur(){
			return $this->tabLargeur;
		}

		public function getTabRatio(){
			return $this->tabRatio;
		}

		public function getTabDiametre(){
			return $this->tabDiametre;
		}

		public function getTabIndiceCharge(){
			return $this->tabIndiceCharge;
		}

		public function getTabIndiceVitesse(){
			return $this->tabIndiceVitesse;
		}

		// ******************* Méthode exécuter action
		public function executerAction() {
			//----------------------------- VÉRIFIER LA VALIDITÉ DE LA SESSION (pas besoin ici) -----------
			//----------------------------- VÉRIFIER LA VALIDITÉ DES POSTS (pas besoin ici) ---------------
			//--------------------------- INTERACTION BD -----------------------------
			$this->tabLargeur = ItemDAO::remplirSelect("largeur");
			$this->tabRatio = ItemDAO::remplirSelect('ratio');
			$this->tabDiametre = ItemDAO::remplirSelect('diametre');
			$this->tabIndiceCharge = ItemDAO::remplirSelect('indiceCharge');
			$this->tabIndiceVitesse = ItemDAO::remplirSelect('indiceVitesse');
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return 'indexView';
		}


		
	}