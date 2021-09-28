<?php
//apenas um arquivo de exemplo
include('conexao.php');

$mysqli = new mysqli($host,$user,$pass,$bd);

if($mysqli->connect_errno) {
    $_SESSION['erro'] = 'Erro ao conectar ao banco de dados: ' . $mysqli->connect_error;
    die();
} else {
    $_SESSION['sucesso'] = "Aplicação instalada com sucesso!";
}

?>