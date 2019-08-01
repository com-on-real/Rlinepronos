<?php

$title="Rline Pronos - Premium"; 

$navbar = array();
$bodyclass = 'profile-page sidebar-collapse filter-vip';
$footer = 'true';

ob_start();
?>

<div class="container">
    <div class="row">
    <!-- <h1 class="title zone-vip text-center">Espace VIP</h1> -->

        <div class="col-md-5 mr-auto ml-auto">
            <div class="card card-profile">
                <div class="card-avatar">
                    <a href="#pablo">
                        <img class="img img-raised" src="assets/img/profile/homme.png" />
                    </a>
                </div>

                <div class="card-body">
                    <h3 class="card-title"><?= $_SESSION['firstname'].' '.$_SESSION['lastname'];?></p></h3>
                    <h6 class="categorie text-primary">@<?= $_SESSION['pseudo'];?></h6>
                    <p class="card-description">
                        <div class="content">
                            <div class="alert alert-info">
                                <?= $access['message']; ?>
                            </div>

                            <div class="social-description">
                                <h2><?= $stat['pronos']['nb_pronos'] ?></h2>
                                <p>Paris disponible</p>
                            </div>

                            <div class="social-description">
                                <h2><?= $stat['pronos']['win_rate'] ?></h2>
                                <p>Taux de réussite</p>
                            </div>
                        </div>
                    </p>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="?action=logout">Se deconnecter</a>
                        <a class="btn btn-default" data-toggle="modal" data-target="#commentaire">Commentaire</a>
        <p>Un probleme technique? Contactez le <a href="tel:07.67.54.11.50">07.67.54.11.50</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Commentaire-->
<div class="modal fade" id="commentaire" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            
            <div class="modal-header">
            <h5 class="modal-title" id="ModalVIP">Laisser un commentaire</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            </div>
            
            <div class="modal-body">
            <form>
                <div class="form-group">
                    <textarea type="email" class="form-control" id="" aria-describedby="emailHelp" placeholder=""></textarea>
                </div>
                <button id="loginbutton" class="btn btn-primary">Envoyer</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php

if($access['title'] == 'admin')
{
    require('view/premium/construct/payement.php');
    require('view/premium/construct/pronos.php');
}

if($access['title'] == 'vip')
{
    require('view/premium/construct/pronos.php');
}

if($access['title'] == 'aucun')
{
    require('view/premium/construct/payement.php');
}



$content = ob_get_clean();


