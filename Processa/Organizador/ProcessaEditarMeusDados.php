<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Organizador.class.php';


$organizador = new Organizador();
$id = $_POST["id"];



$organizador = new Organizador();


//verifica se usuario alterou a mesma para manter ou altera-la em md5 ou manter a mesma
$resultadoConsulta = $organizador->consultarCodigo($id);

    $linha = mysqli_fetch_array($resultadoConsulta);
  
    $senhaN = $linha['SENHA'];
    $senhaP = $_POST['senha'];
    
    if($senhaN==$senhaP){
        $senha="'".$senhaN."'";
       
    } else {
      $senha="md5('".$senhaP."')";  
 
}
    

$nomePessoa = $_POST['nomePessoa'];
$CPF = $_POST['cpfPessoa'];
$CPFPessoa = preg_replace("/\D+/", "", $CPF); // remove qualquer caracter não numérico da mascara
$email = $_POST['email'];
$CNPJ = $_POST['cnpjEmpresa'];
$CNPJEmpresa = preg_replace("/\D+/", "", $CNPJ); // remove qualquer caracter não numérico da mascara
//$tel = $_POST['telefone'];
//$telefone = preg_replace("/\D+/", "", $tel); // remove qualquer caracter não numérico da mascara
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];

//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
} else {
    $matricula = 'NULL';
}


if (!empty($_POST['empresa'])) {
    $empresa = $_POST['empresa'];
} else {
    $empresa = '';
}




if (!empty($_POST['cnpjEmpresa'])) {
    if ($organizador->ValidaCPF($CPFPessoa)) {

        if ($organizador->validaCNPJ($CNPJEmpresa)) {


            $resultado = $organizador->alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email,  $CNPJEmpresa, $empresa,$dataNascimento,$sexo);

//apresenta mensagem se foi ou não inserido
//apresenta mensagem se foi ou não inserido
            if ($resultado == true) {
                ?>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

                <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Usuário Editado com sucesso!");
                </SCRIPT>
                <?php
            } else {
                ?>
                <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

                <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                    alert("Não foi possível editar:Matricula ou CPF ou E-mail já cadastrado");
                </SCRIPT>
                </div>
                <?php
            }
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("CNPJ Inválido não foi possivel editar");
            </SCRIPT>
            </div>
            <?php
        }
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("CPF Inválido não foi possivel editar");
        </SCRIPT>
        </div>
        <?php
    }
} else if (empty($_POST['cnpjEmpresa'])) {
    if ($organizador->ValidaCPF($CPFPessoa)) {


        $CNPJEmpresa = 'NULL';

        $resultado = $organizador->alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email,  $CNPJEmpresa, $empresa,$dataNascimento,$sexo);

//apresenta mensagem se foi ou não inserido
//apresenta mensagem se foi ou não inserido
        if ($resultado == true) {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Usuário Editado com sucesso!");
            </SCRIPT>
            <?php
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Não foi possível editar:Matricula ou CPF ou E-mail já cadastrado");
            </SCRIPT>
            </div>
            <?php
        }
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=30'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("CPF Inválido não foi possivel editar");
        </SCRIPT>
        </div>
        <?php
    }
} else {
    
}
?>
