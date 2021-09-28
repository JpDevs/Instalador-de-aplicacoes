<?php
error_reporting(0);
$conexao = 'conexao.php'; //insira aqui o caminho pro seu arquivo de conexão (arquivo onde ficarão armezanadas as váriaveis de conexão).
if(!isset($_SESSION)) {
    session_start();
}
include($conexao);
if(!isset($instalado)) {
    $_SESSION['primeirainstall'] = true;
}
$mysqli = new mysqli($host,$user,$pass,$bd); // você pode alterar para PDO caso prefira.

if($mysqli->connect_errno) {
    $_SESSION['erroinstall'] = $mysqli->connect_error;
    $instalador= '<?php $instalado = false; ?>';
    $instala=fopen($conexao , 'w');
    fwrite($instala,$instalador);
    fclose($instala);
    header('Location: index.php');
    $_SESSION['erro'] = 'Erro ao conectar ao banco de dados: ' . $mysqli->connect_error;
    die();
} else {
    header('Location: sucesso.php');
    die();
    
}

?>