<html>
    <head>
        <title>Inserir item</title>
        <link rel="stylesheet" href="item.css">
    </head>
    <body>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,800,300" rel="stylesheet" type="text/css" /> 
        <h1>Inserir item:</h1>
        <form id="form_insert_item" action="insert_item.php" method="post">
            <h3>Localização</h3>
            <input type="text" name="localizacao_item"></input><br>
            <h3>Latitude</h3>
            <input type="text" name="latitude_item"></input><br>
            <h3>Longitude</h3>
            <input type="text" name="longitude_item"></input><br>
            <h3 style="display:initial">Descrição</h3>
            <textarea name="descricao_item" id="description"></textarea></input><br>
            <div>
                <button onclick="location.href='main.html'" type="button">Cancelar</button>
                <input type="submit" value="Submeter">
            </div>
        </form>
    </body>
</html>