
<?php
$evento = $_GET['evento'];

include '../../Classes/Participante.class.php';


$participante = new Participante();

//LISTA OS PARTICIPANTES
$resultado = $participante->QuantidadeUsuariosInscritosEventos($evento);
$linha = mysqli_fetch_array($resultado);
$quantidadeInscritosParticipante = $linha['QUANTIDADEINSCRITOS'];
?>
<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerenciamento de Inscritos</h2>
        <?php
        if ($quantidadeInscritosParticipante > 0) {
            ?>
            <br><div class="row">
                <div class="col-md-12">
                    <table class="table">


                        <form action="index.php?link=23&evento=<?php echo $evento?>" method="POST">


                            <td>
                                <div class = "form-group">


                                    <input type = "text" class = "form-control" name = "consultar" placeholder = "Digite aqui um nome ou matricula ou cpf (Somente números) ou e-mail que deseja buscar">

                                    <input type="hidden" name="evento" value="<?php echo $evento; ?>">

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
                                    <th>Matricula</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                    <th>Situação</th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                //LISTA OS PARTICIPANTES
                                $resultado = $participante->VerificaUsuariosInscritosEventos($evento);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    echo "<tr>";

                                    echo "<td>" . $linha['MATRICULA'] . "</td>";
                                    echo "<td>" . $linha['NOMEPESSOA'] . "</td>";
                                    echo "<td>" . $linha['CPFPESSOA'] . "</td>";
                                    echo "<td>" . $linha['EMAIL'] . "</td>";
                                    if ($linha['GRATUITOOUPAGO'] == 1) {
                                        if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 3) {
                                            echo "<td> Negada participação pelo administrador </td>";
                                        } else {
                                            echo "<td> Aprovada participação </td>";
                                        }
                                    }
                                    if ($linha['GRATUITOOUPAGO'] == 2) {
                                        if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 1 or $linha['ID_SITUACAOGRATUITOOUPAGO'] == NULL) {
                                            echo "<td> Pendente confirmação de pagamento </td>";
                                        }
                                        if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 2) {
                                            echo "<td> Pago </td>";
                                        }

                                        if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 3) {
                                            echo "<td> Negada participação pelo administrador </td>";
                                        }
                                    }
                                    ?>
                                <td> 

                                    <?php
                                    if ($linha['GRATUITOOUPAGO'] == 2) {

                                        if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 1 or $linha['ATIVO_INATIVO'] == null) {
                                            ?>
                                            <a href='../../Processa/Organizador/ProcessaSituacaoParticipanteEvento.php?evento=<?php echo $evento ?>&id=<?php echo $linha['ID']; ?>&situacao=2'><button type='button' class='btn btn-sm btn-success'>  Confirmar Pagamento </button></a>
                                        <?php } ?>
                                        <?php if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 2) { ?>
                                            <a href='../../Processa/Organizador/ProcessaSituacaoParticipanteEvento.php?evento=<?php echo $evento ?>&id=<?php echo $linha['ID']; ?>&situacao=1'><button type='button' class='btn btn-sm btn-warning'>  Cancelar Pagamento </button></a>
                                            <?php
                                        }
                                    }
                                    ?>

                                    <?php if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 1 or $linha['ID_SITUACAOGRATUITOOUPAGO'] == 2 or $linha['ID_SITUACAOGRATUITOOUPAGO'] == null) { ?>
                                        <a href='../../Processa/Organizador/ProcessaSituacaoParticipanteEvento.php?evento=<?php echo $evento ?>&id=<?php echo $linha['ID']; ?>&situacao=3'><button type='button' class='btn btn-sm btn-danger'>  Cancelar Inscrição </button></a>
                                    <?php } ?>
                                    <?php if ($linha['ID_SITUACAOGRATUITOOUPAGO'] == 3) { ?>
                                        <a href='../../Processa/Organizador/ProcessaSituacaoParticipanteEvento.php?evento=<?php echo $evento ?>&id=<?php echo $linha['ID']; ?>&situacao=1'><button type='button' class='btn btn-sm btn-primary'>  Ativar Inscrição </button></a>
                                    <?php } ?>
                                    <?php
                                    echo "</tr>";
                                }
                                ?>

                                </tbody>
                        </table>
                    </div>
            </div>
        </div>
    <?php
} else {
    echo "<h3>" . 'Não há inscritos' . "</h3>";
}
?>
</div> <!-- /container -->
