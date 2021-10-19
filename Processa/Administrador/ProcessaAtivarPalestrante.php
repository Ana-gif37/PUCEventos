<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Palestrante.class.php';



$palestrante = new Palestrante();

$id = $_GET["id"];

$ativar = $_GET["ativar"];

$resultado = $palestrante->ativarDesativar($ativar, $id);


if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=44'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Ação Concluída com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=44'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Erro não foi possível concluir a ação");
    </SCRIPT>
    <?php
}
  