<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Curso.class.php';




$curso = new Curso();



$nome = $_POST['nome'];
$curso->setNome($nome);



$resultado = $curso->inserir($curso);



//apresenta mensagem se foi ou não inserido

if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/PUCEventos/Paginas/Administrador/index.php?link=10'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Curso Cadastrado com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=10'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Não foi possível cadastrar");
    </SCRIPT>
    </div>
    <?php
}
?>

