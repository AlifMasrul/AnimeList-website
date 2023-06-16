<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <Title>DZANIMELIST</Title>
	<link rel="stylesheet" href="CSSProfileView.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $connection = new mysqli($host, $user, $pass, $db);

    if ($connection->connect_error)
    {
        die("Connection failed: " . $connection->connect_error);
    }

    else
    {
        $queryview = "SELECT * From USER WHERE UserID = '".$_SESSION["UserID"]."'";
        $resultQ = $connection->query($queryview);
        ?>

        <?php
            if ($resultQ->num_rows > 0)
            {
                while($row = $resultQ->fetch_assoc())
                {
        ?>
		
		<div class="profile-container">
        <center>
		<br><br>
        <h2 style="color:#84A4FC"> Your Profile </h2>
        <br><br>
		<div class="profile-card">
        <p> <b>ID : </b><?php echo $row["UserID"]; ?> </p>
        <p> <b>Name : </b><?php echo $row["Name"]; ?> </p>
        <p> <b>Gender : </b><?php echo $row["Gender"]; ?> </p>
        <p> <b>Date Of Birth : </b><?php echo $row["Dob"]; ?> </p>
        <p> <b>Nickname : </b><?php echo $row["Nickname"]; ?> </p>
        <p> <b>Hp No : </b><?php echo $row["Hp_No"]; ?> </p>
        <p> <b>Email : </b><?php echo $row["Email"]; ?> </p>
        <p> <b>Social Media : </b><?php echo $row["Social_Media"]; ?> </p>
        <p> <b>Social Media Application : </b><?php echo $row["Social_Media_App"]; ?> </p><br>
        <a style='color:green;' href = "Profile_Edit.php"> To edit your profile </a>
		<br><br>
        <a style='color:blue;' href = "Menu.php"> To go menu page </a>
		</div>

        
        </center>
		</div>

        <?php 
                }
            }
            else
            {
                echo "<center>";
                echo "<h2> Your Profile </h2>";

                echo "You don't have any profile yet";
                echo "<br><br>";
                echo "<a href='Profile_EditForm.php'>Click here to Register your profile</a>";
                echo "</center>";

            }
    }
    $connection->close();
    ?>

</body>
</html>
<?php  
} 
else 
{ 
echo "No session exists or session has expired. Please 
log in again.<br>"; 
echo "<a href=Login_Page.html> Login </a>"; 
} 
?> 
