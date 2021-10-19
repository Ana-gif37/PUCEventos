
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Palestrante</h2>
        <br><div class="row">
            <div class="col-md-12">
                <table class="table">


                    <form action="index.php?link=42" method="POST">

                        <td>
                            <div class = "form-group">


                                <input type = "text" class = "form-control" name = "consultar" placeholder = "Digite aqui um nome ou empresa ou matricula ou CPF/CNPJ (Somente números) ou e-mail que deseja buscar">

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
                        <th>CPF</th>
                        <th>Empresa</th>
                        <th>CNPJ</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include '../../Classes/Palestrante.class.php';


                    $palestrante = new Palestrante();

//REALIZA A BUSCA
                    if ($_POST) {

                        if ($_POST['pesquisar']) {

                            $usuario = $_POST['consultar'];



                            $resultadoPesquisa = $palestrante->consultar($usuario);

                            if ($resultadoPesquisa == true) {
                                ?>


                                <?php
                                for ($i = 0; $i < mysqli_num_rows($resultadoPesquisa); $i++) {
                                    $linha = mysqli_fetch_array($resultadoPesquisa);
                                    echo "<tr>";
                                    echo "<td>" . $linha['NOMEPESSOA'] . "</td>";
                                    echo "<td>" . $linha['CPFPESSOA'] . "</td>";
                                    echo "<td>" . $linha['EMPRESA'] . "</td>";
                                    echo "<td>" . $linha['CNPJEMPRESA'] . "</td>";
                                    echo "<td>" . $linha['EMAIL'] . "</td>";
                                    ?>
                                <td> 
                                   <a href='index.php?link=21&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-primary'>Visualizar</button></a>

                                    <a href='index.php?link=22&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

                                    <a href='../../Processa/Organizador/ProcessaApagarPalestrante.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
                                    <?php if ($linha['ATIVO_INATIVO'] == 0 or $linha['ATIVO_INATIVO'] == 'null') { ?>
                                        <a href='../../Processa/Administrador/ProcessaAtivarOrganizador.php?id=<?php echo $linha['ID']; ?>&ativar=1'><button type='button' class='btn btn-sm btn-success'>  Ativar  </button></a>
                                    <?php } ?>
                                    <?php if ($linha['ATIVO_INATIVO'] == 1) { ?>
                                        <a href='../../Processa/Administrador/ProcessaAtivarOrganizador.php?id=<?php echo $linha['ID']; ?>&ativar=0'><button type='button' class='btn btn-sm btn-default'>  Desativar  </button></a>
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