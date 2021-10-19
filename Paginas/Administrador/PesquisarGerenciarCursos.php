
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Participantes</h2>
        <br><div class="row">
            <div class="col-md-12">
                <table class="table">


                    <form action="index.php?link=17" method="POST">


                        <td>
                            <div class = "form-group">


                                <input type = "text" class = "form-control" name = "consultar" placeholder = "Digite aqui um nome ou matricula ou cpf ou e-mail que deseja buscar">

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
                <thead>
                    <tr>

                        <th>Nome</th>

                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../Classes/Curso.class.php';

                    $curso = new Curso();
//REALIZA A BUSCA
                    if ($_POST) {

                        if ($_POST['pesquisar']) {

                            $usuario = $_POST['consultar'];



                            $resultadoPesquisa = $curso->consultar($usuario);

                            if ($resultadoPesquisa == true) {
                                ?>


            <?php
            for ($i = 0; $i < mysqli_num_rows($resultadoPesquisa); $i++) {
                $linha = mysqli_fetch_array($resultadoPesquisa);
                echo "<tr>";

                echo "<td>" . $linha['NOME'] . "</td>";
                ?>
                                <td> 
                                    <a href='index.php?link=22&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                    <a href='index.php?link=26&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

                                    <a href='../../Processa/Administrador/ProcessaApagarCurso.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>

                <?php if ($linha['ATIVO_INATIVO'] == 0 or $linha['ATIVO_INATIVO'] == 'null') { ?>
                                        <a href='../../Processa/Administrador/ProcessaAtivarCurso.php?id=<?php echo $linha['ID']; ?>&ativar=1'><button type='button' class='btn btn-sm btn-success'>  Ativar  </button></a>
                                    <?php } ?>
                                    <?php if ($linha['ATIVO_INATIVO'] == 1) { ?>
                                        <a href='../../Processa/Administrador/ProcessaAtivarCurso.php?id=<?php echo $linha['ID']; ?>&ativar=0'><button type='button' class='btn btn-sm btn-default'>  Desativar  </button></a>
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