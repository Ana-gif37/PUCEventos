<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Administrador.class.php';


$administrador = new Administrador();


$matricula = $_POST['matricula'];
$senha = $_POST['senha'];
$senhaConfirma = $_POST['senhaConfirma'];
$nomePessoa = $_POST['nomePessoa'];
$CPF = $_POST['cpfPessoa'];
$CPFPessoa = preg_replace("/\D+/", "", $CPF); // remove qualquer caracter não numérico da mascars
$email = $_POST['email'];
$emailConfirma = $_POST['emailConfirma'];



$administrador->setSenha($senha);
$administrador->setNomePessoa($nomePessoa);
$administrador->setCPFPessoa($CPFPessoa);
$administrador->setEmail($email);

//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
    $administrador->setMatricula($matricula);
} else {
    $administrador->setMatricula('NULL');
}






if ($administrador->ValidaCPF($CPFPessoa)) {
    if ($email == $emailConfirma and $senha == $senhaConfirma) {
        $resultado = $administrador->inserir($administrador);



//apresenta mensagem se foi ou não inserido
        if ($resultado == true) {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=9'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Usuário Cadastrado com sucesso!");
            </SCRIPT>
            <?php
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=9'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Não foi possível cadastrar:Matricula ou CPF ou E-mail já cadastrado");
            </SCRIPT>
            </div>
            <?php
        }
    }
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=9'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Cpf Inválido não foi possivel cadastrar");
    </SCRIPT>
    </div>
    <?php
} if ($senha != $senhaConfirma) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=9'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Senhas não conferem");
    </SCRIPT>
    </div>

    <?php
}
if ($email != $emailConfirma) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=9'>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("E-mails não conferem");
    </SCRIPT>
    </div>

<?php }
?>

