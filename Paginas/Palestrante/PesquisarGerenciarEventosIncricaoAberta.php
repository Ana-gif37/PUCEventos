
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos com Inscrições Abertas</h2>
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
                                <th>Tipo</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $palestrante = new Palestrante();

//REALIZA A BUSCA
                            if ($_POST) {

                                if ($_POST['pesquisar']) {

                                    $event = $_POST['consultar'];



                                    $resultadoPesquisa = $palestrante->consultarMeusEventosComInscricaoAberta($_SESSION['idPalestrante'], $event);

                                    if ($resultadoPesquisa == true) {
                                        ?>


                                        <?php
                                        for ($i = 0; $i < mysqli_num_rows($resultadoPesquisa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPesquisa);
                                            echo "<tr>";

                                            echo "<td>" . $linha['NOME'] . "</td>";


                                            if ($linha['GRATUITOOUPAGO'] == '1') {
                                                echo "<td>" . 'Gratuito' . "</td>";
                                            }
                                            if ($linha['GRATUITOOUPAGO'] == '2') {
                                                echo "<td>" . 'Pago' . "</td>";
                                            }
                                            ?>
                                        <td><a href='index.php?link=13&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>


                                            <a href='index.php?link=9&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                            <a href='index.php?link=8&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-success'>Relatórios</button></a>




                <?php
            }
        } else {
            echo 'Nenhum evento foi encontrado';
        }
    }
}
?>


                            </div> <!-- /container -->