<?php $title = "SHR Panier"; ?>

<?php ob_start(); ?>
    
    <?php if (!isset($_SESSION['panier']) || count($_SESSION['panier']) == 0): ?>
        <div class="panier-vide">
            <h3>PANIER VIDE</h3>
            <a href="index.php"><button class="btn backgroundRed">Retour à l'accueil</button></a>
        </div>
    <?php else: ?>
        <div class="conteneurPanier">
            <h1> Mon panier </h1>
         <table>
           <tr>
           <?php foreach($controleur->getTabItem() as $tabItem) :?>
             <td class="colonne1" rowspan = "4" >
               <img src="<?= $tabItem[0]->getPictureLink()?>" />
             </td>
             <td class="colonne2">
               <h3><?= $tabItem[0]->getManufacturier()?></h3>
             </td>
             <td class="colonne3"> Prix : </td>
             <td class="colonne4"> <?= $tabItem[0]->getPrixDeVente()?> $ </td>
           </tr>
           <tr>
             <td> <?= $tabItem[0]->getModeleNom()?> - <?= $tabItem[0]->getSize()?> </td>
             <td class="colonne3"> Quantite : </td>
             <td> <?= $tabItem[1]?>  </td>
           </tr>
           <tr>
             <td rowspan="2">
               <p> CATEGORIE : <?= strtoupper($tabItem[0]->saison())?> </p>
               <p> INDICE DE CHARGE : <?= $tabItem[0]->getIndiceCharge()?>   INDICE DE VITESSE : <?= $tabItem[0]->getIndiceVitesse()?> </p>
             </td>
             <td class="colonne3"> Total : </td>
             <td> <?= $tabItem[0]->getPrixDeVente() * $tabItem[1] ?> $ </td>
           </tr>
           <tr>
             <td colspan="2">
               <a href="index.php?action=panier&retirer=<?= $tabItem[0]->getIdItem() ?>"><button type="button" name="Retirer" class="btn backgroundRed" > Retirer </button></a>
             </td>
           </tr>
           <?php endforeach; ?>
         </table>
         <table>
           <tr>
             <td rowspan="4" class="colonne1-recap"></td>
             <td class="colonne3">Livraison</td>
             <td class="colonne4">OFFERTE</td>
           </tr>
           <tr>
             <td class="colonne3">Taxes</td>
             <td><?= $controleur->getTotalPanier() * 15/100 ?> $</td>
           </tr>
           <tr>
             <td class="colonne3">Total a payer</td>
             <td class="totalPanier"><?= $controleur->getTotalPanier() * 1.15 ?> $</td>
           </tr>
           <tr>
             <td colspan="2"><button type="button" name="Retirer" class="btn"> Paiement </button></td>
           </tr>
         </table>
        </div>
      <?php endif; ?>
    <?php include './view/includes/login.inc.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php'; ?>
