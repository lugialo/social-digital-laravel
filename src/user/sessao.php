<?php
    session_start();
    error_reporting(0);
    //$admin = isset($_GET['admin']) ? $_GET['admin'] : 0;
    //$id_parametro = isset($_GET['id']) ? $_GET['id'] : 0;
    /*
    echo $idInicial;
    and ($_SESSION['usuario'] !== $idInicial)
    || $_SESSION['usuario'] != $id_parametro ) 
    */
    if (!isset($_SESSION['logado'])) {
        header("Location: /pi353socialdigital/src/login.php");
        session_destroy();
        exit;
    }

    if (isset($_GET['sair'])) {        
        header("Location: /pi353socialdigital/src/login.php");
        session_destroy();
        exit;
    }   
?>