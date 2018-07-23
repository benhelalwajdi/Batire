<?php
include '../config/session.php' ;
include '../config/config.php' ;
$site=$_SESSION["site"] ;
$cin = $_SESSION['login_user'] ;
if($site >= 1){
    if($site==2){
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
    <title>Welcome Client </title>
    <link rel="stylesheet" href="../vue/Css/Style.css" type="text/css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"clientres.php",
                    method:"post",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>

</head>

<body>
<center>
<h1>Welcome Client</h1>

<h2><a href = "logout.php">Sign Out</a></h2>
<div class="container">

    <div id="header">
        <span class="input-group-addon">Recherche</span>
        <input type="text" name="search_text" id="search_text" placeholder="Recherche par le description ou bien par le numero de document" class="form-control" />

    </div> <div class="form-group">
        <div class="input-group">
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both "></div>
<br />

<br />
<br />
<br />
</center>
</body>

</html>
