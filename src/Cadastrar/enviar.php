<?php
        include("../utils/conection.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 

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
			//Primeiro retira os espaços do começo e do final.
			$cpf = trim($cpf);
			//Substitui o ponto por nada
			$cpf = str_replace(".", "", $cpf);
			//Troca o traço por nada
			$cpf = str_replace("-", "", $cpf);
			//Troca o espaço por nada
			$cpf = str_replace(" ", "", $cpf);
			//Troca a barra por nada
			$cpf = str_replace("-", "", $cpf);	

			$sql = "INSERT INTO user_data(name, email, telefone, cpf, estadocivil, genero, observacao ) VALUES('$nome', '$email' , '$telefone', '$cpf' , '$estadoCivil' , '$genero' ,'$observacao')";

			if ($connection->query($sql) === TRUE) {
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
			header('location: /src/Listar/Lista.php');
            
        
    


?>