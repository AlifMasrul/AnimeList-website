<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">
    <?php 
    $Title = $_POST ["title"];
    $Genre = $_POST ["genre"];
    $Rating = $_POST ["rating"];
    $Url = $_POST ["imageUrl"];
    ?>
<head>
    <title> DZANIMELIST </title>
	<link rel="stylesheet" href="CSSAnimeReg.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
    <center>
    <h1>Anime Details </h1>

    <p><b>Title: </b> <?php echo $Title; ?></p>

    <p><b>Genre: </b> <?php echo $Genre; ?></p>

    <p><b>Rating: </b> <?php echo $Rating; ?></p>

    <p><b>Image URL: </b> <br><br> <img src="<?php echo $Url; ?>" width="250" length="250"></p>


    <?php 
    $host= "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli ($host, $user, $pass, $db);

    if ($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }
    else{
        $queryInsert = "Insert into ANIME(Title, Genre, Rating, Image, UserID)
        VALUES ('".$Title."', '".$Genre."', '".$Rating."', '".$Url."', '".$_SESSION["UserID"]."' )";

        if ($conn->query($queryInsert) === TRUE) {
            echo "<p style='color:green;'> <i>Success insert record</i> </p>";
        }else {
            echo "<p style='color:red;'> Connection error".$conn->error."</p>";
        }
    }
    $conn->close();
    ?>
    <p> Click <a href="Anime_View.php"> here </a> to view Anime List</p>
    
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