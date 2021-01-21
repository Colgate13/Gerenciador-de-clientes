<?php 
include("conexao.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 
?> 

<!DOCTYPE html> 
  <html> 
    <head> 
      <meta charset="UTF-8"> 
      <title>Tutorial</title> 
    </head> 
    <body> 
      <table border="1"> 
        <tr> 
          <td>ID</td>
          <td>Nome</td>
          <td>E-mail</td>
          <td>Telefone</td>
          <td>CPF</td>
          <td>Estado Cívil</td>
          <td>Gênero</td>
          <td>Observação</td>
          <td>Ações</td>

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