<?php
header('Access-Control-Allow-Origin: *');
$debug = 'false'; // all / simple / false


require('ini.php');
session_start();


// AFFICHAGE DES ERREURS PHP
require('controller/controller.php');

$domaine = str_replace('dev.', '', $_SERVER['HTTP_HOST']);
$domaine =  str_replace('.rlinepronos.fr', '', $domaine);
$domaine =  str_replace('rlinepronos.fr', 'vitrine', $domaine);
define('DOMAINE', $domaine);
define('RACINE', 'https://');


try
{

    if(isset($_GET['ajax'])):

        switch ($_GET['ajax'])
        {
            case 'create_account':
                createAccount();
            break;

            case 'codepromo':
                finalPrice();
            break;

            case 'addpronos':
                addPronos();
            break;

            case 'deletepronos':
                deletePronos();
            break;

            case 'deleteuser':
                deleteUser();
            break;

            case 'addteam':
                addteam();
            break;

        }
    else:



    /**
     * ACTION
     * 
     * 
     */

    $button_header = '<a class="btn btn-default btn-lg mr-3" href="/">Retours</a>'. $action;

    if(isset($_GET['action']))
    {
        switch ($_GET['action'])
        {
            case 'info':
                if ($_SESSION['grade'] == 2)
                {
                    infoView();
                }
                else
                {   
                    $action = '<a class="btn btn-warning btn-lg mr-3" data-toggle="modal" data-target="#login" $id="login">Connexion</a>';
                    throw new Exception("Vous n'avez pas la persmission de vous connectez avec ce compte sur cette page");
                }
            break;

            case 'logout':
                $_SESSION = array();
                session_destroy();
                header('Location: '.RACINE.'rlinepronos.fr/');
            break;

            case 'transaction':
                addVIP();
            break;

            case 'notransaction':
                throw new Exception("La transaction a échoué ! <br/> Merci de réessayer ou de contacter le support");
            break;

            case 'payement':
                payement();
            break;

            case 'register':
                register();
            break;

            case 'login':
                login();
            break;

            case 'suppr':
                throw new Exception("La suppresion à echoué car Florian à beacoup trop bossé pour qu'il accepte une demande pareille <br/><br/> Non mais ça va pas !!!??");
            break;

            case 'noscript':
                throw new Exception("Merci d'activé javascript ou de changer de navigateur. Sans cela le site ne peut fonctinner");
            break;


            default:
                throw new Exception("L'action demandé n'est pas valide");
            break;
        }
    
    }


    if(isset($_GET['redirection']))
    {
        switch ($_GET['redirection'])
        {
            case 'betclic':
                header("location: http://wlbetclicfr.adsrv.eacdn.com/C.ashx?btag=a_3432b_597c_&affid=2523&siteid=3432&adid=597&c=");
            break;

            case 'zebet':
                header("location: https://clk.tradedoubler.com/click?p=270712&a=3081772&g=23169224");
            break;

            default:
                throw new Exception("Nous ne sommes pas encore partenaire avec ".$_GET['redirection']);
            break;

        }
    }

    if(isset($_GET['error']))
    {
        switch ($_GET['error'])
        {
            case '404':
                throw new Exception("404 - Cette page n'existe pas");
            break;

            case '500':
            case '503':
            case '504':
                throw new Exception("Erreur sur le serveur, on s'en occupe au plus vite !");
            break;

            default:
                throw new Exception("Cette erreur n'existe pas mdr");
            break;

        }
    }





    /***
     * AFFICHAGE DOMAINE
     * 
     * 
     * 
     */


    $button_header = '<a class="btn btn-default btn-lg mr-3" href="'.RACINE.'rlinepronos.fr">Retours</a>'. $action;
    // AFFICAGE DOMAINE
    if(DOMAINE == 'vitrine') // Domaine free
    {
        vitrineView();
    }
    else
    {
        if(!empty($_SESSION)) // Domaine private
        {
            switch (DOMAINE)
            {
                case "admin":
                    if ($_SESSION['grade'] == 2)
                    {
                        adminView();
                    }
                    else
                    {
                    throw new Exception("Vous n'avez pas la persmission de vous connectez avec ce compte sur cette page");
                    }
                break;
    
                case "premium":
                    premiumView();
                break;

                default:
                    throw new Exception("Le domaine n'existe pas");
                break;
            }
        }
        else
        {
            login();
        }
    }

    endif;
}
catch(Exception $e)
{
    $errorMessage = $e->getMessage();



    require('view/errorView.php');


    require('view/template/siteweb.php');
    require('view/vitrine/construct/modal.php');
}





