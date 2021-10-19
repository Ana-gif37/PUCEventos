<?php
session_start();
include_once '../../Processa/Login/seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="Pagina Administrativa">
        <meta name="author" content="">

        <title>PUCEventos-Participante</title>
 	<link rel="icon" href="../../imagens/favicon/favicon.ico">
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js" rel="stylesheet">
        <link href="../../CSS/Administrativa/theme.css" rel="stylesheet">
        <script src="../../CSS/bootstrap-3.3.7-dist/js/ie-emulation-modes-warning.jsassets"></script>
        <script src="../../JavaScript/ckeditor/ckeditor.js"></script>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <!--plugin de mascara-->
        <script src="../../JavaScript/MaskedInputPlugin/jquery.maskedinput.js" type="text/javascript"></script>
        <!--mascaras dos formularios-->
        <script type="text/javascript" src="../../JavaScript/MaskedInputPlugin/Mascaras.js"></script>



        <style type="text/css">
            >


            body {
                background-color: #F5F5F5;
            }
        </style>

    </head>

    <body role="document">
        <?php
        include_once 'menu.php';
        $link = $_GET["link"];
        $pag[1] = "Home.php";
        $pag[2] = "VisualizarEvento.php";
        $pag[3] = "GerenciarMeusEventosInscritos.php";
        $pag[4] = "GerenciarMeusEventosEmAndamento.php";
        $pag[5] = "GerenciarMeusEventosEncerrados.php";
        $pag[6] = "Mensagem.php";
        $pag[7] = "EnviarMensagemPalestrantes.php";
        $pag[8] = "EnviarMensagemOrganizador.php";
        $pag[10] = "EnviarMensagemParticipantes.php";
        $pag[11] = "EditarMeusDados.php";
        $pag[12] = "VisualizarEventosInscricaoAberta.php";
        $pag[13] = "VisualisarEventoEmAndamento.php";
        $pag[14] = "MateriaisPostados.php";
            $pag[15] = "GerarCertificado.php";
        












        if (!empty($link)) {
            if (file_exists($pag[$link])) {
                include $pag[$link];
            } else {
                include "Home.php";
            }
        } else {
            include "Home.php";
        }
        ?>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../../CSS/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../../CSS/bootstrap-3.3.7-dist/js/bootstrap.min.js"><\/script>')</script>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../CSS/bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
