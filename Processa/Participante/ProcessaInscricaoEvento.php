<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Evento.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';




$evento = new Evento();
$participante = new Participante();

$autenticacao=$evento->geraAutenticacaoEvento();
$idEventos = $_POST['idEvento'];
$idParticipante = $_POST['idParticipante'];
$gratuitoOuPago=$_POST['gratuitoOuPago'];

$evento->setId_evento($idEventos);
$evento->setIdParticipante($idParticipante);
$evento->setAutenticacao($autenticacao);
if($gratuitoOuPago==1){
    $evento->setId_situacaogratuitooupago(2);
}else{
    $evento->setId_situacaogratuitooupago(1);
}





$resultado = $evento->cadastrarEventoParticipante($evento);


//apresenta mensagem se foi ou não inserido

if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/PUCEventos/Paginas/Participante/index.php?link=1'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Usuário Cadastrado com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=1'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Não foi possível cadastrar");
    </SCRIPT>
    </div>
    <?php
}
?>

