<?php

include("../../Classes/ConexaoBD/Conexao.class.php");
include("../../Classes/Pessoa.class.php");
include("../../Classes/Administrador.class.php");
include("../../Classes/Organizador.class.php");
include("../../Classes/Palestrante.class.php");
include("../../Classes/Participante.class.php");

$usuarioAdministrador = new Administrador();
$usuarioParticipante = new Participante();
$usuarioOrganizador = new Organizador();
$usuarioPalestrante = new Palestrante();


//olha se o senha digitado e igual o do banco de dados
$userAdministrador = $usuarioAdministrador->consultarToken($token);
$userParticipante = $usuarioParticipante->consultarToken($token);
$userOrganizador = $usuarioOrganizador->consultarToken($token);
$userPalestrante = $usuarioPalestrante->consultarToken($token);
if ($tipoUsuario == 'administrador') {

    for ($i = 0; $i < mysqli_num_rows($userAdministrador); $i++) {
        $linha = mysqli_fetch_array($userAdministrador);

        $senha = $linha["SENHA"];
        $email = $linha["EMAIL"];
    }
    if (isset($_POST['enviar'])) {
        $senha = addslashes(trim(strip_tags($_POST['senha'])));
        $editarTokenAdministrador = $usuarioAdministrador->AtualizarSenha($email, $senha);

        if ($editarTokenAdministrador == TRUE) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Senha alterada com sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail confirme seu endereço de e-mail se é valido ou tente mais tarde.\");
				</script>
			";
        }
    }
}



if ($tipoUsuario == 'participante') {

    for ($i = 0; $i < mysqli_num_rows($userParticipante); $i++) {
        $linha = mysqli_fetch_array($userParticipante);

        $senha = $linha["SENHA"];
        $email = $linha["EMAIL"];
    }
    if (isset($_POST['enviar'])) {
        $senha = addslashes(trim(strip_tags($_POST['senha'])));
        $editarTokenParticipante = $usuarioParticipante->AtualizarSenha($email, $senha);

        if ($editarTokenParticipante == TRUE) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Senha alterada com sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao atualizar a senha lembrando que o link é valido apenas para uma alteração. se persisttir o problema tente mais tarde.\");
				</script>
			";
        }
    }
}



if ($tipoUsuario == 'organizador') {

    for ($i = 0; $i < mysqli_num_rows($userOrganizador); $i++) {
        $linha = mysqli_fetch_array($userOrganizador);

        $senha = $linha["SENHA"];
        $email = $linha["EMAIL"];
    }
    if (isset($_POST['enviar'])) {
        $senha = addslashes(trim(strip_tags($_POST['senha'])));
        $editarTokenOrganizador = $usuarioOrganizador->AtualizarSenha($email, $senha);

        if ($editarTokenOrganizador == TRUE) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Senha alterada com sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao atualizar a senha lembrando que o link é valido apenas para uma alteração. se persisttir o problema tente mais tarde.\");
				</script>
			";
        }
    }
}




if ($tipoUsuario == 'palestrante') {

    for ($i = 0; $i < mysqli_num_rows($userPalestrante); $i++) {
        $linha = mysqli_fetch_array($userPalestrante);

        $senha = $linha["SENHA"];
        $email = $linha["EMAIL"];
    }
    if (isset($_POST['enviar'])) {
        $senha = addslashes(trim(strip_tags($_POST['senha'])));
        $editarTokenOrganizador = $usuarioPalestrante->AtualizarSenha($email, $senha);

        if ($editarTokenOrganizador == TRUE) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Senha alterada com sucesso.\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao atualizar a senha lembrando que o link é valido apenas para uma alteração. se persisttir o problema tente mais tarde.\");
				</script>
			";
        }
    }
}