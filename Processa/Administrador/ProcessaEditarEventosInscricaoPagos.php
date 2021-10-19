


<!--intancia as classes e recebe os valores no objeto-->    
<?php
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Evento.class.php';
include '../../Classes/Pessoa.class.php';


$evento = new Evento();
$pessoa = new Pessoa();

$id_Evento = $_POST['idEvento'];
$dataVencimento = $_POST['dataVencimento'];
$dv = explode("/", $dataVencimento);
$dataVencimento = $dv[2] . "-" . $dv[1] . "-" . $dv[0];
$dataDocumento = $_POST['dataDocumento'];
$dd = explode("/", $dataDocumento);
$dataDocumento = $dd[2] . "-" . $dd[1] . "-" . $dd[0];
$prazoPagamento = $_POST['prazoPagamento'];
$nossoNumero = $_POST['nossoNumero'];
$numeroDocumento = $_POST['numeroDocumento'];
$valor = $_POST['valorCobrado'];
$valorCobrado=str_replace(',', '.', $valor);
$demonstrativo1 = $_POST['Demonstrativo1'];
$demonstrativo2 = $_POST['Demonstrativo2'];
$demonstrativo3 = $_POST['Demonstrativo3'];
$instrucoes1 = $_POST['instrucoes1'];
$instrucoes2 = $_POST['instrucoes2'];
$instrucoes3 = $_POST['instrucoes3'];
$codigoCliente = $_POST['codigoCliente'];
$agencia = $_POST['agencia'];
$carteira = $_POST['carteira'];
$carteiraDescricao = $_POST['carteiraDescricao'];
$cpfOuCnpj = $_POST['cpfCnpj'];
$cpfCnpj = preg_replace("/\D+/", "", $cpfOuCnpj); 
$nomeCedente = $_POST['nome'];
$enderecoEmpresa = $_POST['enderecoEmpresa'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];





if (!empty($_POST['cpfCnpj'])) {
    if ($pessoa->ValidaCPF($cpfCnpj) or $pessoa->validaCNPJ($cpfCnpj)) {

       $cpfOuCnpj=$cpfCnpj;

        $resultado = $evento->alterarEventosPagos($id_Evento, $dataVencimento, $dataDocumento, $prazoPagamento, $nossoNumero, $numeroDocumento, $valorCobrado, $demonstrativo1, $demonstrativo2, $demonstrativo3, $instrucoes1, $instrucoes2, $instrucoes3, $codigoCliente, $agencia, $carteira, $carteiraDescricao, $cpfOuCnpj, $nomeCedente, $enderecoEmpresa, $cidade, $uf) ;

//apresenta mensagem se foi ou não inserido
//apresenta mensagem se foi ou não inserido
        if ($resultado == true) {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;http://localhost/PUCEventos/Paginas/Administrador/index.php?link=29'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Dados Editados com sucesso!");
            </SCRIPT>
            <?php
        } else {
            ?>
            <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=29'>

            <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
                alert("Não foi possível editar");
            </SCRIPT>
            </div>
            <?php
        }
    } else {
        ?>
        <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=29'>

        <SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
            alert("CPF ou CNPJ Inválido não foi possivel editar");
        </SCRIPT>
        </div>
        <?php
    }
} 
