<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Evento.class.php';



$evento = new Evento();

$id = $_GET["id"];

$ativar = $_GET["ativar"];

$tipo = $_GET["tipo"];

$resultado = $evento->destacar($ativar, $id);


if ($tipo == 'pago') {

    if ($resultado == true) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=29'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Ação Concluída com sucesso!");
        </SCRIPT>
        <?php
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=29'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Erro não foi possível concluir a ação");
        </SCRIPT>
        <?php
    }
}


if ($tipo == 'gratuito') {

    if ($resultado == true) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=28'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Ação Concluída com sucesso!");
        </SCRIPT>
        <?php
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=28'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Erro não foi possível concluir a ação");
        </SCRIPT>
        <?php
    }
}