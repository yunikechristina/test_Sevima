<?php
session_start();
if(isset($_SESSION['name'])){ 
    if(isset($_SESSION['logout'])){
        session_unset();

        // destroy the session
        session_destroy();
        header("Location:login.php");
    }    
?>

<html>
    <h1>WELCOME</h1>
    <form action="#" method="POST">
        <input type="submit" name="logout" class="fadeIn fourth" value="Log Out">
    </form>
</html>
<?php }
?>
