<?php

session_start();
session_destroy();

//Remove todas as informações contidas na variaveis globais
unset($_SESSION['matricula'], $_SESSION['senha'], $_SESSION['usuarioNivelAcesso'], $_SESSION['nomeOrganizador'], $_SESSION['idOrganizador']);

//redirecionar o usuário para a página de login
header("Location: http://localhost/PUCEventos/index.php");
?>
