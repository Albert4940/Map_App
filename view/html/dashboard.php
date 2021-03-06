<?php
require_once("../../controller/address/AddressController.php");
	// session_start();
	if (!isset($_SESSION['username'])) {
		# code...
		header('Location:login.php');
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>
<body id="App">
	<div>
		<?php include('../includes/navbar.php'); ?>
		<?php include('../includes/sidenav.php'); ?>
	</div>
	<div class="main">
		<div id="main_content">
			<header>
				<div><p id="header_content">ONE CLICK ONE ADDRESS</p></div>
			</header>
			<h3 style="text-align: center;">LES ADRESSES RECENTS</h3>
			<table>
				 <thead>
				   <tr>
				   		<th>#</th>
					    <th>Adresse</th>
					    <th>Ville</th>
					    <th>Pays</th>
					    <th>Code Postal</th>
					    <th>Action</th>
				   </tr>
				 </thead>
				 <tbody>
				 	<?php
				 		$q = getList();
				 		$i = 0;
				 		 while($data = $q->fetch(PDO::FETCH_ASSOC)){
				    	$i++;
				    ?>
				    	<tr>
				    		<td><?=$i?></td>
				    		<td><?=$data['address']?></td>
				    		<td><?=$data['city']?></td>
				    		<td><?=$data['country']?></td>
				    		<td><?=$data['zip_code']?></td>
				    		<?php $adre = json_encode($data);?>
				    		<td><a href="map.php?q2=<?=$data['address']?>&q3=<?=$data['city']?>&q4=<?=$data['country']?>&q5=<?=$data['zip_code']?>"><button class="btn_view">View</button></a></td>
				    	</tr>
				     <?php
				     if($i == 7)break;
				            }											
				 	?>
				 </tbody>
				  
			</table><br><hr><br>
			<center><a href="lister.php"><button class = "btn_view"style="margin: auto;">VOIR PLUS</button></a></center><br>
		</div>
	</div>
	<script type="text/javascript" src="../js/jquery-3.5.1.js"></script>
	<script type="text/javascript">
		(function($){
			$('#dash').addClass("active");
		})(jQuery)
	</script>
</body>
</html>