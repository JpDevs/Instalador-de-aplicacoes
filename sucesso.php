<?php
include('config.php');

if(isset($_SESSION['sucesso'])) {
    echo $_SESSION['sucesso'];
    if(isset($_SESSION['erro'])) {
        unset($_SESSION['erro']);
    }
} else {
    header('Location: index.php');
    if(isset($_SESSION['sucesso'])) {
        unset($_SESSION['sucesso']);
    }
    die();
}

?>