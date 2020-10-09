<?php

//use jjjp\stock_management\model;

class AddressManager
{
    private $_db;

    public function __construct( PDO $db ) 
    {
        $this->_db = $db;
    }

    /**
     * method to add a product
     */
    public function add( Address $address )
    {
        $request = $this->_db->prepare('INSERT INTO addresses 
        (address, country, city,zip_code)
        VALUES(:address, :country, :city, :zip_code)');

        $request->bindValue(':address', $address->address());
        $request->bindValue( ':country', $address->country());
        $request->bindValue( ':city', $address->city());
        $request->bindValue( ':zip_code', $address->zip_code());
        
        $res = $request->execute();
        return 'success';
    }


    public function get(Address $address)
    {
        $q = $this->_db->prepare("SELECT * FROM addresses where address = :address AND city = :city AND country = :country AND zip_code = :zip_code");
            $q->execute(array(
                ':address' => $address->address(),
                ':city' => $address->city(),
                ':country' => $address->country(),
                'zip_code' => $address->zip_code()
            ));
            $list = [];

            while($data = $q->fetch(PDO::FETCH_ASSOC)){
                $list[] = $data;
            }
           return $list;
    }

    public function getList(){
        $q = $this->_db->query("SELECT * FROM addresses ORDER BY id DESC");            
           return $q;
    }

    public function delete($id){
        $q = $this->_db->prepare("DELETE FROM addresses WHERE id = :id");
        $q->execute(array(':id'=>$id));
        return "success";
    }
}