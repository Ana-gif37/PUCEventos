<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/ListaPresenca.class.php';



$presenca = new ListaPresenca();

$dataLista = $_POST['dataChamada'];
$idEvento = $_POST['idEvento'];


$dc = explode("/", $dataLista);
$dataLista = $dc[2] . "-" . $dc[1] . "-" . $dc[0];

$presenca->setDataLista($dataLista);
$presenca->setIdEvento($idEvento);

if (!empty($_POST['participantes'])) {
    if (isset($_POST['gravar'])) {

        $participant = $_POST['participantes'];
        $numCheckBox = count($participant);

        for ($i = 0; $i < $numCheckBox; $i++) {
            $presenca->setIdParticipante($participant[$i]);
            $presenca->setPresenca(1);
            $resultado = $presenca->inserir($presenca);
        }
    } 
}


//apresenta mensagem se foi ou não inserido

if ($resultado == true) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Chamada gravada com sucesso!");
    </SCRIPT>
    <?php
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Não foi possível gravar a chamada");
    </SCRIPT>
    </div>
    <?php
}
?>

