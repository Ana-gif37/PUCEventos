<?php

include("../../Classes/ConexaoBD/Conexao.class.php");
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';


$participante = new participante();
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    $resultadoConsulta = $participante->consultarEmail($email);

    for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
        $linha = mysqli_fetch_array($resultadoConsulta);
        $nome = $linha['NOMEPESSOA'];
        $idParticipante = $linha['ID'];
        $_SESSION['nomeParticipante'] = $nome;
        $_SESSION['idParticipante'] = $idParticipante;
    }
}
