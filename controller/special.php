<?php

// TRAITEMENT DES DONNEES


// Envoie de mail
function sendMail($to, $subject, $body)
{
    $arr = array($to);
    $arr = array('from' => 'RLinePronos <no-reply@rlinepronos.fr>', 'to' => $arr, 'subject' => $subject, 'plain_body' => $body);
    $json = json_encode($arr);
    $curl = curl_init();
    curl_setopt_array($curl, array(
    CURLOPT_URL => "https://mail-out.comon-real.fr/api/v1/send/message",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => $json,
    CURLOPT_HTTPHEADER => array(
        "content-type: application/json",
        "x-server-api-key: XpG1t2JDrgbaQzX400PH7eWx"
    ),
    ));
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        $response = $err;
    } else {
        $response = "";
    }
    return $response;
}

function cryptPassword($password)
{
    $long = "jesuisunoutildesalagedemaladetrucdefouelephantrosedrogueblablaglacomonrealctropcoolmesamis";
    $password = $long.$password;
    $password = hash('sha512', $password);
    return $password;
}

function getRandomString($length = 30)
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $string = '';

    for ($i = 0; $i < $length; $i++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)];
    }

    return $string;
}


// /* SET VARIABLE */
// $string = getRandomString();
// $mail_forgot = "Bonjour,\r\nVous avez demandé à reinitialiser votre mot de passe sur le site RLinePronos.\r\n Voici un lien pour le changer: https://rlinepronos.fr/forgot.php?id=".$string."\r\n Cordialement,\r\n RlinePronos.";
// $mail_createaccount = "Bonjour ".$firstname.",\r\n\r\n Pour activer votre compte, merci de suivre le lien suivant: https://premium.rlinepronos.fr/activate.php?s=".$string."\r\n\r\nMerci,\rRLinePronos. ";










