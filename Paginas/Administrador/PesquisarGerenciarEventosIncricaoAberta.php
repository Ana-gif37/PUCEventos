
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Eventos com Inscrições Abertas</h2>
        <br><div class="row">
            <div class="col-md-12">
                <table class="table">


                    <form action="index.php?link=33" method="POST">


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
                                <th>Destaque</th>
                                <th>Tipo</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include '../../Classes/Evento.class.php';


                            $evento = new evento();

//REALIZA A BUSCA
                            if ($_POST) {

                                if ($_POST['pesquisar']) {

                                    $event = $_POST['consultar'];



                                    $resultadoPesquisa = $evento->consultarEventosInscricaoAberta($event);

                                    if ($resultadoPesquisa == true) {
                                        ?>


                                        <?php
                                        for ($i = 0; $i < mysqli_num_rows($resultadoPesquisa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPesquisa);
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



                                            if ($linha['DESTACAREVENTO'] == '1') {
                                                echo "<td>" . 'Sim' . "</td>";
                                            }
                                            if ($linha['DESTACAREVENTO'] == '0') {
                                                echo "<td>" . 'Não' . "</td>";
                                            }

                                            if ($linha['DESTACAREVENTO'] == null) {
                                                echo "<td>" . 'Não' . "</td>";
                                            }

                                            if ($linha['GRATUITOOUPAGO'] == '1') {
                                                echo "<td>" . 'Gratuito' . "</td>";
                                            }
                                            if ($linha['GRATUITOOUPAGO'] == '2') {
                                                echo "<td>" . 'Pago' . "</td>";
                                            }
                                            ?>
                                        <td> 
                                            <a href='index.php?link=38&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                            <a href='index.php?link=43&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

                                            <a href='../../Processa/Administrador/ProcessaAtivarEventosInscricao.php?id=<?php echo $linha['ID']; ?>&ativar=1'><button type='button' class='btn btn-sm btn-success'>  Ativar  </button></a>

                                            <a href='../../Processa/Administrador/ProcessaAtivarEventosInscricao.php?id=<?php echo $linha['ID']; ?>&ativar=0'><button type='button' class='btn btn-sm btn-default'> Desativar  </button></a>

                                            <a href='index.php?link=45&evento=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Gerenciar Inscritos</button></a>

                                            <a href='index.php?link=50&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-info'>Mensagem</button></a>

                                            <a href='index.php?link=46&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Relatórios</button></a>



                                            <?php if ($linha['DESTACAREVENTO'] == '0' or $linha['DESTACAREVENTO'] == null) { ?>
                                                <a href='../../Processa/Administrador/ProcessaDestacarEventos.php?id=<?php echo $linha['ID']; ?>&ativar=1&tipo=pago'><button type='button' class='btn btn-sm btn-success'> Destacar  </button></a>
                                            <?php } ?>
                                            <?php if ($linha['DESTACAREVENTO'] == '1') { ?>
                                                <a href='../../Processa/Administrador/ProcessaDestacarEventos.php?id=<?php echo $linha['ID']; ?>&ativar=0&tipo=pago'><button type='button' class='btn btn-sm btn-default'>  Retirar Destaque   </button></a>
                                            <?php } ?>
                                            <?php
                                        }
                                    } else {
                                        echo 'Nenhum usuário foi encontrado';
                                    }
                                }
                            }
                            ?>


                            </div> <!-- /container -->