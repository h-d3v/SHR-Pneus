<?php
//Class d'enums pour le type d'acteur
//L'acteur est soit un client ou l'admin du site web

use Spatie\Enum\Enum;

require_once '../vendor/autoload.php';

class TypeActeur extends Enum {
    const __default = self::Null;
    const Null='null';
    const Client='client';
    const Admin='administrateur';
}


class StatutCommande extends Enum{
    const Nouvelle='Nouvelle';
    const EnCours='EnCours';
    const Annule='Annulée';
    const Complete='Complete';
}

?>