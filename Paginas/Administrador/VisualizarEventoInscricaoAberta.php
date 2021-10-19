
<?php
include '../../Classes/Evento.class.php';



$evento = new Evento();

$id = $_GET['id'];

$resultadoConsulta = $evento->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idCurso = $linha['ID'];
    $nome = $linha['NOME_EVENTO'];
    $dataInicioInscricao = $linha['DATAINICIOINSCRICAO'];
    $dataFimInscricao = $linha['DATAFIMINSCRICAO'];
    $dataInicioEvento = $linha['DATAINICIOEVENTO'];
    $horaInicioEvento = $linha['HORAINICIOEVENTO'];
    $horaFimEvento = $linha['HORAFIMEVENTO'];
    $dataFimEvento = $linha['DATAFIMEVENTO'];
    $quantidadeVagas = $linha['QUANTIDADEVAGAS'];
    $descricao = $linha['DESCRICAO'];
    $gratuitoOuPago = $linha['GRATUITOOUPAGO'];
    $id_unidade = $linha['ID_UNIDADE'];
    $id_oganizador = $linha['ID_ORGANIZADOR'];
    $imagem = $linha['IMAGEM'];




    if ($gratuitoOuPago == 2) {

        $resultado = $evento->consultarDadosEventosPagos($id);
        for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
            $linha = mysqli_fetch_array($resultado);
            $diasPrazo = $linha['DIASPRAZO'];
            $dataVenciment = $linha['DATAVENCIMENTO'];
            $dataVencimento = date('d/m/Y', strtotime($dataVenciment));
            $valorCobrad = $linha['VALORCOBRADO'];
            $valorCobrado = str_replace('.', ',', $valorCobrad);
            $dataDocument = $linha['DATADOCUMENTO'];
            $dataDocumento = date('d/m/Y', strtotime($dataDocument));
            $nossoNumero = $linha['NOSSO_NUMERO'];
            $numeroDocumento = $linha['NUMERO_DOCUMENTO'];
            $demonstrativo1 = $linha['DEMONSTRATIVO1'];
            $demonstrativo2 = $linha['DEMONSTRATIVO2'];
            $demonstrativo3 = $linha['DEMONSTRATIVO3'];
            $instrucoes1 = $linha['INSTRUCOES1'];
            $instrucoes2 = $linha['INSTRUCOES2'];
            $instrucoes3 = $linha['INSTRUCOES3'];
            $psk = $linha['PSK'];
            $agencia = $linha['AGENCIA'];
            $carteira = $linha['CARTEIRA'];
            $carteiraDescricao = $linha['CARTEIRA_DESCRICAO'];
            $nomeCedente = $linha['NOMECEDENTE'];
            $cpfOuCnpj = $linha['CNPJEMPRESA'];
            $enderecoEmpresa = $linha['ENDERECOEMPRESA'];
            $cidadee = $linha['CIDADE'];
            $uf = $linha['UF'];

            $parte_um = substr($cpfOuCnpj, 0, 3);
            $parte_dois = substr($cpfOuCnpj, 3, 3);
            $parte_tres = substr($cpfOuCnpj, 6, 3);
            $parte_quatro = substr($cpfOuCnpj, 9, 3);
            $parte_cinco = substr($cpfOuCnpj, 12, 2);

            if ($parte_um == 000) {
                $cpfCnpj = "$parte_dois.$parte_tres.$parte_quatro-$parte_cinco";
            } else {
                $parte_um = substr($cpfOuCnpj, 0, 2);
                $parte_dois = substr($cpfOuCnpj, 2, 3);
                $parte_tres = substr($cpfOuCnpj, 5, 3);
                $parte_quatro = substr($cpfOuCnpj, 8, 4);
                $parte_cinco = substr($cpfOuCnpj, 12, 2);

                $cpfCnpj = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";
            }
        }
    }
}
//verifica quantidade de cursos associados ao evento
$consultaNumeroCursosAssociados = $evento->consultarNumeroCursos($id);

$linha = mysqli_fetch_array($consultaNumeroCursosAssociados);
$numeroCursos = $linha['nCursos'];



