<?php
include '../config/config.php';
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
    if(mysqli_num_rows($result)>0) {
        session_start();
        $_SESSION['login_user'] = $myusername;
        $_SESSION["site"] = "1" ;
        header("location: welcome1.php");
    }else if (mysqli_num_rows($result)<=0){
     //test si les donne recuperer se sont des donnees de Client
        $sql = "SELECT idclient FROM Client WHERE cin = '$myusername' and pass = '$mypassword'";
        $result = mysqli_query($db,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        if(mysqli_num_rows($result)>0){
            session_start();
            $_SESSION['login_user'] = $myusername;
            $_SESSION["site"] = "2" ;
            header("location: welcome2.php");
        }else{
            $sql = "SELECT idEmp FROM Employe WHERE cin = '$myusername' and pass = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['active'];
            if(mysqli_num_rows($result)>0){
                session_start();
                $_SESSION['login_user'] = $myusername;
                $_SESSION["site"] = "3" ;
                header("location: welcome3.php");
            }else{
                $error = "Your Login Name or Password is invalid";
            }
        }
    }
 }
}else{
    header("location: welcome".$site.".php");
}
?>
<html>
<head>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body >
<center>
<div >
    <div >
        <div class="container"><b>Login</b>

        <div id="login-form">

            <form action = "" method = "post" id="login-form"  role="form" style="display: block " >
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                        <input type = "text" name = "username"   placeholder="Numero carte Cin" class = "form-control"  />
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                        <input type = "password" name = "password" placeholder="Mots de Passe" class = "form-control" />
                    </div>
                </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary"  value = " Submit ">login</button><br />
                    </div>


            </form>

            <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>

        </div>
        <h5><a href="register.php">Register</a></h5>
    </div>
    </div>
</div>
</center>
</body>
</html>