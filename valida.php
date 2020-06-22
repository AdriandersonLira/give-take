<?php 
    session_start();
    include_once("BD.php");

    # -------------------------- CADASTRAR ---------------------------

    ob_start();

    $btnCadUser = filter_input(INPUT_POST, 'btnCadUser', FILTER_SANITIZE_STRING);
    if ($btnCadUser) {
        include_once 'BD.php';
        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $dados['senha'] = password_hash($dados['senha'], PASSWORD_DEFAULT);

        $result_user = "INSERT INTO users (nome, tel, profissao, email, senha, administrador) VALUES (
            '" .$dados['nome']. "',
            '" .$dados['tel']. "',
            '" .$dados['prof']. "',
            '" .$dados['email']. "',
            '" .$dados['senha']. "',
            '0'
        )";

        $resulted_user = mysqli_query($conn, $result_user);

        if (mysqli_insert_id($conn)) {
            $_SESSION['id'] = $row_user['id'];
            $_SESSION['nome'] = $row_user['nome'];
            $_SESSION['email'] = $row_user['email'];
            header("Location: login.php");
        }
    }

    # ---------------------------- LOGIN -----------------------------

    $btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);

    if ($btnLogin) {
        
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

        if ( !empty($email) AND !empty($senha)) {
            $result_user = "SELECT id, nome, email, senha, administrador FROM users WHERE email='$email' LIMIT 1";
            $resulted_user = mysqli_query($conn, $result_user);
            if ($resulted_user) {
                $row_user = mysqli_fetch_assoc($resulted_user);
                var_dump($row_user);
                if (password_verify($senha, $row_user['senha'])) {
                    $_SESSION['id'] = $row_user['id'];
                    $_SESSION['nome'] = $row_user['nome'];
                    $_SESSION['email'] = $row_user['email'];
                    $_SESSION['administrador'] = $row_user['administrador'];
                    
                    if ($_SESSION['administrador'] == '1') {
                        header("Location: admin.php");
                    } else {
                        header("Location: user.php");
                    }                    
                } else {
                    $_SESSION['msg'] = "Login ou Senha Incorreto!";
                    header("Location: login.php");
                }
            }
        } else {
            $_SESSION['msg'] = "Página não encontrada";
            header("Location: login.php");
        }

    }
?>
