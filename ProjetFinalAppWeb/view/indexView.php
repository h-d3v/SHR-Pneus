<?php $title = "SHR accueil"; ?>
    <!-- creation d'une mega variable qui stocke le contenu de la page -->
<?php ob_start(); ?>
    <div class="main-top">
        <div class="left-contain">
            <div class="form_container">
                <?php include './view/includes/recherche.inc.php' ?>
            </div>
        </div>
        <div class="right-contain">

            <h3>contenu</h3>

        </div>
        <?php include './view/includes/banManufacturiers.inc.php' ?>
    </div>
    <div class="main-middle">
        <?php include_once './view/includes/pubs.inc.php' ?>
        
    </div>
    <?php include './view/includes/login.inc.php' ?>
<?php $content = ob_get_clean(); ?>

<?php require 'template.php';

