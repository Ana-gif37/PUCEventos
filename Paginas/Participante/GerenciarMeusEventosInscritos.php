<?php
$participante = new Participante();

$resultadoInscricoes = $participante->consultarNumeroEventosParticipanteEstaInscrito($_SESSION['idParticipante']);
$linhaInscricoes = mysqli_fetch_array($resultadoInscricoes);
$quantidadeEventosInscricoes = $linhaInscricoes ['QUANTIDADE_EVENTOS'];
?>
<div class="container theme-showcase" role="main">

   

        <div class="page-header">
            <h2>Meus Eventos Inscritos</h2>
             <?php if ($quantidadeEventosInscricoes > 0) { ?>
            <br><div class="row">
                <div class="col-md-12">
                    <table class="table">
                </div>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <div class = "col-md-12">
                        <table class = "table">
                            <thead>
                                <tr>

                                    <th>Nome</th>
                                    <th>Gratuito ou pago?</th>
                                    <th>Situação</th>

                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                include '../../Classes/Evento.class.php';


                                $evento = new Evento();




                                //LISTA OS PARTICIPANTES
                                $resultado = $evento->consultarCodigoInscritos($_SESSION['idParticipante']);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    echo "<tr>";


                                    echo "<td>" . $linha['NOMEEVENTO'] . "</td>";
                                    if ($linha['GRATUITOPAGO'] == 1) {
                                        echo "<td>" . 'Gratuito' . "</td>";
                                    } else {
                                        echo "<td>" . 'Pago' . "</td>";
                                    }
                                    echo "<td>" . $linha['SITUACAO'] . "</td>";
                                    ?>
                                <td> 
                                    <a href='index.php?link=12&id=<?php echo $linha['ID_EVENTO']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                    <a href='index.php?link=6&id=<?php echo $linha['ID_EVENTO']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                    <a href='../../Processa/Participante/ProcessaCancelarInscricaoEvento.php?id=<?php echo $linha['ID_EVENTO']; ?>&idPartcipante=<?php echo $_SESSION['idParticipante']; ?>'><button type='button' class='btn btn-sm btn-danger'>Cancelar Inscrição</button></a>
                                    <?php if ($linha['GRATUITOPAGO'] == 2) { ?>
                                        <a href='../../geradorBoletos/boleto_santander_banespa.php?id=<?php echo $linha['ID_EVENTO']; ?> &idPartcipante=<?php echo $_SESSION['idParticipante']; ?>'><button type='button' class='btn btn-sm btn-success'>Gerar Boleto</button></a>

                                        <?php
                                    }
                                    echo "</tr>";
                                }
                                ?>

                                </tbody>
                        </table>
                    </div>
            </div>
            <?php
        } else {
            echo "<h3>" . 'Você não se inscreveu em nenhum evento' . "</h3>";
        }
        ?>
    </div> <!-- /container -->
