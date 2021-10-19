<?php

ob_start();
if (($_SESSION['email'] == "") || ($_SESSION['senha'] == "")) {
    unset($_SESSION['usuarioId'], $_SESSION['email'], $_SESSION['senha']
    );
    //Mensagem de Erro
    $_SESSION['loginErro'] = "Área restrita para usuários cadastrados";

    //Manda o usuário para a tela de login
    header("location: index.php?erro=senha");
}