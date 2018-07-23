<?php
include_once '../../config/config.php';
include '../../config/session.php' ;

?>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>List de client</title>
    <link rel="stylesheet" href="../Css/Style.css" type="text/css" />
    <script type="text/javascript">
        function add_id(id)
        {
            if(confirm('vous étes sur d ajouter un document pour ce client ?'))
            {
                window.location.href='addDoc.php?addDoc_id='+id;
            }
        }
    </script>
</head>
<body>
<center>

    <div id="header">
        <div id="content">
            <label>Liste de Client</label></div>
    </div>

    <div id="body">
        <div id="content">
            <table align="center">
                <tr>
                    <th colspan="5"><a href="add_data.php">add data here.</a></th>
                </tr>
                <th>Carte Cin </th>
                <th colspan="2">Operations</th>
                </tr>
                <?php
                $sql_query="SELECT * FROM Client";
                $result_set=mysqli_query($db,$sql_query);
                while($row=mysqli_fetch_row($result_set))
                {
                    ?>
                    <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td align="center"><a href="javascript:add_id('<?php echo $row[0]; ?>')">Ajouter Doc</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

</center>
</body>
</html>