<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

class Admin extends User
{


}

class Subscriber extends User
{
    protected $_offers;
    protected $_purchase;
    protected $_renewal;
    

    const WEEK = 1;
    const MONTH = 2;
    const TRIMESTER = 3;
    const HALF_YEARS = 4;
    const YEARS = 5;


}

class Free extends User
{
    protected $_datelast;

}




class User
{
    // CURRENT
    protected $_id;

    protected $_firstname;
    protected $_lastname;
    protected $_pseudo;

    protected $_grade;

    protected $_email;
    protected $_password;

    protected $_date;
    protected $_active;
    protected $_string;


    const ADMIN = 2;
    const USER = 0;

    public function __construct(array $arrayUser)
    {
        $this->hydrate($arrayUser);
    }
 
    public function hydrate(array $arrayUser)
    {

        foreach ($arrayUser as $key => $value)
        {
            $method = 'set'.ucFirst($key);

            if(method_exists($this, $method))
            {
                // On appelle le setter si il existe
                $this->$method($value);
            }
        }
    }

    // GETTER
    public function id(){ return $this->_id; }
    public function firstname(){ return $this->_firstname; }
    public function lastname(){ return $this->_lastname; }
    public function pseudo(){ return $this->_pseudo; }
    public function grade(){ return $this->_grade; }
    public function email(){ return $this->_email; }
    public function date(){ return $this->_date; }


    // SETTER
    public function setId($id)
    {
        $id = (int) $id;
        $this->_id = $id;
    }

    public function setFirstname($firstname)
    {
        if (is_string($firstname))
        {
            $this->_firstname = $firstname;
        }
    }

    public function setLastname($lastname)
    {
        if (is_string($lastname))
        {
            $this->_lastname = $lastname;
        }
    }

    public function setPseudo($pseudo)
    {
        // if (notExist($pseudo))
        // {
            $this->_pseudo = $pseudo;
        // }
    }

    public function setEmail($email)
    {
        if (filter_var ($email, FILTER_VALIDATE_EMAIL))
        {
            $this->_email = $email;
        }
    }

    public function setPassword($password)
    {

            $this->_password = $password;
    }

    public function setGrade($grade)
    {
        if (in_array($grade, [self::ADMIN, self::USER]))
        {
            $this->_grade = $grade;
        }
    }
}




// CRUD (Create, Read, Update, Delete)
class UserManager
{
    private $_db;

    public function __construct($db)
    {
        $this->setDb($db);
    }

    public function addUser(User $user)
    {
        $q = $this->_db->prepare('INSERT INTO users(firstname, lastname, pseudo) VALUE(?, ?, ?)');

        $q->bindValue(1 , $user->firstname());
        $q->bindValue(2 , $user->lastname());
        $q->bindValue(3 , $user->pseudo());
    
        $q->execute();

        $user->hydrate([
            'id' => $this->_db->lastInsertId(),
            'grade' => User::USER,
            'date' => time(),
            'active' => 1,
            'string' => 'pasencoredestring',
        ]);
    }

    public function deleteUser(User $user)
    {
        $this->_db->exec('DELETE FROM users WHERE id = '.$user->id());
    }

    public function addSubscribe()
    {

    }

    public function get($id)
    {
        //retourne l'user choisi par id
    }

    public function getAll()
    {
        //Retourne liste de tous les utilisateurs
    }

    public function update(User $user)
    {
        //Modifie les infos d'un user
    }

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }
}




// On enregistre notre autoload.
function chargerClasse($classname)
{
  require $classname.'.php';
}

spl_autoload_register('chargerClasse');


$dbname = 'mysql:host=localhost;dbname=rlinepronos';
$user = 'root';
$password = 'n4Drm5jVJMpLV3g';

try
{
    $db = new PDO($dbname, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e)
{
    echo 'Échec lors de la connexion : ' . $e->getMessage();
}


// si on veut creer un nouvelle user
$user = new User([
    'firstname' => 'Florian',
    'lastname' => 'Brotte',
    'pseudo' => 'fbrotte',
    'email' => 'florian@laposte.net',
    'password' => '1234',
]);

$subscribe = new Subscriber([
    'firstname' => 'Florian',
    'lastname' => 'Brotte',
    'pseudo' => 'fbrotte',
    'email' => 'florian@laposte.net',
    'password' => '1234',
]);

// echo $subscribe->firstname().' '.$subscribe->email().' '.$subscribe->pseudo();

$manager = new UserManager($db);

$manager->addUser($user);

echo $user->id();