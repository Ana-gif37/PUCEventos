<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Unidade.class.php';


$unidade = new Unidade();

$id = $_GET["id"];

$ativar = $_GET["ativar"];

$resultado = $unidade->ativarDesativar($ativar, $id);


if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=18'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Ação Concluída com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=18'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Erro não foi possível concluir a ação");
    </SCRIPT>
    <?php
}
  