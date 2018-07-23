<?php
$connect = mysqli_connect("localhost", "root", "root", "TestConstruction");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM Document 
	WHERE description LIKE '%".$search."%'
	OR NumDoc LIKE '%".$search."%' 
	OR Date_Creation LIKE '%".$search."%' 
	";
}
else
{
	$query = "SELECT * FROM Document order by Date_Creation ASC ";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>description</th>
							<th>NumDoc</th>
				            <th colspan="2">Operations</th>
				            
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["description"].'</td>
				<td>'.$row["NumDoc"].'</td>
				 <td align="center"><a href="javascript:edit_id('.$row["idDoc"].')">edit Doc</a></td>
                    
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