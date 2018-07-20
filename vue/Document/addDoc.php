<?php
require('../../vue/template.php');
?>
<script type="text/javascript">
    function Verifcin(input) {
        if (input.value.length == 0) {

            alert('Vous devez saisir le champ Nom : ! ');
            input.focus();

        }

        if (input.value.length < 8) {
            alert('Vous ne pouvez pas saisir moins de 8 chiffres.! ');
            input.focus();
        }

        if (input.value.length > 8) {
            alert('Vous ne pouvez pas saisir plus de de 8 chiffres.! ');
            input.focus();
        }
    }
</script>

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
                        <td>
                            <input type="number" placeholder="Numéro de dossier" name="num" required="" "/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="cin" onchange="yesnoCheck(this);">
                                <option value="0" >Selectionné une seul ou multiple carte identité</option>
                                <option value="1" >un seul carte identite</option>
                                <option value="2">deux carte identite</option>
                                <option value="3">trois carte identite</option>
                                <option value="4">quatre carte identite</option>
                                <option value="5">cinq carte identite </option>
                                <option value="6">six carte identite</option>
                            </select>
                            </br>
                            <div id="ifYes1" style="display: none;">
                                <label for="car1">Carte identité 1 : </label>
                                <input type="number" placeholder="Carte indentité 1" id="car1" name="car1" onblur="Verifcin(this)"/><br />
                            </div>
                            <div id="ifYes2" style="display: none;">
                                <label for="car2">Carte identité 2 : </label>
                                <input type="number" placeholder="Carte indentité 2" id="car2" name="car2" onblur="Verifcin(this)"/><br />
                            </div>
                            <div id="ifYes3" style="display: none;">
                                <label for="car3">Carte identité 3 : </label>
                                <input type="number" placeholder="Carte indentité 3" id="car3" name="car3" onblur="Verifcin(this)"/><br />
                            </div>
                            <div id="ifYes4" style="display: none;">
                                <label for="car4">Carte identité 4 : </label>
                                <input type="number" placeholder="Carte indentité 4" id="car4" name="car4" onblur="Verifcin(this)"/><br />
                            </div>
                            <div id="ifYes5" style="display: none;">
                                <label for="car5">Carte identité 5 : </label>
                                <input type="number" placeholder="Carte indentité 5" id="car5" name="car5" onblur="Verifcin(this)"/><br />
                            </div>
                            <div id="ifYes6" style="display: none;">
                                <label for="car6">Carte identité 6 : </label>
                                <input type="number" placeholder="Carte indentité 6" id="car6" name="car6" onblur="Verifcin(this)"/><br />
                            </div>
                            <script type="text/javascript">
                                function yesnoCheck(that) {
                                    if (that.value == "0") {
                                        document.getElementById("ifYes1").style.display = "none";
                                        document.getElementById("ifYes1").style.display = "none";
                                        document.getElementById("ifYes1").style.display = "none";
                                        document.getElementById("ifYes1").style.display = "none";
                                        document.getElementById("ifYes1").style.display = "none";
                                        document.getElementById("ifYes1").style.display = "none";
                                    } else if (that.value == "1"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "none";
                                        document.getElementById("ifYes3").style.display = "none";
                                        document.getElementById("ifYes4").style.display = "none";
                                        document.getElementById("ifYes5").style.display = "none";
                                        document.getElementById("ifYes6").style.display = "none";
                                    } else if (that.value == "2"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "block";
                                        document.getElementById("ifYes3").style.display = "none";
                                        document.getElementById("ifYes4").style.display = "none";
                                        document.getElementById("ifYes5").style.display = "none";
                                        document.getElementById("ifYes6").style.display = "none";
                                    } else if (that.value == "3"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "block";
                                        document.getElementById("ifYes3").style.display = "block";
                                        document.getElementById("ifYes4").style.display = "none";
                                        document.getElementById("ifYes5").style.display = "none";
                                        document.getElementById("ifYes6").style.display = "none";
                                    } else if (that.value == "4"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "block";
                                        document.getElementById("ifYes3").style.display = "block";
                                        document.getElementById("ifYes4").style.display = "block";
                                        document.getElementById("ifYes5").style.display = "none";
                                        document.getElementById("ifYes6").style.display = "none";
                                    } else if (that.value == "5"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "block";
                                        document.getElementById("ifYes3").style.display = "block";
                                        document.getElementById("ifYes4").style.display = "block";
                                        document.getElementById("ifYes5").style.display = "block";
                                        document.getElementById("ifYes6").style.display = "none";
                                    } else if (that.value == "6"){
                                        document.getElementById("ifYes1").style.display = "block";
                                        document.getElementById("ifYes2").style.display = "block";
                                        document.getElementById("ifYes3").style.display = "block";
                                        document.getElementById("ifYes4").style.display = "block";
                                        document.getElementById("ifYes5").style.display = "block";
                                        document.getElementById("ifYes6").style.display = "block";
                                    }
                                }
                            </script>
                        </td>
                    </tr>

                    <tr>
                        <center>
                        <td>
                            <select name="etat"  style="margin-left: 150px;">
                                <option value="1">en attende</option>
                                <option value="2">en traitement</option>
                                <option value="3">Termine  avec succée</option>
                                <option value="4">Dossie avec probleme</option>
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
include '../../log.php';
write_log("Add Document by ".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
echo "<script>console.log('".$_SESSION['idEmp'] ."');</script>";

if(isset($_POST['btn-save']))
{

    // variables for input data
    $desc = $_POST['description'];
    $etat = $_POST['etat'];
    $Num = $_POST['num'];
    $ncin = $_POST['cin'];
    $ncin1 = $_POST['car1'];
    $ncin2 = $_POST['car2'];
    $ncin3 = $_POST['car3'];
    $ncin4 = $_POST['car4'];
    $ncin5 = $_POST['car5'];
    $ncin6 = $_POST['car6'];

    $idClient = $_GET['addDoc_id'];
    $idEmploye = $_SESSION['idEmp'];


    echo "<script>console.log('desc ".$desc."');</script>";
    echo "<script>console.log('etat ".$etat."');</script>";
    echo "<script>console.log('idClient ".$idClient."');</script>";
    echo "<script>console.log('id emp ".$idEmploye."');</script>";


    $sql = "INSERT INTO Document ". "(description,etat,idEmp ,NumDoc) VALUES('".$desc."','".$etat."','".$idEmploye."','".$Num."')";

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
        }
        echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc." ');</script>";
        echo "<script>console.log('Ajout avec sin de dossie d id ".$ncin." ');</script>";


        if($ncin==1){
            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
        }else if($ncin==2){
            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql01 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin2."')";
            $retval01 = mysqli_query($db, $sql01);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
        }else if($ncin==3){
            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql01 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin2."')";
            $retval01 = mysqli_query($db, $sql01);
            if (! $retval01){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql03 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin3."')";
            $retval02 = mysqli_query($db, $sql03);
            if (! $retval02){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
        }else if($ncin==4){

            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql01 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin2."')";
            $retval01 = mysqli_query($db, $sql01);
            if (! $retval01){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql03 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin3."')";
            $retval02 = mysqli_query($db, $sql03);
            if (! $retval02){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

            $sql04 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin4."')";
            $retval03 = mysqli_query($db, $sql04);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

        }else if($ncin==5){

            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql01 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin2."')";
            $retval01 = mysqli_query($db, $sql01);
            if (! $retval01){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql03 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin3."')";
            $retval02 = mysqli_query($db, $sql03);
            if (! $retval02){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

            $sql04 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin4."')";
            $retval03 = mysqli_query($db, $sql04);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

            $sql05 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin5."')";
            $retval04 = mysqli_query($db, $sql05);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

        }else if($ncin==6){
            $sql00 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin1."')";
            $retval00 = mysqli_query($db, $sql00);
            if (! $retval00){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql01 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin2."')";
            $retval01 = mysqli_query($db, $sql01);
            if (! $retval01){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql03 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin3."')";
            $retval02 = mysqli_query($db, $sql03);
            if (! $retval02){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

            $sql04 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin4."')";
            $retval03 = mysqli_query($db, $sql04);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }

            $sql05 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin5."')";
            $retval04 = mysqli_query($db, $sql05);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
            $sql06 = "INSERT INTO DocClient ". "(idDoc,idClient) VALUES('".$idDoc."','".$ncin6."')";
            $retval05 = mysqli_query($db, $sql06);
            if (! $retval04){
                echo "<script>console.log('il y a un error au niveau de l ajout ');</script>";
            }else{
                echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
                    " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
            }
        }

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