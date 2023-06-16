<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
    <title> DZANIMELIST </title>
	<link rel="stylesheet" href="CSSAdminActivatePage.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<center>
<body>
    <form action="User_ActivateChosen.php" method="POST" onsubmit="return confirm('Are you sure to activate this user?')">

    <h2> DZANIMELIST User</h2>
    <?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn ->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    else
    {
        $queryview = "SELECT * From USER WHERE Status = 'Block'";
        $resultQ = $conn->query($queryview);
    ?>
    <table border="2">
        <tr>
            <th> Choose </th>
            <th> UserID </th>
            <th> Name </th>
            <th> Gender </th>
            <th> Date Of Birth </th>
            <th> Nickname </th>
            <th> Hp_No </th>
            <th> Email </th>
            <th> Social Media</th>
            <th> Social Media App</th>
            <th> Status</th>
    </tr>

    <?php 
        if ($resultQ->num_rows > 0)
        {
            while($row =$resultQ->fetch_assoc()) 
            {
    ?>
    <tr> 
        <td> <input type="radio" name="UserID" value="<?php echo $row["UserID"]; ?>" required> </td>
        <td> <?php echo $row["UserID"]; ?> </td>
        <td> <?php echo $row["Name"]; ?> </td>
        <td> <?php echo $row["Gender"]; ?> </td>
        <td> <?php echo $row["Dob"]; ?> </td>
        <td> <?php echo $row["Nickname"]; ?> </td>
        <td> <?php echo $row["Hp_No"]; ?> </td>
        <td> <?php echo $row["Email"]; ?> </td>
        <td> <?php echo $row["Social_Media"]; ?> </td>
        <td> <?php echo $row["Social_Media_App"]; ?> </td>
        <td> <?php echo $row["Status"]; ?> </td>
    </tr>
    <?php
            }
        } 
        else 
        { 
            echo "<tr><td colspan='8'> NO data selected </td></tr>";
        }

    }
    ?>

</table>
<?php
$conn->close();
?>
<br>
<input type="submit" value="Activate this user">

</form>
</body>
</center>
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