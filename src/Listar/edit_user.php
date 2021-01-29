<?php 

include("../utils/conection.php"); // caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 
$var = $_GET["id"];

$sql = "select * from user_data where id  =  $var"; 
$conn = $connection->query($sql);      
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


                function Mask($mask,$str){

                    $str = str_replace(" ","",$str);
                
                    for($i=0;$i<strlen($str);$i++){
                        $mask[strpos($mask,"#")] = $str[$i];
                    }
                
                    return $mask;
                
                }
                        ?> 
                               

          <div class="form-style-5">
          <form id="cadastro" method="post" action="/src/Listar/editar.php" method="POST">
          <fieldset>
          <legend>Editar Cliente</legend>
          <label>Nome </label>        
          <input  type="text" name="nome" id="nome" value="<?php echo $data_this['name']; ?>" >

          <label>Email </label>
          <input  type="email" name="email" id="email" value="<?php echo $data_this['email']; ?>" >

          <label>Telefone</label>      
          <input  type="text" name="telefone" id="telefone" value="<?php echo Mask("(##) #####-####", $data_this['telefone']); ?>" placeholder="Telefone:" class="telefone">
       
          <label>CPF </label>
          <input  type="text" name="cpf"  value="<?php echo Mask("###.###.###-##", $data_this['cpf']); ?>" onkeypress="formatar(this,'000.000.000-00')" id="cpf">
        
          <label>Estado Cívil</label>   
          <select  name="estadocivil" >
              <fieldset>
          <?php // selected 
          if($data_this['estadocivil'] == 'Solteiro(a)')
          {

             echo ' <option  disabled>Selecione</option>' ;
             echo ' <option selected name="estadocivil" value="Solteiro(a)">Solteiro(a)</option> ';
             echo ' <option name="estadocivil" value="Casado(a)">Casado(a)</option>';
             echo ' <option name="estadocivil" value="Viuvo(a)">Viuvo(a)</option> ';
             echo ' <option name="estadocivil" value="Divorciado(a)">Divorciado(a)</option> ';
             echo ' <option name="estadocivil" value="Separado Judicialmente">Separado Judicialmente</option>';

          }
          if($data_this['estadocivil'] == 'Casado(a)')
          {

             echo ' <option  disabled>Selecione</option>' ;
             echo ' <option  name="estadocivil" value="Solteiro(a)">Solteiro(a)</option> ';
             echo ' <option selected name="estadocivil" value="Casado(a)">Casado(a)</option>';
             echo ' <option name="estadocivil" value="Viuvo(a)">Viuvo(a)</option> ';
             echo ' <option name="estadocivil" value="Divorciado(a)">Divorciado(a)</option> ';
             echo ' <option name="estadocivil" value="Separado Judicialmente">Separado Judicialmente</option>';

          }
          if($data_this['estadocivil'] == 'Viuvo(a)')
          {

             echo ' <option  disabled>Selecione</option>' ;
             echo ' <option  name="estadocivil" value="Solteiro(a)">Solteiro(a)</option> ';
             echo ' <option name="estadocivil" value="Casado(a)">Casado(a)</option>';
             echo ' <option selected name="estadocivil" value="Viuvo(a)">Viuvo(a)</option> ';
             echo ' <option name="estadocivil" value="Divorciado(a)">Divorciado(a)</option> ';
             echo ' <option name="estadocivil" value="Separado Judicialmente">Separado Judicialmente</option>';

          }
          if($data_this['estadocivil'] == 'Divorciado(a)')
          {

             echo ' <option  disabled>Selecione</option>' ;
             echo ' <option  name="estadocivil" value="Solteiro(a)">Solteiro(a)</option> ';
             echo ' <option name="estadocivil" value="Casado(a)">Casado(a)</option>';
             echo ' <option name="estadocivil" value="Viuvo(a)">Viuvo(a)</option> ';
             echo ' <option selected name="estadocivil" value="Divorciado(a)">Divorciado(a)</option> ';
             echo ' <option name="estadocivil" value="Separado Judicialmente">Separado Judicialmente</option>';

          }
          if($data_this['estadocivil'] == 'Separado Judicialmente')
          {

             echo ' <option  disabled>Selecione</option>' ;
             echo ' <option  name="estadocivil" value="Solteiro(a)">Solteiro(a)</option> ';
             echo ' <option name="estadocivil" value="Casado(a)">Casado(a)</option>';
             echo ' <option name="estadocivil" value="Viuvo(a)">Viuvo(a)</option> ';
             echo ' <option name="estadocivil" value="Divorciado(a)">Divorciado(a)</option> ';
             echo ' <option selected name="estadocivil" value="Separado Judicialmente">Separado Judicialmente</option>';

          }
            
           
           
            
            ?>

</fieldset>
</select>     

       <label> Genero </label>   <br>  
       <?php 
         if($data_this['genero'] == 'Homem'){
             echo ' <input  type="radio" class="required"  id="genero" name="genero" value="Homem" checked> <label for="homem">Homem</label><br>';
             echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Mulher"> <label for="mulher">Mulher</label><br>';
             echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Outro"> <label for="outro">Outro</label>   ';
            }
            if($data_this['genero'] == 'Mulher')
            {
                
                echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Homem" checked> <label for="mulher">Mulher</label><br>';
                echo ' <input  type="radio" class="required"  id="genero" name="genero" value="Homem" > <label for="homem">Homem</label><br>';
                echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Outro"> <label for="outro">Outro</label>   ';
            }
            if($data_this['genero'] == 'Outro')
            {
                
                echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Outro" checked> <label for="outro">Outro</label>   ';
                echo ' <input  type="radio" class="required"  id="genero" name="genero" value="Homem" > <label for="homem">Homem</label><br>';
                echo '  <input  type="radio" class="required"  id="genero" name="genero" value="Homem"> <label for="mulher">Mulher</label><br>';
            }
            
            
            ?>   
           </fieldset>

           <fieldset>
           <label>Observação</label>
           <textarea name="observacao" id="observacao"  value="<?php echo $data_this['observacao']; ?>"> <?php echo $data_this['observacao']; ?></textarea>
           </fieldset>

           <label>Id</label>
           <input readonly type="text" name="id" id="nome" value="<?php echo $var ?>" >
           
           <input id="btnEnviar"  type="submit" name="BTEnvia" value="Salvar">
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

<script>
    function check_form(){
    var cpf = document.getElementById('cpf').value;
    var inputs = document.getElementsByClassName('required');
    var len = inputs.length;
    var valid = true;
    for(var i=0; i < len; i++){
        if (!inputs[i].value){ valid = false; inputs[i].style.backgroundColor = 'red'; }
    }
    if (!valid){

        alert('Por favor preencha todos os campos.');     
        return false;
    } if(!validarCPF(cpf)) { 
        alert('Por favor preencha com um CPF VALIDO.');    
        document.getElementById('cpf').style.backgroundColor = 'red';
        return false; 
    }else
    {
        return true; 
    }


    }
    function validarCPF(cpf) {	
    cpf = cpf.replace(/[^\d]+/g,'');	
    if(cpf == '') return false;	
    // Elimina CPFs invalidos conhecidos	
    if (cpf.length != 11 || 
        cpf == "00000000000" || 
        cpf == "11111111111" || 
        cpf == "22222222222" || 
        cpf == "33333333333" || 
        cpf == "44444444444" || 
        cpf == "55555555555" || 
        cpf == "66666666666" || 
        cpf == "77777777777" || 
        cpf == "88888888888" || 
        cpf == "99999999999")
            return false;		
    // Valida 1o digito	
    add = 0;	
    for (i=0; i < 9; i ++)		
        add += parseInt(cpf.charAt(i)) * (10 - i);	
        rev = 11 - (add % 11);	
        if (rev == 10 || rev == 11)		
            rev = 0;	
        if (rev != parseInt(cpf.charAt(9)))		
            return false;		
    // Valida 2o digito	
    add = 0;	
    for (i = 0; i < 10; i ++)		
        add += parseInt(cpf.charAt(i)) * (11 - i);	
    rev = 11 - (add % 11);	
    if (rev == 10 || rev == 11)	
        rev = 0;	
    if (rev != parseInt(cpf.charAt(10)))
        return false;		
    return true;   
    }
</script>


        </body> 
        </html>