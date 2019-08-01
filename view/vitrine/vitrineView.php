<?php

$title="RlinePronos - Conseil en paris en sportif"; 

$navbar = array('Derniers Paris' => '#paris', 'Tarifs' => '#tarifs', 'Partenaires' => '#partenaires', 'Methode' => '#methode'); // 'Temoignage' => '#temoignage,'

$footer = true;

ob_start();
require('view/vitrine/construct/modal.php');

require('view/vitrine/construct/header.php');

require('view/vitrine/construct/paris.php');

require('view/vitrine/construct/tarif.php');

require('view/vitrine/construct/partenaire.php');

require('view/vitrine/construct/methode.php');



if ($stat['user']['nb_opinions'] > 0)
require('view/vitrine/testimonial.php');


$content = ob_get_clean();

?>

