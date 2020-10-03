<?php
 
  // Import de la classe
  require_once("ConnectionObject.php");
  
 
 // Tentative d'instanciation de la classe
  $SingletonA = BddConnection::getConnection()->connect();
  $SingletonB = BddConnection::getConnection()->connect();
 
  echo '<pre>';
  var_dump($SingletonA);
  echo '</pre>';
 
  echo '<pre>';
  var_dump($SingletonB);
  echo '</pre>';

?>