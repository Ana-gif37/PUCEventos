<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';


$participante = new Participante();

$id = $_POST["id"];
//verifica se usuario alterou a mesma para manter ou altera-la em md5 ou manter a mesma
$resultadoConsulta = $participante->consultarCodigo($id);

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
$sexo = $_POST['sexo'];
$dataNascimento = $_POST['dataNascimento'];



//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
 $matricula = $_POST['matricula'];
} else {
  $matricula = 'NULL';
}


if (!empty($_POST['curso'])) {
    $curso = $_POST['curso'];
} else {
    $curso = 'NULL';
}

if (!empty($_POST['periodo'])) {
    $periodo = $_POST['periodo'];
} else {
    $periodo = 'NULL';
}

if (!empty($_POST['id_unidade'])) {
    $unidade = $_POST['id_unidade'];
} else {
    $unidade = 'NULL';
}


//função para verificar se é um cpf válido

if ($participante->ValidaCPF($CPFPessoa)) {

    $resultado = $participante->alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email, $curso, $periodo, $unidade,$dataNascimento,$sexo);

//apresenta mensagem se foi ou não inserido

    if ($resultado == true) {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=11'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Usuário editado com sucesso!");
        </SCRIPT>
        <?php
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=11'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("Não foi possível editar:Matricula ou CPF ou E-mail já cadastrado");
        </SCRIPT>
        </div>
        <?php
    }
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=11'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Cpf Inválido não foi possivel editar");
    </SCRIPT>
    </div>
    <?php
}