$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Evento</h1>
    </div>
    <?php if ($gratuitoOuPago == 2) { ?>
        <div class="row">
            <div class="pull-right">

                <a href='../../geradorBoletos/boleto_santander_banespa.php?id=<?php echo $id; ?> &idPartcipante=<?php echo $_SESSION['idAdministrador']; ?>'><button type='button' class='btn btn-sm btn-warning'>Vizualizar Boleto Gerado com Meus Dados</button></a>

            </div>
        </div>
    <?php } ?>
    <div class="row">
        <div class="pull-right">



        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class=" col-sm-3 col-md-2">
                <b>Id:</b>
            </div>
            <div class=" col-sm-9 col-md-10">
                <?php echo $idCurso; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Nome:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $nome; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Período de Inscrição:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('d/m/Y ', strtotime($dataInicioInscricao)); ?> até  <?php echo date('d/m/Y ', strtotime($dataFimInscricao)); ?> 
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Período do Evento:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('d/m/Y ', strtotime($dataInicioEvento)); ?> até  <?php echo date('d/m/Y ', strtotime($dataFimEvento)); ?> 
            </div>
            <div class="col-sm-3 col-md-2">
                <b>Horário do Evento:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('H:i ', strtotime($horaInicioEvento)); ?> até  <?php echo date('H:i ', strtotime($horaFimEvento)); ?> 
            </div>
            <div class="col-sm-3 col-md-2">
                <b>Quantidade de vagas:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $quantidadeVagas; ?>
            </div>


            <?php if ($descricao <> NULL) { ?>
                <div class="col-sm-3 col-md-2">
                    <b>Descricao:</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <?php echo $descricao; ?>
                </div>
            <?php } ?>

            <?php if ($numeroCursos > 0) { ?>

                <div class="col-sm-3 col-md-2">
                    <b>Cursos participantes:</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <?php
                    $resultado = $evento->consultarCursos($id);
                    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                        $linha = mysqli_fetch_array($resultado);
                        $curso = $linha['NOME_EVENTO'] . "<br>";
                        echo $curso;
                    }
                    ?>
                </div>
            <?php } ?>







            <?php if ($id_oganizador <> NULL) { ?>
                <div class="col-sm-3 col-md-2">
                    <b>Organizador:</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <?php echo $id_oganizador; ?>
                </div>
            <?php } ?>




            <div class="col-sm-3 col-md-2">
                <b>Palestrantes:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php
                $resultado = $evento->consultarPalestrantesEvento($id);
                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                    $linha = mysqli_fetch_array($resultado);
                    $curso = $linha['NOME_PALESTRANTE'] . "<br>";
                    echo $curso;
                }
                ?>
            </div>



            <?php if ($imagem <> NULL) { ?>
                <div class="col-sm-3 col-md-2">
                    <b>Imagem:</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <br>
                    <img src="<?php echo "../../imagens/ImagensEventos/$imagem"; ?>" width="100" height="100">
                </div>
            <?php } ?>

            <div class="col-sm-3 col-md-2">
                <b>Unidade:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $id_unidade; ?>
            </div>


            
            <?php if ($gratuitoOuPago == 2) { ?>
                <div class="col-sm-3 col-md-2">
                    <b>Valor:</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <?php echo "R$ " . $valorCobrado; ?>
                    <br><br><br><br>
                </div>
                <h3>Dados Boleto</h3>
                <br><br>
                <div class="col-sm-3 col-md-2">

                    <b>Data de Vencimento:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo date('d/m/Y ', strtotime($dataVencimento)); ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Data do Documento:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo date('d/m/Y ', strtotime($dataDocumento)); ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Prazo do Pagamento:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo$diasPrazo; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Nosso Número:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $nossoNumero; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Nº do Documento:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $numeroDocumento; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Demonstrativo 1:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $demonstrativo1; ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Demonstrativo 2:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $demonstrativo2; ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Demonstrativo 3:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $demonstrativo3; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Instruções 1:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $instrucoes1; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Instruções 2:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $instrucoes2; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Instruções 3:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $instrucoes3; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Cód. do Cliente (PSK):</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $psk; ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Agência:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $agencia; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Carteira:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $carteira; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Carteira Descrição:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $carteiraDescricao; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>Nome Cedente:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $nomeCedente; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>CPF ou CNPJ:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $cpfCnpj; ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Endereço:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $enderecoEmpresa; ?>
                </div>

                <div class="col-sm-3 col-md-2">

                    <b>Cidade:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $cidadee; ?>
                </div>
                <div class="col-sm-3 col-md-2">

                    <b>UF:</b>
                </div>
                <div class="col-sm-9 col-md-10">

                    <?php echo $uf; ?>
                </div>

            <?php } ?>





        </div>
    </div>
</div> <!-- /container -->

