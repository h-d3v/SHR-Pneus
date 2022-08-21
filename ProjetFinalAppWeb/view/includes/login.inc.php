<div id="login-container">
    <div class="login-contain">
        <a href="#" onclick="document.getElementById('login-container').style.display = 'none'">X</a>
        <?php if(isset($_GET['erreur'])): ?>
            <h3 class="red">Erreur: courriel et/ou mot de passe invalides</h3>
        <?php endif; ?>
            <form action="index.php?action=monCompte" method="post">
                <div class="input-container">
                    <label for="login">Courriel</label><br>
                    <input class="log-input" type="text" name="courriel" placeholder="abcdefghij@monfai.ca"><br>
                    <label for="password">Mot de passe</label><br>
                    <input class="log-input" type="password" name="password"><br>                        
                </div>
                <input class="btn btn-login" type="submit" value="ME CONNECTER">
                <a id="pass-link" href="#">J'ai oublie mon mot de passe</a>
                <a href="index.php?action=nouveauCompte"><button class="btn" >NOUVEAU CLIENT</button></a> 
           </form>
    </div> 
</div>