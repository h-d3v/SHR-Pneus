<?php
    // Importe l'interface DAO
    include_once(DOSSIER_BASE_INCLUDE."model/DAO/DAO.interface.php");
    include_once(DOSSIER_BASE_INCLUDE."model/Acteur.class.php");

class ActeurDAO implements DAO{

    /**
     * Methode DAO qui retourne un objet acteur dont l'identifiant (courriel) est passe en parametre
     * @param string courriel
     * @return Acteur un objet acteur ou null si non trouve
     * @throws Exception si la connexion a la BD echoue
     */
    public static function chercher($courriel){
        $unActeur = null;
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }
        $requete = $connexion->prepare("SELECT * FROM acteur WHERE courriel=:unCourriel");
        $requete->bindParam(":unCourriel", $courriel);
        $requete->execute();

        if($requete->rowCount()>0){
            $enregistrement = $requete->fetch();
            $unActeur = new Acteur($enregistrement['categorieActeur'],$enregistrement['courriel'], $enregistrement['passwordActeur'], $enregistrement['prenom'], $enregistrement['nom'], $enregistrement['adresse'], $enregistrement['codePostal'], $enregistrement['ville'],$enregistrement['telephone']);
        }

        $requete-> closeCursor();
        ConnexionDB::close();
        return $unActeur;
    }

    /**
     * Methode DAO qui retourne la liste complete d'objet acteur de la bd
     * @return array une liste d'objet acteur ou une liste vide si la bd est vide
     * @throws Exception si la connexion a la BD echoue
     */
    static public function chercherTous()
    {
        return self::chercherAvecFiltre("");
    }

    /**
     * Methode DAO qui retourne la liste d'objet acteur de la bd en fonction d'un flitre passe en parametre (exemple "WHERE prenom = Pierre")
     * @param string $filtre une chaine de caratere qui represente une requete de type sql
     * @return array une liste d'objet acteur ou une liste vide si le bd est vide
     * @throws Exception si la connexion a la bd echoue
     */
    public static function chercherAvecFiltre($filtre){
        $listeActeur = array();
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }
        $requete = $connexion->prepare("SELECT * FROM acteur ".$filtre);
        $requete->execute();

        if($requete->rowCount()>0){
            foreach($requete as $enregistrement){
                $unActeur = new Acteur($enregistrement['categorieActeur'],$enregistrement['courriel'], $enregistrement['passwordActeur'], $enregistrement['prenom'], $enregistrement['nom'], $enregistrement['adresse'], $enregistrement['codePostal'], $enregistrement['ville'],$enregistrement['telephone']);
                array_push($listeActeur, $unActeur);
            }
        }
        $requete-> closeCursor();
        ConnexionDB::close();
        return $listeActeur;
    }

    /**
     * Methode DAO qui insere un nouvel acteur dans la bd
     * @param Acteur $unActeur un objet acteur
     * @return Acteur tel qu'il a ete inserer dans la bd ou null s'il n'a pas ete inserer
     * @throws Exception si la connection a la BD echoue
     */
    static public function inserer($unActeur){
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }

        $requete = $connexion->prepare("INSERT INTO acteur (courriel, categorieActeur, passwordActeur, nom, prenom, adresse, codePostal, ville, adresse, telephone) VALUES (?,?,?,?,?,?,?,?)");
        $isRecorded = $requete->execute(array($unActeur->getCourriel(), $unActeur->getType(),$unActeur->getMdp(), $unActeur->getNom(), $unActeur->getPrenom(), $unActeur->getAdresse(), $unActeur->getCp(), $unActeur->getVille(), $unActeur->getNumtel()));

        if($isRecorded){
            return self::chercher($unActeur->getCourriel());
        }
        return null;
    }

    /**
     * Methode DAO qui modifie les caracteristiques d'un acteur de la bd a partir de son courriel
     * @param Acteur $unActeur un objet avec ses attributs modifies
     * @return bool, si la requete a bien ete executée ou non.
     * @throws Exception si la connection a la BD echoue
     */
    static public function modifier($unActeur)
    {
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }
        var_dump($unActeur);
        if (self::chercher($unActeur->getCourriel()) != null){
            $sql = 'UPDATE acteur SET courriel = "'.$unActeur->getCourriel().'", categorieActeur ="'.$unActeur->getType().'", passwordActeur = "'.$unActeur->getMdp().'", nom = "'.$unActeur->getNom().'", prenom = "'.$unActeur->getPrenom().'", adresse = "'.$unActeur->getAdresse().'", codePostal ="'.$unActeur->getCp().'", telephone ="'.$unActeur->getNumtel().'" WHERE courriel = "'.$unActeur->getCourriel().'"';
            echo $sql;
            $requete = $connexion->prepare($sql);
            return $requete->execute();
        }
        return false;
    }

    /**
     * Methode DAO qui supprine un modele dans la bd
     * @param Acteur $unActeur un objet acteur
     * @return bool  true si l'objet Acteur existe et a bien ete supprime ou false dans les autres cas
     * @throws Exception
     */

    static public function supprimer($unActeur){
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }
        // On verifie que le modele que l'on souhaite supprimer existe
        if (self::chercher($unActeur->getCourriel()) != null){
            $requete = $connexion->prepare("DELETE FROM acteur where courriel =" .$unActeur->getCourriel());
            return $requete->execute();
        }
        return false;
    }

    static public function chercherParNumeroMotPasse($unCourriel, $unMotDePasse){
        $unActeur = null;
        try{
            $connexion = ConnexionDB::getInstance();
        } catch (Exception $e){
            throw new Exception("Connexion base de donnee imposible.");
        }
        $requete = $connexion->prepare("SELECT * FROM acteur WHERE courriel=? AND passwordActeur=?");
        $requete->execute(array($unCourriel, $unMotDePasse));

        if($requete->rowCount()>0){
            $enregistrement = $requete->fetch();
            $unActeur = new Acteur($enregistrement['categorieActeur'],$enregistrement['courriel'], $enregistrement['passwordActeur'], $enregistrement['prenom'], $enregistrement['nom'], $enregistrement['ville'], $enregistrement['codePostal'], $enregistrement['adresse'],$enregistrement['telephone']);
        }

        $requete-> closeCursor();
        ConnexionDB::close();
        return $unActeur;
    }


}