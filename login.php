<?php 

session_start();

	include("connection.php");
	include("functions.php");

	if(isset($_SESSION['user_id'])) {
		header("Location: index.php");
	}


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username))
		{

			$query = "select * from users where username = '$username' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['pwd'] === $password)
					{

						$_SESSION['user_id'] = $user_data['id'];
						header("Location: index.php");
						die;
					}
				}
			}
			
			echo "<p>wrong username or password!</p>";
		}else
		{
			echo "<p>wrong username or password!</p>";
		}
	}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
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

		#box{
			background-color: #CDE7B0;
			
			width: 300px;
			padding: 20px;
			border-radius: 5px;
		}

	</style>
</head>
<body>
	<div id="box">
		
		<form method="post">
			<div class="formTitle">Login</div>

			<div class="inputGroup">
				<label for="username">Username </label>	
				<input id="username" type="text" name="username" class="inputField">
			</div>
			<div class="inputGroup">
				<label for="password">Password</label>
				<input id="password" type="password" name="password" class="inputField">
			</div>

			<input id="button" type="submit" value="Login">

			<a href="signup.php" style="font-size: 0.8rem">Click to Signup</a>
		</form>
	</div>
</body>
</html>