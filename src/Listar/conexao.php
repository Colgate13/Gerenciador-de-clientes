<?php
// caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 


$connection = new mysqli("localhost", "root", "", "users");


$consulta = "SELECT * FROM user_data"; 

$con = $connection->query($consulta) or die($mysqli->error); ;

?>