<center>
<body style="background-color: #1D2023">
</body>

<?php
//these codes is for login process
//check userid & pwd is matched
$userID = $_POST['UserId'];
$UserPass = $_POST['UserPass'];
//declare DB connection variables
$host = "localhost";
$username = "root";
$password = "";
$dbname = "DZANIMELIST"; // please write your DB name
//create connections with DB
$link = mysqli_connect($host, $username, $password, $dbname);
if ($link->connect_error) {
 die("Connection failed: " . $link->connect_error);
}
else
{
//connect successfully
//check userID is exist
$queryCheck = "SELECT * from USER WHERE UserID = '".$userID."' && Status != 'Block' ";
$resultCheck = $link->query($queryCheck);
if ($resultCheck->num_rows == 0) {
echo "<br> <p style='color:red'>User ID does not exists or your account has been block</p><br>";
echo "<p style='color:#84A4FC'>Click <a style='color:#84A4FC' href='Login_Page.html'>here</a> to go login page </p>";
echo "<p style='color:#84A4FC'>Click <a style='color:#84A4FC' href='Register.html'>here</a> to go Register page </p>";
echo "<p style='color:#84A4FC'>Click <a style='color:#84A4FC' href='HomePage.html'>here</a> to go Home page </p>";
}
else
{
 $row = $resultCheck->fetch_assoc();
 if( $row["User_Pass"] == $UserPass ) {
//calling the session_start() is compulsory
 session_start();
 //asign userid value to session useriid
 $_SESSION["UserID"] = $userID ;
$_SESSION["User_Type"] = $row["User_Type"];
//go to menu.php
 header("Location:Menu.php");
 } else {
 echo "<br><p style='color: red'>Wrong password!!! </p><br>";
 echo "<p style='color:#84A4FC'>Click <a style='color:#84A4FC' href='Login_Page.html'> here </a> to login again</p>";
 }
}
}
mysqli_close($link);
?>
</center>