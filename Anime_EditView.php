<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
    <title> DZANIMELIST </title>
	<link rel="stylesheet" href="CSSAnimeEditView.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
<br><br>
    <h2> ANIME LIST </h2>
    
	<center>
    <form action="Anime_EditDetails.php" method="POST">
    <table border="2">
        <tr>
            <th> Choose </th>
            <th> Title </th>
            <th> Genre </th>
            <th> Rating </th>
            <th> Image </th>
			
    </tr>

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
        $queryview = "SELECT * FROM ANIME WHERE UserID = '".$_SESSION["UserID"]."'";
        $resultQ = $conn->query($queryview);
    ?>

    <?php 
        if ($resultQ->num_rows > 0)
        {
            while($row =$resultQ->fetch_assoc()) 
            {
    ?>
    <tr> 
        <td> <input type="radio" name="AnimeID" value="<?php echo $row["AnimeID"]; ?>" required> </td>
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
    $conn->close();
    ?>

</table>
<br>
<input type="submit" value="View Selected Record">
</form>
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