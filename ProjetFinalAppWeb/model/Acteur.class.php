<?php

class Acteur {

    //Attributs
    private $type;
    private $courriel;
    private $mdp;
    private $nom;
    private $prenom;
    private $ville;
    private $cp;
    private $adresse;
    private $numtel;


    public function __construct($type, $courriel, $mdp, $prenom, $nom, $ville, $cp, $adresse, $numtel){
        $this->prenom=$prenom;
        $this->nom=$nom;
        $this->type=$type;
        $this->courriel=$courriel;
        $this->mdp=$mdp;
        $this->ville=$ville;
        $this->cp=$cp;
        $this->adresse=$adresse;
        $this->numtel=$numtel;
    }

    // ****************** Accesseurs ************************

    /**
    * Methode qui retourne le type de l'acteur
    * @return TypeActeur
    */
    public function getType() {return $this->type;}
    
    /**
    * Methode qui retourne le nom de l'acteur
    * @return string
    */
    public function getNom() {return $this->nom;}
    
    /**
    * Methode qui retourne le prenom de l'acteur
    * @return string
    */
    public function getPrenom() {return $this->prenom;}
    
    /**
    * Methode qui retourne le code postal de l'acteur 
    * @return string
    */
    public function getCp() {return $this->cp;}
    
    /**
     * Methode qui retourne l'adresse de l'acteur
     * @return string
     */
    public function getAdresse() {return $this->adresse;}
    
    /**
    * @return string
    */
    public function getVille() {return $this->ville;}
    
    /**
    * @return string
    */
    public function getMdp() {return $this->mdp;}
    
    /**
    * @return string
    */
    public function getCourriel() {return $this->courriel;}
    
    /**
    * @return int
    */
    public function getNumtel() {return $this->numtel;}
    
    /**
    * @param string $courriel
    */
    public function setCourriel($courriel) {$this->courriel = $courriel;}

    public function setNom($nom) {$this->nom = $nom;}

    public function setPrenom($prenom) {$this->prenom = $prenom;}

     /**
      * @param string $ville
      */public function setVille($ville) {$this->ville = $ville;}
    /**
     * @param string $cp
     */public function setCp($cp) {$this->cp = $cp;}
     /**
      * @param string $adresse
      */public function setAdresse($adresse) {$this->adresse = $adresse;}
    /**
     * @param int $numtel
     */public function setNumtel($numtel) {$this->numtel = $numtel;}

    // ************************ Autres méthodes *************************
    public function changerMdp($ancien, $nouveau) {
        $test = false;
        // Si bon ancien mot de passe et au moins 8 car.,on change
        if ($ancien == $this->mdp && strlen($nouveau) >= 8) {
            $test = true;
            $this->mdp = $nouveau;
        }
        return $test;
    }
}
