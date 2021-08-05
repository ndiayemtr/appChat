<?php 
	session_start();

	if (isset($_SESSION['unique_id'])) {
		require_once('config.php');
		$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
		$message = mysqli_real_escape_string($conn, $_POST['message']);

		if (!empty($message)) {
			$requete = "INSERT INTO messages (outgoing_msg_id, incoming_msg_id, message) VALUES ('{$incoming_id}', '{$outgoing_id}', ('{$message}'))";
			//var_dump($conn);
			mysqli_query($conn, $requete) or die();
		}else{
			header('../public/templates/login.php');
		}
	}
 ?>