<?php
    //Classe de connection avec la bse de donnee
 class Connection{
    private static $_instance = null;
    private $_con  = null;
    private $_host;
    private $_user;
    private $_password;
    private $_dbname;
 
    private function __construct()
    {
        $this->_host     = 'localhost';
        $this->_user     = 'root';
        $this->_password = '';
        $this->_dbname   = 'map';
        //$this->_con   = null;
 
        try {
            $this->_con = new PDO("mysql:host=$this->_host;dbname=$this->_dbname", $this->_user, $this->_password);
            $this->_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connection reussie avec succes!!!";
        } catch (PDOException $e) {
            die('Connection failed or database cannot be selected : ' . $e->getMessage());
        }
    }
 
    public static function getConnection(){
        if (!isset(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    
    public function connect()
    {
        return $this->_con;
    }
}