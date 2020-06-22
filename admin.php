<?php
    session_start();

    if (!empty($_SESSION['id'])) {
        echo "Olá ".$_SESSION['nome'].", Bem Vindo! Aqui é admin.";
        echo "<a href='sair.php'>Sair</a>";
    } else {
        $_SESSION['msg'] = "Área Restrita";
        header("Location: login.php");
    }
?>