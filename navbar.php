<head>
    <link rel="stylesheet" href="_css/navbar.css">
</head>
<nav class="navbar navbar-expand-lg sticky-top">

    <a class="navbar-brand" href="#">
        <img src="img/logo-giveetake.png" alt="logo">
    </a>
    <span class="navbar-text">GiveeTake</span>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapse_target" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
        <i style="color: #ccc;" class="material-icons prefix icon">view_list</i>
    </button>

    <div class="collapse navbar-collapse" id="collapse_target">

        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" data-target="dropdown_target">
                    <?php
                        echo "".$_SESSION['nome']."";
                    ?>
                    <span class="caret"></span>
                </a>

            <div class="dropdown-menu" aria-labelledby="dropdown_target">
                <a href="" class="dropdown-item">Home</a>
                <div class="dropdown-divider"></div>
                <a href="feedback.php" class="dropdown-item">Feedback</a>
                <div class="dropdown-divider"></div>
                <?php 
                    echo "<a href='sair.php' class='dropdown-item'>Sair</a>"
                ?>
            </div>
            </li>
        </ul>

        <form class="form-nav form-inline">
            <input type="search" placeholder="Pesquisa de serviços" class="form-control pesquisar" aria-label="Pesquisar" aria-describedby="basic-addon1">   
            <ul class="search-ul" style="display: none;">

            </ul>
            <div class="input-group-append ">
                <span class="input-group-text btnVer btn-pesquisar"><i class="material-icons">search</i></span>
            </div>
        </form>
    </div>
</nav>
<script src="js/profissoes.js"></script>
<script src="js/filter.js"></script>