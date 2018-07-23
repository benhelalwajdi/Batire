<?php
require('../../vue/template.php');
?>
    <body>
    <center>
        <div id="header">
            <div id="content">
                <label>Ajouter un Employe </label>
            </div>
        </div>
        <div id="body">
            <div id="content">
                <form method="post" >

                    <table align="center">
                        <tr>
                            <td align="center"><a href="../welcome1.php">Retour vers accueil</a></td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Nom" name="Nom" required=""/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Prenom" name="Prenom" required="" "/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="number" placeholder="Numéro de crate d'identité" name="Cin" required="" "/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="text" placeholder="Mots de passe" name="Pass" required="" "/>
                            </td>
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
write_log("Add Emp by Admin","/Applications/MAMP/htdocs/Batire/log.log");
echo "<script>console.log('".$_SESSION['idEmp'] ."');</script>";

if(isset($_POST['btn-save']))
{

    // variables for input data
    $prenom = $_POST['Prenom'];
    $nom = $_POST['Nom'];
    $cin = $_POST['Cin'];
    $pass = $_POST['Pass'];


    echo "<script>console.log('prenom ".$prenom."');</script>";
    echo "<script>console.log('nom ".$nom."');</script>";
    echo "<script>console.log('cin ".$cin."');</script>";
    echo "<script>console.log('pass ".$pass."');</script>";


    $sql = "INSERT INTO Employe ". "(Prenom,Nom,cin,pass) VALUES('".$prenom."','".$nom."','".$cin."','".$pass."')";
    $retval = mysqli_query($db, $sql);
    if(! $retval ) {
        die('il y a un error au niveau de l ajout  de l empoye');
        echo "<script>console.log('il y a un error au niveau de l ajout l employe');</script>";
        write_log("error whene Admin Add Employe","/Applications/MAMP/htdocs/Batire/log.log");

    }else{
        echo "<script>console.log('Ajout avec success de l employe ');</script>";
        write_log("Admin Add Employe","/Applications/MAMP/htdocs/Batire/log.log");
    }
    // sql query for inserting data into database
}
?>