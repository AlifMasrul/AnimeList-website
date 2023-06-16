<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
        <title>DZANIMELIST</title>
        <link rel="icon" type="image/x-icon" href="icon.png">

</head>
<?php
$AnimeId = $_POST["AnimeId"];
$Title = $_POST["title"];
$Genre = $_POST["genre"];
$Rating = $_POST["rating"];
$Image = $_POST["ImageUrl"];

?>
<center>
<body style= "background-color: #1D2023">
<br><br>
    <h2 style="color:#84A4FC">Update Anime Data</h2>
    
    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error){
        die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $queryUpdate = "UPDATE ANIME SET Title = '".$Title."', Genre = '".$Genre."', rating = '".$Rating."', image = '".$Image."' WHERE AnimeID = '".$AnimeId."'";
        If ($conn->query($queryUpdate) === TRUE){
            echo "<p style='color:green;'> Record has been updated into database !</p>";
            echo "<p style='color:#84A4FC;'> Click <a style='color:green;' href='Anime_View.php'> here </a> to view Anime list </p>";
        } else {
            echo "<p style='color=red;'>Query problems! : " . $conn->error . "</p>";
        }
        
    }
    $conn->close();
    ?>
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