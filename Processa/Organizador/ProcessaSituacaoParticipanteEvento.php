<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Evento.class.php';

$eventoId = $_GET['evento'];
$id = $_GET['id'];
$situacao = $_GET['situacao'];



$evento = new Evento();


$resultado = $evento->cancelarInscricao($eventoId,$id,$situacao);


//apresenta mensagem se foi ou não inserido

if ($resultado == true) {
    ?>
<META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/PUCEventos/Paginas/Organizador/index.php?link=7&evento=<?php echo $eventoId?>'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Ação com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=7&evento=<?php echo $eventoId?>'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Não foi possível executar a ação");
    </SCRIPT>
    </div>
    <?php
}
?>

