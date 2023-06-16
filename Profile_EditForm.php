<?php  
session_start(); 
 
//check if session exists 
if(isset($_SESSION["UserID"])) { 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> DZAnimeList</title>
    <link rel="icon" type="image/x-icon" href="icon.png">
</head>
<body>
    <h2> Edit Your Profile </h2>
    <h3> Enter Your Detail :</h3>
    <h4>All <span style="color: red;">*</span> are required</h4>
    <form name="EditProfile" action="ProfileReg.php" method="POST">  
        Name : <span style="color: red;">* </span><input type="text" name="UserName" size="60" maxlength="55" required autofocus>
        <br><br>
        Gender : <span style="color: red;">* </span> <input type="radio" name="Gender" value="male"> Male
                 <input type="radio" name="Gender" value="female"> Female
        <br><br>
        Date of Birth : <span style="color: red;">* </span> <input type="text" name="umur" >
        <br><br>
        NickName : <input type="text" name="nickname" size="20" maxlength="15">
        <br><br>
        HP No (with - ) : <input type="tel" name="phoneNo" size="12" maxlength="11">
        <br><br>
        Email : <input type="email" name="email">
        <br><br>
        Social Media Accounts : <input type="text" name="SocMed" value="@">
        <select name="SocMedApp">
            <option value="twitter"> Twitter </option>
            <option value="Instagram"> Instagram </option>
        </select>
        <br><br>

        <input type="submit" value="Submit">
        <input type="reset" value="Re-enter">

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