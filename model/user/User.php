<?php
    class User{
        private $_user_id;
        private $_first_name;
        private $_last_name;
        private $_username;
        private $_password;


        //All getters for User class
        public function user_id(){ return $this->_user_id;}
        public function first_name(){ return $this->_first_name;} 
        public function last_name(){ return $this->_last_name;} 
        public function username(){ return $this->_username;} 
        public function password(){ return $this->_password;} 

        //All setters here
        public function setFirst_name($fName){ 
            if($fName == null)
                echo "No argument found for user first name";
                    else
                        $this->_first_name = $fName;              
        }

        public function setLast_name($lName){ 
            if($lName == null)
                echo "No argument found for user last name";
                    else
                        $this->_last_name = $lName;            
        }

        public function setUsername($username){
            $this->_username = $username;
        }

        function setPassword($password){
            $this->_password = $password;
        }

    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

     //CONSTRUCTOR
    public function __construct(array $data){
        $this->hydrate($data);
    }
}