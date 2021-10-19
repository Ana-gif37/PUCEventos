<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';




$participante = new Participante();


$matricula = $_POST['matricula'];
$senha = $_POST['senha'];
$senhaConfirma = $_POST['senhaConfirma'];
$nomePessoa = $_POST['nomePessoa'];
$CPF = $_POST['cpfPessoa'];
$CPFPessoa = preg_replace("/\D+/", "", $CPF); // remove qualquer caracter não numérico da mascars
$email = $_POST['email'];
$emailConfirma = $_POST['emailConfirma'];
$curso = $_POST['curso'];
$periodo = $_POST['periodo'];
$unidade = $_POST['id_unidade'];
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$dn = explode("/", $dataNascimento);
$dataNascimento = $dn[2] . "-" . $dn[1] . "-" . $dn[0];



$participante->setSenha($senha);
$participante->setNomePessoa($nomePessoa);
$participante->setCPFPessoa($CPFPessoa);
$participante->setEmail($email);
$participante->setSexo($sexo);
$participante->setDataNascimento($dataNascimento);





//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
    $participante->setMatricula($matricula);
} else {
    $participante->setMatricula('NULL');
}


if (!empty($_POST['curso'])) {
    $participante->setCurso($curso);
} else {
    $participante->setCurso('NULL');
}

if (!empty($_POST['periodo'])) {
    $participante->setPeriodo($periodo);
} else {
    $participante->setPeriodo('NULL');
}

if (!empty($_POST['id_unidade'])) {
    $participante->setUnidade($unidade);
} else {
    $participante->setUnidade('NULL');
}


//função para verificar se é um cpf válido

if ($participante->ValidaCPF($CPFPessoa)) {

    if ($email == $emailConfirma and $senha == $senhaConfirma) {
        $resultado = $participante->inserir($participante);

//apresenta mensagem se foi ou não inserido

        if ($resultado == true) {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Usuário Cadastrado com sucesso!");
            </SCRIPT>
            <?php
        } else {
        
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Não foi possível cadastrar:Matricula ou CPF ou E-mail já cadastrado");
            </SCRIPT>
            </div>
            <?php
        }
    }
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Cpf Inválido não foi possivel cadastrar");
    </SCRIPT>
    </div>
    <?php
}if ($senha != $senhaConfirma) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Senhas não conferem");
    </SCRIPT>
    </div>

    <?php
}
if ($email != $emailConfirma) {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("E-mails não conferem");
    </SCRIPT>
    </div>

<?php }
?>

