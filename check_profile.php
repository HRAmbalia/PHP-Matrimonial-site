<?php
	include 'header.php';
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="style.css">
</head>

<body class="container check_profile">
	<div class="row m-1 p-2">
		<?php
			$conn = mysqli_connect('localhost', 'root', '1234', 'matrimony');
			$query = "SELECT * FROM `record` ORDER BY id ASC ";
			$queryfire = mysqli_query($conn, $query);
			$number = mysqli_num_rows($queryfire);
			//   echo $_SESSION["email"];
			session_start();
			if (isset($_SESSION["email"])) {
				if ($number > 0) {
					while ($product = mysqli_fetch_array($queryfire)) {
		?>
						<div class="col-lg-3  col-sm-12 ">
							<form>
								<div class="card">
									<h6 class="card-title bg-info text-white p-2"> <?php echo $product['fname']; ?></h6>
									<div class="card-body" <h6> <img src="images/<?php echo $product['image']; ?>" height="200" width="200" /></h6>
										<h6> PhOne : <?php echo $product['phone']; ?></h6>
										<h6> Age: <?php echo $product['age'] ?></h6>
										<h6>Job : <?php echo $product['job'] ?></h6>
										<h6>Salary :<?php echo $product['salary'] ?></h6>
										<h6>date Of Birth :<?php echo $product['dob'] ?></h6>
										<h6> Religion : <?php echo $product['religion'] ?></h6>
										<h6> Mother Tongue : <?php echo $product['mother_tongue'] ?></h6>
										<h6>Hometown : <?php echo $product['hometown'] ?></h6>
									</div>
									<div class="btn-group">
										<button class="btn btn-success flex-fill bg-info-red p-1"><a href="chat.php?chat_with=<?php echo $product['id']; ?>">Like Profile</a></button>
									</div>
								</div>
							</form>
						</div>
			<?php
				}
			}
			?>
			<br>
			<form action="filter.php" method="post">

				<div class="row">
					<div class="col-md-5">
						Salary
					</div>
					<div class="col-md-5">
						<select name="salary_filter">
							<option value="10000">> 10000
							<option value="20000">> 20000
							<option value="35000">> 35000
						</select>
					</div>
				</div>

				<div class="row">
					<div class="col-md-5">
						age
					</div>
					<div class="col-md-5">
						<select name="age_filter">
							<option value="25">>25
							<option value="30">>30
							<option value="35">>35
						</select>
					</div>

				</div>
				<input type="submit" name="submit" class="btn btn-success" value="submit">
			</form>
		<?php
		} 
		else {
			header('location:_login.php');
		}
		?>
	</div>

</body>
</html>