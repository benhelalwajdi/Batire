<?php
include '../config/session.php' ;
$site=$_SESSION["site"] ;
$var = "http://localhost:8888/Batire/vue/welcome" . $site . ".php";
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
        header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }
    exit();
}
Redirect("http://localhost:8888/Batire/vue/welcome" . $site . ".php", false);
?>
<html">

<head>
    <title>Welcome Client </title>
</head>

<body>
<h1>Welcome Client</h1>
<h2><a href = "logout.php">Sign Out</a></h2>
</body>

</html>