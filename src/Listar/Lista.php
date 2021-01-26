<?php 
include("../utils/conection.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 
?> 

<!DOCTYPE html> 
  <html> 
  <link rel="stylesheet" type="text/css" href="/public/css/lista.css" />
    <head> 
      <meta charset="UTF-8"> 
      <title>Tutorial</title> 
    </head> 
    <body> 
      <table border="1" id="customers"> 
        <tr> 
          <th>ID</th>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>CPF</th>
          <th>Estado Cívil</th>
          <th>Gênero</th>
          <th>Observação</th>
          <th>Ações</th>

        </tr> 
        <?php while($dado = $con->fetch_array()) { ?> 
        <tr> 
          <td><?php echo $dado['id']; ?></td>
          <td><?php echo $dado['name']; ?></td> 
          <td><?php echo $dado['email']; ?></td>
          <td><?php echo $dado['telefone']; ?></td> 
          <td><?php echo $dado['cpf']; ?></td> 
          <td><?php echo $dado['estadocivil']; ?></td> 
          <td><?php echo $dado['genero']; ?></td> 
          <td><?php echo $dado['observacao']; ?></td> 

          <td> 
            <a href="edit_user.php?id=<?php echo $dado['id']; ?>">Editar</a> 
            <a href="delet_user.php?id=<?php echo $dado['id']; ?>">Excluir</a> 
          </td> 
        </tr> 
        <?php } ?> 
      </table> 
    </body> 
</html>