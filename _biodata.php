<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $host = "localhost";
    $user = "root";
    $pass = "1234";
    $db = "matrimony";
    $conn = mysqli_connect($host, $user, $pass, $db) or die("Could NOT CoNnEcT" . mysqli_errno($conn));
    $id = 6;
    $age = $_POST['age'];
    $religion = $_POST["religion"];
    $language = $_POST["language"];
    $education = $_POST["education"];
    $hometown = $_POST["hometown"];
    $job = $_POST["job"];
    $salary = $_POST["salary"];
    $other = $_POST["other"];
    echo $age;
    $query = "UPDATE `record` SET `age` = '$age',`religion` = '$religion',`mother_tongue` = '$language',`salary` = '$salary',`other_details` = '$other',`hometown` = '$hometown',`education` = '$education',`job` = '$job' WHERE `record`.`id` = $id";
    $result = mysqli_query($conn, $query);
    echo $language;
    echo $salary;
    echo var_dump($result);
    if ($result) {
      header('location:home.php');
    }
  }
?>

<html>
<div class="form-row">

  <div class="form-group col-md-6">
    <label for="inputEmail4">religion</label>
    <select class="form-control" name="religion">
      <option value="hindu">hindu
      <option value="muslim">muslim
      <option value="Christian"> Christian
      <option value="sikh">sikh
      <option value="jain">jain
      <option value="pasrsi">parsi
      <option value="other">Other religion
    </select>
  </div>

  <div class="form-group col-md-6">
    <label for="inputPassword4">Password</label>
    <input type="password" class="form-control" id="inputPassword4">
  </div>

</div>

<div class="form-group">
  <label for="inputAddress">Address</label>
  <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
</div>
<div class="form-group">
  <label for="inputAddress2">Address 2</label>
  <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
</div>

<div class="form-row">

  <div class="form-group col-md-6">
    <label for="inputCity">City</label>
    <input type="text" class="form-control" id="inputCity">
  </div>

  <div class="form-group col-md-4">
    <label for="inputState">State</label>
    <select id="inputState" class="form-control">
      <option selected>Choose...</option>
      <option>...</option>
    </select>
  </div>

  <div class="form-group col-md-2">
    <label for="inputZip">Zip</label>
    <input type="text" class="form-control" id="inputZip">
  </div>
</div>

<div class="form-group">
  <div class="form-check">
    <input class="form-check-input" type="checkbox" id="gridCheck">
    <label class="form-check-label" for="gridCheck">
      Check me out
    </label>
  </div>
</div>

<button type="submit" class="btn btn-primary">Sign in</button>
</form>
</div>
<!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>

<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <title>_biodata</title>
</head>

<body>
  <h1>Hello, world!</h1>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <table border="1">

      <tr>
        <th>age</th>
        <th><input type="text" name="age"></th>
      </tr>

      <tr>
        <th>
          <label>religion </label>
        </th>
        <th>
          <select name="religion">
            <option value="hindu">hindu
            <option value="muslim">muslim
            <option value="Christian"> Christian
            <option value="sikh">sikh
            <option value="jain">jain
            <option value="pasrsi">parsi
            <option value="other">Other religion
          </select>
        </th>
      </tr>

      <tr>
        <th>
          <label>Mother tongue</label>
        </th>
        <th>
          <select name="language">
            <option value="hindi" name>hindi
            <option value="gujrati"> gujrati
            <option value="english">English
            <option value="marathi">marathi
            <option value="kannad">kannad
            <option value="telugu">telugu
            <option value="tamil">tamil
            <option value="other_language">other Language
          </select>
        </th>
      </tr>

      <tr>
        <th>Education </th>
        <th><input type="text" name="education"></th>
      </tr>

      <tr>
        <th>Home town</th>
        <th><input type="text" name="hometown"></th>
      </tr>

      <tr>
        <th>job title</th>
        <th><input type="text" name="job"></th>
      </tr>

      <tr>
        <th>sallary</th>
        <th>
          <select name="salary">
            <option value="1">
              < 10000 <option value="2">
              < 25000 <option value="3">
              < 35000 <option value="4">
              < 50000 <option value="5">
              < 100000 <option value="6"> > 1000000
          </select>
        </th>
      </tr>

      <tr>
        <th><label>Other Details </label></th>
        <th> <input type="text" id="img" name="other"></th>
      </tr>

      <tr>
        <th><input type="submit" name="submit" value="update"></th>
        <th><input type="reset" name="reset" value="reset"></th>
      </tr>
    </table>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

</body>
</html>