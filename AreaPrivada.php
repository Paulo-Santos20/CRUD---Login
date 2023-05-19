<?php 
    session_start();
    if(!isset($_SESSION['id_usuario'])){
        header("location: index.php");
        exit;
    }
?>


SEJA BEM VINDO AO DEMONSTRATIVO DA AULA DE DESENVOLVIMENTO WEB!!
<a href="sair.php">Sair</a>