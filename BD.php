<?php
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "sistema";

    //  Criando conexão
    $conn = mysqli_connect($servidor, $usuario, $senha, $dbname);
    mysqli_set_charset( $conn, 'utf8');