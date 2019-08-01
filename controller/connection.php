<?php
session_start();
header('Access-Control-Allow-Origin: *');
require '../vendor/medoo/autoload.php';
use Medoo\Medoo;

$db = new Medoo([
    'database_type' => 'mysql',
    'database_name' => 'rlinepronos',
    'server' => 'localhost',
    'username' => 'root',
    'password' => 'n4Drm5jVJMpLV3g'
]);

$id = $_GET['email'];
$password = $_GET['mdp'];


$datas = $db->select("users", ["id","firstname","lastname","pseudo","date","grade","email","active"], ["email" => $id, "password" => $password]);

if (empty($datas))
{
    echo "error";
}
else
{
    foreach($datas as $data)
    {
        if($data['active'] == 1)
        {
        $_SESSION['id'] = $data['id'];
        $_SESSION['firstname'] = $data['firstname'];
        $_SESSION['lastname'] = $data['lastname'];
        $_SESSION['pseudo'] = $data['pseudo'];
        $_SESSION['date'] = $data['date'];
        $_SESSION['grade'] = $data['grade'];
        $_SESSION['email'] = $data['email'];
        echo 'Success';    
        }
        else
        {
            echo "inactive";
        }
    }

}