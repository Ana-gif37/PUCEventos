
<?php
include '../../Classes/Evento.class.php';



$evento = new evento();
$pessoa = new Pessoa();
$participante = new Participante();

$id = $_GET['id'];



$resultado = $participante->consultarCodigo($_SESSION['idParticipante']);
for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
    $linha = mysqli_fetch_array($resultado);
    $idCurso = $linha['ID_CURSO'];
}




$resultadoConsulta = $evento->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idEvento = $linha['ID'];
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

//verifica se evento ainda tem vaga
$quantidadeInscritos = $evento->consultarQuantidadeInscritosPorEventos($id);
$linhaQuantidadeInscritos = mysqli_fetch_array($quantidadeInscritos);
$quantidadeInscritosEventos = $linhaQuantidadeInscritos ['VAGAS_PREENCHIDAS'];
$totalVagasRestantes = $quantidadeVagas - $quantidadeInscritosEventos;

//verifica se ja se inscreveu no evento
$taInscrito = $evento->consultarSeJaInscreveuNoEvento($id, $_SESSION['idParticipante']);
$linhataInscrito = mysqli_fetch_array($taInscrito);
$Inscrevi = $linhataInscrito ['PARTICIPACAO'];






$resultadoC = $evento->consultarNumeroCursos($id);
$linhaC = mysqli_fetch_array($resultadoC);
$quantidadeCursos = $linhaC['nCursos'];


if ($gratuitoOuPago == 2) {

    $resultadoGP = $evento->consultarDadosEventosPagos($id);
    for ($i = 0; $i < mysqli_num_rows($resultadoGP); $i++) {
        $linha = mysqli_fetch_array($resultadoGP);
        $dataVenciment = $linha['DATAVENCIMENTO'];
        $dataVencimento = date('d/m/Y', strtotime($dataVenciment));
        $valorCobrad = $linha['VALORCOBRADO'];
        $valorCobrado = str_replace('.', ',', $valorCobrad);
    }
}
?>

<div class="row featurette">
    <div class="col-md-12 col-md-push-1">
        <?php if ($imagem <> NULL) { ?>
            <center><img class="img-responsive" src="../../imagens/ImagensEventos/<?PHP echo $linha['IMAGEM']; ?>" alt="Generic placeholder image"></center>
        <?php } ?>
        <center><h2 class="featurette-heading"><?php echo $nome; ?></span></h2></center>
        <br><br>
        <p class="lead">Descrição: <?php echo $descricao ?></p>
        <p class="lead">Período de  Inscrições: <?php echo date('d/m/y ', strtotime($dataInicioInscricao)); ?> à <?php echo date('d/m/y ', strtotime($dataFimInscricao)); ?></p>
        <p class="lead">Período do Evento: <?php echo date('d/m/y ', strtotime($dataInicioEvento)); ?> à <?php echo date('d/m/y ', strtotime($dataFimEvento)); ?></p>
        <p class="lead">Horário do Evento: <?php echo date('H:i ', strtotime($horaInicioEvento)); ?> à <?php echo date('H:i ', strtotime($horaFimEvento)); ?></p>
        <p class="lead">Quantidade de Vagas: <?php echo $quantidadeVagas ?></p>
        <p class="lead">Unidade: <?php echo $id_unidade ?></p>
        <p class="lead">Organizador: <?php echo $id_oganizador ?></p>
        <?php if ($gratuitoOuPago == 1) {
            ?>
            <p class="lead">Tipo: Gratuito</p>

        <?php } ?>
        <?php if ($gratuitoOuPago == 2) {
            ?>
            <p class="lead">Tipo: Pago</p>
            <p class="lead">Valor: R$<?php echo $valorCobrado ?></p>
            <p class="lead">Vencimento Boleto: <?php echo $dataVencimento; ?></p>

        <?php } ?>

        <?php
        if ($totalVagasRestantes > 0) {
            ?>
            <p class="lead">Quantidade de Vagas Restantes: <?php echo $totalVagasRestantes ?></p>
        <?php } ?>
        <form class="form-horizontal" method="POST" action="../../Processa/Participante/ProcessaInscricaoEvento.php" enctype="multipart/form-data">
            <input type="hidden" name="idParticipante" value="<?php echo $_SESSION['idParticipante']; ?>">
            <input type="hidden" name="idEvento" value="<?php echo $id; ?>">
            <input type="hidden" name="gratuitoOuPago" value="<?php echo $gratuitoOuPago; ?>">


            <?php
            if ($Inscrevi == 0) {
                ?>

                <?php
                if ($totalVagasRestantes > 0 and $quantidadeCursos == 0) {
                    ?>
                    <div class="col-sm-offset-2 col-sm-10">
                        <center><button type="submit" name="gravar" value="gravar" class="btn btn-primary btn-lg">Inscrever neste Evento</button></center>
                    </div>
                    <?php
                } elseif ($totalVagasRestantes > 0 and $quantidadeCursos > 0) {
                    $resultado = $evento->consultarCursosDoParticipante($idCurso);
                    if ($resultado == TRUE) {
                        ?>
                        <div class="col-sm-offset-2 col-sm-10">
                            <center><button type="submit" name="gravar" value="gravar" class="btn btn-primary btn-lg">Inscrever neste Evento</button></center>
                        </div>
                    <?php } else { ?>
                        <div class="col-sm-offset-2 col-sm-8">
                            <center><button disabled="disabled" class="btn btn-primary btn-warning">Inscrever neste Evento<br>(Seu Curso não esta<br>liberado para participar deste evento )</button></center>
                        </div>
                    <?php }
                    ?>

                    <?php
                } elseif ($totalVagasRestantes == 0) {
                    $resultado = $evento->consultarCursosDoParticipante($idCurso);
                    ?> 
                    <div class="col-sm-offset-2 col-sm-8">
                        <center><button disabled="disabled" class="btn btn-primary btn-warning">Inscrever neste Evento<br>(Todas as vagas preenchidas <br>em caso de desistencias a função será liberada  )</button></center>
                    </div>


                    <?php
                }
            } else {
                ?>
                <div class="col-sm-offset-2 col-sm-8">
                    <center><button disabled="disabled" class="btn btn-primary btn-warning">Você já Inscreveu Neste Evento</button></center>
                </div>
            <?php } ?> 
        </form>


    </div>

</div><!-- /.container -->