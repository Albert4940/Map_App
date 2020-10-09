<?php
require_once('User.php');

class UserManager{
    private $_db;


    //creat/add a user on the database
    public function addUser(User $user){
        try{
        $insert = $this->_db->prepare( 'INSERT into user (first_name,last_name,username,password)
        values(:first_name,:last_name,:username,:password)' );
        $insert->execute( array(
            'first_name'=>$user->first_name(),
            'last_name' =>$user->last_name(),
            'username'=>$user->username(),
            'password'=>$user->password() ) );
            return'success';
            } catch ( PDOException $e ) {
                return 'failed';
        }
    }

   //search for a user
    public function exist($username){
        try {
            //$data;
            $q = $this->_db->prepare("SELECT * FROM user where username = :user");
            $q->execute(array(
                ':user' => $username
                
            ));

            $data = $q->fetch(PDO::FETCH_ASSOC);
           return $data;
            
        } catch ( PDOException $e ) {
            die( 'No user user found for your entry ' . $e->getMessage() );
        }
    }

    //search for a user
    public function getUser($username, $password){
        try {
            //$data;
            $q = $this->_db->prepare("SELECT * FROM user where username = :user AND password = :pass ");
            $q->execute(array(
                ':user' => $username,
                ':pass' => $password
            ));

            $data = $q->fetch(PDO::FETCH_ASSOC);
           return $data;
            
        } catch ( PDOException $e ) {
            die( 'No user user found for your entry ' . $e->getMessage() );
        }
    }
   

    public function setDb(PDO $db)
    {
        $this->_db = $db;
    }

    public function __construct($db)
    {
        $this->setDb($db);
    }
}