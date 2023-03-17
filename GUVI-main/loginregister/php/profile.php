<?php
require 'function.php';
if(isset($_SESSION["id"])){
  $id = $_SESSION["id"];
  $user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $id"));
}
else{
  header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link  href="../css/style.css" rel="stylesheet">
  </head>
  <body>
  <div>
      <h1>About You</h1>
    <?php 
    echo "<h3>Name : </h3>",$user["name"],"<br>"; 
    echo "<h3>Date of birth : </h3>",$user["dob"],"<br>";
    echo "<h3>Email : </h3>",$user["email"],"<br>";
    ?><br>
     <div>
    <button id="button" onclick="document.location='logout.php'">Logout</button>
</div>
  </div>
  </body>
</html>
