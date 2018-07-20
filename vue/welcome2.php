<?php
include '../config/session.php' ;
$site=$_SESSION["site"] ;
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
<html">

<head>
    <title>Welcome Client </title>
    <link rel="stylesheet" href="../vue/Css/Style.css" type="text/css" />


</head>

<body>
<h1>Welcome Client</h1>

<h2><a href = "logout.php">Sign Out</a></h2>
<center>

    <div id="header">
        <div id="content">
            <label>Liste de Client</label></div>
    </div>

    <div id="body">
        <div id="content">
            <table align="center">
                <th>Description de dossier</th>
                <th>Numero de dossier</th>
                <th colspan="2">Etat</th>
                </tr>
                <?php
                $sql_query="SELECT * FROM Document where idDoc = 
                (select idDoc from DocClient where idClient = (select cin from Client ))";
                $result_set=mysqli_query($db,$sql_query);
                while($row=mysqli_fetch_row($result_set))
                {
                    ?>
                    <tr>
                        <td><?php echo $row[1] ?></td>
                        <td align="center"><?php echo $row[7] ?></td>
                        <?php
                            if($row[2]==1){
                                ?>
                                <td align="center">en attente </td>
                        <?php
                            }elseif($row[2]==2){
                                ?>
                                <td align="center" >en traitement </td></td>
                        <?php
                            }elseif($row[2]==3){
                                ?>
                                <td align="center" >termine avec succée  </td></td>
                                <?php
                            }
                            else {
                                ?>
                                <td align="center" >termine avec un problem </td></td>
                                <?php
                            }
                        ?>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

</center>
</body>

</html>