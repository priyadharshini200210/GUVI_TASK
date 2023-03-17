<?php
require 'function.php';
if(isset($_SESSION["id"])){
  header("Location: profile.php");
}
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="../css/style.css">
  <script type="text/javascript" src="../js/index.js"></script>
</head>
<body>
<div id="bg"></div>
<form autocomplete="off" action="" method="post">
  <centre><h2>Login</h2></centre>
  <input type="hidden" id="action" value="login">

  <div class="form-field">
    <input type="email" id="email" placeholder="Email / Username" value="" required/>
  </div>
  
  <div class="form-field">
    <input type="password" id="password" placeholder="Password"  value=""  required/>                         </div>
  
  <div class="form-field">
    <button class="btn" type="submit" onclick="submitData();">Log in</button>
  </div>
  <div><p>New User?
    <a href="register.php">Sign Up Here</a></p>
  </div>
</form>
<?php require 'script.php'; ?>
  
</body>
</html>
