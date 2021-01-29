<?php 
include("../utils/conection.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 


function Mask($mask,$str){

  $str = str_replace(" ","",$str);

  for($i=0;$i<strlen($str);$i++){
      $mask[strpos($mask,"#")] = $str[$i];
  }

  return $mask;

}
?> 

<!DOCTYPE html> 
  <html> 
    <head> 
      <link rel="stylesheet" type="text/css" href="/public/css/lista.css" />
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Lista de Úsuarios</title> 
    </head> 
    <body>
    <div class="content">
      <table border="1" id="customers" class="rTable">
      <thead>
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
      </thead>

        <?php while($dado = $con->fetch_array()) { ?> 

      <tbody>
        <tr> 
          <td><?php echo $dado['id']; ?></td>
          <td><?php echo $dado['name']; ?></td> 
          <td><?php echo $dado['email']; ?></td>
          <td><?php echo Mask("(##)#####-####", $dado['telefone']); ?></td> 
          <td><?php echo Mask("###.###.###-##", $dado['cpf']); ?></td> 
          <td><?php echo $dado['estadocivil']; ?></td> 
          <td><?php echo $dado['genero']; ?></td> 
          <td><?php echo $dado['observacao']; ?></td> 

          <td> 
            <a href="edit_user.php?id=<?php echo $dado['id']; ?>">Editar |</a> 
            <a onClick="return confirmacao(<?php echo $dado["id"]; ?>);" href="#">Excluir |</button> 
            <a href="/index.html"> Home </a>
          </td> 
        </tr> 
      </tbody>

        <?php } ?> 
      </table>
      </div>
    </body> 
    <script>
    function confirmacao(id)
    {
      if(window.confirm('deseja apagar?')){
        window.location.href = "/src/Listar/delet_user.php?id="+id;

      }
    }
     </script>
</html>
