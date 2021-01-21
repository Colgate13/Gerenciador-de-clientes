<?php
        $var = $_GET["id"];
        echo ("Variável Global GET ID = " . $var);
   
       $conn = new mysqli('localhost', 'root', '', 'users');
		if ($conn->connect_error) {
			die('Falha ao estabelecer uma conexão: '.$conn->connect_error);
		} else {
	        
         /*   $tabela = $conn->query('SHOW TABLES LIKE \'user_data\'');
			if($tabela->num_rows == 0) {
				$conn->query('CREATE table user_data(id INT(11) AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL,cpf VARCHAR(255), estadocivil VARCHAR(255) NOT NULL, genero VARCHAR(10) NOT NULL, observacao VARCHAR(255) NOT NULL, PRIMARY KEY (id));');
			}*/
			
            $sql = "DELETE FROM user_data WHERE ID =  $var"; 
            $conn->query($sql);         
        }

        header('location: /src/Listar/Lista.php');

?>