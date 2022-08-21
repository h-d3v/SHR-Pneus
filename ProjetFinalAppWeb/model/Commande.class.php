<?php

include_once 'enum.class.php';

class Commande{
    private $id;
    private $courrielClient;
    private $listeItem;
    private $statut;
    private $prix;


    /**
     * Construit une commande a partir des attributs fournits
     * @param int $id l'ID de la commande dans la BD
     * @param String $courrielClient le courriel du client dans la bd
     * @param array $listeItem liste des items commandés.
     * @param StatutCommande $statut le statut de la commande
     * @param double $prix prix total de la commande
     */
    public function __construct($id, $courrielClient, $listeItem, $statut, $prix){
        $this->id=$id;
        $this->courrielClient=$courrielClient;
        $this->statut=$statut;
        $this->prix=$prix;
        $this->listeItem=$listeItem;
    }

    /**
     * @return int
     */
    public function getId(): int{
        return $this->id;
    }

    /**
     * @return String
     */
    public function getCourrielClient(): String{
        return $this->courrielClient;
    }

    /**
     * @return array
     */
    public function getListeItem(): array
    {
        return $this->listeItem;
    }

    /**
     * @return float
     */
    public function getPrix(): float{
        return $this->prix;
    }

    /**
     * @return StatutCommande
     */
    public function getStatut(): StatutCommande{
        return $this->statut;
    }

    /**
     * @param float $prix
     */
    /**
     * @param float $prix
     */
    public function setPrix(float $prix){
        $this->prix = $prix;
    }

    /**
     * @param StatutCommande $statut
     */
    public function setStatut(StatutCommande $statut): void{
        $this->statut = $statut;
    }

    /**
     * @param array $listeItem
     */
    public function setListeItem(array $listeItem): void{
        $this->listeItem = $listeItem;
    }


}