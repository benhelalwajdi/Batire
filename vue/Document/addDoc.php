<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Ajouter un dossier </title>
    <link rel="stylesheet" href="../Css/style.css" type="text/css" />
</head>
<body>
<center>

    <div id="header">
        <div id="content">
            <label>Ajouter un dossier </label>
        </div>
    </div>
    <div id="body">
        <div id="content">
            <form method="post" >
                <table align="center">
                    <tr>
                        <td align="center"><a href="listClient.php">Retour vers list de client</a></td>
                    </tr>
                    <tr>
                        <td>
                            <textarea placeholder="Description" name="description" rows="5" cols="40" required=""
                                      style="width: 422px; height: 86px;"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <center>
                        <td>
                            <select name="etat"  style="margin-left: 150px;">
                                <option value="1">en attende</option>
                                <option value="2">en traitement</option>
                                <option value="3">Dossie avec probleme</option>
                            </select>
                        </td>
                        </center>
                    </tr>
                    <tr>
                        <td><button type="submit" name="btn-save"><strong>Ajouter</strong></button></td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

</center>
</body>
<?php
include '../../config/config.php';
include '../../config/session.php';

if(isset($_POST['btn-save']))
{

    // variables for input data
    $desc = $_POST['description'];
    $etat = $_POST['etat'];
    $idClient = $_GET['addDoc_id'];
    $idEmploye = $_SESSION['idEmp'];


    echo "<script>console.log('desc ".$desc."');</script>";
    echo "<script>console.log('etat ".$etat."');</script>";
    echo "<script>console.log('idClient ".$idClient."');</script>";
    echo "<script>console.log('id emp ".$idEmploye."');</script>";

    // variables for input data

    // sql query for inserting data into database
    $sql = "INSERT INTO Document ". "(description,etat,idClient,idEmp)".
            "VALUES('".$desc."','".$etat."','".$idClient."','".$idEmploye."')";
    $retval = mysqli_query($db, $sql);

    if(! $retval ) {
        die('il y a un error au niveau de l ajout ');
        echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
    }else{
        echo "<script>console.log('Ajout avec success de dossie de client d id ".$idClient."');</script>";
        $sql_query="SELECT * FROM Document ORDER BY idDoc DESC LIMIT 0, 1";
        $result_set=mysqli_query($db,$sql_query);
        while($row=mysqli_fetch_row($result_set))
        {
            echo "<script>console.log('".$row[0]."');</script>";
            $idDoc= $row[0];
        }//idDoc 	idEmp 	des
        $sql1 = "INSERT INTO historique". "(idDoc,idEmp,des)".
            "VALUES('".$idDoc."','".$idEmploye."','Ajout de dossie')";
        $retval1 = mysqli_query($db, $sql1);

        if (! $retval1){
            echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
        }else{
            echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                " dans l historique avec l employe d id ".$idEmploye." ');</script>";
        }
    }

    // sql query for inserting data into database

}
?>