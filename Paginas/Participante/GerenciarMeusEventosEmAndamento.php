<?php
$participante = new Participante();

$resultadoInscricoes = $participante->consultarNumeroEventosEmAndamento($_SESSION['idParticipante']);
$linhaInscricoes = mysqli_fetch_array($resultadoInscricoes);
$quantidadeEventosInscricoes = $linhaInscricoes ['QUANTIDADE_EVENTOS'];
?>
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Meus Eventos em Andamento</h2>
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

                                <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                          




                            //LISTA OS PARTICIPANTES
                            $resultado = $participante->consultaMeusEventosEmAndamento($_SESSION['idParticipante']);
                            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                $linha = mysqli_fetch_array($resultado);
                                echo "<tr>";


                                echo "<td>" . $linha['NOMEEVENTO'] . "</td>";
                                ?>
                            <td> 
                                <a href='index.php?link=13&id=<?php echo $linha['ID_EVENTO']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                <a href='index.php?link=14&id=<?php echo $linha['ID_EVENTO']; ?>'><button type='button' class='btn btn-sm btn-warning'>Materiais</button></a>

                                <a href='index.php?link=6&id=<?php echo $linha['ID_EVENTO']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                <a href='./GerarCracha.php?idEvento=<?php echo $linha['ID_EVENTO']; ?>&idParticipante=<?php echo $_SESSION['idParticipante'] ?>'><button type='button' class='btn btn-sm btn-success'>Emitir Crachá</button></a>

                                <button type='button' class='btn btn-sm btn-danger'>Relatório de Presenças</button></a>

                                <?php
                                echo "</tr>";
                            }
                            ?>

                            </tbody>
                    </table>
                </div>
        </div>
           <?php
        } else {
            echo "<h3>" . 'Você não possui eventos em andamento' . "</h3>";
        }
        ?>
    </div> <!-- /container -->
