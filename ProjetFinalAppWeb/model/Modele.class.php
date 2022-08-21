<?php

class Modele {

    private $idModele;
    private $manufacturier;
    private $modeleNom;
    private $winter;
    private $allWeather;
    private $rft;
    private $typeModel;
    private $pictureLink;

    /**
     * Construit un modele a partir des informations qui le compose
     * @param int $idModele l'ID du modele dans la bd
     * @param String $manufacturier le nom du manufacturier
     * @param String $modeleNom le nom du modele
     * @param String $winter true si le modele correspond a un pneu hivers sinon false
     * @param String $allWeather true si le modele correspond a un pneu all weather sinon false
     * @param String $rft true  si le modele correspond a un pneu rft sinon false
     * @param String $typeModel le type du pneu
     * @param String $pictureLink une chaine de caractere du lien web vers l'image d'illustration du modele
     */
    public function __construct($identifiant, $manufacturier, $modeleNom, $winter, $allWeather, $rft, $typeModel, $pictureLink)
    {
        $this->idModele = $identifiant;
        $this->manufacturier= $manufacturier;
        $this->modeleNom = $modeleNom;
        $this->winter = $winter;
        $this->allWeather = $allWeather;
        $this->rft = $rft;
        $this->typeModel = $typeModel;
        $this->pictureLink = $pictureLink;
    }

    //-------------------GETTEURS--------------------------

    /**
     * methode qui retourne l'ID du modele si il existe ou -1
     * @return int un identifiant
     */
    public function getIdModel(){
        return $this->idModele;
    }

    /**
     * methode qui retourne le nom du manufacturier du modele
     * @return String un nom de manufacturuier
     */
    public function getManufacturier(){
        return $this->manufacturier;
    }

    /**
     * methode qui retourne le nom du modele
     * @return String un nom de modele
     */
    public function getModeleNom(){
        return $this->modeleNom;
    }

    /**
     * methode qui confirme si le pneu est un pneu hivers
     * @return String "Y" si le modele est un pneu hivers ou une chaine vide
     */
    public function getWinter(){
        return $this->winter;
    }

    /**
     * methode qui confirme si le pneu est un pneu allweather
     * @return String "Y" si le modele est un pneu allweather ou une chaine vide
     */
    public function getAllWeather(){
        return $this->allWeather;
    }

    /**
     * methode qui confirme si le pneu est un pneu rft
     * @return String "RFT" si le modele est un pneu rft ou une chaine vide si il ne l'est pas
     */
    public function getRft(){
        return $this->rft;
    }

    /**
     * methode qui retourne le type du modele
     * @return String un type de modele
     */
    public function getTypeModel(){
        return $this->typeModel;
    }

    /**
     * methode qui retourne le lien vers l'image correspondante au modele
     * @return String une adresse internet
     */
    public function getPictureLink(){
        return $this->pictureLink;
    }

    //-------------------SETTEURS--------------------------

     /**
     * methode qui modifie le nom du manufacturier
     * @param String un nom de manufacturier
     */
    public function setManufacturier($manufacturier){
        $this->manufacturier = $manufacturier;
    }

     /**
     * methode qui modifie le nom du modele
     * @param String un nom de modele
     */
    public function setModeleNom($modeleNom){
        $this->modeleNom = $modeleNom;
    }

     /**
     * methode qui modifie le statut is winter du modele
     * @param String "Y" si le modele est un modele winter sinon "N"
     */
    public function setWinter($winter){
        $this->isWinter = $winter;
    }

    /**
     * methode qui modifie le statut allweather du modele
     * @param String "Y" si le modele est un modele winter sinon "N"
     */
    public function setAllWeather($allWeather){
        $this->allWeather = $allWeather;
    }

    /**
     * methode qui modifie le statut rft du modele
     * @param String "RFT" si le modele est un modele RFT sinon ""
     */
    public function setRft($rft){
        $this->rft = $rft;
    } 

    /**
     * methode qui modifie l'attribut typeModel du modele
     * @param String une chaine de caractere representant le typeModel
     */
    public function SetTypeModel($typeModel){
        $this->typeModel = $typeModel;
    }

    /**
     * methode qui modifie l'attribut PictureLink du modele
     * @param String une chaine de caractere avec l'adresse web de l'image
     */
    public function SetPictureLink($wwwPicture){
        $this->pictureLink = $wwwPicture;
    } 
}