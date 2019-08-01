<?php
// session_start();
// header('Access-Control-Allow-Origin: *');
// require '../vendor/medoo/autoload.php';
// use Medoo\Medoo;

// $db = new Medoo([
//     'database_type' => 'mysql',
//     'database_name' => 'rlinepronos',
//     'server' => 'localhost',
//     'username' => 'root',
//     'password' => 'n4Drm5jVJMpLV3g',
//     'charset' => 'utf8'
// ]);



// $firstname = htmlspecialchars($_GET["firstname"]);
// $lastname = htmlspecialchars($_GET["lastname"]);
// $pseudo = htmlspecialchars($_GET["pseudo"]);
// $email = htmlspecialchars($_GET["email"]);
// $password = $_GET["password"];




// $time = date_timestamp_get(date_create());
// $exist = $db->has("users",["email" => $email]);
// $checkmail = filter_var($email, FILTER_VALIDATE_EMAIL);


// if( empty($password) && empty($firstname) && empty($lastname) && empty($pseudo)) // User n'a pas tout marqué
// {
//     echo "ErrorEmpty";
// }

// elseif ($database->has("users",["email" => $email]))
// {
//     echo "ErrorAlreadyExist";
// }

// elseif($checkmail == false)
// {
//     echo "ErrorInvalidMail";
// }

// elseif(strpos($email, '+') !== false)
// {
//     echo "ErrorInvalidMail";
// }

// else{
//     $db->insert("users", ["firstname" => $firstname, "lastname" => $lastname, "pseudo" => $pseudo, "email" => $email,"date" => $time, "password" => $password, "active" => 0, "string" => $string]);

//     $id_user = $db->select("users", "id", ["email" => $email])[0];

//     // echo sendMail($email, 'Validation de votre compte', $mail_createaccount);
//     echo "ok";
// }
