<?php
 ob_start();
 session_start();
 if( isset($_SESSION['user'])!="" ){
     header("Location: home.php");
 }
 include_once '../config/config.php';

 $error = false;

 if ( isset($_POST['btn-signup']) ) {

     // clean user inputs to prevent sql injections
     $nom = trim($_POST['nom']);
     $nom = strip_tags($nom);
     $nom = htmlspecialchars($nom);

     $prenom = trim($_POST['prenom']);
     $prenom = strip_tags($prenom);
     $prenom = htmlspecialchars($prenom);

     $phone = trim($_POST['phone']);
     $phone = strip_tags($phone);
     $phone = htmlspecialchars($phone);

     $cin = trim($_POST['cin']);
     $cin = strip_tags($cin);
     $cin = htmlspecialchars($cin);

     $pass = trim($_POST['pass']);
     $pass = strip_tags($pass);
     $pass = htmlspecialchars($pass);

     echo "<script>console.log('nom : ".$nom." prenom : ".$prenom." phone : ".$phone." cin : ".$cin." pass : ".$pass."') </script>";
//echo "<script>console.log('Ajout avec success de dossie d id ".$idDoc.
   //  " dans l DocClient avec l employe d id ".$idEmploye." ');</script>";
//echo "<script>console.log('".$_SESSION['idEmp'] ."');</script>";     // basic name validation
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
         $query = "SELECT cin FROM Client WHERE cin='$cin'";
         $result = mysqli_query($db,$query);
         $count = mysqli_num_rows($result);
         if($count!=0){
             $error = true;
             $cinError = "le cin est utilise si l vous plais contacter le municipalite .";
         }
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

     // if there's no error, continue to signup
     if( !$error ) {
//	cin 	pass 	idDoc 	nom 	prenom 	phone
         $query = "INSERT INTO Client(cin, pass, nom, prenom, phone) VALUES('$cin','$password','$nom','$prenom','$phone')";
         $res = mysqli_query($db,$query);
         if ($res) {
             $errTyp = "success";
             $errMSG = "Successfully registered, you may login now";
             unset($nom);
             unset($cin);
             unset($pass);
             unset($phone);
             unset($prenom);
         } else {
             $errTyp = "danger";
             $errMSG = "Something went wrong, try again later...";
         }
     }
 }
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Coding Cage - Login & Registration System</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    </head>
    <body>

    <div class="container">

        <div id="login-form">
            <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">

                <div class="col-md-12">

                    <div class="form-group">
                        <h2 class="">Sign Up.</h2>
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
                            <input type="text" name="nom" class="form-control" placeholder="Votre Nom" maxlength="50" value="<?php echo $nom ?>" />
                        </div>
                        <span class="text-danger"><?php echo $nomError; ?></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" name="prenom" class="form-control" placeholder="Votre Prenom" maxlength="50" value="<?php echo $prenom ?>" />
                        </div>
                        <span class="text-danger"><?php echo $prenomError; ?></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="text" name="phone" class="form-control" placeholder="Votre numero de telephone" maxlength="50" value="<?php echo $phone ?>" />
                        </div>
                        <span class="text-danger"><?php echo $phoneError; ?></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                            <input type="number" name="cin" class="form-control" placeholder="Votre numero de carte identité" maxlength="40" value="<?php echo $cin ?>" />
                        </div>
                        <span class="text-danger"><?php echo $cinError; ?></span>
                    </div>

                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" name="pass" class="form-control" placeholder="Votre  mots de passe" maxlength="15" />
                        </div>
                        <span class="text-danger"><?php echo $passError; ?></span>
                    </div>

                    <div class="form-group">
                        <hr />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary" name="btn-signup">Sign Up</button>
                    </div>
                    <div class="form-group">
                        <hr />
                    </div>

                    <div class="form-group">
                        <a href="welcome2.php">Sign in Here...</a>
                    </div>

                </div>

            </form>
        </div>

    </div>

    </body>
    </html>
<?php ob_end_flush(); ?>