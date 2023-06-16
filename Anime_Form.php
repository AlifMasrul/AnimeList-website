<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>DZANIMELIST</title>
	<link rel="stylesheet" href="CSSAnimeForm.css">
    <link rel="icon" type="image/x-icon" href="icon.png">

</head>
<body>
    <h1> Anime Details </h1>
    <form name="animeForm" action="AnimeReg.php" method="POST">
    Title :<input type="text" name="title" size="35" maxlength="30" autofocus required>
    <br><br>
    Genre :<select name="genre" required>
            <option value="figthing">Figthing</option>
            <option value="adventure">Adventure</option>
            <option value="horror">Horror</option>
            <option value="comedy">comedy</option>
            <option value="romance">Romance</option>
            <option value="mystery">Mystery</option>
            <option value="fantasy">Fantasy</option>
</select>
    <br><br>
    Rating :<input type="number" name="rating" min="1.0" max="5.0" step="0.5">
    <br><br>
    Image(Only JPEG File):<input type="url" name="imageUrl" required>
    <br><br>

    <input type="submit" value="Submit">
    <input type="reset" value="Reset">


    
    
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