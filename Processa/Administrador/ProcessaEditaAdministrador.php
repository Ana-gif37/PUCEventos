<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Administrador.class.php';


$administrador = new Administrador();


//verifica se usuario alterou a mesma para manter ou altera-la em md5 ou manter a mesma
$resultadoConsulta = $administrador->consultarCodigo($_SESSION['idAdministrador']);

    $linha = mysqli_fetch_array($resultadoConsulta);
  
    $senhaN = $linha['SENHA'];
    $senhaP = $_POST['senha'];
    
    if($senhaN==$senhaP){
        $senha="'".$senhaN."'";
       
    } else {
      $senha="md5('".$senhaP."')";  
 
}
    
    
  




$id = $_POST["id"];

$nomePessoa = $_POST['nomePessoa'];
$CPF = $_POST['cpfPessoa'];
$CPFPessoa = preg_replace("/\D+/", "", $CPF); // remove qualquer caracter não numérico da mascars
$email = $_POST['email'];

//verifica se o campo matricula ta diferente de null e passa valor para ele caso contraro seta nulo
if (!empty($_POST['matricula'])) {
    $matricula = $_POST['matricula'];
} else {
    $matricula = 'NULL';
}






if ($administrador->ValidaCPF($CPFPessoa)) {
  
        
        $resultado = $administrador->alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email);



//apresenta mensagem se foi ou não inserido
        if ($resultado == true) {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=14'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Usuário editado com sucesso!");
            </SCRIPT>
            <?php
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=14'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Não foi possível editar:Matricula ou CPF ou E-mail já cadastrado");
            </SCRIPT>
            </div>
            <?php
        }
    
} else {
    ?>
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=14'>

    <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
        alert("Cpf Inválido não foi possivel cadastrar");
    </SCRIPT>
    </div>
    <?php
}