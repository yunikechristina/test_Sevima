<?php
session_start();
if(isset($_SESSION['name'])){ 
    if(isset($_POST['logout'])){
        session_unset();

        // destroy the session
        session_destroy();
        header("Location:login.php");
    }    
?>

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="style.css" rel="stylesheet">
</head>
<body>
    <div class ="homeApp" style="margin-left:40%;margin-right:30%">
        <h1>WELCOME</h1>
        <form action="#" method="POST">
            <input type="submit" name="logout" class="fadeIn fourth" value="Log Out">
        </form>
    </div>
</body>
</html>
<?php }
?>
