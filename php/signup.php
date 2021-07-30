<?php 
	session_start();
	require_once('config.php');

	$fname = mysqli_real_escape_string($conn, $_POST["fname"]);
	$lname = mysqli_real_escape_string($conn, $_POST["lname"]);
	$email = mysqli_real_escape_string($conn, $_POST["email"]);
	$password = mysqli_real_escape_string($conn, $_POST["password"]);

	if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
		if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}'");
			if (mysqli_num_rows($sql) > 0) {
				echo "$email - this email already exist";
			}else{
				if (isset($_FILES['image'])) {
					$img_name = $_FILES['image']['name'];
					$img_type = $_FILES['image']['type'];
					$img_tmp = $_FILES['image']['tmp_name'];

					$img_explode = explode('.', $img_name);
					$img_name_ext = end($img_explode);

					$extensions = ['png', 'jpeg', 'jpg'];

					if (in_array($img_name_ext, $extensions)) {
						$time = time();
						
						$new_img_name = $time.$img_name;
						
						if (move_uploaded_file($img_tmp, "../public/images/".$new_img_name)) {
							$status = "Active now";
							$random_id = rand(time(), 10000000);

							$sql2 = mysqli_query($conn, "INSERT INTO users (unique_id,fname,lname,email,password,img,status) VALUES ('{$random_id}', '{$fname}', '{$lname}', '{$email}', '{$password}', '{$new_img_name}', '{$status}')");

							if ($sql2) {
								$sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
								if (mysqli_num_rows($sql3) > 0) {
									$rows = mysqli_fetch_assoc($sql3);
									$_SESSION['unique_id'] = $rows['unique_id'];
									echo 'success';
								}
							}else{
								echo "Sometime went wrong";
							}
						}
					}else{
						echo "Please select an Image - jpeg, jpg, png";
					}

				}else{
					echo "Please select an Image file";
				}
			}
		}else{
			echo "$email this is not valid email";
		}
		
	}else{
		echo 'All input field are reaquired';
	}
 ?>