<?php
include_once '../../config/config.php';
include '../../config/session.php' ;
include '../../log.php';
write_log("List Document by".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
?>

<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>List de dossier</title>
    <link rel="stylesheet" href="../Css/Style.css" type="text/css" />
    <script type="text/javascript">
        function edit_id(id)
        {
            if(confirm('vous étes sur d ajouter un document pour ce client ?'))
            {
                window.location.href='update.php?editDoc_id='+id;
            }
        }
    </script>
</head>
<body>
<center>

    <div id="header">
        <div id="content">
            <label>Liste de Dossier</label></div>
    </div>

    <div id="body">
        <div id="content">
            <table align="center">
                <tr>
                    <th colspan="5"><a href="addDoc.php">ajout  d'un document </a></th>
                </tr>

                <th>Description </th>
                <th>Numero de dossier </th>
                <th colspan="2">Operations</th>

                </tr>
                <?php
                $sql_query="SELECT * FROM Document";
                $result_set=mysqli_query($db,$sql_query);
                while($row=mysqli_fetch_row($result_set))
                {
                    ?>
                    <tr>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[7]; ?></td>
                        <td align="center"><a href="javascript:edit_id('<?php echo $row[0]; ?>')">edit Doc</a></td>
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