
<?php

$assunto = $_REQUEST['assunto'];
$mensagem = $_REQUEST['mensagem'];
$idRemetente = $_REQUEST['idOrganizador'];
$emailDestinatario = "";





//Grava dados do checkbox

include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';
include '../../Classes/Organizador.class.php';

$pessoa = new Pessoa();
$participante = new Participante();
$organizador = new Organizador();



$nomeDoOrganizador = $organizador->consultarCodigo($idRemetente);
$linha = mysqli_fetch_array($nomeDoOrganizador);
$nomeRemetente=$linha['NOMEPESSOA'];




if (isset($_POST['enviarEmail'])) {
    $participantes = $_REQUEST['participantes'];
    $numCheckBox = count($participantes);

    for ($i = 0; $i < $numCheckBox; $i++) {

        $todosParticipantesSelecionados = $participante->consultarCodigo($participantes[$i]);
        $linha = mysqli_fetch_array($todosParticipantesSelecionados);

        $email = $linha['EMAIL'];

        $emailDestinatario .= $email . ";";
    }
}
$pessoa->EnviarMensagemGrupoDePessoasPeloOrganizador($nomeRemetente,$emailDestinatario, $assunto, $mensagem, $numCheckBox);





