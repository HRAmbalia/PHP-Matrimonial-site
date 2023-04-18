<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $exists = false;
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $db = "matrimony";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));

    $pwd = $_POST["password"];
    $cpwd = $_POST["confirm_password"];
    $fnm = $_POST["fnm"];
    $lnm = $_POST["lnm"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];

    if (!isset($_POST["email"]))
      $exists = true;
    if (!isset($_POST["password"]))
      $exists = true;

    // $sqltest = "SELECT * FROM record WHERE email = \"$email\"";
    // $test = mysqli_query($conn,$sqltest);
    // $num = mysqli_num_rows($test);
    //  echo var_dump($test);
    // if($num >= 0)
    // {
    //   echo "user already exist";
    //   header('location:_login.php');
    // }

    if ($pwd == $cpwd) {
      // $hash=Password_hash($pwd,PASSWORD_DEFAULT );   
      $query = "INSERT INTO `record` (`fname`, `lname`, `email`, `phone`, `password`, `dob`, `gender`, `age`, `religion`, `mother_tongue`, `education`, `hometown`, `job`, `salary`, `other_details`, `id`)
        VALUES ('$fnm', '$lnm', '$email','$phone', '$pwd','$dob','$gender', NULL,NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
      $result = mysqli_query($conn, $query);
      echo var_dump($result);
      if ($result) {
        session_start();
        $_SESSION["signup_success"] =  "successfully signup";
        header('location:_login.php');
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
  <!-- <link rel="stylesheet" href="register.css"> -->
  <!--Fonts-->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap" rel="stylesheet">
  <!--Font Awesome-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Login</title>
</head>

<body class="_signup">
  <h1 class="text-center">REGISTRATION FORM</h1>

  <div class="container" style="width:30%;">
    <div class="formclass">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">

          <input type="text" class="form-control  m-1" name="fnm" minlength="1" placeholder="First Name" maxlength="21" required id="hel">
          
          <input type="text" class="form-control m-1" name="lnm" minlength="1" placeholder="Last Name" maxlength="21" required id="hel">
          
          <input type="email" class="form-control m-1" name="email" placeholder="Email" required id="hel">
          
          <input type="text" class="form-control m-1" name="phone" placeholder="Phone No." required id="hel">
          
          <input type="password" class="form-control m-1" name="password" id="pswd" maxlength="14" minlength="6" placeholder="Password" required>
          
          <input type="password" class="form-control m-1" name="confirm_password" id="confirm_pswd" maxlength="14" minlength="6" placeholder="Confirm Password" required>
          
          <input type="date" class="form-control m-1" name="dob" required id="hel">
          
          <div class="form-group m-1 ">
            <p>Gender : </p>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="gender" value="male">
              <label class="form-check-label" for="inlineRadio1">Male</label>
            </div>
            <div class="form-check form-check-inline ">
              <input class="form-check-input" type="radio" name="gender" value="option1">
              <label class="form-check-label" for="inlineRadio1">Female</label>
            </div>
          </div>

          <input type="submit" class="btn btn-primary" onclick="return Validate()" name="submit" value="Submit" id="rs">
          <input type="reset" class="btn btn-secondary" id="rs">
        
        </div>
      </form>
    </div>
  </div>
  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

</body>
</html>