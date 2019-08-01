<?php
$title="Rline Pronos- Redirection"; 
$navbar = array();
$footer = false;
ob_start();
?>

<div class="section-image page-header" style="background-image: url('/assets/img/background/foot.jpg')"  id="haut">
    <div class="container mt-5">

        <div class="col-md-12">
            <h1 class="title">Redirection en cours </h1>
            <h4 class="description text-success">Vers la platforme de paiement</h4>
        </div>
    </div>
</div>



<?php $content = ob_get_clean();