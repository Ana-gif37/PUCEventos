<?php
$token = $_GET['token'];
$tipoUsuario = $_GET['usuario'];
?>



<!DOCTYPE html>

<html Lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>PUCEventos-Login</title>
        <!--chama o javaScript e Jquery para criação de modal-->
        <script type="text/javascript" src="../../jquery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="../../jquery/core.js"></script>
        <script type="text/javascript" src="../../jquery/jquery.cookie.js"></script>
        <!--chama arquivos bootstrap e os CSS da pagina-->   
        <link rel="stylesheet" href="../../CSS/Login/Login.css">
        <link rel="stylesheet" href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <style type="text/css">
            body {
                background-color: black;
            }
        </style>

    </head>

    <body >

        <!--container contendo todas as divs da pagina-->
        <div class="container">

            <!--cabeçalho da pagina-->
            <div class="Topo">   
                <form action="" method="post" accept-charset="utf-8" class="form-Topo">
                    <center><img src="../../imagens/logo-puc-minas.png" width="10%" height="10%"/></center> 
                    <center><h2> Sistema de Gestão de Eventos</h2></center><br><br>  
                    </div>    
                    <!--formulario com  texto login e senha e botão-->
                    <div class="formulario">   
                        <form action="" method="post" accept-charset="utf-8" class="form-login">
                            <h2> <small>Recuperação de senha</small></h2>
                            <input name = "senha" type="password" id="senha" class="form-control" required="required" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres" maxlength="35">
                            <br>
                            <button type="submit" name="enviar" class="btn btn-primary btn-block">Confirmar alteração de senha</button>
                            <br>
                            </div> 

                        </form>
                    </div>

                    <?php
                    include '../../Processa/Login/ProcessaEditarSenha.php';
                    ?>


                    </body>
                    </html>
