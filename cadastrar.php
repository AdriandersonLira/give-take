<?php
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
        <form method="POST" action="valida.php" class="cadastro" onSubmit="return validaForm(this,document.querySelector('#msg'))">
            <h3 id="msg"></h3>

            <!--  LINHA 1  -->
            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">list</i></span>
                        </div>
                        <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control" aria-label="Nome" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">call</i></span>
                        </div>
                        <input type="tel" name="tel" id="tel" maxlegth="16" placeholder="Telefone" class="form-control" aria-label="Telefone" aria-describedby="basic-addon1" required>
                    </div>
                </div>
            </div>

            <!--  LINHA 2  -->

            <div class="row">
                <div class="col-md-6">   
                    <div class="input-group mb-3 div-alter"> 
                        
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">contacts</i></span>
                        </div>
                        <select id="prof" name="prof" class="form-control custom-select" required>
                            <option value="">Selecione sua profissão</option>
                        </select>
                        <div class="input-group-append">
                        <button class="btn btn-success" onclick="alterar(this, document.querySelector('.div-alter'))" value="0" type="button">Outro</button>
                        </div>

                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">account_circle</i></span>
                        </div>
                        <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" aria-label="E-mail" aria-describedby="basic-addon1" required>
                    </div>
                </div>

            </div>

            <!--  LINHA 3  

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">account_circle</i></span>
                        </div>
                        <input type="email" name="email" id="email" placeholder="E-mail" class="form-control" aria-label="E-mail" aria-describedby="basic-addon1" required>
                    </div>
                </div>

                <div class="col-md-6">    
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">fingerprint</i></span>
                        </div>
                        <input type="cpf" name="cpf" id="cpf" placeholder="Digite seu CPF" class="form-control" aria-label="CPF" aria-describedby="basic-addon1" required>
                    </div>
                </div>
            </div>-->

            <!--  LINHA 4  -->

            <div class="row">
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">lock</i></span>
                        </div>
                        <input type="password" name="senha" id="pass" placeholder="Senha" class="form-control senha" aria-label="Senha" aria-describedby="basic-addon1" required>   
                        <div class="input-group-append">
                            <span class="input-group-text btnVer" id="btnPass"><i class="material-icons visibility_">visibility</i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="material-icons prefix icon">done</i></span>
                        </div>
                        <input type="password" name="confPass" id="confPass" placeholder="Confirmar senha" class="form-control confPass" aria-label="Confirmar Senha" aria-describedby="basic-addon1" required>   
                        <div class="input-group-append">
                            <span class="input-group-text btnVer" id="btnConfPass"><i class="material-icons visibility__">visibility</i></span>
                        </div>
                    </div>
                </div>
            </div>

            <input type="submit" name="btnCadUser" class="btn btn-primary" value="Criar conta">
            
        </form>
    </main>
    <footer>
        <h5>Já possui conta?</h5><a class="link" href="login.php">Entre agora!</a>
    </footer>

    <!-- --- SCRIPTS --- -->
    <script src="js/profissoes.js"></script>
    <script src="js/validacao.js"></script>
</body>
</html>