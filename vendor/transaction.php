<?php 

$nom = $_SESSION['lastname'];
$prenom = $_SESSION['firstname'];
$email = $_SESSION['email'];


$adresse = $_POST['Adresse'];
$cp= $_POST['Code_Postal'];
$ville = $_POST['Ville'];
$pays = $_POST['Pays'];
$telephone = $_POST['Téléphone'];

$offers = $_GET['offers'];

$price = finalPrice();

?>
<form method="POST" action="https://www.klikandpay.com/paiement/order1.pl" accept-charset="UTF8" id="knp-form" target="_top">
    <input type="text" name="NOM" value="<?= $nom ?>" hidden>
    <input type="text" name="PRENOM" value="<?= $prenom ?>" hidden>
    <input type="text" name="ADRESSE" value="<?= $adresse ?>" hidden>
    <input type="text" name="CODEPOSTAL" value="<?= $cp ?>" hidden>
    <input type="text" name="VILLE" value="<?= $ville ?>" hidden>
    <input type="text" name="PAYS" value="<?= $pays ?>" hidden>
    <input type="text" name="TEL" value="<?= $telephone ?>" hidden>
    <input type="text" name="EMAIL" value="<?= $email ?>" hidden>
    <input type="text" name="MONTANT" value="<?= $price ?>" hidden>
    <input type="text" name="ID" value="1551110397" hidden>
    <input type="text" name="RETOURVOK" value="?iduser=<?= $_SESSION['id'] ?>&offre=<?= $offers ?>" hidden>
    <input type="submit" value="Envoyer" name="B1" id="B1" hidden>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
    <script>
    $(function()
    {
    var obj = "$('#B1').click()";
    setTimeout(obj,2000); 
    });
    </script>

