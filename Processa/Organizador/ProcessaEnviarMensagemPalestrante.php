
<?php

$assunto = $_REQUEST['assunto'];
$mensagem = $_REQUEST['mensagem'];
$idRemetente = $_REQUEST['idOrganizador'];
$emailDestinatario = "";





//Grava dados do checkbox

include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Palestrante.class.php';
include '../../Classes/Organizador.class.php';

$pessoa = new Pessoa();
$palestrante = new Palestrante();
$organizador = new Organizador();



$nomeDoOrganizador = $organizador->consultarCodigo($idRemetente);
$linha = mysqli_fetch_array($nomeDoOrganizador);
$nomeRemetente=$linha['NOMEPESSOA'];




if (isset($_POST['enviarEmail'])) {
    $palestrantes = $_REQUEST['palestrantes'];
    $numCheckBox = count($palestrantes);

    for ($i = 0; $i < $numCheckBox; $i++) {

        $todosPalestrantesSelecionados = $palestrante->consultarCodigo($palestrantes[$i]);
        $linha = mysqli_fetch_array($todosPalestrantesSelecionados);

        $email = $linha['EMAIL'];

        $emailDestinatario .= $email . ";";
    }
}
$pessoa->EnviarMensagemGrupoDePessoasPeloOrganizador($nomeRemetente,$emailDestinatario, $assunto, $mensagem, $numCheckBox);





