<?php
include '../../Classes/Evento.class.php';
$evento = new Evento();

$resultadoMeusEventos = $evento->consultarQuantidadeMeusEventosOrganizados($_SESSION['idOrganizador']);
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


                        <form action="index.php?link=29" method="POST">


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
                                     <th>Situação</th>
                                    <th>Tipo</th>

                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                //LISTA OS PARTICIPANTES
                                $resultado = $evento->exibirTodosMeusEventosInscricaoAberta($_SESSION['idOrganizador']);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    echo "<tr>";


                                    echo "<td>" . $linha['NOME'] . "</td>";
                                    if ($linha['EVENTOAPROVADOPELOADMINISTRADOR'] == '1') {
                                        echo "<td>" . 'Ativado' . "</td>";
                                    }
                                    if ($linha['EVENTOAPROVADOPELOADMINISTRADOR'] == '0') {
                                        echo "<td>" . 'Desativado' . "</td>";
                                    }

                                    if ($linha['EVENTOAPROVADOPELOADMINISTRADOR'] == null) {
                                        echo "<td>" . 'Pendente ativação' . "</td>";
                                    }
                                    if ($linha['GRATUITOOUPAGO'] == '1') {
                                        echo "<td>" . 'Gratuito' . "</td>";
                                    }
                                    if ($linha['GRATUITOOUPAGO'] == '2') {
                                        echo "<td>" . 'Pago' . "</td>";
                                    }
                                    ?>
                                <td><a href='index.php?link=13&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                    <a href='index.php?link=17&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>


                                    <a href='index.php?link=7&evento=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Gerenciar Inscritos</button></a>

                                    <a href='index.php?link=24&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                    <a href='index.php?link=28&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-success'>Relatórios</button></a>


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
