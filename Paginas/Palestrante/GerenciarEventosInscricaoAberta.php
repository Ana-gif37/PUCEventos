<?php

$palestrante = new Palestrante();

$resultadoMeusEventos = $palestrante->consultarNumeroDeEventosMeusComInscricaoAberta($_SESSION['idPalestrante']);
$linhaMeusEventos = mysqli_fetch_array($resultadoMeusEventos);
$quantidadeMeusEventos = $linhaMeusEventos ['QUANTIDADE_EVENTOS'];






?>
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos com Inscrições Abertas</h2>
        <?php if ($quantidadeMeusEventos > 0) { ?>
            <br><div class="row">
                <div class="col-md-12">
                    <table class="table">


                        <form action="index.php?link=10" method="POST">


                            <td>
                                <div class = "form-group">


                                    <input type = "text" class = "form-control" name = "consultar" placeholder = "Digite aqui um nome que deseja buscar">

                                </div>
                            </td>
                            <td>

                                <button type="submit" name="pesquisar" value="pesquisar" class="btn btn-primary">Buscar</button>

                            </td>
                        </form>

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
                                $resultado = $palestrante->meusEventosComInscricaoAberta($_SESSION['idPalestrante']);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    echo "<tr>";


                                    echo "<td>" . $linha['NOME'] . "</td>";
                                    ?>
                                <td> 
                                <td><a href='index.php?link=13&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>


                                    <a href='index.php?link=9&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                    <a href='index.php?link=8&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-success'>Relatórios</button></a>


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
            echo "<h3>" . 'Você não possui nenhum evento com inscrições abertas' . "</h3>";
        }
        ?>
    </div> <!-- /container -->
