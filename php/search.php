<?php 
	session_start();
	require_once('config.php');
	$outgoing_id = $_SESSION['unique_id'];
	$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
	$output = '';
	$sql = mysqli_query(
		$conn,
		"SELECT * FROM users 
		WHERE NOT unique_id = {$outgoing_id} 
		AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') "
	);

	if (mysqli_num_rows($sql) > 0) {
			while ($row = mysqli_fetch_assoc($sql)) {
			$sql3 = "SELECT * FROM messages 
					WHERE (incoming_msg_id = {$row['unique_id']} OR outgoing_msg_id = {$row['unique_id']}) 
						AND (outgoing_msg_id = {$outgoing_id} OR outgoing_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
			$query3 = mysqli_query($conn, $sql3);
			$row3 = mysqli_fetch_assoc($query3);
			if (mysqli_num_rows($query3) > 0) {
				$result = $row3['message'];
			}else{
				$result = 'No message available';
			}

			(strlen($result) > 20) ? $msg = substr($result, 0, 20).'...' : $msg = $result;
			($outgoing_id == $row3['outgoing_msg_id']) ? $you = 'You : ' : $you = '';

			$output .= '
				<a href="../templates/chat.php?user_id='.$row['unique_id'].'">
					<div class="content">
						<img src="../images/'.$row['img'].'">
						<div class="details">
							<span>'.$row['fname'].'</span>
							<p>'.$you . $msg.'</p>
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