<?php 
	require_once('config.php');
	$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
	$output = '';
	$sql = mysqli_query(
		$conn,
		"SELECT * FROM users WHERE fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%' "
	);

	if (mysqli_num_rows($sql) > 0) {
			while ($row = mysqli_fetch_assoc($sql)) {
			$output .= '
				<a href="../templates/chat.php?user_id='.$row['unique_id'].'">
					<div class="content">
						<img src="../images/'.$row['img'].'">
						<div class="details">
							<span>'.$row['fname'].'</span>
							<p>This is test message</p>
						</div>
					</div>
					<div class="status-dot"><i class="fas fa-circle"></i></div>
				</a>
			';
		}
		}else{
			$output .= "No user found related to your search term";
		}
	echo $output;
 ?>