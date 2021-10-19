<?php

include("../../Classes/ConexaoBD/Conexao.class.php");
include '../../Classes/Pessoa.class.php';
include '../../Classes/Administrador.class.php';


$administrador = new Administrador();
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $resultadoConsulta = $administrador->consultarEmail($email);

    for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
        $linha = mysqli_fetch_array($resultadoConsulta);
        $nome = $linha['NOMEPESSOA'];
        $idAdministrador = $linha['ID'];
        $_SESSION['nomeAdministrador'] = $nome;
        $_SESSION['idAdministrador'] = $idAdministrador;
    }
}
