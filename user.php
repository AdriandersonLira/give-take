<?php
    session_start();
    include_once('start.html');

    if (empty($_SESSION['id'])) {
        $_SESSION['msg'] = "Área Restrita";
        header("Location: login.php");
    }    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <link rel="stylesheet" href="_css/main.css">
</head>
<body>
    <header>
        <?php include 'navbar.php'?>
    </header>

    <main>
    <form action="validaprofissao.php" method="POST">
        <h3>Profissão</h3>
        <label for="oferta1">Oferta 1: </label>
        <input type="text" id="oferta1" class="of1" placeholder="Sua primeira oferta"><br><br>
        <label for="oferta2">Oferta 2: </label>
        <input type="text" id="oferta2" class="of2" placeholder="Sua segunda oferta"><br><br>

        <input type="submit" name="btnOferta" value="Submeter Ofertas">
    </form>
    <br><br>
    <form action="validaprocura.php" method="POST">
        <h3>Procura</h3>
        <label for="procura1">procura 1: </label>
        <input type="text" id="procura1" class="pr1" placeholder="Sua primeira procura"><br><br>
        <label for="procura2">procura 2: </label>
        <input type="text" id="procura2" class="pr2" placeholder="Sua segunda procura"><br><br>

        <input type="submit" name="btnProcura" value="Submeter Procuras">
    </form>
    </main>
</body>
</html>