<?php
 
/* Valores recebidos do formulário  */
$nome = $_POST['nome']; 
$email = $_POST['email'];
$telefone= $_POST['telefone'];
$cpf=  $_POST['cpf'];
$estadoCivil =  $_POST['estadocivil'];
$genero = $_POST['genero'];
$observacao  = $_POST['observacao'];
$erro = 0;

if($email == 'email') {
    if(!preg_match("/^([[:alnum:]_.-]){3,}@([[:lower:][:digit:]_.-]{3,})(.[[:lower:]]{2,3})(.[[:lower:]]{2})?$/", $valor)) {
        $erro  =  1;
    }

} 

	/* SENÃO HOUVER NENHUM ERRO, REALIZADO A GRAVAÇÃO NO BANCO DE DADOS */
	if($erro == 0) {
		$conn = new mysqli('localhost', 'root', '');
		if ($conn->connect_error) {
			die('Falha ao estabelecer uma conexão: '.$conn->connect_error);
		} else {
			/* 
			VERIFICO SE EXISTE UM BANCO DE DADOS.
			CASO NÃO TENHA O BANCO DE DADOS, EU O CRIO.
			*/
			if(!$conn->select_db('users')) {
				$conn->query('CREATE DATABASE IF NOT EXISTS users;');
				$conn->select_db('users');
			}
			
			/* 
			FAÇO O MESMO COM A TABELA 
			OBS: É POSSÍVEL CRIAR DE FORMA AUTOMÁTICA E BASEADO NO FORMULÁRIO, 
			MAS ISSO EU DEIXAREI PARA FAZER EM OUTRAS POSTAGEM COM JQUERY
			*/
			
			$tabela = $conn->query('SHOW TABLES LIKE \'user_data\'');
			if($tabela->num_rows == 0) {
				$conn->query('CREATE table user_data(id INT(11) AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefone VARCHAR(255), cpf VARCHAR(255), estadocivil VARCHAR(255) NOT NULL, genero VARCHAR(10) NOT NULL, observacao VARCHAR(255) NOT NULL, PRIMARY KEY (id));');
			}
			
			$sql = "INSERT INTO user_data(name, email, telefone, cpf, estadocivil, genero, observacao ) VALUES('$nome', '$email' , '$telefone', '$cpf' , '$estadoCivil' , '$genero' ,'$observacao')";

			if ($conn->query($sql) === TRUE) {
				echo "New record created successfully";
			  } else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			  }
			  
          //  echo $nome;
          //  echo $email; 
          //  echo $cpf ; 
          //  echo $estadoCivil ; 
          //  echo $genero ;
          //  echo  $observacao ;
            /* SE TUDO ESTIVER OK, REDIRECIONO PARA UMA PÁGINA DE SUCESSO */
            header('location: sucesso.php');
            
        }
    }


?>