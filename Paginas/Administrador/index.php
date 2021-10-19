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

        <title>PUC Eventos - Administrador</title>
 	<link rel="icon" href="../../imagens/favicon/favicon.ico">

        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="../../CSS/bootstrap-3.3.7-dist/js/ie10-viewport-bug-workaround.js" rel="stylesheet">
        <link href="../../CSS/Administrativa/theme.css" rel="stylesheet">
        <script src="../../CSS/bootstrap-3.3.7-dist/js/ie-emulation-modes-warning.jsassets"></script>
        <script src="../../jquery/jquery.min.js"></script>
        <script src="../../JavaScript/ckeditor/ckeditor.js"></script>
        <!--plugin de mascara-->
        <script src="../../JavaScript/MaskedInputPlugin/jquery.maskedinput.js" type="text/javascript"></script>
        <script src="../../JavaScript/MaskedInputPlugin/jquery.maskmoney.min.js" type="text/javascript"></script>
        <!--mascaras dos formularios-->
        <script type="text/javascript" src="../../JavaScript/MaskedInputPlugin/Mascaras.js"></script>
        <!--ckeditor-->
        <script src="../../JavaScript/ckeditor/ckeditor.js"></script>
        <!--para o time picker-->
        <link type="text/css" href="../../CSS/bootstrap-3.3.7-dist/css/timepicker.less" />
        <script type="text/javascript" src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-timepicker.js"></script>
        <link rel="stylesheet" type="text/css" href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-clockpicker.min.css">


        <!--para o date picker-->
        <link href="../../CSS/bootstrap-3.3.7-dist/css/bootstrap-datepicker.css" rel="stylesheet"/>
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.min.js"></script> 
        <script src="../../CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>




        <style type="text/css">


            body {
                background-color: #F5F5F5;
            }
        </style>



    </head>

    <body role="document">
        <?php
        include_once 'menu.php';

        $link = $_GET['link'];


        $pag[1] = "Home.php";
        $pag[2] = "CadastroParticipante.php";
        $pag[3] = "GerenciarParticipantes.php";
        $pag[4] = "EditarParticipantes.php";
        $pag[5] = "PesquisarGerenciarParticipantes.php";
        $pag[6] = "VisualizarParticipantes.php";
        $pag[7] = "ProcessaApagarParticipante.php";
        $pag[8] = "CadastroOrganizador.php";
        $pag[9] = "CadastroAdministrador.php";
        $pag[10] = "CadastroCurso.php";
        $pag[11] = "CadastroUnidade.php";
        $pag[12] = "GerenciarOrganizadores.php";
        $pag[13] = "PesquisarGerenciarOrganizadores.php";
        $pag[14] = "GerenciarAdministradores.php";
        $pag[15] = "PesquisarGerenciarAdministradores.php";
        $pag[16] = "GerenciarCursos.php";
        $pag[17] = "PesquisarGerenciarCursos.php";
        $pag[18] = "GerenciarUnidades.php";
        $pag[19] = "PesquisarGerenciarUnidades.php";
        $pag[20] = "VisualizarAdministradores.php";
        $pag[21] = "VisualizarOrganizadores.php";
        $pag[22] = "VisualizarCursos.php";
        $pag[23] = "VisualizarUnidades.php";
        $pag[24] = "EditarOrganizadores.php";
        $pag[25] = "EditarAdministradores.php";
        $pag[26] = "EditarCursos.php";
        $pag[27] = "EditarUnidades.php";
        $pag[29] = "GerenciarEventosInscricaoAberta.php";
        $pag[30] = "GerenciarEventosEncerrados.php";
        $pag[31] = "GerenciarEventosEmAndamento.php";
        $pag[32] = "CadastroPalestrante.php";
        $pag[33] = "PesquisarGerenciarEventosIncricaoAberta.php";
        $pag[35] = "PesquisarGerenciarEventosEmAndamento.php";
        $pag[36] = "PesquisarGerenciarEventosEncerrados.php";
        $pag[37] = "VisualizarPalestrante.php";
        $pag[38] = "VisualizarEventoInscricaoAberta.php";
        $pag[39] = "EditarPalestrante.php";
        $pag[40] = "VisualisarEventoEmAndamento.php";
        $pag[41] = "VisualisarEventoEncerrado.php";
        $pag[42] = "PesquisarGerenciarPalestrante.php";
        $pag[43] = "EditarGerenciarEventosInscricaoAberta.php";
        $pag[44] = "GerenciarPalestrante.php";
        $pag[45] = "GerenciarInscritos.php";
        $pag[46] = "RelatorioEventosInscricaoAberta.php";
        $pag[47] = "EnviarMensagemParticipantes.php";
        $pag[48] = "EditarMeusDados.php";
        $pag[49] = "PesquisarGerenciarInscritos.php";
        $pag[50] = "Mensagem.php";
        $pag[51] = "EnviarMensagemPalestrantes.php";
        $pag[52] = "EnviarMensagemOrganizador.php";
        $pag[53] = "EditarEventosInscricaoPagos.php";
        $pag[54] = "RelatorioEventosEmAndamento.php";
        $pag[55] = "RelatorioEventosEncerrados.php";






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
