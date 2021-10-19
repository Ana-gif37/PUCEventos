


<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Organizador.class.php';

$organizador = new Organizador();


$matricula = $_POST['matricula'];
$senha = $_POST['senha'];
$senhaConfirma = $_POST['senhaConfirma'];
$nomePessoa = $_POST['nomePessoa'];
$empresa = $_POST['empresa'];
$CPF = $_POST['cpfPessoa'];
$CPFPessoa = preg_replace("/\D+/", "", $CPF); // remove qualquer caracter não numérico da mascara
$email = $_POST['email'];
$emailConfirma = $_POST['emailConfirma'];
$CNPJ = $_POST['cnpjEmpresa'];
$CNPJEmpresa = preg_replace("/\D+/", "", $CNPJ); // remove qualquer caracter não numérico da mascara
//$tel = $_POST['telefone'];
//$telefone = preg_replace("/\D+/", "", $tel); // remove qualquer caracter não numérico da mascara
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];
$dn = explode("/", $dataNascimento);
$dataNascimento = $dn[2] . "-" . $dn[1] . "-" . $dn[0];




$organizador->setSenha($senha);
$organizador->setNomePessoa($nomePessoa);
$organizador->setCPFPessoa($CPFPessoa);
$organizador->setEmail($email);
//$organizador->setTelefone($telefone);
$organizador->setSexo($sexo);
$organizador->setDataNascimento($dataNascimento);

//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
    $organizador->setMatricula($matricula);
} else {
    $organizador->setMatricula('NULL');
}


if (!empty($_POST['empresa'])) {
    $organizador->setEmpresa($empresa);
} else {
    $organizador->setEmpresa(NULL);
}





if (!empty($_POST['cnpjEmpresa'])) {
    if ($organizador->ValidaCPF($CPFPessoa)) {

        if ($organizador->validaCNPJ($CNPJEmpresa)) {
            $organizador->setCnpjEmpresa($CNPJEmpresa);
            if ($email == $emailConfirma and $senha == $senhaConfirma) {
                $resultado = $organizador->inserir($organizador);

//apresenta mensagem se foi ou não inserido
//apresenta mensagem se foi ou não inserido
                if ($resultado == true) {
                    ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                        alert("Usuário Cadastrado com sucesso!");
                    </SCRIPT>
                    <?php
                } else {
                    ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                        alert("Não foi possível cadastrar:Matricula ou CPF ou E-mail já cadastrado");
                    </SCRIPT>
                    </div>
                    <?php
                }
            }
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("CNPJ Inválido não foi possivel cadastrar");
            </SCRIPT>
            </div>
            <?php
        }
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("CPF Inválido não foi possivel cadastrar");
        </SCRIPT>
        </div>
        <?php
    }
} else if (empty($_POST['cnpjEmpresa'])) {
    if ($organizador->ValidaCPF($CPFPessoa)) {

      
            $organizador->setCnpjEmpresa('NULL');
            if ($email == $emailConfirma and $senha == $senhaConfirma) {
                $resultado = $organizador->inserir($organizador);

//apresenta mensagem se foi ou não inserido
//apresenta mensagem se foi ou não inserido
                if ($resultado == true) {
                    ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                        alert("Usuário Cadastrado com sucesso!");
                    </SCRIPT>
                    <?php
                } else {
                    ?>
                    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

                    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                        alert("Não foi possível cadastrar:Matricula ou CPF ou E-mail já cadastrado");
                    </SCRIPT>
                    </div>
                    <?php
                }
            }
         
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("CPF Inválido não foi possivel cadastrar");
        </SCRIPT>
        </div>
        <?php
    }
} else {

    if ($senha != $senhaConfirma) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Senhas não conferem");
        </SCRIPT>
        </div>

        <?php
    }
    if ($email != $emailConfirma) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=8'>
        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("E-mails não conferem");
        </SCRIPT>
        </div>

    <?php
    }
}
?>
