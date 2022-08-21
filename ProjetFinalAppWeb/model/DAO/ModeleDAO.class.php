<?php
	// Importe l'interface DAO
    include_once(DOSSIER_BASE_INCLUDE."model/DAO/DAO.interface.php");
    // Importe la classe Modele
    include_once(DOSSIER_BASE_INCLUDE."model/Modele.class.php");

    class ModeleDAO implements DAO {

        /**
         * Methode DAO qui retourne un objet modele dont l'identifiant (cle primaire) est passe en parametre
         * @param int un identifiant modele
         * @return Modele un objet modele ou null si non trouve
         */
        public static function chercher($identifiant){
            $unModele = null;
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("SELECT * FROM modele WHERE idModele=:unId");
            $requete->bindParam(":unId", $identifiant);
            $requete->execute();

            if($requete->rowCount()>0){
                $enregistrement = $requete->fetch();

                $unModele = new Modele($enregistrement['idModele'],$enregistrement['manufacturier'], $enregistrement['modeleNom'], $enregistrement['winter'], $enregistrement['allWeather'], $enregistrement['rft'], $enregistrement['typeModel'], $enregistrement['pictureLink']);
            }

            $requete-> closeCursor();
			ConnexionDB::close();	
			return $unModele;	 
        }


        /**
         * Methode DAO qui retourne la liste complete d'objet modele de la bd
         * @return Array une liste d'objet modele ou une list vide si le bd est vide
         */
        public static function chercherTous(){
            return self::chercherAvecFiltre("");
        }


        /**
         * Methode DAO qui retourne la liste d'objet modele de la bd en fonction d'un flitre passe en parametre (exemple "WHERE id = 11")
         * @param String $filtre une chaine de caratere qui represente une requete de type sql
         * @return Array une liste d'objet modele ou une list vide si le bd est vide
         */
        public static function chercherAvecFiltre($filtre){
            $listeModele = array();
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            $requete = $connexion->prepare("SELECT * FROM modele ".$filtre);
            $requete->execute();

            if($requete->rowCount()>0){
                foreach($requete as $enregistrement){
                    $unModele = new Modele($enregistrement['idModele'],$enregistrement['manufacturier'], $enregistrement['modeleNom'], $enregistrement['winter'], $enregistrement['allWeather'], $enregistrement['rft'], $enregistrement['typeModel'], $enregistrement['pictureLink']);
                    array_push($listeModele, $unModele);
                }
            }

            //$requete-> closeCursor();
			ConnexionDB::close();	
            
            return $listeModele;	 
        }

        /**
         * Methode DAO qui insere un nouveau modele dans la bd
         * @param Modele $unModele un objet modele
         * @return Modele $ModeleInserer l'objet modele tel qu'il est inserer dans la bd
         */
        public static function inserer($unNouveauModele){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }

            $requete = $connexion->prepare("INSERT INTO modele (manufacturier, modeleNom, winter, allWeather, rft, typeModel, pictureLink) VALUES (?,?,?,?,?,?,?)");
            $isRecorded = $requete->execute(array($unNouveauModele->getManufacturier(), $unNouveauModele->getModeleNom(), $unNouveauModele->getWinter(), $unNouveauModele->getAllWeather(), $unNouveauModele->getRft(), $unNouveauModele->getTypeModel(), $unNouveauModele->getPictureLink()));

            if($isRecorded){
                return self::chercherAvecFiltre('WHERE modeleNom = "'.$unNouveauModele->getModeleNom().'"'[0]);
            }
            return null;

        }

        /**
         * Methode DAO qui modifie les caracteristiques d'un modele de la bd a partir de son identifiant
         * @param Modele $unModele un objet avec ses attributs modifies
         * @return Modele @unModeleModif le modele tel qu'il est enregistre dans la bd
         */
        public static function modifier($unModele){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            // On verifie que le modele que l'on souhaite supprimer existe
            if (self::chercher($unModele->getIdModel()) != null){
                $requete = $connexion->prepare('UPDATE modele SET manufacturier="'.$unModele->getManufacturier().'", modeleNom ="'.$unModele->getModeleNom().'", winter = "'.$unModele->getWinter().'", allWeather = "'.$unModele->getAllWeather().'", rft = "'.$unModele->getRft().'", typeModel = "'.$unModele->getTypeModel().'", pictureLink ="'.$unModele->getPictureLink().'" WHERE idModele = '.$unModele->getIdModel());
                var_dump($requete);
                return $requete->execute();
           }

        }

        /**
         * Methode DAO qui supprine un modele dans la bd
         * @param Modele $unModele un objet modele
         * @return bollean  true si l'objet Modele existe et a bien ete supprime ou false dans les autres cas
         */
        public static function supprimer($unModele){
            try{
                $connexion = ConnexionDB::getInstance();
            } catch (Exception $e){
                throw new Exception("Connexion base de donnee imposible.");
            }
            // On verifie que le modele que l'on souhaite supprimer existe
            if (self::chercher($unModele->getIdModel()) != null){
                $requete = $connexion->prepare("DELETE FROM modele where idModele =" .$unModele->getIdModel());
                return $requete->execute();
           }
            return false;
        }
       
    }