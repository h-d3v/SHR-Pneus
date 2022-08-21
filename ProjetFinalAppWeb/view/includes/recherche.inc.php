<h2 class="titre-recherche">RECHERCHE PAR TAILLE</h2>
            <form action= "index.php?action=resultatRecherche" method="post">
                <table class="recherche-tab">
                    <tr>
                        <td><label for="largeur">LARGEUR</label></td>
                        <td><label for="largeur">RATIO</label></td>
                        <td><label for="largeur">DIAMETRE</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="largeur">
                                <!-- remplissage du select largeur avec les dimensions disponibles dans la BD -->
                                <?php foreach($controleur->getTabLargeur() as $uneLargeur): ?>
                                    <option value="<?= $uneLargeur['largeur'] ?>"><?= $uneLargeur['largeur'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="ratio">
                                <?php foreach($controleur->getTabRatio() as $unRatio): ?>
                                    <option value="<?= $unRatio['ratio'] ?>"><?= $unRatio['ratio'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <select name="diametre">
                                <?php foreach($controleur->getTabDiametre() as $unDiametre): ?>
                                    <option value="<?= $unDiametre['diametre'] ?>"><?= $unDiametre['diametre'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><label for="indiceCharge">Indice charge</label></td>
                        <td><label for="rft">RFT</label></td>
                        <td><label for="indiceVitesse">Indice vitesse</label></td>
                    </tr>
                    <tr>
                        <td>
                            <select name="indiceCharge">
                                <?php foreach($controleur->getTabIndiceCharge() as $unIndiceCharge): ?>
                                    <option value="<?= $unIndiceCharge['indiceCharge'] ?>"><?= $unIndiceCharge['indiceCharge'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td>
                            <input type="checkbox" name="rft" value="RFT">
                        </td>
                        <td>
                            <select name="indiceVitesse">
                                <?php foreach($controleur->getTabIndiceVitesse() as $unIndiceVitesse): ?>
                                    <option value="<?= $unIndiceVitesse['indiceVitesse'] ?>"><?= $unIndiceVitesse['indiceVitesse'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th colspan="3">SAISONS</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="radio" name="type" value="4s" checked> Ete / 4 saisons</br>
                            <img src="./view/pictures/icons/sunfull.svg" alt="icone soleil">
                        </td>
                        <td>
                            <input type="radio" name="type" value="w" checked> Winter</br>
                            <img src="./view/pictures/icons/ice.svg" alt="icone hivers">
                        </td>
                        <td>
                            <input type="radio" name="type" value="ws" checked> Toutes saisons</br>
                            <img src="./view/pictures/icons/rainfull.svg" alt="icone allweather">
                        </td>
                    </tr>
                </table>


                <input class="btn" type="submit" value="CHERCHER">
            </form>