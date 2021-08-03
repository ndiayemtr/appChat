<?php 
	session_start();
	require_once("partials/header.php");
	require_once('../../php/config.php');



	if (!isset($_SESSION['unique_id'])) {
		header("location: login.php");
	}

	$sql1 = mysqli_query($conn, "SELECT * FROM users WHERE unique_id = '{$_SESSION['unique_id']}'");
	if (mysqli_num_rows($sql1) > 0) {
		$row = mysqli_fetch_assoc($sql1);
	}
 ?>

<body>
	<div class="wrapper">
		<section class="users">
			<header>
				<div class="content">
					<img src="../images/<?php echo $row['img'] ?>" alt="">
					<div class="details">
						<span><?php echo $row['fname']. " ". $row['lname']; ?></span>
						<p><?php echo $row['status'] ?></p>
					</div>
				</div>
				<a href="" class="logout">Logout</a>
			</header>
			<div class="search">
				<span class="text">Select an user to start chat</span>
				<input type="text" placeholder="Enter name to search..." name="">
				<button><i class="fas fa-search"></i></button>
			</div>
			<div class="users-list">
				
			
			</div>
		</section>		
	</div>

		<script type="text/javascript" src="../javascript/users.js"></script>

</body>
</html>
