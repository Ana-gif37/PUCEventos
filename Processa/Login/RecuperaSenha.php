
    <?php
// intancia as classes e recebe os valores no objeto    
    if ($_POST) {

        include("../../Classes/ConexaoBD/Conexao.class.php");
        include("../../Classes/Pessoa.class.php");
        include("../../Classes/Administrador.class.php");
        include("../../Classes/Organizador.class.php");
        include '../../Classes/Palestrante.class.php';
        include '../../Classes/Participante.class.php';

        $pessoa = new Pessoa();
        $usuarioAdministrador = new Administrador();
        $usuarioParticipante = new Participante();
        $usuarioOrganizador = new Organizador();
        $usuarioPalestrante = new Palestrante();


        //gera um token  randomico para o link de redefinir senha
        $token = rand(100, 1000000000);

        $emailUsuario = $_POST['email'];
        $tipoUsuario = $_POST['tipoUsuario'];



//olha se o senha digitado e igual o do banco de dados
        $userAdministrador = $usuarioAdministrador->consultarRecuperarSenha($emailUsuario);
        $userParticipante = $usuarioParticipante->consultarRecuperarSenha($emailUsuario);
        $userOrganizador = $usuarioOrganizador->consultarRecuperarSenha($emailUsuario);
        $userPalestrante = $usuarioPalestrante->consultarRecuperarSenha($emailUsuario);



//verifica qual o tipo de usuario e direciona para a pagina de acordo com suas permissoes
        if ($userAdministrador == TRUE and $tipoUsuario == 'Administrador') {
            $usuario = 'administrador';

            for ($i = 0; $i < mysqli_num_rows($userAdministrador); $i++) {
                $linha = mysqli_fetch_array($userAdministrador);


                $nomeDestinatario = $linha["NOMEPESSOA"];
                $emailDestinatario = $linha["EMAIL"];
            }

            $editarTokenAdministrador = $usuarioAdministrador->AtualizarToken($emailDestinatario, $token);

            if ($editarTokenAdministrador == true) {
                // chama metodo de configurações de envio de e-mail
                $pessoa->EnviarMensagemRecuperaSenha($emailDestinatario, $nomeDestinatario, $token, $usuario);
            }




            //caso a redefinição seja de participante
        } else if ($userParticipante == TRUE and $tipoUsuario == 'Participante') {
            $usuario = 'participante';

            for ($i = 0; $i < mysqli_num_rows($userParticipante); $i++) {
                $linha = mysqli_fetch_array($userParticipante);


                $nomeDestinatario = $linha["NOMEPESSOA"];
                $emailDestinatario = $linha["EMAIL"];
            }

            $editarTokenParticipante = $usuarioParticipante->AtualizarToken($emailDestinatario, $token);

            if ($editarTokenParticipante == true) {
                // chama metodo de configurações de envio de e-mail
                $pessoa->EnviarMensagemRecuperaSenha($emailDestinatario, $nomeDestinatario, $token, $usuario);
            }
        } else if ($userOrganizador == TRUE and $tipoUsuario == 'Organizador') {
            $usuario = 'organizador';

            for ($i = 0; $i < mysqli_num_rows($userOrganizador); $i++) {
                $linha = mysqli_fetch_array($userOrganizador);


                $nomeDestinatario = $linha["NOMEPESSOA"];
                $emailDestinatario = $linha["EMAIL"];
            }

            $editarTokenOrganizador = $usuarioOrganizador->AtualizarToken($emailDestinatario, $token);

            if ($editarTokenOrganizador == true) {
                // chama metodo de configurações de envio de e-mail
                $pessoa->EnviarMensagemRecuperaSenha($emailDestinatario, $nomeDestinatario, $token, $usuario);
            }
        } else if ($userPalestrante== TRUE and $tipoUsuario == 'Palestrante') {
            $usuario = 'palestrante';

            for ($i = 0; $i < mysqli_num_rows($userPalestrante); $i++) {
                $linha = mysqli_fetch_array($userPalestrante);


                $nomeDestinatario = $linha["NOMEPESSOA"];
                $emailDestinatario = $linha["EMAIL"];
            }

            $editarTokenPalestrante = $usuarioPalestrante->AtualizarToken($emailDestinatario, $token);

            if ($editarTokenPalestrante == true) {
                // chama metodo de configurações de envio de e-mail
                $pessoa->EnviarMensagemRecuperaSenha($emailDestinatario, $nomeDestinatario, $token, $usuario);
            }




            //caso a redefinição seja de participante
        } else {

            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"E-mail não cadastrado em nossa base de dados.\");
				</script>
			";
        }
    }

  
