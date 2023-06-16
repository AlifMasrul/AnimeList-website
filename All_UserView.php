<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title> All User Profile</title>
	<link rel="stylesheet" href="CSSAllUserView.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
    <table border="2"  width="100%">
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
        $queryview = "SELECT * From USER WHERE User_Type = 'user'";
        $resultQ = $connection->query($queryview);
        ?>
        <center>
		<br><br>
        <h2> All User Profile </h2>

        <tr>
            <th> User ID </th>
            <th> Name </th>
            <th> Gender </th>
            <th> Date Of Birth </th>
            <th> Nickname </th>
            <th> Hp No </th>
            <th> Email </th>
            <th> Social Media </th>
            <th> Social Media App </th>
            <th> Status </th>
        </tr>
        <?php
            if ($resultQ->num_rows > 0)
            {
                while($row = $resultQ->fetch_assoc())
                {
        ?>

        <center>


        <tr>

        <td><?php echo $row["UserID"]; ?> </td>
        <td><?php echo $row["Name"]; ?> </td>
        <td><?php echo $row["Gender"]; ?> </td>
        <td><?php echo $row["Dob"]; ?> </td>
        <td><?php echo $row["Nickname"]; ?> </td>
        <td><?php echo $row["Hp_No"]; ?> </td>
        <td><?php echo $row["Email"]; ?> </td>
        <td><?php echo $row["Social_Media"]; ?> </td>
        <td><?php echo $row["Social_Media_App"]; ?> </td>
        <td><?php echo $row["Status"]; ?> </td>

        </tr>


        
        </center>

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

</table>
<br><br>
       <center><a href = "Menu.php"> Click To here go Menu Page </a><br><br></center>
</center>
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
