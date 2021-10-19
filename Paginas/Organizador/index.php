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

        <title>PUCEventos-Organizador</title>
 	<link rel="icon" href="../../imagens/favicon/favicon.ico">
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js" rel="stylesheet">
        <link href="../../CSS/Administrativa/theme.css" rel="stylesheet">
        <script src="../../CSS/bootstrap-3.3.7-dist/js/ie-emulation-modes-warning.jsassets"></script>
        <script src="../../jquery/jquery.min.js"></script>
        <script src="../../JavaScript/ckeditor/ckeditor.js"></script>
        <!--para o time picker-->
        <link type="text/css" href="../../CSS/bootstrap-3.3.7-dist/css/timepicker.less" />
        <script type="text/javascript" src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-timepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-clockpicker.min.css">


        <!--para o date picker-->
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-datepicker.css" rel="stylesheet"/>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.min.js"></script> 
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

        <!--plugin de mascara-->
        <script src="../../JavaScript/MaskedInputPlugin/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../../JavaScript/MaskedInputPlugin/jquery.maskmoney.min.js" type="text/javascript"></script>

        <!--mascaras dos formularios-->
        <script type="text/javascript" src="../../JavaScript/MaskedInputPlugin/Mascaras.js"></script>


        <style type="text/css">
            body {
                background-color: #F5F5F5;
            }
        </style>





        <style type="text/css">



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
        $pag[2] = "CadastroEvento.php";
        $pag[3] = "GerenciarEventosInscricaoAberta.php";
        $pag[4] = "EditarEventosInscricaoPagos.php";
        $pag[5] = "GerenciarEventosEmAndamento.php";
        $pag[6] = "GerenciarEventosEncerrados.php";
        $pag[7] = "GerenciarInscritos.php";
        $pag[8] = "GerenciarInscritosEventosGratuitos.php";
        $pag[9] = "GerenciarEventosInscricaoAberta.php";
        $pag[10] = "GerenciarPalestrante.php";
        $pag[11] = "PesquisarGerenciarEventosEmAndamento.php";
        $pag[12] = "PesquisarGerenciarEventosEncerrados.php";
        $pag[13] = "VisualizarEventoInscricaoAberta.php";
        $pag[14] = "VisualisarEventoEmAndamento.php";
        $pag[15] = "VisualisarEventoEncerrado.php";
        $pag[16] = "PesquisarGerenciarPalestrante.php";
        $pag[17] = "EditarEventosInscricaoAberta.php";
        $pag[18] = "CadastroPalestrante.php";
        $pag[19] = "CadastroPostarMateriais.php";
        $pag[20] = "GerenciarPostagemMateriais.php";
        $pag[21] = "VisualizarPalestrante.php";
        $pag[22] = "EditarPalestrante.php";
        $pag[23] = "PesquisarGerenciarInscritos.php";
        $pag[24] = "Mensagem.php";
        $pag[25] = "EnviarMensagemParticipantes.php";
        $pag[26] = "EnviarMensagemPalestrantes.php";
        $pag[27] = "EnviarMensagemAdministrador.php";
        $pag[28] = "RelatorioEventosInscricaoAberta.php";
        $pag[29] = "PesquisarGerenciarEventosIncricaoAberta.php";
        $pag[30] = "EditarMeusDados.php";
        $pag[31] = "CadastroEventoPagamento.php";
        $pag[32] = "RelatorioEventosEmAndamento.php";
        $pag[33] = "RelatorioEventosEncerrados.php";































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





        <!--formularios datapicker criar os calendarios de acordo com o id do formulario-->
        <script src="../../JavaScript/Organizador/FormulariosDataPicker.js"></script>


        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="../../CSS/bootstrap-3.3.7-dist/js/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../../../CSS/bootstrap-3.3.7-dist/js/bootstrap.min.js"><\/script>')</script>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/docs.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="../../CSS/bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js"></script>
        <!--para o timepickerfuncionar -->
        
	<script type="text/javascript" src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-clockpicker.min.js"></script>
        
	<script type="text/javascript" src="../../JavaScript/Organizador/FormularioTimePicker.js"></script>


     

    </body>
</html>
