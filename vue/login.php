<?php
include '../config/config.php';
session_start();
include('config.php');
session_start();

$user_check = $_SESSION['login_user'];
$site=$_SESSION["site"] ;
if(!isset($_SESSION['login_user'])){
if($_SERVER["REQUEST_METHOD"] == "POST") {
// username and password sent from form

$myusername = mysqli_real_escape_string($db,$_POST['username']);
$mypassword = mysqli_real_escape_string($db,$_POST['password']);


//test si les donne recuperer se sont des donnees de Admin
$sql = "SELECT idAdmin FROM Admin WHERE cin = '$myusername' and pass = '$mypassword'";
$result = mysqli_query($db,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$active = $row['active'];
$count = mysqli_num_rows($result);

//test si les donne recuperer se sont des donnees de Client
$sql2 = "SELECT idclient FROM Client WHERE cin = '$myusername' and pass = '$mypassword'";
$result2 = mysqli_query($db,$sql2);
$row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
$active2 = $row2['active'];
$count2 = mysqli_num_rows($result2);

//test si les donne recuperer se sont des donnees de l'employe
$sql3 = "SELECT idEmp FROM Employe WHERE cin = '$myusername' and pass = '$mypassword'";
$result3 = mysqli_query($db,$sql3);
$row3 = mysqli_fetch_array($result3,MYSQLI_ASSOC);
$active3 = $row3['active'];
$count3 = mysqli_num_rows($result3);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count == 1) {
session_start();
$_SESSION['login_user'] = $myusername;
$_SESSION["site"] = "1" ;
    header("location: welcome1.php");
echo "<script>console.log('Administrateur');</script>";
}else if($count2==1){
session_start();
$_SESSION['login_user'] = $myusername;
$_SESSION["site"] = "2" ;
header("location: welcome2.php");
echo "<script>console.log('Client');</script>";
}else if($count3==1){
session_start();
$_SESSION['login_user'] = $myusername;
$_SESSION["site"] = "3" ;
header("location: welcome3.php");
echo "<script>console.log('Employe');</script>";
}else{
$error = "Your Login Name or Password is invalid";
}
}
}else{
    header("location:welcome".$site.".php");
}
?>
<html>

<head>
    <title>Login Page</title>

    <style type = "text/css">
        body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
        }
        label {
            font-weight:bold;
            width:100px;
            font-size:14px;
        }
        .box {
            border:#666666 solid 1px;
        }
    </style>

</head>

<body bgcolor = "#FFFFFF">

<div align = "center">
    <div style = "width:300px; border: solid 1px #333333; " align = "left">
        <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>

        <div style = "margin:30px">

            <form action = "" method = "post">
                <label>UserName  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                <input type = "submit" value = " Submit "/><br />
            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>

    </div>

</div>

</body>
</html>