<?php 

if (isset($_GET['promo']))
{
  $promocode = $_GET['promo'];
}


$data_payement = $infos_user_session['info_payement']['info'];
if(!empty($data_payement)){

}

?>
<div class="pricing-1" id="tarifs">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2 class="title">Tarif des abonnements</h2>
            </div>
         </div>
          <div class="row mt-5">


<?php foreach($stat['economy']['offers'] as $v): ?>

                        <div class="col-lg-2 col-md-4 col-12 mx-auto">
                            <h5 class="title text-center offres"></h5>
                            <div class="card card-pricing">
                                <div class="card-body">
                                    <h5 class="category "><?= $v['title'] ?></h5>
                                    <h3 class="card-title"><?= $v['price'] ?> €</h3>
                                    <ul>
                                    <li>Prono safe et fun chaque Week End</li>
                                    <li>Acces au forum VIP</li>
                                    </ul>

                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#formPayement" data-title="<?= $v['title']?>" data-id="<?= $v['id']?>" data-price="<?=$v['price']?>">Payer</button>
                                </div>
                            </div>
                        </div>
                        
  
<?php
endforeach;
require('view/premium/construct/form_info_payement.php');
?>




        </div>
    </div>
</div>

    