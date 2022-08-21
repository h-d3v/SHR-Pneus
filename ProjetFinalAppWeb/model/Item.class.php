<?php

class item extends Modele{

    private $identifiantItem;
    private $largeur;
    private $ratio;
    private $diametre;
    private $indiceCharge;
    private $indiceVitesse;
    private $prix;
    private $stock;
    private $remise;
    
    /**
     * Construit un item a partir des informations qui le compose
     * @param int $identifiantItem l'ID de l'item dans la bd
     * @param int $identifiantModele l'ID du modele dans la bd
     * @param Manufacturier $manufacturier le nom du manufacturier
     * @param String $modeleNom le nom du modele
     * @param String $winter "Y" si le modele correspond a un pneu hivers sinon "N"
     * @param String $allWeather "Y" si le modele correspond a un pneu all weather sinon "N"
     * @param String $rft "RFT" si le modele correspond a un pneu rft sinon ""
     * @param String $typeModel le type du pneu
     * @param String $pictureLink une chaine de caractere du lien web vers l'image d'illustration du modele
     * @param int $largeur la largeur du pneu
     * @param int $ratio le ratio hauteur largeur du pneu
     * @param int $diametre le diametre du pneu
     * @param int $indiceCharge l'indice de charge du pneu
     * @param String $indiceVitesse l'indice de vitesse sous forme d'un chractere
     * @param float $prix le prix d'un pneu en $
     * @param int $stock le stock de pneu disponible
     */
    public function __construct($identifiantItem, $identifiantModele, $manufacturier, $modeleNom, $winter, $allWeather, $rft, $typeModel, $pictureLink, $largeur, $ratio, $diametre, $indiceCharge, $indiceVitesse, $prix, $stock, $remise = 0)
    {
        parent::__construct($identifiantModele, $manufacturier, $modeleNom, $winter, $allWeather, $rft, $typeModel, $pictureLink);
        $this->identifiantItem = $identifiantItem;
        $this->largeur = $largeur;
        $this->ratio = $ratio;
        $this->diametre = $diametre;
        $this->indiceCharge = $indiceCharge;
        $this->indiceVitesse = $indiceVitesse;
        $this->prix = $prix;
        $this->stock = $stock;
        $this->remise = $remise;
    }

    //-------------------GETTEURS--------------------------

    /**
     * methode qui retourne l'ID du pneu (item)
     * @return int un identifiant
     */
    public function getIdItem(){
        return $this->identifiantItem;
    }

    /**
     * methode qui retourne la largeur du pneu (item)
     * @return int une largeur
     */
    public function getLargeur(){
        return $this->largeur;
    }

    /**
     * methode qui retourne le ration hauteur largeur du pneu (item)
     * @return int un ratio
     */
    public function getRatio(){
        return $this->ratio;
    }

    /**
     * methode qui retourne le ratio hauteur largeur du pneu (item)
     * @return int un ratio
     */
    public function getDiametre(){
        return $this->diametre;
    }

    /**
     * methode qui retourne l'indice de charge du pneu (item)
     * @return int l'indice de charge du pneu
     */
    public function getIndiceCharge(){
        return $this->indiceCharge;
    }

    /**
     * methode qui retourne l'indice vitesse du pneu (item)
     * @return String l'indice vitesse du pneu
     */
    public function getIndiceVitesse(){
        return $this->indiceVitesse;
    }

    /**
     * methode qui retourne le nombre de pneu (item) disponible en stock
     * @return int un nombre de pneu
     */
    public function getStock(){
        return $this->stock;
    }

    /**
     * methode qui retourne la valeur de la remise sur un pneu (item) en %
     * @return int un pourcentage
     */
    public function getRemise(){
        return $this->remise;
    }

    /**
     * methode qui retourne le ration hauteur largeur du pneu (item)
     * @return int un prix
     */
    public function getPrixDeBase(){
        return $this->prix;
    }

    //--------------------SETTEURS-------------------------

    /**
     * methode qui modifie la largeur du pneu (item)
     * @param int une largeur
     */
    public function setLargeur($largeur){
        $this->largeur = $largeur;
    }

    /**
     * methode qui modifie la valeur du ratio d'un pneu (item)
     * @param int un ratio
     */
    public function setRatio($ratio){
        $this->ratio = $ratio;
    }

    /**
     * methode qui modifie la valeur du diametre d'un pneu (item)
     * @param int un diametre
     */
    public function setDiametre($diametre){
        $this->diametre = $diametre;
    }

    /**
     * methode qui modifie la valeur de l'indice de charge d'un pneu (item)
     * @param int un indice de charge
     */
    public function setIndiceCharge($indiceCharge){
        $this->indiceCharge = $indiceCharge;
    }

    /**
     * methode qui modifie la valeur de l'indice vitesse d'un pneu (item)
     * @param String un indice de vitesse
     */
    public function setIndiceVitesse($indiceVitesse){
        $this->indiceVitesse = $indiceVitesse;
    }

    /**
     * methode qui modifie la valeur du prix de base d'un pneu (item)
     * @param float un prix
     */
    public function setPrixDeBase($prix){
        $this->prix = $prix;
    }

    /**
     * methode qui modifie la quantite en stock d'un pneu (item)
     * @param int un nombre de pneu
     */
    public function setStock($nombrePneu){
        $this->stock = $nombrePneu;
    }

    /**
     * methode qui modifie le pourcentage de remise d'un pneu (item)
     * @param int un pourcentage de remise
     */
    public function setRemise($remise){
        $this->remise = $remise;
    }

    //-----------------AUTRES METHODES--------------------

    /**
     * methode qui retourne le prix de vente du pneu (item) en fonction d'une remise eventuelle
     * @return int un prix remise deduite ou le prix de base si pas de remise
     */
    public function getPrixDeVente(){
        if ($this->remise != 0){
            return round($this->getPrixDeBase()*(1-($this->remise/100)),2);
        }
        return $this->getPrixDeBase();
    }

    /**
     * methode qui augmente la quantite en stock d'un pneu (item)
     * @param int un nombre de pneu ajouter au stock
     */
    public function ajouterStock($nombrePneu){
        $this->stock += $nombrePneu;
    }

    /**
     * methode qui retourne les dimensions completes du pneu (item) au format universelle
     * @return String une chaine de caractere representant les diemsions d'un pneu (ex: 245/40R18)
     */
    public function getSize(){
        return $this->getLargeur().'/'.$this->getRatio().'R'.$this->getDiametre();
    }

    /**
     * methode qui retourne la saison du pneu
     * @return String une chaine de caractere de la saison
     */
    public function saison(){
        if($this->getWinter() == "Y")
            return "Hiver";
        else if($this->getAllWeather() == "Y")
            return "Toutes saisons";
        else
            return "Ete";
    }

}