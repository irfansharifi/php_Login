<?php 
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST") {

		$target_dir = "uploads/";
		$filename = basename($_FILES["img"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		
		$check = getimagesize($_FILES["img"]["tmp_name"]);
		if($check === false) {
			echo "File is not an image.";
			$uploadOk = 0;
		}
		
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}

		$name = $_POST['name'];
		$email = $_POST['email'];
		$username = $_POST['username'];
		$age = $_POST['age'];
		$password = $_POST['password'];

		if(!empty($username) && !empty($password) && !is_numeric($username)) {
			$query = "insert into users (name, email, username,age, pwd, img) values ('$name', '$email', '$username', '$age', '$password', '$filename')";

			mysqli_query($con, $query);

			if ($uploadOk == 0) {
				echo "Sorry, your file was not uploaded.";
			} else if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
				echo "The file ". htmlspecialchars(basename( $_FILES["img"]["name"])). " has been uploaded.";
			} else {
				echo "Sorry, there was an error uploading your file.";
			}

			header("Location: login.php");
			die;
		} else {
			echo "Please enter some valid information!";
		}
	}
?>



<!DOCTYPE html>

<html>

<head>
	<title>Signup</title>

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

		#Uploadbutton{
			font-family: inherit;
			font-size: inherit;
			padding: 5px;
			width: 100px;
			color: white;
			background-color: #8A4F7D;
			border: none;
			border-radius: 5%;
			color: white;
			margin-bottom: 15px;
			width: 50%;
			margin: 10px auto;
			
		}

		#Filebutton{
			
			padding: 10px;
			color: white;
			border: none;
			border-radius: 5%;
			color: #2B2D42;
			margin-bottom: 10px;
			margin-top: 10px;
			
			
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
		
		<form method="post" enctype="multipart/form-data">

			<div class="formTitle">Sign Up</div>
				
			<div class="inputGroup">
				<label for="name">Name</label>	
				<input id="name" type="text" name="name" class="inputField">
			</div>

			<div class="inputGroup">
				<label for="email">Email</label>	
				<input id="email" type="text" name="email" class="inputField">
			</div>

			<div class="inputGroup">
				<label for="username">Username</label>	
				<input id="username" type="text" name="username" class="inputField">
			</div>

			<div class="inputGroup">
				<label for="age">Age</label>	
				<input id="age" type="number" name="age" class="inputField">
			</div>

			<div class="inputGroup">
				<label for="password">Password</label>	
				<input id="password" type="password" name="password" class="inputField">
			</div>
			
			
			<label for="fileToUpload">Upload Your Image</label>

			<input id="Filebutton" type="file" name="img" id="img">

			<input id="button" type="submit" value="Signup">

			<a href="login.php" style="font-size: 0.8rem">Click to Login</a>

		</form>
		
	</div>

</body>

</html>