<?php 
	session_start();

	if (isset($_SESSION['unique_id'])) {
		require_once('config.php');
		$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
		$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
		$output = '';

			$requete = "SELECT * FROM messages 
						LEFT JOIN users ON users.unique_id = messages.outgoing_msg_id 
						WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id =  {$outgoing_id}) OR
						(outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id ";
			$req = mysqli_query($conn, $requete) or die();

			if (mysqli_num_rows($req) > 0) {

				while($row = mysqli_fetch_assoc($req)){
					if ($row['outgoing_msg_id'] === $incoming_id) {
						$output .= '
							<div class="chat outgoing">
					<div class="details">
						<p>'.$row['message'].'</p>
					</div>
				</div>
						';
					}else{
						$output .= '
							<div class="chat incoming">
					<img src="../images/'.$row['img'].'">
					<div class="details">
						<p>'.$row['message'].'</p>
					</div>
				</div>
						';
					}
				}
				echo $output;
			}

		}else{
			header('../public/templates/login.php');
		}
	
 ?>