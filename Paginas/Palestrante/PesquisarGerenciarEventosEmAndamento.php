
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos em Andamento</h2>
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
                            $palestrante = new Palestrante();


//REALIZA A BUSCA
                            if ($_POST) {

                                if ($_POST['pesquisar']) {

                                    $event = $_POST['consultar'];


                                    $resultadoPesquisa = $palestrante->consultarMeusEventosEmAndamento($_SESSION['idPalestrante'], $event);

                                    if ($resultadoPesquisa == true) {
                                        ?>


                                        <?php
                                        for ($i = 0; $i < mysqli_num_rows($resultadoPesquisa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPesquisa);
                                            echo "<tr>";

                                            echo "<td>" . $nome[$i] = $linha['NOME'] . "</td>";
                                            ?>
                                        <td> 
                                            <a href='index.php?link=14&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                            <a href='index.php?link=19&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Postar Materiais</button></a>

                                            <a href='index.php?link=20&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Listar e Gerenciar Materiais</button></a>

                                            <a href='index.php?link=9&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                            <a href='index.php?link=25&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-success'>Lista de Presença</button></a>

                                            <a href='index.php?link=24&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Relatórios</button></a>



                                            <?php
                                        }
                                    } else {
                                        echo 'Nenhum evento foi encontrado';
                                    }
                                }
                            }
                            ?>


                            </div> <!-- /container -->