<?php
include '../../Processa/Login/VerificaUsuarioLogadoAdministrador.php';
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cadastros <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?link=9">Administrador</a></li>
                        <li><a href="index.php?link=8">Organizador</a></li>
                        <li><a href="index.php?link=32">Palestrante</a></li>
                        <li><a href="index.php?link=2">Participante</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?link=10">Cursos</a></li>
                        <li><a href="index.php?link=11">Unidade</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="index.php?link=14" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Listar e Gerenciar <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?link=14">Administrador</a></li>
                        <li><a href="index.php?link=12">Organizador</a></li>
                        <li><a href="index.php?link=44">Palestrante</a></li>
                        <li><a href="index.php?link=3">Participante</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?link=16">Cursos</a></li>
                        <li><a href="index.php?link=18">Unidade</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="index.php?link=29">Eventos Com Inscrições Abertas</a></li>
                         <li><a href="index.php?link=31">Eventos Em Andamento</a></li>
                        <li><a href="index.php?link=30">Eventos Encerrados</a></li>

                    </ul>
                </li>



                <li class="dropdown"  align="center">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"  align="right"><?php echo $_SESSION['nomeAdministrador']; ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?link=48">Atualizar Cadastro</a></li>
                        <li><a href="../../Processa/Login/Sair.php">Sair</a></li>

                    </ul>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<!-- Fim navbar(menu) -->