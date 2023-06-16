<!DOCTYPE html>
<html>
    <?php
    $UserName = $_POST ["Nama"];
    $UserID = $_POST ["UserId"];
    $UserPwd = $_POST ["UserPass"];
    $UserEmail = $_POST["Email"];
    $UserDOB = $_POST["Dob"];
    ?>
<head>
        <title> DZAnime List </title>
        <link rel="icon" type="image/x-icon" href="icon.png">
		 <style>
        body {
            background-color: #1D2023;
            color: #CCD0D8;
            font-family: Arial, sans-serif;
            font-size: 16px;
            line-height: 1.5;
        }
		h1 {
        color: #CCD0D8;
        text-align: center;
        margin-top: 50px;
        }
    
        table {
        margin: 50px auto;
        border-collapse: collapse;
        background-color: #1D2023;
        color: #CCD0D8;
        font-size: 18px;
        width: 50%;
        }
    
        th, td {
        border: 3px solid #1463F3;
        padding: 10px;
        text-align: left;
        }
    
        th {
        background-color: #1463F3;
        color: #CCD0D8;
        text-align: center;
        }
    
        a {
        display: block;
        text-align: center;
        color: #84A4FC;
        margin-top: 50px;
        text-decoration: none;
        transition: color 0.3s ease;
        }
    
        a:hover {
        color: #1463F3;
        }
</style>

</head>
<body>
    <h1> You have succesful register your account! </h1>


    <?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "DZANIMELIST";

    $conn = new mysqli ($host, $user, $pass, $db);

    if ($conn->connect_error){
        die("Connection failed" . $conn->connect_error);
    }
    else{
        $querryInsert = "Insert into USER (Name, UserID, Email,Dob ,User_Pass, User_Type, Status)
        VALUES ('".$UserName."', '".$UserID."','".$UserEmail."' ,'".$UserDOB."','".$UserPwd."', 'user', 'Active')";

        if ($conn->query($querryInsert) === TRUE) {
            echo "<center><p style='color:green;'> Please Log In again</p></center>";
        }
        else{
            echo "<p style='color:red;'> Connection error ".$conn->error. "</p>";
        }

    }
    $conn->close();
    ?>
    <a href = "Login_Page.html"> Login Page </a><br><br>
    
</body>
</html>