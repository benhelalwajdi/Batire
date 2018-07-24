<?php
include '../config/session.php' ;

$site=$_SESSION["site"] ;
$var = "http://localhost:8888/Batire/vue/welcome" . $site . ".php";

if($site >= 1){
    if($site==3){
        $var = "http://localhost:8888/Batire/vue/welcome" . $site . ".php";
        echo "<script>console.log( '" . $site . "' );</script>";
        header("location : ".$var);
    }else {
        Redirect("http://localhost:8888/Batire/vue/welcome" . $site . ".php", false);
    }
}
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}

?>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title>Welcome Employe </title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"/>
</head>
<body>
<br>
<h1>Welcome Employe </h1>
<a href="Document/addDoc.php">Ajouter un dossier</a></br>
<a href="Document/listDoc.php">List des dossier</a>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>
</html>