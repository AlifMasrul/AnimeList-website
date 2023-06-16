<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> DZAnimelist </title>
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
    <h2> Your Profile </h2>
    <form action="Profile_Edit.php" method="POST">
    
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZAnimelist";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn -> connect_error){
        die("ConnectionFailed: " . $conn->connect_error);
    }

    else
    {
        $queryview = "SELECT * FROM USER";
        $resultQ = $conn->query($queryview);
    ?>

    <?php
        if ($resultQ->num_rows > 0)
        {
            while($row = $resultQ->fetch_assoc())
            {

            
        ?>

        <tr>
            <td> <?php echo $row["ProfileID"]; ?> </td>
            <td> <?php echo $row["Gender"]; ?> </td>
            <td> <?php echo $row["Date_Of_Birth"]; ?> </td>
            <td> <?php echo $row["NickName"]; ?> </td>
            <td> <?php echo $row["HP_NO"]; ?> </td>
            <td> <?php echo $row["Email"]; ?> </td>
            <td> <?php echo $row["Social_Media"]; ?> </td>
        </tr>
        <?php
            }
        }
        else{
            echo "<tr><td colspan='8'> NO data selected</td></tr>";
        }

    }
    $conn->close();
    ?>

</table>
<br>
    <p>Click <a href="Profile_Edit.php"> here </a> to edit profile</p>
</form>
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
