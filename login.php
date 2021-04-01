<?php
session_start();
include 'db_connection.php';
if(isset($_POST['login'])){
    if(!isset($_POST['email']) || !isset($_POST['password'])){
        echo "<script type='text/javascript'>alert('Please fill correct email and password');</script>";
    }else{
        $email = $_POST['email'];
        $password = 'Bearer'.password_hash($_POST['password'],PASSWORD_DEFAULT);
        $conn = OpenCon();
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $_SESSION['name'] = $row['Name'];
                $_SESSION['user_id'] = $row['Id_User'];
            }
            if(isset($_SESSION['name'])){
                $conn = OpenCon();
                $sql = "UPDATE user SET Last_Login = CURRENT_TIMESTAMP";
                if ($conn->query($sql) === TRUE) {
                    header("Location:home.php");
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            }
        }
        
        
    }
}else if(isset($_SESSION['name'])){
    header("Location:home.php");
}else if(isset($_POST['regist'])){
    header("Location:regist.php");
}

?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet">
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2>Welcome To INSTAAPP</h2>

    <!-- Login Form -->
    <form action="#" method="POST">
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="login">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
      <input type="submit" name="login" class="fadeIn fourth" value="Log In">
      <?php 
        if(!isset($_POST['register'])){
      ?>
      <input type="submit" name="regist" class="fadeIn fourth" value="Sign Up">
      <?php }?>
    </form>

  </div>
</div>
</body>
</html>