<?php
$conexao = 'conexao.php'; //insira aqui o caminho pro seu arquivo de conexão (arquivo onde ficarão armezanadas as váriaveis de conexão).
include($conexao);
if(!isset($_SESSION)) {
    session_start();
}
if(@$instalado != 0) {
    header('Location: ../');
    die();
}
if(isset($_POST['instalar']))
{
    $instalador="<?php".'
    '.'$host = '."'".$_POST['dbhost']."'".';
    '.'$bd = '."'".$_POST['dbname']."'".';
    '.'$user = '."'".$_POST['dbuser']."'".';
    '.'$pass = '."'".$_POST['dbpass']."'".';
    '.'$instalado = '."'".'true'."'".';
    '."?>";
    $instala=fopen($conexao , 'w');
    fwrite($instala,$instalador);
    fclose($instala);
    if(isset($_SESSION['primeirainstall'])) { 
        unset($_SESSION['primeirainstall']);
    }
    header('location: ./verifica.php');
}
?>
<html>
    <head>
    
    <meta charset="utf-8">
    <center>
    <form method="POST" action="">
        <h1>Instalação</h1>
        <?php if(isset($_SESSION['erro'])) { ?>
            <center><span> <?php echo $_SESSION['erro'];?> </span> <br><br><?php unset($_SESSION['erro']); } ?>
       <input type="text" name="dbhost" placeholder="Host" required>
       <br>
       <br>
       <input type="text" name="dbname" placeholder="Nome do BD" required>
       <br>
       <br>
       <input type="text" name="dbuser" placeholder="User">
       <br>
       <br>
       <input type="text" name="dbpass" placeholder="Senha">
       <br>
       <br>
       <button type="submit" name="instalar">Instalar</button>
    </form>
    </center>
    </body>
</html>