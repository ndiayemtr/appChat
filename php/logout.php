<?php 
	session_start();

	if (isset($_SESSION['unique_id'])) {
		require_once('config.php');
		$logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);

		if (isset($logout_id)) {
			$status = 'Offline now';
			$sql = mysqli_query($conn, "UPDATE users SET Status = '{$status}' where unique_id = '{$logout_id}'");
			
			if ($sql) {
				session_unset();
				session_destroy();
				header("location:../public/templates/login.php");
			}
			
		}else{
			header("location:../public/templates/login.php");
		}
	}
 ?>