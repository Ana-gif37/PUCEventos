<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Administrador.class.php';



$administrador= new Administrador();

$id = $_GET["id"];

$ativar = $_GET["ativar"];

$resultado = $administrador->ativarDesativar($ativar, $id);


if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=14'>

      <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Ação Concluída com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=12'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Erro não foi possível concluir a ação");
    </SCRIPT>
    <?php
}
  