
<?php



$palestrante = new Palestrante();



$resultadoQ = $palestrante->consultarNumeroMeusEventosEmAndamento($_SESSION['idPalestrante']);
$linhaQ = mysqli_fetch_array($resultadoQ);
$quantidadeEventos = $linhaQ['QUANTIDADEEVENTOS'];
?>




<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos em Andamento</h2>
        <?php if ($quantidadeEventos > 0) { ?>
            <br><div class="row">
                <div class="col-md-12">
                    <table class="table">


                        <form action="index.php?link=11" method="POST">


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
                                $resultado = $palestrante->meusEventosEmAndamento($_SESSION['idPalestrante']);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    echo "<tr>";


                                    echo "<td>" . $linha['NOME'] . "</td>";
                                    ?>
                                <td> 
                                    <a href='index.php?link=14&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                    <a href='index.php?link=19&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Postar Materiais</button></a>

                                    <a href='index.php?link=20&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Listar e Gerenciar Materiais</button></a>

                                    <a href='index.php?link=9&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                    <a href='index.php?link=25&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-success'>Lista de Presen??a</button></a>

                                    <a href='index.php?link=24&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Relat??rios</button></a>




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
            echo "<h3>" . 'N??o h?? eventos em andamento' . "</h3>";
        }
        ?>
    </div> <!-- /container -->
