<?php
$firstname = htmlspecialchars($_GET["firstname"]);
$lastname = htmlspecialchars($_GET["lastname"]);
$pseudo = htmlspecialchars($_GET["pseudo"]);
$email = htmlspecialchars($_GET["email"]);
$password = $_GET["password"];
$checkbox = $_GET["checkbox"];



$time = time();
$checkmail = filter_var($email, FILTER_VALIDATE_EMAIL);


if( empty($password) or empty($firstname) or empty($lastname) or empty($pseudo)) // User n'a pas tout marqué
{
    echo "errorEmpty";
}

elseif ($db->has("users",["email" => $email]))
{
    echo "errorAlreadyExistMail";
}

elseif($db->has("users",["users" => $pseudo]))
{
    echo "errorAlreadyExistPseudo";
}

elseif($checkmail == false)
{
    echo "errorInvalidMail";
}

elseif(strpos($email, '+') !== false)
{
    echo "errorInvalidMail";
}

else
{
    $data = $db->insert("users", ["firstname" => $firstname, "lastname" => $lastname, "pseudo" => $pseudo, "email" => $email, "date" => $time, "password" => $password, "active" => 1]);
    
    
    // $_SESSION['id'] = $data['id'];
    $_SESSION['firstname'] = $firstname;
    $_SESSION['lastname'] = $lastname;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['grade'] = 0;
    $_SESSION['email'] = $email;
    $_SESSION['password'] = $password;
    // echo $data->rowCount();
    // echo sendMail($email, 'Validation de votre compte', $mail_createaccount);
    echo "success";
}
