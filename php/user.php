<?php 
	session_start();
	require_once('config.php');
	$outgoing_id = $_SESSION['unique_id'];

	$sql = mysqli_query(
		$conn,
		"SELECT * FROM users
		WHERE NOT unique_id = {$outgoing_id}
		"
	);
	$output = '';
 
	if (mysqli_num_rows($sql) == 1) {
		$output .= "no user available to chat";
	}elseif (mysqli_num_rows($sql) > 0) {
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

			($row['status'] == 'Offline now') ? $offline = 'offline' : $offline ='';
			

			$output .= '
				<a href="../templates/chat.php?user_id='.$row['unique_id'].'">
					<div class="content">
						<img src="../images/'.$row['img'].'">
						<div class="details">
							<span>'.$row['fname'].'</span>
							<p>'. $msg.'</p>
						</div>
					</div>
					<div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
				</a>
			';
		}
	}
	echo $output;
