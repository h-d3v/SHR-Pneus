<?php

	include_once(DOSSIER_BASE_INCLUDE."controler/Controleur.abstract.class.php");
	include_once(DOSSIER_BASE_INCLUDE."model/DAO/ItemDAO.class.php");


	class Resultat extends Controleur {
		// ******************* Attributs
		private $tabLargeur = array();
		private $tabRatio = array();
		private $tabDiametre = array();
		private $tabIndiceCharge = array();
		private $tabIndiceVitesse = array();
		Private $tabResultatRecherche = array();
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
		public function getTabResultatRecherche(){
			return $this->tabResultatRecherche;
		}

		// ******************* Getteurs ******************************

		private function compare($item1, $item2){
			if($item1->getPrixDeVente() == $item2->getPrixDeVente()){
				return 0;
			} else if ($item1->getPrixDeVente() < $item2->getPrixDeVente()){
				return -1;
			}
			return 1;
		}

		public function getTabResultatRechercheTrie(){
			$sortArray =  new ArrayObject($this->tabResultatRecherche);
			return $sortArray::uasort(compare());
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

			if (isset($_GET['manufacturier'])){
				$this->tabResultatRecherche = ItemDAO::chercherAvecFiltre('INNER JOIN modele ON item.modeleNom = modele.modeleNom WHERE manufacturier = "'.$_GET['manufacturier'].'"');
			} else if (isset($_GET['speciaux'])){   
				$this->tabResultatRecherche = ItemDAO::chercherAvecFiltre('WHERE remise IS NOT NULL');
			} else {
				$this->tabResultatRecherche = ItemDAO::chercherAvecFiltre('WHERE largeur='.$_POST['largeur'].' AND ratio='.$_POST['ratio'].' AND diametre='.$_POST['diametre'].' AND indiceCharge='.$_POST['indiceCharge'].' AND indiceVitesse="'.$_POST['indiceVitesse'].'"');
			}
			
			//----------------------------- RETOURNER LE NOM DE LA VUE À APPELER -----
			return 'resultat';
		}


		
	}	
	
?>