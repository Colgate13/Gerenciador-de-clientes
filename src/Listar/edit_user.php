<?php 

$var = $_GET["id"];
$connection = new mysqli('localhost', 'root', '', 'users');
         if ($connection->connect_error) {
                 die('Falha ao estabelecer uma conexão: '.$connection->connect_error);
         } else {
         
  /*   $tabela = $conn->query('SHOW TABLES LIKE \'user_data\'');
                 if($tabela->num_rows == 0) {
                         $conn->query('CREATE table user_data(id INT(11) AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL,cpf VARCHAR(255), estadocivil VARCHAR(255) NOT NULL, genero VARCHAR(10) NOT NULL, observacao VARCHAR(255) NOT NULL, PRIMARY KEY (id));');
                 }*/
     $tabela = $connection->query('SHOW TABLES LIKE \'user_data\'');

     $sql = "select * from user_data where id  =  $var"; 
     $conn = $connection->query($sql);         
 }

?>  
                         
        

<!DOCTYPE html> 
<html> 
        <head> 
                <meta charset="UTF-8"> 
                <title>Editar usuario</title> 
                <link rel="stylesheet" type="text/css" href="/public/css/index.css" />
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>
        </head> 
        <body> 
        <?php
        $data_this = array(
                "id" => 0,
                "name" => "",
                "email" => "",
                "telefone" => "",
                "cpf" => "",
                "estadocivil" => "",
                "genero" => "",
                "observacao" => "",

            );
                $dado_id = 0;
                $dado_name = '';
                while($dado = $conn->fetch_array()) {                        
                        $data_this['id'] = $dado['id'];                      
                        $data_this['name'] = $dado['name'];                        
                        $data_this['email'] = $dado['email'];                      
                        $data_this['telefone'] = $dado['telefone'];                       
                        $data_this['cpf'] = $dado['cpf'];              
                        $data_this['estadocivil'] = $dado['estadocivil'];             
                        $data_this['genero'] = $dado['genero'];
                        $data_this['observacao'] = $dado['observacao'];
                }

                        ?> 
                               

          <div class="form-style-5">
          <form id="cadastro" method="post" action="/src/Listar/editar.php" method="POST">
          <fieldset>
          <legend> Cadastro De Cliente</legend>
          <label>Nome </label>        
          <input required type="text" name="nome" id="nome" value="<?php echo $data_this['name']; ?>" >

          <label>Email </label>
          <input required type="email" name="email" id="email" value="<?php echo $data_this['email']; ?>" >

          <label>Telefone </label>      
          <input required type="text" name="telefone" id="telefone" value="<?php echo $data_this['telefone']; ?>" placeholder="Telefone:" class="telefone">
       
          <label>CPF </label>
          <input required type="text" name="cpf"  value="<?php echo $data_this['cpf']; ?>" onkeypress="formatar(this,'000.000.000-00')" id="cpf">
        
          <label>Estado Cívil</label>
          <input required type="text" name="estadocivil" id="estadocivil" value="<?php echo $data_this['estadocivil']; ?>">
         </fieldset>
        
         <label>Genero</label>
          <select required name="genero" >
          <option name="genero" value="<?php echo $data_this['genero']; ?>" > <?php echo $data_this['genero']; ?> </option>
         
         <?php 
         if($data_this['genero'] == 'Homem'){
                 echo " <option name='genero' value='Mulher'>Mulher</option>";
                }
        if($data_this['genero'] == 'Mulher')
        {

                echo " <option name='genero' value='Homem'>Homem</option>";
        }
         ?>  
         </select>      
           </fieldset>

           <fieldset>
           <label>Observação</label>
           <textarea name="observacao" id="observacao"  value="<?php echo $data_this['observacao']; ?>"> <?php echo $data_this['observacao']; ?></textarea>
           </fieldset>

           <label>Id</label>
           <input readonly type="text" name="id" id="nome" value="<?php echo $var ?>" >
           
           <input id="btnEnviar"  type="submit" name="BTEnvia" value="Cadastrar">
        </form>
        </div>

        <script>
    function formatar(src, mask)
    {
        var i = src.value.length;
        var saida = mask.substring(0,1);
        var texto = mask.substring(i)
        if (texto.substring(0,1) != saida)
        {
            src.value += texto.substring(0,1);
        }
    }

    jQuery("input.telefone")
        .mask("(99) 99999-9999")
        .focusout(function (event) {  
            var target, phone, element;  
            target = (event.currentTarget) ? event.currentTarget : event.srcElement;  
            phone = target.value.replace(/\D/g, '');
            element = $(target);  
            element.unmask();  
            if(phone.length > 10) {  
                element.mask("(99) 99999-999?9");  
            } else {  
                element.mask("(99) 9999-9999?9");  
            }  
        });
        
</script>


        </body> 
        </html>