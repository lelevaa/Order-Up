<?php

//Conexao com o banco de dados

$server = '127.0.0.1';
$username = 'root';
$password = '';
$dbname = 'orderup';
    
$conn = new mysqli($server, $username, $password, $dbname);
    

//Verificar conexão com o banco

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}
?>
