<?php
// caminho do seu arquivo de conexão ao banco de dados $consulta = "SELECT * FROM usuario"; $con = $mysqli->query($consulta) or die($mysqli->error); 


$connection = new mysqli("localhost", "root", "", "users");

if ($connection->connect_error) {
    die('Falha ao estabelecer uma conexão: '.$connection->connect_error);
} else {
    /* 
    VERIFICO SE EXISTE UM BANCO DE DADOS.
    CASO NÃO TENHA O BANCO DE DADOS, EU O CRIO.
    */
    if(!$connection->select_db('users')) {
        $connection->query('CREATE DATABASE IF NOT EXISTS users;');
        $connection->select_db('users');
    }
    
    /* 
    FAÇO O MESMO COM A TABELA 
    OBS: É POSSÍVEL CRIAR DE FORMA AUTOMÁTICA E BASEADO NO FORMULÁRIO, 
    MAS ISSO EU DEIXAREI PARA FAZER EM OUTRAS POSTAGEM COM JQUERY
    */
    
    $tabela = $connection->query('SHOW TABLES LIKE \'user_data\'');
    if($tabela->num_rows == 0) {
        $connection->query('CREATE table user_data(id INT(11) AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, telefone VARCHAR(255), cpf VARCHAR(255), estadocivil VARCHAR(255) NOT NULL, genero VARCHAR(10) NOT NULL, observacao VARCHAR(255) NOT NULL, PRIMARY KEY (id));');
    }
    
        
    $consulta = "SELECT * FROM user_data"; 

    $con = $connection->query($consulta) or die($mysqli->error); 
    
}
?>