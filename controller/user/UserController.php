<?php 
session_start();
require_once("../../model/Connection/Connection.php");
	require_once("../../model/user/User.php");
	require_once("../../model/user/UserManager.php");
	$con = Connection::getConnection()->connect();
   global $con;

   //Logout 
   if(isset($_GET['type_log'])){
      if ($_GET['type_log'] == 'logout') {
        # code...
        session_unset();
		session_destroy();
		if(isset($_SESSION['username'])){
			//echo json_encode('failed');
		}else{
			header('Location:../../view/html/login.php');
		}
      }
   }

   //Function for check inputs
   function check(User $us){
     $response ;
    if(empty($us->first_name()) OR empty($us->last_name()) OR empty($us->username()) OR empty($us->password())){
      $response = 'Veillez Remplir tous les champs !';
    }else{
      $response = 1;
    }
    return $response;
  }  

	$type = $_POST['type'];

	//Register a user
	if($type == 1){

		//Test user's input

		$firstN = $_POST['firstN'];
		$lastN = $_POST['lastN'];
		$userN = $_POST['username'];
		$pass = $_POST['pass'];

		$user = new User([
			'first_name'=>$firstN,
			'last_name'=>$lastN,
			'username'=>$userN,
			'password'=>$pass
		]);

		$test = check($user);
		
		if($test == 1){
			//echo ($user->username().'=>'.$user->password().'=>'.$user->first_name().'=>'.$user->last_name());
			$manager = new UserManager($con);

			$response = $manager->exist($userN);
			$user_id = (int)$response['user_id'];
			//$res = $manager->getUser($user,$pass);
			//var_dump($manager->getUser($user,$pass));
			if($user_id > 0){
				$_SESSION['error'] = 'Le nom utilisateur est deja utiliser !';
				header('Location:../../view/html/register.php');
			}else{
				$response = $manager->addUser($user);
				if($response == 'success'){
					$_SESSION['username'] = $user->username();
					header('Location:../../view/html/dashboard.php');
				}
			}
		}else{
			$_SESSION['error'] = $test;
       		header('Location:../../view/html/register.php');
		}
	}

	//Login

	if($type == 2){
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		if(empty($user) OR empty($pass)){
			$_SESSION['error'] = 'Veillez Remplir tous les champs !';
			header('Location:../../view/html/login.php');
		}else{
			$manager = new UserManager($con);
			$response = $manager->getUser($user,$pass);
			$user_id = (int)$response['user_id'];
			if($user_id > 0){
				$_SESSION['username'] = $user;
				header('Location:../../view/html/dashboard.php');			
			} else{
				$_SESSION['error'] = 'User Name ou Mot de passe Incorrect !';
				header('Location:../../view/html/login.php');
			}	
		}
		
	}

?>

