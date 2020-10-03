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

    //List all user on the database 
    public function allUser() {
        try {
            $select = "SELECT * from user ;";
            $result = $this->_db->query( $select );
            //$listeUsers = $result->fetchAll();
            return $result;
        } catch ( PDOException $e ) {
            die( 'Error on method allUser: no data found ' . $e->getMessage() );
        }
    }

    //Modify the table
    public function updateUser(User $user){
        try {
            $update = $this->_db->prepare( 'UPDATE user set first_name=:first_name, last_name=:last_name, phone_number=:phone_number, email=:email where user_id=:user_id');
            $update->execute( array(
                'user_id' =>$user->getUserId(),
                'first_name'=>$user->getFisrtName(),
                'last_name'=>$user->getlastName(),
                'phone_number'=>$user->getphoneNumber(),
                'email'=>$user->getEmail() ) );
                echo "Update successfuly!!!";
        } catch ( PDOException $e ) {
            die( 'Error...update failed : ' . $e->getMessage() );
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
    //Remove a user 
    public function deleteUser($req) {
        try {
            $del = $this->_db->prepare( 'DELETE from user where user_id=:user_id or email= :email');
            $del->execute( array(
                'user_id' =>$req,
                'email'=>$req ) );
                echo "Deletion done successfuly!!!";
        } catch ( PDOException $e ) {
            die( 'No user user found for your entry... : ' . $e->getMessage() );
        }
    }

    
    public function lastId(){
        try {
            $selOne="SELECT user_id from user order by user_id desc limit 0,1;";
            $result = $this->_db->query( $selOne );
            //$listeUsers = $result->fetch();
                return $result;
        } catch ( PDOException $e ) {
            die( 'No result found on table user' . $e->getMessage() );
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