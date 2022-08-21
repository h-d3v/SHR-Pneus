<div class="header">
    <img class="logo"src="./view/pictures/logoSHR.png" alt="Logo Entreprise S.H.R.">
    <div class="top_header">
        <h2>Prochainement Livraison chez l'un de nos installateurs agrees</h2>
        <img class="iconPlaceHolder" src="./view/pictures/icons/icon-placeholder-on-map.png" alt="">
        <div class="compteLink">
            <?php if(isset($_SESSION['connecte'])):?>
                <h4><a href="index.php?action=deconnexion">Se Deconnecter</a></h4>
            <?php else: ?>
<<<<<<< HEAD
            <h4><a href="#" onclick="loadLogin()">Se connecter</a></h4>
            <?php endif; ?>
            <?php if (isset($_SESSION['panier'])): ?> 
            <a href="index.php?action=panier"><img class="iconCart"
            src=".\view\pictures\icons\iconfinder_shopping-cart-full.png" alt="icone panier plein">
            <?php else: ?>
                <a href="index.php?action=panier"><img class="iconCart" src=".\view\pictures\icons\iconfinder_shopping-cart.png" alt="icone panier vide">
            <?php endif; ?>
=======
                <h4><a href="#" onclick="document.getElementById('login-container').style.display = 'flex'">Se connecter</a></h4>
            <?php endif; ?>
            <a id="panier-quantite" href="index.php?action=panier"><img class="iconCart" src=".\view\pictures\icons\iconfinder_shopping-cart.png" alt="">
                <?php if (isset($_GET['quantiteCommande'])): ?>
                    <?=$_GET['quantiteCommande']?>
                <?php endif; ?>
>>>>>>> fba953adfea0b646a57e969802a5707e2f299b9e
            </a>
        </div>
    </div>
    <div class="bottom_header">
        <ul class="nav_top">
            <li class="nav_link nav_link_active" ><a href="index.php">Accueil</a></li>
<<<<<<< HEAD
            <?php if(isset($_SESSION['connecte'])): ?>
                <li class="nav_link"  ><a href="index.php?action=monCompte">Mon compte</a></li>
            <?php endif; ?>
            <li class="nav_link" onmouseover="menuManufacturierAppear()" onmouseout="menuManufacturierDisappear()"><a href="#">Manufacturiers</a>    
=======
            <li class="nav_link"  ><a href="index.php?action=resultatRecherche">Pneus</a></li>
            <li class="nav_link" onmouseover="menuManufacturierAppear()" onmouseout="menuManufacturierDisappear()"><a href="#">Manufacturiers</a>
>>>>>>> fba953adfea0b646a57e969802a5707e2f299b9e
                <ul id="menu-manufacturier" class="menu-manufacturier-hidden" >
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=BFGoodrich">BFGoodrich</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Bridgestone">Bridgestone</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Continental">Continental</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Dunlop">Dunlop</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Goodyear">Goodyear</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Maxxis">Maxxis</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Michelin">Michelin</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Pirelli">Pirelli</a></li>
                    <li><a href="index.php?action=resultatRecherche&&manufacturier=Yokohama">Yokohama</a></li>
                </ul>
            </li>
            <li class="nav_link" ><a href="index.php?action=resultatRecherche&&speciaux=''" onclick="setActiveLink()">Speciaux</a></li>
            <li class="nav_link" ><a href="#">Informations</a></li>
        </ul>
    </div>
</div>
