
<!DOCTYPE html>

<html Lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>PUC Eventos - Login</title>
	<link rel="icon" href="imagens/favicon/favicon.ico">
        <!--chama o javaScript e Jquery para criação de modal-->
        <script type="text/javascript" src="jquery/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="jquery/core.js"></script>
        <script type="text/javascript" src="jquery/jquery.cookie.js"></script>
        <!--chama arquivos bootstrap e os CSS da pagina-->   
        <link rel="stylesheet" href="CSS/Login/Login.css">
        <link rel="stylesheet" href="CSS/bootstrap-3.3.7-dist/css/bootstrap.min.css">
        <style type="text/css">
            body {
                background-color: black;
            }
        </style>
        <!--plugin de mascara-->
        <script src="./JavaScript/MaskedInputPlugin/jquery.maskedinput.js" type="text/javascript"></script>
        <!--mascaras dos formularios-->
        <script type="text/javascript" src="./JavaScript/MaskedInputPlugin/Mascaras.js"></script>
        
         
        <!--para o date picker-->
        <link href="./CSS/bootstrap-3.3.7-dist/css/bootstrap-datepicker.css" rel="stylesheet"/>
        <script src="./CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.min.js"></script> 
        <script src="./CSS/bootstrap-3.3.7-dist/js/bootstrap-datepicker.pt-BR.min.js" charset="UTF-8"></script>

    </script>


</head>

<body >
    <!--carrega a pagina-->
    <?php
    include './Paginas/Login/home.php';
    ?>

</body>
</html>
