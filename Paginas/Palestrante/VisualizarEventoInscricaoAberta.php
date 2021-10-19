
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
    $dataFimEvento = $linha['DATAFIMEVENTO'];
    $horaInicioEvento = $linha['HORAINICIOEVENTO'];
    $horaFimEvento = $linha['HORAFIMEVENTO'];
    $quantidadeVagas = $linha['QUANTIDADEVAGAS'];
    $descricao = $linha['DESCRICAO'];
    $gratuitoOuPago = $linha['GRATUITOOUPAGO'];
    $id_unidade = $linha['ID_UNIDADE'];
    $id_oganizador = $linha['ID_ORGANIZADOR'];
    $imagem = $linha['IMAGEM'];
}

//verifica quantidade de cursos associados ao evento
$consultaNumeroCursosAssociados = $evento->consultarNumeroCursos($id);

$linha = mysqli_fetch_array($consultaNumeroCursosAssociados);
$numeroCursos = $linha['nCursos'];



$_SESSION['ID'] = $id;




if ($gratuitoOuPago == 2) {

    $resultado = $evento->consultarDadosEventosPagos($id);
    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
        $linha = mysqli_fetch_array($resultado);
        $dataVenciment = $linha['DATAVENCIMENTO'];
        $dataVencimento = date('d/m/Y', strtotime($dataVenciment));
        $valorCobrad = $linha['VALORCOBRADO'];
        $valorCobrado = str_replace('.', ',', $valorCobrad);
    }
}
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Evento</h1>
    </div>

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


            <?php if ($gratuitoOuPago <> NULL) { ?>
                <div class="col-sm-3 col-md-2">
                    <b>Gratuito ou pago?</b>
                </div>
                <div class="col-sm-9 col-md-10">
                    <?php
                    if ($gratuitoOuPago == 1) {
                        echo 'Gratuito';
                    } if ($gratuitoOuPago == 2) {
                        echo 'Pago';
                    }
                    ?>

                </div>

            <?php } ?>   

            <?php if ($gratuitoOuPago == 2) { ?> 
                <div class = "col-sm-3 col-md-2">
                    <b>Valor:</b>
                </div>
                <div class = "col-sm-9 col-md-10">
                    <?php echo "R$ " . $valorCobrado;
                    ?>
                    <br><br><br><br>
                </div>
            <?php } ?> 



        </div>
    </div>
</div> <!-- /container -->

