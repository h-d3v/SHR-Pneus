<?php $title = "SHR Mon compte"; ?>
<?php ob_start(); ?>
    <div class="main-top" id="main-top">
        <div class="left-contain">
            <div class="container">
                <form class="formulaireCompte" action="index.php?action=monCompte" method="post">
                    <h4 class="compteTitle">VERIFIER VOS INFORMATIONS</h4>
                    <table>
                        <tr>
                            <th>Nom :</th>
                            <td><input type="text" name="nom" value="<?= $controleur->getObjetActeur()->getNom() ?>" ><br></td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td><input type="text" name="prenom" value="<?= $controleur->getObjetActeur()->getPrenom() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td><input type="text" name="adresse" value="<?= $controleur->getObjetActeur()->getAdresse() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Code postal :</th>
                            <td><input type="text" name="codePostal" value="<?= $controleur->getObjetActeur()->getCp() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Ville :</th>
                            <td><input type="text" name="ville" value="<?= $controleur->getObjetActeur()->getVille() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Telephone :</th>
                            <td><input type="text" name="telephone" value="<?= $controleur->getObjetActeur()->getNumTel() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Courriel :</th>
                            <td><input type="text" name="courriel" value="<?= $controleur->getObjetActeur()->getCourriel() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Nouveau mot passe :</th>
                            <td><input type="password" name="newPassword" value="<?= $controleur->getObjetActeur()->getNumTel() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Confirmer :</th>
                            <td><input type="password" name="newPasswordConfirmation" value="<?= $controleur->getObjetActeur()->getNumTel() ?>"><br></td>
                        </tr>
                        <tr>
                            <th>Ancien mot de passe :</th>
                            <td><input type="password" name="oldPassword" value="<?= $controleur->getObjetActeur()->getNumTel() ?>"><br></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn" type="submit" value="Enregistrer Modification">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="right-contain">
            <div class="container">
                <h4 class="compteTitle">COMMANDES EN COURS</h4>
                <?php if ($controleur->commandeEnCours() == null): ?>
                    <h3>Aucune commande en cours</h3>
                <?php endif; ?>
                <?php var_dump($_POST) ?>
                <!-- <?php var_dump($controleur->getObjetActeur()) ?> -->
                <?php var_dump($_SESSION) ?>
            </div>
        
        </div>
    </div>

    
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';