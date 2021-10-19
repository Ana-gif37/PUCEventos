
<?php

$assunto = $_REQUEST['assunto'];
$mensagem = $_REQUEST['mensagem'];
$idRemetente = $_REQUEST['idAdministrador'];
$emailDestinatario = "";





//Grava dados do checkbox

include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Organizador.class.php';
include '../../Classes/Administrador.class.php';

$pessoa = new Pessoa();
$organizador = new Organizador();
$administrador = new Administrador();



$nomeDoAdministrador = $administrador->consultarCodigo($idRemetente);
$linha = mysqli_fetch_array($nomeDoAdministrador);
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
$pessoa->EnviarMensagemGrupoDePessoas($nomeRemetente,$emailDestinatario, $assunto, $mensagem, $numCheckBox);





