<?php 

session_start();
require('controller/controller.php');

$nom = $_SESSION['lastname'];
$prenom = $_SESSION['firstname'];
$adresse = $_POST['Adresse'];
$cp = $_POST['Code_Postal'];
$ville = $_POST['Ville'];
$pays = $_POST['Pays'];
$telephone = $_POST['Téléphone'];
$email = $_SESSION['email'];
$offre = $_POST['offre'];
$prix = $db->select("offers", "price", ["id" => $offre])[0];
$promo = $_POST['promo'];
$active = $db->select("promos", "offre", ["code" => $promo])[0];
$promo = $db->select("promos", "reduction",  ["code" => $promo])[0];
$prix = str_replace ( ',', '.', $prix);


$active = json_decode($active, true)[$offre];
if($active == true){
    $price = $promo/100;
    $price = 1-$price;
    $price = $prix*$price;

}else{
    $price = $prix;

}


echo '<form method="POST" action="https://www.klikandpay.com/paiement/order1.pl" accept-charset="UTF8" id="knp-form" target="_top">
<input type="text" name="NOM" value="'.$nom.'" hidden>
<input type="text" name="PRENOM" value="'.$prenom.'" hidden>
<input type="text" name="ADRESSE" value="'.$adresse.'" hidden>
<input type="text" name="CODEPOSTAL" value="'.$cp.'" hidden>
<input type="text" name="VILLE" value="'.$ville.'" hidden>
<input type="text" name="PAYS" value="'.$pays.'" hidden>
<input type="text" name="TEL" value="'.$telephone.'" hidden>
<input type="text" name="EMAIL" value="'.$email.'" hidden>
<input type="text" name="MONTANT" value="'.$price.'" hidden>
<input type="text" name="ID" value="1551110397" hidden>
<input type="text" name="RETOURVOK" value="?iduser='.$_SESSION['id'].'&offre='.$offre.'" hidden>
<input type="submit" value="Envoyer" name="B1" id="B1" hidden>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
window.onload = function() {
document.getElementById(\'B1\').click();
}
</script>';

?>
