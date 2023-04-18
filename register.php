<?php
if ($_SERVER["REQUEST_METHOD"] = "POST") {
  $exists = false;
  $host = "localhost";
  $user = "root";
  $pass = "1234";
  $db = "matrimony";
  $conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));
  $email = $_POST['email'];
  $sqltest = "SELECT * FROM record WHERE `email` = '$email'";
  $test = mysqli_connect($conn, $sqltest);
  if (mysqli_num_rows($test) > 0) {
    echo "user already exist";
    header('location:login.php');
  }
  if ($pwd == $cpwd) {
    $query = "INSERT INTO `record` (fname,lname,email,phoneno,password,dob,gender) values ('$fname','$lnm','$email','$phone','$pwd','$dob','$gender')";
    $result = mysqli_query($conn, $query);
    if ($result) {
      echo "successfully signup";
      header('location : home.php');
    }
  } 
  else {
    echo "Password Don't Match";
  }
}
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <!--External css-->
  <link rel="stylesheet" href="register.css">
  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <title>Login</title>
</head>

<body>

  <div class="container">
    <div class="formclass">
      <form action="" method="post">
        <h1>REGISTRATION FORM</h1>
        <div class="form-group">
          <input style="margin-top: 10px" type="text" name="fnm" minlength="1" placeholder="First Name" maxlength="21" required id="hel"><br>
          <input type="text" style="margin-top: 10px" name="lnm" minlength="1" placeholder="Last Name" maxlength="21" required id="hel"><br>
          <input type="email" style="margin-top: 10px" name="email" placeholder="Email" required id="hel"><br>
          <input type="text" style="margin-top: 10px" name="phone" placeholder="Phone No." required id="hel"><br>
          <input type="password" style="margin-top: 10px" name="password" id="pswd" maxlength="14" minlength="6" placeholder="Password" required><br>
          <input type="password" style="margin-top: 10px" name="confirm_password" id="confirm_pswd" maxlength="14" minlength="6" placeholder="Confirm Password" required><br>
          <input type="date" style="margin-top: 10px" name="dob" required id="hel"><br>
          Male <input type="radio" style="margin-top: 10px" name="gender" required id="rad">
          Female <input type="radio" style="margin-top: 10px" name="gender" required id="rad"><br>
          <input type="reset" style="margin-top: 10px" id="rs">
        </div>
        <input type="submit" style="margin-top: 10px" onclick="return Validate()" name="submit" value="Submit" id="rs">
      </form>
    </div>
  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>
</html>