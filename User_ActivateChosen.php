<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
        <?php 
        $UserID = $_POST["UserID"];
        ?>
        <title> DZANIMELIST </title>
        <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<center>
<body style= "background-color: #1D2023">
<br><br>
        <h2 style= "color: #84A4FC"> Blocked User Data </h2>

        <?php

        $host = "localhost";
        $user = "root";
        $pass = "";
        $db = "DZANIMELIST";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error)
        {
            die("Connection failed: " . $conn->connect_error);
        }
        else
        {
            $queryUpdate = "UPDATE USER SET Status = 'Active' WHERE UserID = '".$UserID."'";

            if ($conn->query($queryUpdate) === TRUE)
            {
                echo "<p style='color:green;'>  Record has been updated from database !</p>";
                echo "<p style='color:#84A4FC;'> Click <a style='color:green;' href='Menu.php'> here </a> to go to menu page </p>";
            } 
            else 
            {
                echo "<p style='color:red;'>Query problems! : " . $conn->error . "</p>";
            }
        }
        $conn->close();
        ?>

<?php  
} 
else 
{ 
echo "No session exists or session has expired. Please 
log in again.<br>"; 
echo "<a href=Login_Page.html> Login </a>"; 
} 
?>
</body>
</center>
</html>