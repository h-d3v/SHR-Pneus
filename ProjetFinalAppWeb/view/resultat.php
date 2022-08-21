<?php $title = "SHR Resultat"; ?>
<?php ob_start(); ?>
    <?php if (count($controleur->getTabResultatRecherche()) == 0 ): ?>
    <h4 class="result-count red">Aucun résultat trouvé selon les caractéristiques saisies</h4>
    <div class="form-container-recherche">
        <?php include './view/includes/recherche.inc.php' ?>
    </div>
    <?php else: ?>
        <h4 class="result-count"><?= count($controleur->getTabResultatRecherche()) ?> résultats trouvés selon les caractéristiques saisies</h4>
        <?php foreach($controleur->getTabResultatRecherche() as $article): ?>
            <div class="article-container">
                <div class="image-container">
                    <img src="<?= $article->getPictureLink() ?>">
                    <?php if ($article->getRemise() > 0): ?>
                        <div class="remise">-<?=$article->getRemise()?>%</div>
                    <?php endif; ?>
                </div>
                
                <div class="article-info">
                    <h3 class="color-info"><?= $article->getManufacturier() ?>  -  <span><?= $article->getModeleNom() ?></span></h3>
                    <table>
                        <tr>
                            <th>Dimensions : </th>
                            <td class="color-info"><?= $article->getSize() ?></td>
                            <th>Indice Charge : </th>
                            <td class="color-info"><?= $article->getIndiceCharge() ?></td>
                            <th>Code vitesse : </th>
                            <td class="color-info"><?= $article->getIndiceVitesse() ?></td>
                        </tr>
                        <tr>
                            <th>RFT : </th>
                            <td class="color-info"><?= $article->getRft() ?></td>
                            <th>SAISON : </th>
                            <td class="color-info"><?= $article->saison() ?></td>
                            
                        </tr>
                        <tr>
                            <th colspan="3" class="color-info center">PNEUS HOMOLOGUES POUR l'HIVERS + logo</th>
                        </tr>
                    </table>
                </div>
                <div class="article-stock">
                    <?php if ($article->getStock() == 0): ?>
                        <P class="red">EN RUPTURE </p>
                        <P class="nbStock red"><?= $article->getStock() ?></P>
                    <?php elseif ($article->getStock() < 8): ?>
                        <P id="stock" class="orange">DERNIERES PIÈCES</p>
                        <P class="nbStock orange"><?= $article->getStock() ?></P>
                    <?php else: ?>
                        <P class="vert">EN<br>STOCK</p>
                        <P class="nbStock vert"><?= $article->getStock() ?></P>
                    <?php endif; ?>
                    <br>    
                </div>
                <form action="index.php?action=panier" method="post" class="order-part">
                    
                    <input type="hidden" name="idItem" value="<?= $article->getIdItem() ?>" >    
                    <?php if ($article->getStock() > 0): ?>
                        <?php if ($article->getRemise() > 0): ?>
                            <h3><span class="old-price"><?=$article->getPrixDeBase()?> $ </span> / <?= $article->getPrixDeVente() ?> $</h3>
                        <?php else: ?>
                            <h3><?= $article->getPrixDeBase() ?> $</h3>
                        <?php endif; ?>    
                        <select name="quantiteCommande" id="quantiteCommande">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                        <input class="btn btn-commande" type="submit" value="Ajouter au panier">
                    <?php endif; ?>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <?php include './view/includes/login.inc.php' ?>

<?php $content = ob_get_clean(); ?>

<?php require 'template.php';