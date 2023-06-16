<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>

<!DOCTYPE html>
<html>
<head>
        <title>User List</title>
        <link rel="icon" type="image/x-icon" href="icon.png">


</head>
<?php
$UserID = $_SESSION["UserID"];
$Name = $_POST["UserName"];
$Jantina = $_POST["gender"];
$Dob = $_POST["umur"];
$Nickname = $_POST["nickname"];
$HpNo = $_POST["phoneNo"];
$Email = $_POST["email"];
$SocialMedia = $_POST["SocMed"];
$SocialMediaApp = $_POST["SocMedApp"];
?>
<body style= "background-color: #1D2023">
<br><br>
<center>
    <h2 style= "color: #84A4FC">Update Profile Data</h2>
    
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
        $queryUpdate = "UPDATE USER SET  UserID = '".$UserID."', Name = '".$Name."', Gender = '".$Jantina."', Dob = '".$Dob."', Nickname = '".$Nickname."', 
        Hp_No = '".$HpNo."', Email = '".$Email."', Social_Media = '".$SocialMedia."', Social_Media_App = '".$SocialMediaApp."' WHERE UserID = '".$UserID."' ";

        If ($conn->query($queryUpdate) === TRUE){
            echo "<p style='color:green;'> Record has been updated into database !</p>";
            echo "<p style='color:#84A4FC;'> Click <a style='color:green;' href='New_ProfileView.php'> here </a> to view your profile </p>";
        } else {
            echo "<p style='color=red;'>Query problems! : " . $conn->error . "</p>";
        }
        
    }
    $conn->close();
    ?>
</center>
</body>
</html>
<?php
}
else{
    echo "No session exist or session has expired. Please log in again.<br>";
    echo "<a href='Login_Page.html'> Login </a>";
}
?>