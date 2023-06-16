<?php  
session_start(); 

//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
    <head>
        <title> DZANIMELIST </title>
		<link rel="stylesheet" href="CSSSearchAnime.css">
        <link rel="icon" type="image/x-icon" href="icon.png">
    </head>
    <body>
	<br><br>
        <h2> Anime List </h2>
		<br><br>
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
            if(isset($_POST['search'])) {
                $search = $_POST['search'];
                $queryview = "SELECT * FROM ANIME WHERE Title LIKE '%$search%' OR Genre LIKE '%$search%' OR Rating LIKE '%$search%' OR UserID LIKE '%$search%'";
            } else {
                $queryview = "SELECT * FROM ANIME";
            }

            $resultQ = $conn->query($queryview);
        ?>
        <form method="post">
            <input type="text" name="search" placeholder="Search by any keywords" />
            <button type="submit">Search</button>
        </form>
		<br>
        <table border="2">
            <tr>
                <th> Title </th>
                <th> Genre </th>
                <th> Rating </th>
                <th> Image </th>
                <th> User ID </th>
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
                    echo "<tr><td style='color:red;' colspan='8'> No Anime Found </td></tr>";
                }

            }
            ?>

        </table>
        <?php
        $conn->close();
        ?>
        <br><br><br>
		<center>
		<a href = "Search_Anime.php"> VIEW ALL Anime Data</a><br><br>
		<a href = "Menu.php"> Go To MENU</a><br><br>
		<center>
    </body>
</html>
<?php  
} 
else 
{ 
    echo "No session exists or session has expired. Please log in again.<br>"; 
    echo "<a href=Login_Page.html> Login </a>"; 
} 
?>
