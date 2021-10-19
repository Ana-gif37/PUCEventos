
<?php

$assunto = $_REQUEST['assunto'];
$mensagem = $_REQUEST['mensagem'];
$idRemetente = $_REQUEST['idPalestrante'];
$emailDestinatario = "";





//Grava dados do checkbox

include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Organizador.class.php';
include '../../Classes/Palestrante.class.php';

$pessoa = new Pessoa();
$organizador = new Organizador();
$palestrante = new Palestrante();



$nomeDoPalestrante = $palestrante->consultarCodigo($idRemetente);
$linha = mysqli_fetch_array($nomeDoPalestrante);
$nomeRemetente=$linha['NOMEPESSOA'];




if (isset($_POST['enviarEmail'])) {
    $organizadors = $_REQUEST['organizador'];
    $numCheckBox = count($organizadors);

    for ($i = 0; $i < $numCheckBox; $i++) {

        $todosOrganizadoresSelecionados = $organizador->consultarCodigo($organizadors[$i]);
        $linha = mysqli_fetch_array($todosOrganizadoresSelecionados);

        $email = $linha['EMAIL'];

        $emailDestinatario .= $email . ";";
    }
}
$pessoa->EnviarMensagemGrupoDePessoasPeloPalestrante($nomeRemetente,$emailDestinatario, $assunto, $mensagem, $numCheckBox);





