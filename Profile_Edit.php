<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html>
<head>

    <title> DZAnimeList</title>
	<link rel="stylesheet" href="CSSProfileEdit.css">
    <link rel="icon" type="image/x-icon" href="icon.png">

</head>
<?php

    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } else 
    {
        $queryGet = "SELECT * FROM USER WHERE UserID = '".$_SESSION["UserID"]."' ";
        $resultGet = $conn->query($queryGet);

        if ($resultGet->num_rows > 0)
        {
            while ($row = $resultGet->fetch_assoc()){
?>
<body>
	<center>
    <h2> Edit Your Profile </h2>
    <h3> Enter Your Detail :</h3>
    <h4>All <span style="color: red;">*</span> are required</h4>
	</center>
    <form name="EditProfile" action="ProfileReg.php" method="POST">  
        
        User ID: <?php echo $row["UserID"] ?>
        <br><br>

        Name : <span style="color: red;">* </span><input type="text" name="UserName" size="60" value="<?php echo $row["Name"]; ?>" maxlength="55" required autofocus>
        <br><br>

        Gender : 
                 <?php $Gender = $row["Gender"]; ?>
                 <span style="color: red;">* </span> 
                 <input type="radio" name="gender" value="male"<?php if($Gender == "male") echo ("checked")?> required> Male
                 <input type="radio" name="gender" value="female"<?php if($Gender == "female") echo ("checked")?> required> Female
        <br><br>

        Date of Birth : <span style="color: red;">* </span> <input type="date" name="umur" value="<?php echo $row["Dob"]; ?>">
        <br><br>

        NickName : <input type="text" name="nickname" size="20" value="<?php echo $row["Nickname"]; ?>" maxlength="15">
        <br><br>

        HP No (with - ) : <input type="tel" name="phoneNo" size="12" value="<?php echo $row["Hp_No"]; ?>" maxlength="11">
        <br><br>

        Email : <input type="email" name="email" value="<?php echo $row["Email"]; ?>">
        <br><br>

        Social Media Accounts (Please include '@') : <input type="text" name="SocMed"  value="<?php echo $row["Social_Media"]; ?>">
        <?php $Social_Media_App = $row["Social_Media_App"]; ?> 
        <select name="SocMedApp">
            <option value="Twitter" <?php if ($Social_Media_App == "Twitter") echo "Selected"?>> Twitter </option>
            <option value="Instagram" <?php if ($Social_Media_App == "Instagram") echo "Selected"?>> Instagram </option>
        </select>
        <br><br>

        <input type="hidden" name="UserId" value="<?php echo $row["UserID"]; ?>" required>
        <input type="submit" value="Submit">
        <input type="reset" value="Re-enter">
        <?php 
            }
        } else {
            echo "<p colspan='8' style='color:red'; >No data selected</p>";
        }
    }
        $conn->close();
        ?>

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