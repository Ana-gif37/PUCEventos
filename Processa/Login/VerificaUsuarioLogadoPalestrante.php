<?php

include("../../Classes/ConexaoBD/Conexao.class.php");
include '../../Classes/Pessoa.class.php';
include '../../Classes/Palestrante.class.php';


$palestrante = new Palestrante();
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $resultadoConsulta = $palestrante->consultarEmail($email);

    for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
        $linha = mysqli_fetch_array($resultadoConsulta);
        $nome = $linha['NOMEPESSOA'];
        $idPalestrante = $linha['ID'];
        $_SESSION['nomePalestrante'] = $nome;
        $_SESSION['idPalestrante'] = $idPalestrante;
    }
}
