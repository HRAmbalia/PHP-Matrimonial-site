<?php
  if ($_SERVER["REQUEST_METHOD"] = "post") {
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $db = "matrimony";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));
    if (isset($_POST['submit'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];
      $query = "SELECT * FROM record WHERE email=\"$email\" AND password = \"$password\" ";
      //  echo $query;
      $result = mysqli_query($conn, $query);
      $num = mysqli_num_rows($result);
      //  echo var_dump($result);
      if ($num >= 1) {
        session_start();
        $_SESSION["email"] = $email;
        $_SESSION["id"] = $id;
        $message =  "success login";
        $_SESSION["msg"] = $message;
        header('location:check_profile.php');
      } 
      else {
        $wrong_message = "Wrong details";
        $_SESSION["wrong_msg"] = $wrong_message;
        header('location:_login.php?wrongdetails=wrongdetails');
      }
    }
  }
?>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>_Login</title>
</head>

<body class="_login">
  
  <div class="container" style="width:30%;">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email address</label>
        <input type="email" name='email' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name='password' class="form-control" id="exampleInputPassword1">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
      </div>
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
  </div>
  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>