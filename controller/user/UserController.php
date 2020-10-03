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
	$type = $_POST['type'];

	if($type == 1){

		//Test after
		$firstN = $_POST['firstN'];
		$lastN = $_POST['lastN'];
		$user = $_POST['username'];
		$pass = $_POST['pass'];

		$user = new User([
			'first_name'=>$firstN,
			'last_name'=>$lastN,
			'username'=>$user,
			'password'=>$pass
		]);

		//echo ($user->username().'=>'.$user->password().'=>'.$user->first_name().'=>'.$user->last_name());
		$manager = new UserManager($con);
		$response = $manager->addUser($user);
		if($response == 'success'){
			$_SESSION['username'] = $user->username();
			header('Location:../../view/html/dashboard.php');
		}
		//echo $response;
		/*if($response == false){
			echo $response;
		}else{
			$_SESSION['status_2'] = $response['status'];
			$_SESSION['user_id_2'] = $response['user_id'];
			echo json_encode($response);			
		}*/
	}

	if($type == 2){
		$user = $_POST['username'];
		$pass = $_POST['pass'];
		$manager = new UserManager($con);
		$response = $manager->getUser($user,$pass);
		$user_id = (int)$response['user_id'];
		if($user_id > 0){
			$_SESSION['username'] = $user;
			header('Location:../../view/html/dashboard.php');			
		} else{
			header('Location:../../view/html/login.php');
		}
		/*if($response == false){
			echo $response;
		}else{
			echo json_encode($response);
			$_SESSION['user_id'] = $response['user_id'];
			$_SESSION['username'] = $response['username'];
			$_SESSION['status'] = $response['status'];
		}	*/
	}

	if($type == 4){
		session_unset();
		session_destroy();
		if(isset($_SESSION['username'])){
			echo json_encode('failed');
		}else{
			echo json_encode('success');
		}
		
	}
?>

