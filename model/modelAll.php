<?php
require 'vendor/medoo/autoload.php';
use Medoo\Medoo;

function dbConnect()
{
    $db = new Medoo([
        'database_type' => 'mysql',
        'database_name' => 'rlinepronos',
        'server' => 'localhost',
        'username' => 'root',
        'password' => 'n4Drm5jVJMpLV3g',
        'charset' => 'utf8',
    ]);
    return $db;
}
$db = dbConnect();



$stat = array(

    "pronos" => array(
        "perdu" => $perdu = $db->count("resultat", ["resultat" => 0]),
        "gagne" => $gagne = $db->count("resultat", ["resultat" => 1]),
        "win_rate" => round($gagne * 100 / ($gagne + $perdu), 0, PHP_ROUND_HALF_UP) .'%',
        "all_id_pronos" => $db->select("pronos", 'id_pronos'),

        "nb" => $db->count("pronos"),
        "nb_pronos" => "2",
    ),

    "user" => array(
        "nb" => $db->count("users"),
        "nb_vip" => "7",
        "nb_opinions" => $nb_opinions = $db->count("opinions", "id")

    ),

    "text" => array(
        "CGV" => 'href="https://docs.google.com/document/d/1fm8lKQv65JySAGvRa1kKBvwcGu0XJFhMTll_Z6pCFHw/edit?usp=sharing" target="_blank"'
    ),

    "economy" => array(
        "CA" => '87.94€',
        "revenue" => '0€',
        "offers" => $db->select("offers", "*")
    )
);

// $infos_user_session = userValue($_SESSION['id']);



/**
 * Information utilisateur
 *
 * @param int $id de l'utilisateur choisis
 *
 * @return array $user curent, secure, order
 * order = abonnement, message d'affichage, temps restant, renouvelement
 *
 */
function userValue($userid)
{
    $db = dbConnect();

    $i = $db->select('users', '*', ['id' =>  $userid])[0];
    $o = $db->select('subscribe', '*', ['id_user' =>  $userid]);


    $user = array(
        // Current info
        "current" => array(
            "id" => $userid,
            "firstname" => $i['firstname'],
            "lastname" => $i['lastname'],
            "grade" => $i['grade'], // 1: Super Admin // 2: Admin // 3: User // 4: A valider
            "pseudo" => $i['pseudo'],
            "inscription" => date('d-m-Y',$i['date'])
        ),
        // Secure
        "secure" => array(
            "email" => $i['email'],
            "password" => $i['password'],
            "active" => $i['active'],
            "string" => $i['string']
        ),
        // Order
        "info_payement" => array(
            "info" => $i['payement_info'],
        ),
    );

    $grade = $user['current']['grade'];

    if($grade == 2)
    {
        $subscribe = array("order" => array('title' => 'admin', 'message' => 'Tu es VIP à vie !'));
    }
    else
    {
        $info_purchase = $db->select("subscribe", ["purchase", "id_duration"], ["id_user" => $userid, "ORDER" => ["purchase" => "DESC"]])[0];
        $id_duration = $info_purchase["id_duration"];

        $purchase_duration = $db->select("offers", "duration", ["id" => $id_duration])[0];

        $purchase = $info_purchase["purchase"];

        $renouvelement = $db->count("subscribe", ["id_user" => $userid]);

        // On addition le nb de jours
        $end_subscription = $purchase + ($purchase_duration * 24 * 60 * 60);


        $restant = $end_subscription - time();
        // CAS n°2 : Abonnement en cours
        if ($restant > 0)
        {

            $restant = round($restant / 60 /60 / 24, 0, PHP_ROUND_HALF_DOWN);
            if($restant < 2)
            {
                $j = " jour";
            }
            else
            {
                $j = " jours";
            }

            $subscribe = array("order" => array('title' => 'vip' , 'restant' => $restant, 'message' => 'Il te reste '. $restant . $j, 'renouvelement' => $renouvelement));
        }
        else // CAS n°3 : Auncun
        {
            $subscribe = array("order" => array('title' => 'aucun', 'restant' => 'Aucun', 'message' => "Pas d'abonnement en cours", 'renouvelement' => $renouvelement));
        }
    }
    return array_merge($user, $subscribe);
}





// /**
//  * Compteur de paris
//  *
//  * @param int $id_pronos
//  * @param int $type pronos ou paris
//  *
//  * @return int nombre de pronos de ce type
//  */
// function statParis($id_pronos, $type)
// {
//     foreach ($id_pronos as $pronos) {

//         $result = infoPronos($pronos);

//         if ($result['status'] == $type){
//             $nb++;
//         }
//     }
//     return $nb;
// }



// pour id team retun le nom corespondant
function nameTeam($teamID)
{
    $db = dbConnect();
    return $team = $db->select("team",["id", "name", "nationality"], ["id" => $teamID])[0];
}
