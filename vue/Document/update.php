<?php
include_once '../../config/config.php';
include '../../config/session.php';
include '../../log.php';
write_log("Update Document by EMP with id : ".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
if(isset($_GET['editDoc_id']))
{
    $sql_query="SELECT * FROM Document WHERE idDoc=".$_GET['editDoc_id'];
    $result_set=mysqli_query($db,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set);
}

if(isset($_POST['btn-update']))
{
    // variables for input data
    $first_name = $_POST['description'];
    $last_name = $_POST['etat'];
    // variables for input data

    // sql query for update data into database
    $date = date('Y-m-d\TH:i:sP', time());


    echo "<script>console.log('Modifier avec success de dossie a ".$date." ');</script>";
    write_log("Modifier avec success de dossie a ".$date,"/Applications/MAMP/htdocs/Batire/log.log");


    $sql_query = "UPDATE Document SET description='$first_name',etat='$last_name',Date_Mod='$date' WHERE idDoc=".$_GET['editDoc_id'];
    // sql query for update data into database

    // sql query execution function
    if(mysqli_query($db,$sql_query))
    {

        ?>
        <script type="text/javascript">
            alert('Modifier avec Success');
            window.location.href='listDoc.php';
        </script>
        <?php
        $sql1 = "INSERT INTO historique". "(idDoc,idEmp,des)".
            "VALUES('".$_GET['editDoc_id']."','".$_SESSION['idEmp']."','dossie modife')";
        $retval1 = mysqli_query($db, $sql1);

        if (! $retval1){
            echo "<script>console.log('il y a un error au niveau de l ajout de historique');</script>";
            write_log("il y a un error au niveau de l ajout de historique by  ".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
        }else{
            echo "<script>console.log('Ajout avec success de dossie ".
                " dans l historique avec l employe d id  ".$_SESSION['idEmp']." ');</script>";
            write_log("Ajout avec success de dossie ".
                " dans l historique avec l employe d id ".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");

        }

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
    header("Location: listDoc.php");
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
                            <textarea placeholder="Description" name="description" rows="5" cols="40" required=""
                                      style="width: 422px; height: 86px;">
                                <?php echo $fetched_row['description']; ?>
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <center>
                            <td>
                                <select name="etat"  style="margin-left: 150px;">
                                    <option value="1">en attende</option>
                                    <option value="2">en traitement</option>
                                    <option value="3">Termine avec succée</option>
                                    <option value="4">Dossie avec probleme</option>
                                </select>
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