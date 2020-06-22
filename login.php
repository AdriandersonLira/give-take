<?php 
    //session_start();
    include_once('facebook.php');
    include_once('start.html');
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <link rel="stylesheet" href="_css/main.css">
    <link rel="stylesheet" href="_css/start.css">
</head>
<body>
    <header>
        <img class="logo" src="img/logo-giveetake-nome.png" alt="Giveetake">
    </header>

    <main>
        <h4 class="msg_h4">
        <?php
            if (isset($_SESSION['msg'])) {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        </h4>
        <form action="valida.php" method="POST" class="login">
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">account_circle</i></span>
                </div>
                <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" aria-label="E-mail" aria-describedby="basic-addon1" required>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">lock</i></span>
                </div>
                <input type="password" name="senha" id="passLogin" placeholder="Senha" class="form-control senha" aria-label="Senha" aria-describedby="basic-addon1" required>   
                <div class="input-group-append">
                    <span class="input-group-text btnVer"><i class="material-icons visibility">visibility</i></span>
                </div>
            </div>
            
            <input type="submit" name="btnLogin" class="btn btn-primary" value="Acessar">
            
        </form>
    </main>

    <footer>
        <h5>Ainda não possui conta?</h5><a class="link" href="cadastrar.php">Cadastre-se</a>
        <!--<a href="<?php echo $loginUrl; ?>">Facebook</a>-->
    </footer>

    
    <!--<script src="js/particles.js"></script>
    <script src="js/app.js"></script>-->
    <script>
        let passLogin   = document.querySelector('#passLogin');
        let btnVerLogin = document.querySelector('.btnVer');
        let visibility  = document.querySelector('.visibility');

        btnVerLogin.addEventListener('click', function() {
            mostrarSenha(passLogin, visibility);
        });

        function mostrarSenha(text,visibility) {
            if (text.type == 'password') {
                text.type = 'text'
                visibility.innerHTML = ''
                visibility.innerHTML = 'visibility_off'
            } else {
                text.type = 'password'
                visibility.innerHTML = ''
                visibility.innerHTML = 'visibility'
            }
        }
    </script>
</body>
</html>