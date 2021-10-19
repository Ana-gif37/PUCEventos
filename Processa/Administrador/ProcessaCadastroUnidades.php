<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Unidade.class.php';



$unidade = new Unidade();

$nome = $_POST['nome'];

$unidade->setNome($nome);

 $resultado = $unidade->inserir($unidade);


//apresenta mensagem se foi ou não inserido

    if ($resultado == true) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=11'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Unidade Cadastrado com sucesso!");
        </SCRIPT>
    <?php
    } else {
 
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=11'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Não foi possível cadastrar");
        </SCRIPT>
        </div>
        <?php
    }

?>

