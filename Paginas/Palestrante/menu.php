<?php
include '../../Processa/Login/VerificaUsuarioLogadoPalestrante.php';

?>




<!-- Inicio navbar(menu) -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                
            </button>
            <a class="navbar-brand" href="index.php?link=1">PUC Eventos</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
            

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Meus Eventos <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?link=3">Incrições Abertas</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?link=5">Em andamento</a></li>
                         <li role="separator" class="divider"></li>
                        <li><a href="index.php?link=6">Encerrados</a></li>
                    </ul>
                </li>
                <li class="dropdown"  align="center">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  align="right"><?php echo $_SESSION['nomePalestrante']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?link=23">Atualizar Cadastro</a></li>
                        <li><a href="../../Processa/Login/Sair.php">Sair</a></li>

                    </ul>
                </li>


            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Fim navbar(menu) -->