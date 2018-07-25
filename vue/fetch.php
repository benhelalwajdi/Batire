<?php
$connect = mysqli_connect("localhost", "root", "root", "TestConstruction");
$output = '';
if(isset($_POST["query"]))
{
    // 	idHist 	idDoc 	idEmp 	des
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM historique as h INNER JOIN Employe as e INNER JOIN Document as d ON h.idEmp = e.idEmp and h.idDoc = d.idDoc 
	WHERE h.des LIKE '%".$search."%'
	OR e.Nom LIKE '%".$search."%' 
	OR e.Prenom LIKE '%".$search."%' 
	OR e.cin     LIKE '%".$search."%' 
	";
	//SELECT * FROM historique as h INNER JOIN Employe as e INNER JOIN Document as d ON h.idEmp = e.idEmp and h.idDoc = d.idDoc
}
else
{
	$query = "SELECT * FROM historique order by idHist ASC ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Etat de Document</th>
							<th>Nom de l employe</th>
							<th>Prenom de l employe</th>
							<th>Carte identité de l employe</th>
				            <th>Description</th>
				            
						</tr>';

	$row = mysqli_fetch_array($result);

	$queryEmp = "SELECT * FROM Employe where idEmp =".$row["idEmp"];
    $resultEmp = mysqli_query($connect, $queryEmp);

    $queryDoc = "SELECT * FROM Document where idDoc =".$row["idDoc"];
    $resultDoc = mysqli_query($connect, $queryDoc);


    While ($rowEmp = mysqli_fetch_array($resultEmp)){
        while($rowDoc = mysqli_fetch_array($resultDoc)){
	        if($rowDoc["etat"]==1){
                $et= "en attende";
            }else if($rowDoc["etat"]==2){
                $et= "en Traitement";
            }else if($rowDoc["etat"]== 3){
                $et = "Termine avec succée";
            }else {
                $et = "Dossie avec probleme";
            }
            while($row = mysqli_fetch_array($result)){

		        $output .= '
			    <tr>
				    <td>'.$et.'</td>
				    <td>'.$rowEmp["Nom"].'</td>
				    <td>'.$rowEmp["Prenom"].'</td>
				    <td>'.$rowEmp["cin"].'</td>
				    <td>'.$row["des"].'</td>
			    </tr>
		        ';
	        }
        }
	}
	echo $output ;
}
else
{
	echo 'Document invalide';
}
?>