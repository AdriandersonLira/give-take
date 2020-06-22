<?php

    session_start();
    unset($_SESSION['id'], $_SESSION['nome'], $_SESSION['email'], $_SESSION['face_access_token']);

    $_SESSION['msg'] = "Deslogado com sucesso";
    header("Location: login.php");
