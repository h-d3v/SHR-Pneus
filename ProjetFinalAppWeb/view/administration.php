<?php $title = "Administration"; ?>

<?php ob_start(); ?>

<div class="conteneurMenuAdmin">
    <div class="contenuMenuAdmin">
    <a href="index.php?action=newItem"><button class="btn">Ajouter Article</button></a>
    <hr>
    <form action="">
        <label for="idItem">Saisir code article </label>
        <input type="text" name="idItem" >
        <input type="submit" value="Chercher article" class="btn">

    </form>
    <hr>
    <?php var_dump($_SESSION); ?> 
    <a href=""><button class="btn">Commande preparation</button></a>
    </div>
</div>








<?php $content = ob_get_clean(); ?> 

<?php require 'template.php';

