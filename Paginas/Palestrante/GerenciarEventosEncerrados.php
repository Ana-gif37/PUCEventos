
<?php

$palestrante = new Palestrante();



$resultadoQ = $palestrante->consultarNumeroMeusEventosEncerrados($_SESSION['idPalestrante']);
$linhaQ = mysqli_fetch_array($resultadoQ);
$quantidadeEventos = $linhaQ['QUANTIDADEEVENTOS'];
?>

<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos Encerrados</h2>
          <?php if ($quantidadeEventos > 0) { ?>
        <br><div class="row">
            <div class="col-md-12">
                <table class="table">


                    <form action="index.php?link=12" method="POST">


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
                            $resultado = $palestrante->meusEventosEncerrados($_SESSION['idPalestrante']);
                            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                $linha = mysqli_fetch_array($resultado);
                                echo "<tr>";


                                echo "<td>" . $linha['NOME'] . "</td>";
                                ?>
                            <td> 
                                <a href='index.php?link=14&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                <a href='index.php?link=26&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Relatórios</button></a>

     
                                  <a href='./GerarCertificado.php?idEvento=<?php echo $linha['ID_EVENTO']; ?>&idParticipante=<?php echo $_SESSION['idParticipante'] ?>'><button type='button' class='btn btn-sm btn-warning'>Emitir cerificado</button></a>
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
            echo "<h3>" . 'Não há eventos encerrados' . "</h3>";
        }
        ?>
    </div> <!-- /container -->
