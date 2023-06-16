<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
    <title> Update Anime Details</title>
	<link rel="stylesheet" href="CSSAnimeEditDetails.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<?php
    $AnimeId = $_POST["AnimeID"];
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else 
    {
        $queryGet = "SELECT * FROM ANIME WHERE AnimeID = '".$AnimeId."' ";
        $resultGet = $conn->query($queryGet);

        if ($resultGet->num_rows > 0)
        {
            while ($row = $resultGet->fetch_assoc()){
?>

<body>
        <center>
		<br><br>
        <h2> Update Anime details: </h2>
        <form name="UpdateForm" action="Anime_EditSave.php" method="POST">

        Anime ID: <?php echo $row["AnimeID"]; ?>
        <br><br>
        <img  src="<?php echo $row["image"]; ?>"  width="100" length="100">
        <br><br>

        Title : <input type="text" name="title" size="20" value="<?php echo $row["Title"]; ?>"maxlength="30" required>
        <br><br>
        Genre :
        <?php $Genre = $row["Genre"]; ?>
        <select name="genre" required>
            <option value="fighting" <?php if ($Genre == "fighting") echo "Selected" ?>> Fighting </option>
            <option value="adventure" <?php if ($Genre == "adventure") echo "Selected" ?>> Adventure </option>
            <option value="horror" <?php if ($Genre == "horror") echo "Selected" ?>> Horror </option>
            <option value="comedy" <?php if ($Genre == "comedy") echo "Selected" ?>> Comedy </option>
            <option value="comedy" <?php if ($Genre == "romance") echo "Selected" ?>> Romance </option>
            <option value="comedy" <?php if ($Genre == "mystery") echo "Selected" ?>> Mystery </option>
            <option value="comedy" <?php if ($Genre == "fantasy") echo "Selected" ?>> Fantasy </option>
        </select>
        <br><br>
        Rating : <input type="number" name="rating" min="1.0"   max="5.0" step="0.5" value="<?php echo $row["Rating"]; ?>" required>
        <br><br>
        Image : <input type="url" name="ImageUrl"  value="<?php echo $row["image"]; ?>" required>
        <br><br>


        <input type="hidden" name="AnimeId" value="<?php echo $row["AnimeID"]; ?>">
        <input type="submit" value="Update New Details">
        <input type="Reset" value="Reset">
        <?php
            }
                } else {
                    echo "<p colspan='8' style='color:red; >No data selected</p>";
                }
    }
            $conn->close();
            ?>
</center>
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
