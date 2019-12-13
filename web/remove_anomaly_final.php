<html>
      <head>
            <title>Remover anomalia</title>
            <link rel="stylesheet" href="item.css">
      </head>
      <body>
      <?php
            $caught = false;
            try {
                  $id = $_REQUEST['id_anomalia'];

                  $host = "db.ist.utl.pt";
                  $user = "ist190334";
                  $password = "123456789";
                  $dbname = $user;

                  $db = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
                  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                  $db->beginTransaction();

                  $sql = "DELETE FROM anomalia WHERE id = $id;";

                  $result = $db->prepare($sql);

                  $result->execute();

                  if($result->rowCount() == 0){
                        $caught = true;
                  }
                  
                  $db->commit();

                  $db = null;
            }
            catch (PDOException $e){
                  $caught = true;
                  $db->rollBack();
            }
            if(!$caught){
                  echo("<h1>Removida anomalia com sucesso!</h1>");
            }else{
                  echo("<h1>A remoção da anomalia falhou.</h1>");
            }
      ?>
       <div>
            <button onclick="location.href='main.html'" type="button" id="home">Home</button>
      </div>
      </body>
</html>