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

  $type = 0;
 if(isset($_POST['type'])){
   $type = $_POST['type'];
 }

  if($type == 1){

   $ad = $_POST['address'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $zip = $_POST['zip'];
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

    //Test if an address exit already
    $res = $manager->get($ad);
    if(count($res) > 0){
        $_SESSION['error'] = 'SANWONT LI FOUT LA DEJA';
    }else{
          $response = $manager->add($ad);

          if($response == 'success'){
            $_SESSION['success'] = 'Adresse Ajoutee avec succes';
            $_SESSION['error'] ='';
          }
        }
    }else{
          $_SESSION['error'] = $test;
        }
    header('Location:../../view/html/ajouter.php');
      	
  }

//search
  if($type == 2){
  	
    $ad = $_POST['address'];
   $city = $_POST['city'];
   $country = $_POST['country'];
   $zip = $_POST['zip'];
   //test champ
    $add = new Address([
      'address' => $ad,
      'city' => $city,
      'country' => $country,
      'zip_code' => $zip
    ]);
    
    $test = check($add);
    if($test == 1){
      $manager = new AddressManager($con);
      $response = $manager->get($add);

       if(count($response) > 0){
        $ad = new Address($response[0]);
        $_SESSION['address'] = $response[0];
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

  function getList(){
    $con = Connection::getConnection()->connect();
    $manager = new AddressManager($con);
    $response = $manager->getList();
    return $response;
  }
  
  function get(Address $a){
     $con = Connection::getConnection()->connect();
    $manager = new AddressManager($con);
    $response = $manager->get($a);
    return $response[0];
  }

  if(isset($_GET['id'])){
    delete($_GET['id']);
  }
  function delete($id){
    $con = Connection::getConnection()->connect();
    $manager = new AddressManager($con);
    $response = $manager->delete($id);
    if($response == 'success'){
      header('Location:../../view/html/lister.php');
   }
  }
?>