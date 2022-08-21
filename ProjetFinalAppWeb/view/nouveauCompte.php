<?php $title = "SHR Inscription"; ?>
<?php ob_start(); ?>
    <div class="main-top" id="main-top">
        <div class="left-contain">
            <div class="container">
                <form class="formulaireCompte" action="index.php?action=monCompte" method="post">
                    <h4 class="compteTitle">Saisissez VOS INFORMATIONS</h4>
                    <table>
                        <tr>
                            <th>Nom :</th>
                            <td><input type="text" name="nom"><br></td>
                        </tr>
                        <tr>
                            <th>Prénom :</th>
                            <td><input type="text" name="prenom"><br></td>
                        </tr>
                        <tr>
                            <th>Adresse :</th>
                            <td><input type="text" name="adresse"><br></td>
                        </tr>
                        <tr>
                            <th>Code postal :</th>
                            <td><input type="text" name="codePostal"><br></td>
                        </tr>
                        <tr>
                            <th>Ville :</th>
                            <td><input type="text" name="ville"><br></td>
                        </tr>
                        <tr>
                            <th>Telephone :</th>
                            <td><input type="text" name="telephone"><br></td>
                        </tr>
                        <tr>
                            <th>Courriel :</th>
                            <td><input type="text" name="courriel"><br></td>
                        </tr>
                        <tr>
                            <th>Nouveau mot passe :</th>
                            <td><input type="password" name="password"><br></td>
                        </tr>
                        <tr>
                            <th>Confirmer :</th>
                            <td><input type="password" name="PasswordConfirmation"><br></td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input class="btn" type="submit" value="S'enregistrer">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
        <div class="right-contain">
            <div class="container">
                <h4 class="compteTitle">MON PANIER</h4>
                
                <?php var_dump($_SESSION['panier']) ?>
            </div>
        
        </div>
    </div>

    
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';