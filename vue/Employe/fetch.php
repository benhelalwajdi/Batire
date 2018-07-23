<?php
$connect = mysqli_connect("localhost", "root", "root", "TestConstruction");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Employe 
	WHERE Nom LIKE '%".$search."%'
	OR Prenom LIKE '%".$search."%' 
	OR cin LIKE '%".$search."%' 
	";
}
else
{
	$query = "SELECT * FROM Employe order by Nom ASC ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Nom</th>
							<th>Prenom</th>
				            <th>Carte identité</th>
				            
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["Nom"].'</td>
				<td>'.$row["Prenom"].'</td>
				<td>'.$row["cin"].'</td>
				<td align="center"><a href="javascript:edit_id('.$row["idEmp"].')">edit Employe</a></td>
                    
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