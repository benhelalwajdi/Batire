<?php
include '../config/session.php' ;

$site=$_SESSION["site"] ;
$var = "http://localhost:8888/Batire/vue/welcome" . $site . ".php";

if($site >= 1){
    if($site==1){
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
<html>

<head>
    <title>Welcome Administrateur </title>
</head>

<body>
<h1>Welcome Admin
</h1>
<h3><a href="./Employe/addEmp.php">Ajout d'un employer</a></h3>
<h3><a href="Employe/listEmp.php">liste des employer</a></h3>
<h3><a href="listHistorique.php">Consulter les historique </a></h3>
<h3><a href="DownloadLog.php">telecharger le fichier log</a></h3>
<h><a href = "logout.php">Sign Out</a></h>
</body>
</html>