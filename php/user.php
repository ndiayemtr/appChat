<?php 
	session_start();
	require_once('config.php');

	$sql = mysqli_query(
		$conn,
		"SELECT * FROM users"
	);
	$output = '';
 
	if (mysqli_num_rows($sql) == 1) {
		$output .= "no user available to chat";
	}elseif (mysqli_num_rows($sql) > 0) {
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
	}
	echo $output;
