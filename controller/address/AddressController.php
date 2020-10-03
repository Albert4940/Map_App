<?php
session_start();
  require_once("../../model/Connection/Connection.php");
  require_once("../../model/address/Address.php");
  require_once("../../model/address/AddressManager.php");

  $con = Connection::getConnection()->connect();
  global $con;
  
  //Function for check inputs
  function check(Address $ad){
     $response ;
    if(empty($ad->address()) OR empty($ad->city()) OR empty($ad->country()) OR empty($ad->zip_code())){
      $response = 'Veillez Remplir tous les champs !';
    }/*else if($ad->zip_code()==0){
      $response = 'Le code postal doit etre un nombre !';
    }*/else{
      $response = 1;
    }
    return $response;
  }  

  $type = $_POST['type'];

  if($type == 1){

   $ad = $_POST['address'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $zip = (int)$_POST['zip'];
   //test champ
  	$ad = new Address([
      'address' => $ad,
      'city' => $city,
      'country' => $country,
      'zip_code' => $zip
    ]);
  	
    $test = check($ad);
    if($test == 1){
   // echo ($ad->address().'=>'.$ad->city().'=>'.$ad->country().'=>'.$ad->zip_code());
    $manager = new AddressManager($con);
    $response = $manager->add($ad);

      if($response == 'success'){
        $_SESSION['success'] = 'Adresse Ajoutee avec succes';
        $_SESSION['error'] ='';
      }
    }else{
      $_SESSION['error'] = $test;
    }
    header('Location:../../view/html/dashboard.php');
    /*if($manager->exists($pro->product_name())){
      echo 'exists';
    }else{
      $response = $manager->add($pro);
      echo $response;
    }*/
  	
  }

//search
  if($type == 2){
  	
    $ad = $_POST['address'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $zip = (int)$_POST['zip'];
   //test champ
    $add = new Address([
      'address' => $ad,
      'city' => $city,
      'country' => $country,
      'zip_code' => $zip
    ]);
    
    $test = check($add);
    //echo $test;
    if($test == 1){
    //echo ('a='.$add->address().'=>c='.$add->city().'=>co='.$add->country().'=>z='.$add->zip_code());
    $manager = new AddressManager($con);
    $response = $manager->get($add);

   if(count($response) > 0){
    $ad = new Address($response[0]);
    $_SESSION['address'] = $ad;
    header('Location:../../view/html/map.php');
   }else{
   // echo "string";
    $_SESSION['error'] = 'ADRESSE INTROUVABLE DANS LA BASE DE DONNDEE';
    header('Location:../../view/html/rech.php');
   }
  }else{
    $_SESSION['error'] = $test;
     header('Location:../../view/html/rech.php');
  }
  }

?>