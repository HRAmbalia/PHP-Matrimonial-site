<?php
  include 'header.php';
  $host = "localhost";
  $user = "root";
  $pass = "1234";
  $dbi = "matrimony";
  $conn = mysqli_connect($host, $user, $pass, $dbi) or die("Could NOT CoNnEcT" . mysqli_errno($conn));
  $now = time();
  // $apna_user = 17;
  $chat_with = $_GET["chat_with"] ?? NULL;
  session_start();
  $email = $_SESSION["email"];
  if (isset($email)) {
    $query = "SELECT * FROM `record` Where `email` = '$email' ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if ($row) {
      $apna_user = $row['id'];
    } 
    else {
      echo "Wrong Query";
    }
    if ($chat_with) {
      $chatquery = "SELECT * FROM `record` Where `id` = '$chat_with' ";
      $chatresult = mysqli_query($conn, $chatquery);
      $row1 = mysqli_fetch_assoc($chatresult);
      if ($row1) {
        $receiver_user_name = $row1['fname'] . " " . $row1['lname'];
      }
    } 
    else {
      $receiver_user_name = NULL;
    }
  } 
  else {
    header('location:_login.php');
  }
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $text = $_POST["text"];
    $sender_user = $apna_user;
    $receiver_user = $chat_with;
    $send_time = time();
    $query = "INSERT INTO chat (sender_user, receiver_user, text) VALUES ($sender_user, $receiver_user, '$text')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
      echo "Please select your matrimonial partner";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
    * {
      box-sizing: border-box;
    }
    /* Create two equal columns that floats next to each other */
    .users_division {
      float: left;
      width: 30%;
      padding: 10px;
      height: 100%;

    }
    .column2 {
      float: left;
      width: 70%;
      padding: 10px;
      height: 100%;
    }
    .user {
      height: 50px;
      background-color: #fff;
      border: 5px black;
      margin: 15px;
      padding: 5px;
    }
    .message-class {
      background-color: #fff;
      border: 5px black;
      margin: 15px;
      padding: 5px;
    }
    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }
  </style>
</head>

<body>
  <h2>Chat Room of <?php echo $apna_user ?></h2>
  <div class="row">
    <div class="users_division" style="background-color:#aaa;">
      <?php
        $sql = "SELECT id,fname,lname FROM record";
        $all_users = $conn->query($sql);
        if ($all_users->num_rows > 0) {
          while ($user = $all_users->fetch_assoc()) {
            if ($user['id'] != $apna_user) {
      ?>
              <a href="chat.php?chat_with=<?php echo strval($user["id"]) ?>">
                <div class="user">
                  <?php echo " " . $user["fname"] . " " . $user["lname"] . "<br>"; ?>
                </div>
              </a>
      <?php
          }
        }
      }
      ?>
    </div>
    <div class="column2" style="background-color:#bbb;">
      <h2>
        <?php echo $receiver_user_name  ?>
      </h2>
      <?php
        $sql = "SELECT id,send_time,text,sender_user from chat WHERE (sender_user=$apna_user AND receiver_user=$chat_with) OR (sender_user=$chat_with AND receiver_user=$apna_user)";
        $chat = $conn->query($sql);
        if ($chat) {
          while ($message = $chat->fetch_assoc()) {
      ?>
          <div class="message-class" style=" text-align:<?php if ($message["sender_user"] == $apna_user) {
                                                          echo "Right";
                                                        } 
                                                        else {
                                                          echo "Left";
                                                        } ?> ">
            <?php echo $message["text"] . "(" . $message["send_time"] . ")"; ?>
          </div>
      <?php
        }
      }
      ?>
      <form action="chat.php?chat_with=<?php echo $chat_with ?>" method="POST">
        <textarea type="textarea" cols=100 name="text"></textarea>
        <input type="submit" value="send"></input>
      </form>
    </div>
  </div>
  
</body>
</html>