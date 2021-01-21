<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sucesso</title>
</head>

<body>
<p>Seu cadastro foi realizado com sucesso. Obrigado</p>
<p>Vamos voltar para a pagina em 3 segundos</p>

<?php
  // dorme por 3 segundos
  sleep(3);
  // acorda
  echo "Obrigado por esperar!";
  sleep(1);
  header('location: /src/Listar/Lista.php');



?>
</body>
</html>