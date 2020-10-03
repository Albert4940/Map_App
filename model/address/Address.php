<?php

/**
 * class represent the addresses
 */
class Address 
{
  private $_id;
  private $_address;
  private $_city;
  private $_country;
  private $_zip_code;

  public function __construct( array $data )
  {
      $this->hydrate( $data );
  }

  private function hydrate($data)
  {
    foreach ($data as $key => $value)
    {
      $method = 'set'.ucfirst($key);
 
      if (is_callable([$this, $method]))
      {
        $this->$method($value);
      }
    }
  }

 public function address(){return $this->_address;}
 public function city(){return $this->_city;}
 public function country(){return $this->_country;}
 public function zip_code(){return $this->_zip_code;}

 public function setAddress($ad){
  $this->_address = $ad;
 }
 public function setCity($city){
  $this->_city = $city;
 } 
 public function setCountry($coun){
  $this->_country = $coun;
 }
 public function setZip_code($code){
  $this->_zip_code = $code;
 }
  
}