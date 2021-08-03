<?php 
	session_start();
	require_once('config.php');

	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

	if (!empty($email) && !empty($password)) {
		$sql1 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
		if (mysqli_num_rows($sql1) > 0) {
			$row = mysqli_fetch_assoc($sql1);
			$_SESSION['unique_id'] = $row['unique_id'];
			//unset($_SESSION['unique_id']);
			echo "success";
		}else{
			echo "Email or Password is incorrect";
		}
		
	}else{
		echo "All input field is required";
	}