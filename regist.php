<?php
session_start();
include 'db_connection.php';

if(isset($_SESSION['name'])){
  header("Location:home.php");
}else if(isset($_POST['register'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);

    $conn = OpenCon();

    $sql = "INSERT INTO user (Name, Email, Password)
            VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        header("Location:login.php?register=true");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

}else if(isset($_GET['regist'])){
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
                <h2>Register To INSTAAPP</h2>

                <!-- Login Form -->
                <form action="regist.php" method="POST">
                    <input type="text" id="name" class="fadeIn second" name="name" placeholder="Name">
                    <input type="email" id="Email" class="fadeIn third" name="email" placeholder="Email">
                    <input type="password" name="password" class="fadeIn fourth" placeholder="Password">
                    <input type="submit" name="register" class="fadeIn fourth" value="Sign Up">
                </form>
            </div>
        </div>
    </body>
</html>
<?php
}
?>
