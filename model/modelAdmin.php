<?php


/**
 * Genration du tableau des users
 */
$id = $db->select('users', 'id', ['ORDER' => ['date' => 'DESC']]);
ob_start();
// $navbar = array('Methode' => '#methode');
foreach ($id as $v):
    $v = userValue($v); 
    if($v['current']['grade'] != 2):
?>
        <tr class="text-center" data-id="<?= $v['current']['id'] ?>">
            <td>
                <a class="add" title="Ajouter abonnement" data-toggle="tooltip"><i class="text-info nc-icon nc-simple-add"></i></a>
                <a class="deleteUser" title="Supprimer" data-toggle="tooltip"><i class="text-warning nc-icon nc-simple-remove"></i></a>
            </td>
            <td><?= $v['current']['firstname'].' '.$v['current']['lastname'] ?></td>
            <td><?= $v['current']['pseudo'] ?></td>
            <td><a href="mailto:<?= $v['secure']['email'] ?>"><?= $v['secure']['email'] ?></a></td>
            <td><?= $v['current']['inscription'] ?></td>
            <td><?= $v['order']['restant']?>  jours</td>
            <td><?= $v['order']['renouvelement'] ?></td>
        </tr>
<?php 
    endif;
endforeach;
$array_list_user = ob_get_clean();



/**
 * Genration du tableau des equipe
 */

$id_team = $db->select('team', 'id');

ob_start();
// $navbar = array('Methode' => '#methode');
foreach ($id_team as $v):
    $v = nameTeam($v); 
    // if($v['current']['grade'] != 2):
?>
        <tr>
            <td><?= $v['name']?></td>
        </tr>
<?php 
    // endif;
endforeach;
$array_list_team = ob_get_clean();

/**
 * Genration du tableau des paris
 */

$id = $db->select('pronos', 'id_pronos', ["ORDER" => ["id_pronos" => "DESC"]]);
ob_start();
// $navbar = array('Methode' => '#methode');
foreach ($id as $v):
    $v = infoPronos($v); 
    // if($v['current']['grade'] != 2):
?>
        <tr data-id="<?= $v['infos']['id'] ?>">
            <td>
                <a class="deletePronos" title="Supprimer" data-toggle="tooltip"><i class=" text-warning nc-icon nc-simple-remove"></i></a>
            </td>
            <td><?= $v['info']['resultat']['phrase'] ?></td>
            <td><?= $v['info']['content'] ?></td>
            <td><?= $v['info']['cote_total'] ?></td>
            <td><?= $v['info']['reliability'] ?></td>
            <td><?= $v['info']['date'] ?></td>
            <td><?= $v['equipe']['team1'] ?></td>
        </tr>
<?php 
    // endif;
endforeach;
$array_list_pronos = ob_get_clean();
