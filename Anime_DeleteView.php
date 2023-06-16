<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
    <title> DZANIMELIST </title>
	<link rel="stylesheet" href="CSSAnimeDeleteView.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<center>
<body>
    <form action="Anime_DeleteChosen.php" method="POST" onsubmit="return confirm('Are you sure to delete this record?')">
<br><br>
    <h2> Wonder Pet List </h2>
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
        $queryview = "SELECT * From ANIME WHERE UserID = '".$_SESSION["UserID"]."'";
        $resultQ = $conn->query($queryview);
    ?>
    <table border="2">
        <tr>
            <th> Choose </th>
            <th> Title </th>
            <th> Genre </th>
            <th> Rating </th>
            <th> Image </th>
    </tr>

    <?php 
        if ($resultQ->num_rows > 0)
        {
            while($row =$resultQ->fetch_assoc()) 
            {
    ?>
    <tr> 
        <td> <input type="radio" name="AnimeId" value="<?php echo $row["AnimeID"]; ?>" required> </td>
        <td> <?php echo $row["Title"]; ?> </td>
        <td> <?php echo $row["Genre"]; ?> </td>
        <td> <?php echo $row["Rating"]; ?> </td>
        <td> <img src="<?php echo $row["image"]; ?>" width="100" length="100"> </td>
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
<input type="submit" value="Delete this record">

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