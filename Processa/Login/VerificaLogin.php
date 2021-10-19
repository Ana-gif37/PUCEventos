<?php
// intancia as classes e recebe os valores no objeto    
if ($_POST) {

    include("./Classes/ConexaoBD/Conexao.class.php");
    include './Classes/Pessoa.class.php';
    include './Classes/Administrador.class.php';
    include './Classes/Participante.class.php';
    include './Classes/Palestrante.class.php';
    include './Classes/Organizador.class.php';



    $usuarioAdministrador = new Administrador();
    $usuarioParticipante = new Participante();
    $usuarioOrganizador = new Organizador();
    $usuarioPalestrante = new Palestrante();

    $login = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);
    $tipoUsuario = addslashes($_POST['tipoUsuario']);



//olha se o senha digitado e igual o do banco de dados
    $userAdministrador = $usuarioAdministrador->login($senha, $login);
    $userParticipante = $usuarioParticipante->login($senha, $login);
    $userOrganizador = $usuarioOrganizador->login($senha, $login);
    $userPalestrante = $usuarioPalestrante->login($senha, $login);

//verifica qual o tipo de usuario e direciona para a pagina de acordo com suas permissoes
    if ($userAdministrador == TRUE and $tipoUsuario == 'Administrador') {
        session_start();
        $_SESSION['email'] = $login;
        $_SESSION['senha'] = $senha;


        $url = "location: Paginas/Administrador/index.php?link=1&email=" . $_SESSION['email'];
        header($url);
        exit;
    } else if ($userParticipante == TRUE and $tipoUsuario == 'Participante') {
        session_start();
        $_SESSION['email'] = $login;
        $_SESSION['senha'] = $senha;
        $url = "location: Paginas/Participante/index.php?link=1&email=" . $_SESSION['email'];
        header($url);
        exit;
    } else if ($userOrganizador == TRUE and $tipoUsuario == 'Organizador') {
        session_start();
        $_SESSION['email'] = $login;
        $_SESSION['senha'] = $senha;
        $url = "location: Paginas/Organizador/index.php?link=1&email=" . $_SESSION['email'];
        header($url);
        exit;
    } else if ($userPalestrante == TRUE and $tipoUsuario == 'Palestrante') {
        session_start();
        $_SESSION['email'] = $login;
        $_SESSION['senha'] = $senha;
        $url = "location: Paginas/Palestrante/index.php?link=1&email=" . $_SESSION['email'];
        header($url);
        exit;
    } else {

        header("location: index.php?erro=senha");
    }
}
?>
<!--se usuário for incorreto exibe mensagem-->
<?php
if ($_GET) {
    if (isset($_GET['erro'])) {
        ?>
        </br><center>
            <?php
            echo " 
                        <div class='alerta'>
                            Usuário ou senha inválidos!
                        </div>   
                 
                    ";
        }
    }
   
  
