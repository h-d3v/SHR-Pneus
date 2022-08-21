<?php
	// Importe l'interface DAO
    include_once(DOSSIER_BASE_INCLUDE."model/DAO/DAO.interface.php");
    // Importe les classes necessaires
	include_once(DOSSIER_BASE_INCLUDE."model/Modele.class.php");
    include_once(DOSSIER_BASE_INCLUDE."model/Item.class.php");
    include_once(DOSSIER_BASE_INCLUDE."model/DAO/ModeleDAO.class.php");

    class ItemDAO implements DAO {

        /**
         * Methode DAO qui retourne un objet item dont l'identifiant (cle primaire) est passe en parametre
         * @param int un identifiant item
         * @return item un objet modele ou null si non trouve
         */
        public static function chercher($identifiant){
            $unItem = null;
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("SELECT * FROM item WHERE idItem=:unId");
            $requete->bindParam(":unId", $identifiant);
            $requete->execute();

            if($requete->rowCount()>0){
				$enregistrement = $requete->fetch();
				$SQLWhere = 'WHERE modeleNom = "'.$enregistrement['modeleNom'].'"';

				$unModele = ModeleDAO::chercherAvecFiltre($SQLWhere)[0];
				if ($unModele != null)
				$unItem = new item(
					$enregistrement['idItem'],
					$unModele->getIdModel(),
					$unModele->getManufacturier(),
					$unModele->getModeleNom(),
					$unModele->getWinter(),
					$unModele->getAllWeather(),
					$unModele->getRft(),
					$unModele->getTypeModel(),
					$unModele->getPictureLink(),
					$enregistrement['largeur'],
					$enregistrement['ratio'],
					$enregistrement['diametre'],
					$enregistrement['indiceCharge'],
					$enregistrement['indiceVitesse'],
					$enregistrement['prix'],
					$enregistrement['stock'],
					$enregistrement['remise']
				);
            }
            $requete-> closeCursor();
			ConnexionDB::close();	
			return $unItem;	 
        }


        /**
         * Methode DAO qui retourne la liste complete des items de la bd
         * @return Array une liste d'objet item ou une list vide si le bd est vide
         */
        public static function chercherTous(){
            return self::chercherAvecFiltre("");
        }


        /**
         * Methode DAO qui retourne la liste d'objet item de la bd en fonction d'un flitre passe en parametre (exemple "WHERE id = 11")
         * @param String $filtre une chaine de caratere qui represente une requete WHERE de type sql
         * @return Array une liste d'objet item ou une list vide si le bd est vide
         */
        public static function chercherAvecFiltre($filtre){
            $listeItem = array();
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("SELECT * FROM item ".$filtre." ORDER BY prix");
			$requete->execute();

            if($requete->rowCount()>0){
                foreach($requete as $enregistrement){
                    $SQLWhere = 'WHERE modeleNom = "'.$enregistrement['modeleNom'].'"';

				    $unModele = ModeleDAO::chercherAvecFiltre($SQLWhere)[0];
				    if ($unModele != null){
						$unItem = new item(
							$enregistrement['idItem'],
							$unModele->getIdModel(),
							$unModele->getManufacturier(),
							$unModele->getModeleNom(),
							$unModele->getWinter(),
							$unModele->getAllWeather(),
							$unModele->getRft(),
							$unModele->getTypeModel(),
							$unModele->getPictureLink(),
							$enregistrement['largeur'],
							$enregistrement['ratio'],
							$enregistrement['diametre'],
							$enregistrement['indiceCharge'],
							$enregistrement['indiceVitesse'],
							$enregistrement['prix'],
							$enregistrement['stock'],
							$enregistrement['remise']
						);
						array_push($listeItem, $unItem);
					}
                }
            }
            $requete-> closeCursor();
			ConnexionDB::close();	
            return $listeItem;	 
        }

        /**
         * Methode DAO qui insere un nouveau item dans la bd 
         * @param Item $unItem un objet item
         * @return Item $itemInserer l'objet item tel qu'il est inserer dans la bd
         */
        public static function inserer($unNouveauItem){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("INSERT INTO item (modeleNom, largeur, ratio, diametre, indiceCharge, indiceVitesse, prix, stock, remise) VALUES (?,?,?,?,?,?,?,?,?)");
            $isRecorded = $requete->execute(array($unNouveauItem->getModeleNom(), $unNouveauItem->getLargeur(), $unNouveauItem->getRatio(), $unNouveauItem->getDiametre(), $unNouveauItem->getIndiceCharge(), $unNouveauItem->getIndiceVitesse(), $unNouveauItem->getStock(), $unNouveauItem->getPrixDeBase(), $unNouveauItem->getRemise()));
			
            if($isRecorded){
                return self::chercher($connexion->lastInsertId());
			}
			$requete-> closeCursor();
			ConnexionDB::close();
            return null;
        }

        /**
         * Methode DAO qui modifie les caracteristiques d'un modele de la bd a partir de son identifiant
         * @param Item $unItem un objet item avec ses attributs modifies
         * @return Item l'item tel qu'il est enregistre dans la bd
         */
        public static function modifier($unItem){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            // On verifie que le modele que l'on souhaite supprimer existe
                $requete = $connexion->prepare('UPDATE item SET largeur = "'.$unItem->getLargeur().'", ratio = "'.$unItem->getRatio().'", diametre = "'.$unItem->getDiametre().'", indiceCharge = "'.$unItem->getIndiceCharge().'", indiceVitesse ="'.$unItem->getIndiceVitesse().'", prix ="'.$unItem->getPrixDeBase().'", stock ="'.$unItem->getStock().'", remise ="'.$unItem->getRemise().'" WHERE idItem = '.$unItem->getIdItem());
                var_dump($requete);
                return $requete->execute();

        }

        /**
         * Methode DAO qui supprine un modele dans la bd
         * @param Modele $unModele un objet modele
         * @return bollean  true si l'objet Modele existe et a bien ete supprime ou false dans les autres cas
         */
        public static function supprimer($unItem){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("DELETE FROM item where idItem =" .$unItem->getIdItem());
            return $requete->execute();
        }

        /**
         * Methode DAO qui retourne un tableau avec toutes les variantes d'une caracteristique disponible d'un item dans la bd
         * permet de remplir les select des formulaires
         * @param String la caracteristique
         * @return Array un tableau contenant toutes les variantes d'une caracteristique 
         */
        public static function remplirSelect($caracteristique){
            $list = array();
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("SELECT DISTINCT ".$caracteristique." FROM item ORDER BY ".$caracteristique);
            $requete->execute();
            foreach($requete as $enregistrement){
                array_push($list, $enregistrement);
            }
            return $list;
        }



       
    }