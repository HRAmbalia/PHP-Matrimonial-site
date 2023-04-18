<?php
	include 'header.php';
	$host = "localhost";
	$user = "root";
	$pass = "1234";
	$db = "matrimony";
	$conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	session_start();
	$email = $_SESSION["email"];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$age = $_POST["age"];
		$religion = $_POST["religion"];
		$language = $_POST["language"];
		$education = $_POST["education"];
		$hometown = $_POST["hometown"];
		$job = $_POST["job"];
		$salary = $_POST["salary"];
		$other = $_POST["other"];
		$email = $_SESSION['email'];
		$filename = basename($_FILES["fileToUpload"]["name"]);
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if (isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if ($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
				move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_dir . $filename);
				$sqlphoto = "UPDATE `record` SET `image`='$filename' WHERE `email` = '$email' ";
				$result = mysqli_query($conn, $sqlphoto);
			} 
			else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}

		$query = "UPDATE `record` SET age = '$age' , religion = '$religion', education = '$education' , hometown = '$hometown' , job = '$job' , salary = '$salary' , other_details = '$other' ,  mother_tongue = '$language' WHERE email = '$email' ";
		$result = mysqli_query($conn, $query);
		if ($result) {
			$_SESSION["update"] = "successfully updated";
			// header('location:check_profile.php');
		} 
		else {
			echo "failed";
		}
	}
	$sqlquery = "SELECT * FROM record WHERE email='$email' ";
	$result = mysqli_query($conn, $sqlquery);
	$row = NULL;
	if ($result) {
		$row = mysqli_fetch_assoc($result);
	}
	// else if(isset($_SESSION["msg"]))
	// {
	//     $_SESSION["msg"] = "login first !";
	//     header('location:_login.php');
	// }
?>


<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body class="container biodata">
	<br>Upload Your Bio data
	<div>
		<button class="btn btn-success"><a href="check_profile.php">go back</a></button>
	</div>
	<!-- <h1> <?php echo $_SESSION["email"]; ?> </h1> -->
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
		
		<div class="form-group">
			<label for="exampleInputEmail1">Age</label>
			<input type="text" name="age" class="form-control" value="<?php echo $row['age']; ?>">
		</div>

		<div class="form-group">
			<label>religion</label>
			<select name="religion" class="form-control" value="<?php echo $row['religion']; ?>">
				<option value="hindu">hindu
				<option value="muslim">muslim
				<option value="Christian"> Christian
				<option value="sikh">sikh
				<option value="jain">jain
				<option value="pasrsi">parsi
				<option value="other">Other religion
			</select>
		</div>

		<div class="form-group">
			<label>Mother Tongue</label>
			<select name="language" class="form-control" value="<?php echo $row['mother_tongue']; ?>">
				<option value="hindi" name>hindi
				<option value="gujrati"> gujrati
				<option value="english">English
				<option value="marathi">marathi
				<option value="kannad">kannad
				<option value="telugu">telugu
				<option value="tamil">tamil
				<option value="other_language">other Language
			</select>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Education</label>
			<input type="text" class="form-control" name="education" value="<?php echo $row['education']; ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Hometown</label>
			<input type="text" class="form-control" name="hometown" value="<?php echo $row['hometown']; ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Job</label>
			<input type="text" class="form-control" name="job" value="<?php echo $row['job']; ?>">
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">salary</label>
			<select name="salary" class="form-control" value="<?php echo $row['salary']; ?>">
				<option value="1">
					< 10000 <option value="10000">
					< 25000 <option value="25000">
					< 35000 <option value="35000">
					< 50000 <option value="50000">
					< 100000 <option value="100000">
			</select>
		</div>

		<div class="form-group">
			<label for="exampleInputEmail1">Other Details</label>
			<textarea class="form-control" name="other" value="<?php echo $row['other']; ?>"></textarea>
		</div>

		<div class="form-group">
			<label>image</label>
			<input type="file" name="fileToUpload" id="fileToUpload" accept="image">
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="update">
			<input type="reset" name="reset" value="reset">
		</div>
		
	</form>

</body>
</html>