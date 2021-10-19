
<?php

$assunto = $_REQUEST['assunto'];
$mensagem = $_REQUEST['mensagem'];
$idRemetente = $_REQUEST['idOrganizador'];
$emailDestinatario = "";





//Grava dados do checkbox

include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Administrador.class.php';
include '../../Classes/Organizador.class.php';

$pessoa = new Pessoa();
$administrador = new Administrador();
$organizador = new Organizador();



$nomeDoOrganizador = $organizador->consultarCodigo($idRemetente);
$linha = mysqli_fetch_array($nomeDoOrganizador);
$nomeRemetente=$linha['NOMEPESSOA'];




if (isset($_POST['enviarEmail'])) {
    $administradors = $_REQUEST['administradores'];
    $numCheckBox = count($administradors);

    for ($i = 0; $i < $numCheckBox; $i++) {

        $todosAdministradorsSelecionados = $administrador->consultarCodigo($administradors[$i]);
        $linha = mysqli_fetch_array($todosAdministradorsSelecionados);

        $email = $linha['EMAIL'];

        $emailDestinatario .= $email . ";";
    }
}
$pessoa->EnviarMensagemGrupoDePessoasPeloOrganizador($nomeRemetente,$emailDestinatario, $assunto, $mensagem, $numCheckBox);





