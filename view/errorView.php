<?php
$title="Rline Pronos- Erreur"; 
$navbar = array();
$footer = true;
ob_start();
?>
<div class="section-image page-header" style="background-image: url('/assets/img/background/foot.jpg')"  id="haut">
    <div class="container mt-5">

        <div class="col-md-12">
            <h1 class="title">Erreur </h1>
            <h4 class="description text-danger"><?= $errorMessage ?></h4>
            <?= $button_header?> 
        </div>
    </div>
</div>

<?php $content = ob_get_clean();




