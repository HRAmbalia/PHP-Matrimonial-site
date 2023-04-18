<?php
  echo "dfdbgf";
  include 'header.php';
  if ($_SERVER["REQUEST_METHOD"] == "post") {
    echo "dfdbgf";
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $db = "matrimony";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));

    $email = $_POST["email"];
    $name = $_POST["name"];
    $massage = $_POST["message"];
    $Rating = $_POST["Rating"];
    $query = "INSERT INTO `review`(`name`,`email`,`message`,`Rating`) VALUES('$name','$email','$message','$Rating')";
    $result = mysqli_query($conn, $query);
    echo var_dump($result);
    if ($result) {
      header('location:check_profile.php');
      echo "Thankyou For review Our project !!";
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
  <title>Hello, world!</title>
</head>

<body class="container contactus">
  <div style="text-align:center">
    <h2>Contact Us</h2>
  </div>
  <form action="contactus.php" method="post">
    <div class="column">

      <div class="form-group m-1 p-1">
        <label>Name</label>
        <input type="text" name="name" class="form-control m-1 p-1" id="exampleInputPassword1" placeholder="Name">
      </div>

      <div class="form-group m-1 p-1">
        <label>email</label>
        <input type="email" name="email" class="form-control  m-1 p-1" id="exampleInputPassword1" placeholder="Type your email">
      </div>

      <div class="form-group m-1 p-1">
        <label>Type your Message</label>
        <input type="text" name="message" class="form-control m-1 p-1" id="exampleInputPassword1" placeholder="Type your message">
      </div>

      <div class="form-group m-1 p-1">
        <label>Rating </label>
        <select name="Rating">
          <option value="Perfect">Perfect</option>
          <option value="Very Good">Very Good</option>
          <option value="Good">Very Good</option>
          <option value="Average">Average</option>
          <option value="Poor">Poor</option>
        </select>
      </div>

    </div>
    <button class="btn btn-primary  m-1 p-10"> <input type="submit" name="submit" value="submit"></button>
    <button class="btn btn-secondary"> <input type="reset" name="reset" value="reset"> </button>
  </form>

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>
</html>