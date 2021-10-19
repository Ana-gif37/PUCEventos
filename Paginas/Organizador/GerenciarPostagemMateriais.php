

<?php
$idEventos = $_GET['id'];

include '../../Classes/MaterialDidatico.class.php';


$materialDidatico = new MaterialDidatico();



$resultadoQ = $materialDidatico->consultarNumeroMateriais($idEventos);
$linhaQ = mysqli_fetch_array($resultadoQ);
$quantidadeMateriais = $linhaQ['QUANTIDADEMATERIAIS'];
?>

<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Materiais Postados</h2>
        <?php if ($quantidadeMateriais > 0) { ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table">
                        <div class = "col-md-12">
                            <table class = "table">
                                <thead>
                                    <tr>

                                        <th>Nome do Material</th>
                                        <th>Download /Exibir</th>

                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
//LISTA OS PARTICIPANTES
                                    $resultado = $materialDidatico->consultarCodigoEventos_material($idEventos);
                                    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                        $linha = mysqli_fetch_array($resultado);
                                        echo "<tr>";


                                        echo "<td>" . $linha['NOMEMATERIAL'] . "</td>";
                                        ?>
                                    <td>   <a class="icone pdf" href="../../arquivos/<?PHP echo $idEventos; ?>/<?PHP echo $linha['NOMEMATERIAL']; ?>">Download/Exibir</a>  </td>

                                    <td> 


                                        <a href='../../Processa/Organizador/ProcessaApagarPostagemMateriais.php?id=<?php echo $linha['ID']; ?>&nome=<?PHP echo $linha['NOMEMATERIAL']; ?>&evento=<?PHP echo $idEventos; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>


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
                echo "<h3>" . 'Não há materiais postados' . "</h3>";
              
            }
            ?>
        </div> <!-- /container -->
