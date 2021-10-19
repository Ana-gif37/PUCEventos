<?php
include '../../Classes/Evento.class.php';


$evento = new evento();

$resultadoGratuito = $evento->consultarNumeroEventosInscricaoAbertaGratuitoOuPago(1);
$linhaGratuito = mysqli_fetch_array($resultadoGratuito);
$quantidadeEventosGratuito = $linhaGratuito['QUANTIDADE_EVENTOS'];

$resultadoPago = $evento->consultarNumeroEventosInscricaoAbertaGratuitoOuPago(2);
$linhaPago = mysqli_fetch_array($resultadoPago);
$quantidadeEventosPago = $linhaPago['QUANTIDADE_EVENTOS'];

$resultadoDestaque = $evento->consultarNumeroEventosInscricaoAbertaEmDestaque();
$linhaDestaque = mysqli_fetch_array($resultadoDestaque);
$quantidadeEventosDestaque = $linhaDestaque['QUANTIDADE_EVENTOS'];
?>




<div class="container">

    <?php if ($quantidadeEventosDestaque > 0) { ?>

        <div class="page-header">
            <h3>Eventos Em Destaque</h3>
        </div>
        <div class="row">
            <?php
            //LISTA OS eventos gratuitos
            $resultado = $evento->exibirTodosEventosEmDestaque();
            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                $linha = mysqli_fetch_array($resultado);
                ?>
                <div class="col-sm-3">

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?PHP echo $linha['NOME']; ?></h3>
                        </div> 
                        <div class="panel-body">

                            <table>
                                <td>
                                    <?php if ($linha['IMAGEM'] == NULL) { ?>
                                        <img class="img-circle" src="../../imagens/logo2.png" alt="Generic placeholder image" width="70" height="70">
                                    <?php } else {
                                        ?>
                                        <img class="img-circle" src="../../imagens/ImagensEventos/<?PHP echo $linha['IMAGEM']; ?>" alt="Generic placeholder image" width="70" height="70">
                                    <?php } ?>
                                </td>

                                <td>

                                <h7><b>Inscrição até:</b>  <?php echo date('d/m/y', strtotime($linha['DATAFIMINSCRICAO'])); ?> </h7>

                                <br>  <h7><b>Período do Evento:</b>  <?php echo date('d/m/y', strtotime($linha['DATAINICIOEVENTO'])); ?> à  <?php echo date('d/m/y', strtotime($linha['DATAFIMEVENTO'])); ?> </h7>

                                <br>   <h7><b>Unidade:</b>  <?php echo $linha['NOMEUNIDADE'] ?> </h7>

                                <br>  <h7><b>Quant. de Vagas:</b>  <?php echo $linha['QUANTIDADEVAGAS'] ?> </h7>

                                <br><a href="index.php?link=2&id=<?php echo $linha['ID'] ?>">Mais Detalhes »</a>

                                </td>

                            </table>
                        </div>
                    </div>
                </div><!-- /.col-sm-4 -->

            <?php }
            ?>
        </div>
    <?php } ?>

    <!--todos os eventos-->
    <?php if ($quantidadeEventosGratuito > 0) { ?>

        <div class="page-header">
            <h3>Inscrições Abertas Para Eventos Gratuitos</h3>
        </div>
        <div class="row">
            <?php
            //LISTA OS eventos gratuitos
            $resultado = $evento->exibirTodosEventosGratuitosInscricaoAberta();
            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                $linha = mysqli_fetch_array($resultado);
                ?>
                <div class="col-sm-4">

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?PHP echo $linha['NOME']; ?></h3>
                        </div> 
                        <div class="panel-body">

                            <table>
                                <td>
                                    <?php if ($linha['IMAGEM'] == NULL) { ?>
                                        <img class="img-circle" src="../../imagens/logo2.png" alt="Generic placeholder image" width="70" height="70">
                                    <?php } else {
                                        ?>
                                        <img class="img-circle" src="../../imagens/ImagensEventos/<?PHP echo $linha['IMAGEM']; ?>" alt="Generic placeholder image" width="70" height="70">
                                    <?php } ?>
                                </td>

                                <td>

                                <h7><b>Inscrição até:</b>  <?php echo date('d/m/y', strtotime($linha['DATAFIMINSCRICAO'])); ?> </h7>

                                <br>  <h7><b>Período do Evento:</b>  <?php echo date('d/m/y', strtotime($linha['DATAINICIOEVENTO'])); ?> à  <?php echo date('d/m/y', strtotime($linha['DATAFIMEVENTO'])); ?> </h7>

                                <br>   <h7><b>Unidade:</b>  <?php echo $linha['NOMEUNIDADE'] ?> </h7>

                                <br>  <h7><b>Quant. de Vagas:</b>  <?php echo $linha['QUANTIDADEVAGAS'] ?> </h7>

                                <br> <a href="index.php?link=2&id=<?php echo $linha['ID'] ?>">Mais Detalhes »</a>

                                </td>

                            </table>
                        </div>
                    </div>
                </div><!-- /.col-sm-4 -->

            <?php }
            ?>
        </div>

    <?php } ?>


    <?php if ($quantidadeEventosPago > 0) { ?>
        <div class="page-header">
            <h3>Inscrições Abertas Para Eventos Pagos</h3>
        </div>
        <div class="row">
            <?php
            //LISTA OS eventos gratuitos
            $resultado = $evento->exibirTodosEventosPagosInscricaoAberta();
            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                $linha = mysqli_fetch_array($resultado);
                ?>
                <div class="col-sm-4">

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title"> <?PHP echo $linha['NOME']; ?></h3>
                        </div> 
                        <div class="panel-body">

                            <table>
                                <td>
                                    <?php if ($linha['IMAGEM'] == NULL) { ?>
                                        <img class="img-circle" src="../../imagens/logo2.png" alt="Generic placeholder image" width="70" height="70">
                                    <?php } else {
                                        ?>
                                        <img class="img-circle" src="../../imagens/ImagensEventos/<?PHP echo $linha['IMAGEM']; ?>" alt="Generic placeholder image" width="70" height="70">
                                    <?php } ?>
                                </td>

                                <td>

                                <h7><b>Inscrição até:</b>  <?php echo date('d/m/y', strtotime($linha['DATAINICIOINSCRICAO'])); ?> </h7>

                                <br>  <h7><b>Período do Evento:</b>  <?php echo date('d/m/y', strtotime($linha['DATAINICIOEVENTO'])); ?> à  <?php echo date('d/m/y', strtotime($linha['DATAFIMEVENTO'])); ?> </h7>

                                <br>   <h7><b>Unidade:</b>  <?php echo $linha['NOMEUNIDADE'] ?> </h7>

                                <br>  <h7><b>Quant. de Vagas:</b>  <?php echo $linha['QUANTIDADEVAGAS'] ?> </h7>

                                <br><a href="index.php?link=2&id=<?php echo $linha['ID'] ?>">Mais Detalhes »</a>

                                </td>

                            </table>
                        </div>
                    </div>
                </div><!-- /.col-sm-4 -->

            <?php }
            ?>
        </div>
    <?php } ?>

    <?php if (($quantidadeEventosGratuito + $quantidadeEventosGratuito + $quantidadeEventosPago) == 0) { ?>

    <br><br><br><br><br>     
    <center><h3> Não há nenhum evento cadastrado no momento</h3>  </center>

    <?php } ?>
</div>

