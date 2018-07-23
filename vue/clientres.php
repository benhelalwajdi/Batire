<?php
$connect = mysqli_connect("localhost", "root", "root", "TestConstruction");
$output = '';
include '../config/session.php' ;
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

if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Document where idDoc in 
    (select idDoc from DocClient where idClient = (select cin from Client where cin ='".$cin."' )) and ( description LIKE '%" . $search . "%'
	OR NumDoc LIKE '%" . $search . "%' 
	OR Date_Creation LIKE '%" . $search . "%' 
	)";
}
else
{
	$query = "SELECT * FROM Document where idDoc in 
                (select idDoc from DocClient where idClient = (select cin from Client where cin ='".$cin."' )) order by Date_Creation ASC ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>description</th>
							<th>NumDoc</th>
						    <th>Etat</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
        if($row[2]==1){
            $et ="en attente";
        }elseif($row[2]==2){
            $et ="en traitement";
        }elseif($row[2]==3){
            $et ="termine avec succée";
        }
        else {
            $et ="termine avec un problem";
        }
		$output .= '
			<tr>
				<td>'.$row["description"].'</td>
				<td>'.$row["NumDoc"].'</td>
				<td>'.$et.'</td>
			</tr>
		';
	}
	echo $output ;
}
else
{
	echo 'Document invalide';
}
?>