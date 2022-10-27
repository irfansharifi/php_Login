<?php 
session_start();

	include("connection.php");
	include("functions.php");

	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>

	<style type="text/css">
		* {
			box-sizing: border-box;
		}
		body {
			font-family: sans-serif;
			min-height: 100vh;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		form {
			display: flex;
			flex-direction: column;
		}

		.formTitle {
			text-align: center;
			font-size: 20px;
			font-weight: 700;
		}
	
		.inputField{
			margin-top: 5px;
			display: block;
			height: 40px;
			border-radius: 5px;
			padding: 4px 8px;
			border: solid thin #aaa;
			width: 100%;
			font-family: inherit;
			font-size: inherit;
		}

		.inputGroup {
			margin-bottom: 15px;
		}

		#button{
			font-family: inherit;
			font-size: inherit;
			padding: 10px;
			width: 100px;
			color: white;
			background-color: lightblue;
			border: none;
			border-radius: 5px;
			color: #2B2D42;
			margin-bottom: 15px;
			width: 100%;
		}

		.box {
			background-color: #F8F7F9;
			
			/* width: 300px; */
			padding: 20px;
			border-radius: 5px;
			display: flex;
			gap: 20px;
		}

		.box .content {
			width: 300px;
		}
		.box img {
			display: block;
			width: 200px;
			border-radius: 10px;
		}
		.title {
			color:  #2B2D42;
			font-weight: 700;
		}
		#button a, #button a:active, #button a:hover, #button a:visited {
			display: block;
			width: 100%;
			text-decoration: none;
			font-family: inherit;
			font-size: inherit;
		}
	</style>
</head>
<body>

	
	<h1>Profile Page</h1>

	<div class="box">
		<div class="content">
			<div>
				<p class="title">Name:</p>
				<p><?php echo $user_data['name']; ?></p>
			</div>
			<div>
				<p class="title">Email:</p>
				<p><?php echo $user_data['email']; ?></p>
			</div>
			<div>
				<p class="title">Username:</p>
				<p><?php echo $user_data['username']; ?></p>
			</div>
			<div>
				<p class="title">Age:</p>
				<p><?php echo $user_data['age']; ?></p>
			</div>
			<button id="button"><a href="logout.php">Logout</a></button>
		</div>
		<div class="profileImg">
			<img src="./uploads/<?php echo $user_data['img'] ?>" alt="">
		</div>
	</div>


</body>
</html>