<?php
       include("../utils/conection.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 

       $var = $_GET["id"];
        echo ("Variável Global GET ID = " . $var);
   
     
			
           $sql = "DELETE FROM user_data WHERE ID =  $var"; 
           $conn = $connection->query($sql);         
        

        header('location: /src/Listar/Lista.php');

?>