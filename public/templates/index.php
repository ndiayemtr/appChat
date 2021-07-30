<?php 
require_once("partials/header.php");
 ?>
 
<body>
	<div class="wrapper">
		<section class="form signup">
			<header>Realtime Chat App</header>
			<form action="#" enctype="multipart/form-data">
				<div class="error-txt"></div>
				<div class="name-details">
					<div class="field input">
						<label>First Name</label>
						<input type="text" name="fname" placeholder="First Name">
					</div>
					<div class="field input">
						<label>Lirst Name</label>
						<input type="text" name="lname" placeholder="Lirst Name">
					</div>
					</div>
					<div class="field input">
						<label>Email Address</label>
						<input type="email" name="email" placeholder="enter your email">
					</div>
					<div class="field input">
						<label>Passwod</label>
						<input type="password" name="password" placeholder="Enter new password">
						<i class="fas fa-eye"></i>
					</div>
					<div class="field image">
						<label>Select Image</label>
						<input type="file" name="image">
					</div>
					<div class="field button">
						<input type="submit" value="Continue to Chat">
					</div>			
			</form>
			<div class="link">Already signed up? <a href="login.php">Login now</a></div>
		</section>		
	</div>

	<script type="text/javascript" src="../javascript/pass-show-hide.js"></script>
	<script type="text/javascript" src="../javascript/signup.js"></script>

</body>
</html>
