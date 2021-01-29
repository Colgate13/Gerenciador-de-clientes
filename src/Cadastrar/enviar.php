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

				function validaCPF($cpf_this) {
				
					// Extrai somente os números
					$cpf_this = preg_replace( '/[^0-9]/is', '', $cpf_this );
					
					// Verifica se foi informado todos os digitos corretamente
					if (strlen($cpf_this) != 11) {
						return false;
					}

					// Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
					if (preg_match('/(\d)\1{10}/', $cpf_this)) {
						return false;
					}

					// Faz o calculo para validar o CPF
					for ($t = 9; $t < 11; $t++) {
						for ($d = 0, $c = 0; $c < $t; $c++) {
							$d += $cpf_this[$c] * (($t + 1) - $c);
						}
						$d = ((10 * $d) % 11) % 10;
						if ($cpf_this[$c] != $d) {
							return false;
						}
					}
					return true;

				}

			$validar_cpf = validaCPF($cpf);

				if(!$validar_cpf)
				{
					echo "<script>alert('Ocorreu um erro. CPF INVALIDO!');</script>";
					echo "Cade o cpf VALIDO!";
					header('Location: /public/views/index.html');
					exit();
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

						//Primeiro retira os espaços do começo e do final.
						$telefone = trim($telefone);
						//Substitui o ponto por nada
						$telefone = str_replace("(", "", $telefone);
						//Troca o traço por nada
						$telefone = str_replace(")", "", $telefone);
						//Troca o espaço por nada
						$telefone = str_replace(" ", "", $telefone);
						//Troca a barra por nada
						$telefone = str_replace("-", "", $telefone);

			$sql = "INSERT INTO user_data(name, email, telefone, cpf, estadocivil, genero, observacao ) VALUES('$nome', '$email' , '$telefone', '$cpf' , '$estadoCivil' , '$genero' ,'$observacao')";

			if ($connection->query($sql) === TRUE) {
				echo "New record created successfully";
			  } else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			  }
			  
          //  echo $nome;
		  //  echo $email; 
		  //  echo $telefone;
          //  echo $cpf ; 
          //  echo $estadoCivil ; 
          //  echo $genero ;
          //  echo  $observacao ;
            /* SE TUDO ESTIVER OK, REDIRECIONO PARA UMA PÁGINA DE SUCESSO */
			header('location: /src/Listar/Lista.php');
            
        
    


?>