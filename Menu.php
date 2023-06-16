<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>
        <title> DZANIMELIST </title>
		<link rel="stylesheet" href="CSSMenu.css">
        <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<center>
<body>
	<br><br><br>
    <h2>WELCOME, Hi <?php echo $_SESSION["UserID"];?></h2>
    <p>Choose Your menu : </p>
    <?php
        if ($_SESSION["User_Type"] == "admin"){
            ?>
		<section class="container">
        <a href = "Admin_BlockPage.php"> BLOCK User</a><br><br> 
        <a href = "Admin_ActivatePage.php"> ACTIVATE User</a><br><br>
        <a href = "All_UserView.php"> VIEW ALL User</a><br><br>
		<a href = "Search_Anime.php"> VIEW ALL Anime Data</a><br><br>
        <a href="Logout_Page.php" class="logout">Logout</a><br>
		</section>

        <?php
        }
        else{
                ?>
				<section class="container">
                <a href = "Anime_View.php"> View Anime List </a><br><br>

        
                <a href = "New_ProfileView.php"> View Your Profile List </a><br><br>
                
                <a href="Logout_Page.php" class="logout">Logout</a>
				</section>
                <?php
        }
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
