<?php
include_once '../../config/config.php';
include '../../config/session.php';
include '../../log.php';
write_log("Update Document by EMP with id : ".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
if(isset($_GET['editEmp_id']))
{
    $sql_query="SELECT * FROM Employe WHERE idEmp=".$_GET['editEmp_id'];
    $result_set=mysqli_query($db,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set);
}

if(isset($_POST['btn-update']))
{
    // variables for input data
    $first_name = $_POST['Nom'];
    $last_name = $_POST['Prenom'];
    $cin = $_POST['cin'];
    // variables for input data
    echo "<script>console.log('Modifier avec success de emp a ".$cin."  ".$last_name."  ".$first_name." ');</script>";

    // sql query for update data into database
    $date = date('Y-m-d\TH:i:sP', time());


    echo "<script>console.log('Modifier avec success de emp a ".$date." ');</script>";
    write_log("Modifier avec success de emp a ".$date,"/Applications/MAMP/htdocs/Batire/log.log");

//UPDATE Employe SET Nom= '$first_name', Prenom= '$last_name', cin= '1234' WHERE idEmp = 1
  //  $sql_query = "UPDATE Document SET description='$first_name',etat='$last_name',Date_Mod='$date' WHERE idDoc=".$_GET['editDoc_id'];

    $sql_query2 = "UPDATE Employe SET Nom= '$first_name',  Prenom= '$last_name' ,cin= '$cin' WHERE idEmp= ".$_GET['editEmp_id'];
    // sql query for update data into database

    // sql query execution function
    if(mysqli_query($db,$sql_query2))
    {

        ?>
        <script type="text/javascript">
            alert('Modifier avec Success');
            window.location.href='../Employe/listEmp.php';
        </script>
        <?php
    }
    else
    {
        ?>
        <script type="text/javascript">
            alert('erreur au niveau de modification ');
        </script>
        <?php
    }
    // sql query execution function
}
if(isset($_POST['btn-cancel']))
{
    header("Location: listHistorique.php");
}
?>
<html>
<head>
    <title>Modification l'etat de Dossier</title>
    <link rel="stylesheet" href="../Css/Style.css" type="text/css" />
</head>
<body>
<center>

    <div id="header">
        <div id="content">
            <label>Modification l'etat de Dossier</label>
        </div>
    </div>

    <div id="body">
        <div id="content">
            <form method="post">
                <table align="center">
                    <tr>
                        <td>
                            <input placeholder="Prenom" name="Prenom" required="" value="<?php echo $fetched_row['Prenom']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input placeholder="Nom" name="Nom" required="" value="<?php echo $fetched_row['Nom']; ?>"/>
                        </td>
                    </tr>
                    <tr>
                        <center>
                            <td>
                            <input type="text" name="cin" placeholder="Carte identité" value="<?php echo $fetched_row['cin']; ?>" required=""/>
                            </td>
                        </center>
                    </tr>
                    <tr>
                        <td>
                            <button type="submit" name="btn-update"><strong>Modifier</strong></button>
                            <button type="submit" name="btn-cancel"><strong>Annuler</strong></button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</center>
</body>
</html>