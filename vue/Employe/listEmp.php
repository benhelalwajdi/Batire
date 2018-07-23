<?php
include_once '../../config/config.php';
include '../../config/session.php' ;
include '../../log.php';

require('../../vue/template.php');
write_log("List Document by".$_SESSION['idEmp'],"/Applications/MAMP/htdocs/Batire/log.log");
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Liste des Employe</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container">

    <div id="header">
        <div id="content">
            <label>Liste un Employe </label>
        </div>

    </div> <div class="form-group">
        <a href="addEmp.php">Ajoute d'un Employe</a>
        <br>
        <a href="../welcome1.php">Retour a profile</a>

        <div class="input-group">
            <span class="input-group-addon">Recherche</span>
            <input type="text" name="search_text" id="search_text" placeholder="Recherche par le Nom ou bien par le Carte Identité de l'Employe" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both "></div>
<br />

<br />
<br />
<br />
</body>
</html>


<script>
    function edit_id(id)
    {
        if(confirm('vous étes sur de modifier les coordonnées cette employe ?'))
        {
            window.location.href='update.php?editEmp_id='+id;
        }
    }
    $(document).ready(function(){
        load_data();
        function load_data(query)
        {
            $.ajax({
                url:"fetch.php",
                method:"post",
                data:{query:query},
                success:function(data)
                {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function(){
            var search = $(this).val();
            if(search != '')
            {
                load_data(search);
            }
            else
            {
                load_data();
            }
        });
    });
</script>




