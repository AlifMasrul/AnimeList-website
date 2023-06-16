<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
    <title> DZANIMELIST </title>
	<link rel="stylesheet" href="CSSAnimeView.css">
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
   

    <h2> Anime List </h2>
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
        $queryview = "SELECT * FROM ANIME ORDER BY Title ASC";
        $resultQ = $conn->query($queryview);
    ?>
    <table border="2">
        <tr>
            
            <th> Title </th>
            <th> Genre </th>
            <th> Rating </th>
            <th> Image </th>
            <th> User </th>

    </tr>

    <?php 
        if ($resultQ->num_rows > 0)
        {
            while($row =$resultQ->fetch_assoc()) 
            {
    ?>
    <tr> 
       
        <td> <?php echo $row["Title"]; ?> </td>
        <td> <?php echo $row["Genre"]; ?> </td>
        <td> <?php echo $row["Rating"]; ?> </td>
        <td> <img src="<?php echo $row["image"]; ?>" width="100" length="100"> </td>
        <td> <?php echo $row["UserID"]; ?> </td>

    </tr>
    <?php
            }
        } 
        else 
        { 
            echo "<tr><td style='color:red;' colspan='8'> You Didn't Upload any Anime </td></tr>";
        }

    }
    ?>

</table>
<?php
$conn->close();
?>
<br><br>
        <p> Click <a href="Anime_Form.php"> here </a> to <b>REGISTER</b> New Anime Details</P>
        <p> Click <a href="Anime_EditView.php"> here </a> to <b>UPDATE</b> Anime Details</P>
        <p> Click <a href="Anime_DeleteView.php"> here </a> to <b>DELETE</b> Anime List</p>
        <p> Click <a href="Menu.php"> here </a> go to <b> MENU</b> page</p>





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
