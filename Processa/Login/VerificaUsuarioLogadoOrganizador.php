<?php

include("../../Classes/ConexaoBD/Conexao.class.php");
include '../../Classes/Pessoa.class.php';
include '../../Classes/Organizador.class.php';


$organizador = new Organizador();
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $resultadoConsulta = $organizador->consultarEmail($email);

    for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
        $linha = mysqli_fetch_array($resultadoConsulta);
        $nome = $linha['NOMEPESSOA'];
        $idOrganizador = $linha['ID'];
        $_SESSION['nomeOrganizador'] = $nome;
        $_SESSION['idOrganizador'] = $idOrganizador;
    }
}
