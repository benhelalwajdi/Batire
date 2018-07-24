<?php
include_once '../config/config.php';
include '../config/session.php';
include '../log.php';
write_log("Update Profile by client with id : ".$_SESSION["id"],"/Applications/MAMP/htdocs/Batire/log.log");

if(isset($_GET['edit_id']))
{
    $sql_query="SELECT * FROM Client WHERE idclient=".$_GET['edit_id'];
    $result_set=mysqli_query($db,$sql_query);
    $fetched_row=mysqli_fetch_array($result_set);
    $user = $_GET['edit_id'];
}

if(isset($_POST['btn-update']))
{
    // variables for input data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $cin = $_POST['cin'];
    $pass = $_POST['pass'];
    $phone = $_POST['phone'];
    // variables for input data

    if (empty($nom)) {
        $error = true;
        $nomError = "le champ de nom est vide .";
    } else if (strlen($nom) < 3) {
        $error = true;
        $nomError = "le nom doit étre plus de 3 caractaire   ";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$nom)) {
        $error = true;
        $nomError = "le doit etre sans des chiffre spéciaux .";
    }
    // basic prenom validation
    if (empty($prenom)) {
        $error = true;
        $prenomError = "le champ de nom est vide .";
    } else if (strlen($prenom) < 3) {
        $error = true;
        $prenomError = "le nom doit étre plus de 3 caractaire   ";
    } else if (!preg_match("/^[a-zA-Z ]+$/",$prenom)) {
        $error = true;
        $prenomError = "le doit etre sans des chiffre spéciaux .";
    }

    //basic Cin validation
    if ( empty($cin) ) {
        $error = true;
        $cinError = "le champ de cin est vide .";
    }elseif (strlen($cin)<8){
        $error = true;
        $phoneError = "le numero de carte identite doit etre avec 8 chiffre.";
    }elseif (!preg_match("/^[0-9]+$/",$cin)) {
        $error = true;
        $cinError = "le doit etre juste des chiffre .";
    }else {
        // check email exist or not
        $query = "SELECT cin FROM Client WHERE cin='$cin' and idclient = '$user'";
        $result = mysqli_query($db,$query);
        $count = mysqli_num_rows($result);

    }
    //basic phone number validation
    if ( empty($phone) ) {
        $error = true;
        $phoneError = "le champ de numero de telephone est vide .";
    } else if(strlen($phone)!=8){
        $error = true ;
        $phoneError = "le numero doit et avec 8 chiffre";
    } else if(!preg_match("/^[0-9]+$/",$phone)) {
        $error = true;
        $cinError = "le doit etre juste des chiffres";
    }
    // password validation
    if (empty($pass)){
        $error = true;
        $passError = "Please enter password.";
    }
    if(strlen($pass) < 6) {
        $error = true;
        $passError = "le mots de passe doits etre plus de 6 characters.";
    }

    // password encrypt using SHA256();
    $password = hash('sha256', $pass);

    // sql query for update data into database
    $date = date('Y-m-d\TH:i:sP', time());
    echo "<script>console.log('Modifier avec success de coordonnée a ".$date." ');</script>";
    write_log("Modifier avec success de coordonnée a ".$date,"/Applications/MAMP/htdocs/Batire/log.log");
    $sql_query2 = "UPDATE Client SET nom='$nom', prenom='$prenom', phone = '$phone', cin= '$cin', pass= '$password'  WHERE idclient=".$_SESSION["id"];
    echo "<script>console.log('UPDATE Client SET nom=".$nom.", prenom=".$prenom.", phone = ".$phone.", cin= ".$cin.", pass= ".$password."  WHERE idclient=".$_GET['edit_id'].";');</script>";
    echo "<script>console.log('idclient=".$_GET['edit_id']."; ".$_GET["edit_id"]."');</script>";

    // sql query for update data into database
/*
+ Options
Textes complets 	idclient 	cin 	pass 	idDoc 	nom 	prenom 	phone*/
    // sql query execution function
    if(mysqli_query($db,$sql_query2))
    {

        ?>
        <script type="text/javascript">
            alert('Modifier avec Success');
            window.location.href='welcome2.php';
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
    header("Location: welcome2.php");
}
?>
<html>
<head>
    <title>Modification l'etat de Dossier</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<center>

    <div id="header">
        <div id="content">
            <label>Modification de coordonnée personel</label>
        </div>
    </div>

    <div id="body">
        <div id="content"> <div id="login-form">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

                    <div class="col-md-12">

                        <div class="form-group">
                            <h2 class="">Modifier de Donnée</h2>
                        </div>

                        <div class="form-group">
                            <hr />
                        </div>

                        <?php
                        if ( isset($errMSG) ) {

                            ?>
                            <div class="form-group">
                                <div class="alert alert-<?php echo ($errTyp=="success") ? "success" : $errTyp; ?>">
                                    <span class="glyphicon glyphicon-info-sign"></span> <?php echo $errMSG; ?>
                                </div>
                            </div>
                            <?php
                        }
                        ?>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="nom" class="form-control" placeholder="Votre Nom" maxlength="50" value="<?php echo $fetched_row['nom']; ?>" />
                            </div>
                            <span class="text-danger"><?php echo $nomError; ?></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                <input type="text" name="prenom" class="form-control" placeholder="Votre Prenom" maxlength="50" value="<?php echo $fetched_row['prenom'];  ?>" />
                            </div>
                            <span class="text-danger"><?php echo $prenomError; ?></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                                <input type="text" name="phone" class="form-control" placeholder="Votre numero de telephone" maxlength="50" value="<?php echo $fetched_row['phone']; ?>" />
                            </div>
                            <span class="text-danger"><?php echo $phoneError; ?></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                <input type="number" name="cin" class="form-control" placeholder="Votre numero de carte identité" maxlength="40" value="<?php echo $fetched_row['cin']; ?>" />
                            </div>
                            <span class="text-danger"><?php echo $cinError; ?></span>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                <input type="password" name="pass" class="form-control" placeholder="Votre  mots de passe" required maxlength="15" />
                            </div>
                            <span class="text-danger"><?php echo $passError; ?></span>
                        </div>

                        <div class="form-group">
                            <hr />
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" name="btn-update">Modifier</button>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary" name="btn-cancel">Annuler</button>
                        </div>
                        <div class="form-group">
                            <hr />
                        </div>

                        <div class="form-group">
                            <a href="welcome2.php">Retour vers mon profile</a>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>

</center>
</body>
</html>

