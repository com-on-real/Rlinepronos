<?php

$title="Info - Admin"; 

$navbar = array();

$footer = 'false';


ob_start();

?>
<pre>
<?php






if(isset($_GET['pronos']))
{
    echo '<h3>INFO PRONOS :</h3>';
    $match = infoPronos($_GET['pronos']);
    print_r($match);
}


if(isset($_GET['stat']))
{
    echo '<h3>STAT :</h3>';
    print_r($stat);
}




echo '<h3>SESSION EN COURS :</h3>';
print_r($_SESSION);


?>
</pre>
<?php $content = ob_get_clean();?>