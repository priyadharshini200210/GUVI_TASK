<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "loginregister");

// IF
if(isset($_POST["action"])){
  if($_POST["action"] == "register"){
    register();
  }
  else if($_POST["action"] == "login"){
    login();
  }
}

// REGISTER
function register(){
  global $conn;

  $name = $_POST["name"];
  $dob = $_POST["dob"];
  $email = $_POST["email"];
  $password = $_POST["password"];
  $c_password = $_POST["c_password"];

  if(empty($name) || empty($dob) || empty($email) || empty($password) || empty($c_password)){
    echo "Please Fill Out The Form!";
    exit;
  }

  if(strlen($name)<3){
    echo "Name must contain atleast 3 characters";
    exit;
  }
  else if(empty($dob)){
    echo "Enter Your Date of Birth";
    exit;
  }
  else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Enter valid Email";
    exit;
  }
  else if(strlen($password)<5){
    echo "Password must contain atleast 5 characters";
    exit;
  }
  else if($password!=$c_password){
    echo "Name must contain atleast 3 characters";
    exit;
  }
  else{
  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");
  if(mysqli_num_rows($user) > 0){
    echo "Username Has Already Taken";
    exit;
  }
  // $conn = new mysqli($)
  $id='';
  $stmt = mysqli_prepare($conn,"INSERT INTO tb_user VALUES(?,?,?,?,?,?)");
  mysqli_stmt_bind_param($stmt,"ssssss",$id,$name, $dob, $email,$password,$c_password);
  // mysqli_query($conn, $stmt);
  // $stmt->execute();
  if(mysqli_stmt_execute($stmt)){
    echo "Registration Successful";
  }else{
    echo "Error:".mysqli_error($conn);
  }
  // $query->close();
  // $conn->close();
  mysqli_stmt_close($stmt);

}
mysqli_close($conn);
}

// LOGIN
function login(){
  global $conn;

 
  $email = $_POST["email"];
  $password = $_POST["password"];

  if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    echo "Enter valid Email";
    exit;
  }
  else if(strlen($password)<5){
    echo "Password must contain atleast 5 characters";
    exit;
  }

  $user = mysqli_query($conn, "SELECT * FROM tb_user WHERE email = '$email'");

  if(mysqli_num_rows($user) > 0){

    $row = mysqli_fetch_assoc($user);

    if($password == $row['password']){
      echo "Login Successful";
      $_SESSION["login"] = true;
      $_SESSION["id"] = $row["id"];
      // handleSubmit();
      // require 'condition.php';
    }
    else{
      echo "Wrong Password";
      exit;
    }
  }
  else{
    echo "User Not Registered";
    exit;
  }
}
?>
