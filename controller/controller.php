<?php
/**
 * modelAall
 * $stat, userValue(), nameTeam()
 * 
 * ModelPronos
 * infosPronos()
 * 
 * 
 */


/**
 * SITE WEB VITRINE
 */
function vitrineView()
{

    require('model/modelAll.php');
    require('model/modelPronos.php');

    if(empty($_SESSION)):
        echo '
        <a class="btn btn-default btn-lg mr-3" href="creer-mon-compte">
        J\'integre le VIP
        </a>
        <a class="btn btn-warning btn-lg mr-3" href="me-connecter">
        Mon espace VIP
        </a>';
    else:
        $direct = 'direct';

        echo '
        <a class="btn btn-default btn-lg mr-3" href="me-deconnecter">
        Se deconnecter
        </a>
        <a class="btn btn-warning btn-lg mr-3" href="'.RACINE.'premium.rlinepronos.fr">
        Mon espace VIP
        </a>';
    endif;

    
    unset($direct);

    $button_header = ob_get_clean();

    require('view/vitrine/vitrineView.php');
    require('view/template/siteweb.php');
}



/**
 * MODAL LOGIN
 */
function login()
{

    vitrineView();
    echo "<script>$('#login').modal('show');</script>";
    require('assets/js/login_script.php');

}




function register()
{
    vitrineView();
    echo "<script>$('#register').modal('show');</script>";
    require('assets/js/createAccount.php');
}


/**
 * ADMIN ET CONFIG
 */
function adminView()
{
    require('model/modelAll.php');
    require('model/modelPronos.php');
    require('model/modelAdmin.php');
    require('view/admin/indexAdmin.php');
    require('view/template/dashboard.php');
    require('assets/js/admin/equipeTable.php');
    require('assets/js/admin/pronosTable.php');
    require('assets/js/admin/userTable.php');
}



/**
 * ESPACE PREMIUM VIP
 */
function premiumView()
{
    require('model/modelAll.php');
    require('model/modelPronos.php');
    $access = userValue($_SESSION['id'])['order'];
    require('view/premium/indexPremium.php');
    require('view/template/siteweb.php');
    require('assets/js/codepromo.php');
}



/**
 * PAGE INFO ET LOG
 */
function infoView()
{
    require('model/modelAll.php');
    require('model/modelPronos.php');
    require('view/infoView.php');
    require('view/template/siteweb.php');
}



function valideTransaction()
{

    $iduser = $_SESSION['id'];
    $offre = $_GET['offre'];

    
    $data = $db->insert('subscribe', ['id_user' => $iduser, 'id_duration' => $offre, "purchase" => time()]);
        // retourne le nombre de lignes affectées par la dernière instruction SQL
    echo $data;
}


/**
 * Redirection prestataire payement
 * 
 * @param ?action=payement
 * @param ?code=
 * @param ?offers=
 * 
 * ou achat-offres-0-code-promotion-0
 * 
 */

function payement()
{
    require('vendor/transaction.php');
    require('view/redirectionView.php');
    require('view/template/siteweb.php');
}

function addVIP()
{
    require('model/modelAll.php');
    $id_user = $_GET['iduser'];
    $offers = $_GET['offers'];
    $duration = $stat['economy']['offers'][1]['duration'];
    var_dump($duration);
    $addVIP = $db->insert("subscribe", ["id_user" => $id_user, "purchase" => time(), "id_duration" => $duration]);

    if ($addVIP->rowCount() == 1)
    {             

        echo '
        <div class="alert alert-success" role="alert" id="alertBienvenu">
            <h4 class="alert-heading">Well done!</h4>
            <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
            <hr>
            <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
        </div>
        $(".alert").alert();';

        header('Location : /');
    }
    else
    {
        throw new Exception("Un problème rare avec la création de votre compte est survenu merci de prendre contacte avec le support : 07 67 54 11 50");
    }
}


function createAccount()
{
    require('model/modelAll.php');
    require('controller/create_account.php');
}



function finalPrice()
{
    require('model/modelAll.php');
    $promocode = $_GET['code'];
    $offers = $_GET['offers'];


    $price = $db->select("offers", "price",  ['id' => $offers])[0];
    
    if($db->has("promos", ['code' => $promocode])) 
    {
        // Le code promo existe
        $reduction = $db->select("promos", "reduction", ['code' => $promocode])[0];
        $finalPrice = $price * (1 - $reduction / 100); // Calcul avec reduction

        echo $finalPrice;
        return $finalPrice;

    }
    else
    {
        // il n'existe pas
        echo $price;
        return $price;

    }
}

function addPronos()
{
    require('model/modelAll.php');

    $last_id = $db->max("pronos", "id_pronos");

    $id = $last_id + 1;

    if(isset($_GET['confrontation']))
    {

        $dateOriginal = $_POST['date'].' '.$_POST['time'];

        echo $dateOriginal;

        $date = DateTime::createFromFormat('Y-m-d H:i', $dateOriginal);
        $timestamp = $date->format('U');

        $db->insert("confrontation", [
            "id_pronos" => $id,
            "team1" => $_POST['team1'],
            "team2" => $_POST['team2'],
            "cote" => $_POST['cote'],
            "date_match" => $timestamp
            ]);
            var_dump( $db->error() );
    }
    else
    {
        $db->insert("pronos", [
            "id_pronos" => $id,
            "content" => $_POST['content'],
            "reliability" => $_POST['reliability']. '%',
            "date" => time(),
            "type" => $_POST['type']
            ]);

            var_dump( $db->error() );
    }
}


function deletePronos()
{
    require('model/modelAll.php');

    $db->delete("pronos", [
        "id_pronos" => $_POST['id']
    ]);

    $db->delete("confrontation", [
        "id_pronos" => $_POST['id']
    ]);
    var_dump( $db->last() );
    var_dump( $db->error() );
}

function deleteUser()
{
    require('model/modelAll.php');

    $db->delete("users", [
        "id" => $_POST['id']
    ]);
}

function addTeam()
{
    require('model/modelAll.php');

    $db->insert("team", [
        "name" => $_POST['name'],
        ]);
}