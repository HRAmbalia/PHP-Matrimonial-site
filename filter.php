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

<body class="container filter">
	<?php
	if ($_SERVER["REQUEST_METHOD"] = "post") {
		$host = "localhost";
		$user = "root";
		$pass = "1234";
		$db = "matrimony";
		$conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));

		$age_filter = $_POST["age_filter"];
		$salary_filter = $_POST["salary_filter"];

		$filter_query = "SELECT * FROM record WHERE age >= '$age_filter' AND salary >= '$salary_filter' ";
		$queryfire = mysqli_query($conn, $filter_query);
		$number = mysqli_num_rows($queryfire);
		if ($number >= 1) {
			echo '<div class="row">';
			while ($product = mysqli_fetch_array($queryfire)) {
	?>
				<div col="col-lg-3 com-md-3 com-sm-12">
					<h6 class="card-title bg-info text-white p-2 m-2"> <?php echo $product['fname']; ?></h6>
					<div class="card-body">
						<!-- <img src="<?php echo $product['image'] ?>" alt="images" class="img-fluid mb-2"> -->
						<h6> Phone : <?php echo $product['phone']; ?></h6>
						<h6> Age: <?php echo $product['age'] ?></h6>
						<h6>Job : <<?php echo $product['job'] ?>< /h6>
						<h6>Salary :<?php echo $product['salary'] ?></h6>
						<h6>date Of Birth :<?php echo $product['dob'] ?></h6>
						<h6> Religion : <?php echo $product['religion'] ?></h6>
						<h6> Mother Tongue : <?php echo $product['mother_tongue'] ?></h6>
						<h6>Hometown : <?php echo $product['hometown'] ?></h6>
					</div>
					<div class="btn-group">
						<button class="btn btn-success flex-fill bg-info-red p-1"><a href="chat.php?chat_with=<?php echo $product['id']; ?>">Like Profile</a></button>
					</div>
					</form>
				</div>
			<?php
			}
			echo '</div>';
		} 
		else {
			echo "No results found please try again after some time !";
			?>
			<br>
			<button type="button" class="btn btn-link"><a href="check_profile.php">Go back</a></button>
	<?php
		}
	} 
	else {
		echo "SeRvEr ErRoR";
		echo " plsease try Again AdTer SoME TiME !!!";
	}
	?>
	</div>
	
</body>
</html>