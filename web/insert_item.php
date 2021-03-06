<html>
      <head>
            <title>Inserir item</title>
            <link rel="stylesheet" href="item.css">
      </head>
      <body>
      <?php
            $caught = false;
            try {
                  $localizacao = $_REQUEST['localizacao_item'];
                  $latitude = $_REQUEST['latitude_item'];
                  $longitude = $_REQUEST['longitude_item'];
                  $descricao = $_REQUEST['descricao_item'];

                  $host = "db.ist.utl.pt";
                  $user = "ist190334";
                  $password = "123456789";
                  $dbname = $user;

                  $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $db->beginTransaction();
                  
                  $sql = "INSERT into item (id, localizacao, latitude, longitude, descricao) values ( default, ?, ?, ?, ?);";

                  $result = $db->prepare($sql);

                  $result->execute([$localizacao, $latitude, $longitude, $descricao]);

                  $db->commit();

                  $db = null;
            }
            catch (PDOException $e){
                  $caught = true;
                  $db->rollBack();
            }
            if(!$caught){
                  echo("<h1>Inserido item com sucesso!</h1>");
            }else{
                  echo("<h1>A inserção do item falhou.</h1>");
            }
      ?>
      <div>
            <button onclick="location.href='main.html'" type="button" id="home">Home</button>
      </div>
      </body>
</html>