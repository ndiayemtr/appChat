<?php 
	session_start();
	require_once('config.php');

	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

	if (!empty($email) && !empty($password)) {
		$sql1 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
		if (mysqli_num_rows($sql1) > 0) {
			$row = mysqli_fetch_assoc($sql1);
			$status = 'Active now';
			$sql = mysqli_query($conn, "UPDATE users SET Status = '{$status}' where unique_id = '{$row['unique_id']}'");
			if ($sql) {
				$_SESSION['unique_id'] = $row['unique_id'];
				echo "success";
			}
			
		}else{
			echo "Email or Password is incorrect";
		}
		
	}else{
		echo "All input field is required";
	}