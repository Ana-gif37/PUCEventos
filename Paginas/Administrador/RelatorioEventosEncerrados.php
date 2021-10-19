<?php
$evento = $_GET['id'];

include '../../Classes/ListaPresenca.class.php';
include '../../Classes/Participante.class.php';

$participante = new Participante();
$presenca = new ListaPresenca();


$resultadoQ = $presenca->QuantidadeChamadas($evento);
$linhaQ = mysqli_fetch_array($resultadoQ);
$quantidadeChamadas = $linhaQ['TOTALCHAMADAS'];
?>

<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Gerar Relatórios</h2>
        <br><br><br>

        <div class="row">




            <?php
            //LISTA OS PARTICIPANTES
            $resultado = $participante->QuantidadeUsuariosInscritosEventos($evento);
            $linha = mysqli_fetch_array($resultado);
            $quantidadeInscritosParticipante = $linha['QUANTIDADEINSCRITOS'];
            if ($quantidadeInscritosParticipante > 0) {
                ?>
                <center> <a href='./GerarRelatorioMediaIdades.php?id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-success'>Média de idades</button></a> </center>

                <br><br>
                <center> <button type='button' class='btn btn-lg btn-danger'>Participantes Concluintes</button></a> </center>
<br><br>
                
                <?php if ($quantidadeChamadas > 0) { ?>
                    <center><a href='./GerarRelatorioFrequenciaParticipantes.php?id=<?php echo $evento; ?>'> <button type='button' class='btn btn-lg btn-info'>Frequência dos Participantes </button></a> </center>
                <?php } else { ?>
                    <center> <button disabled type='button' class='btn btn-lg btn-info'>Aguardando Realizar chamada<br>para liberar Rel. de Frequência<br> </button></a> </center>
                <?php } ?> <br><br>
                <center><a href='./GerarRelatorioQuantidadePessoasInscritas.php?link=47&id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-warning'>Quantidade de Pessoas Inscritas</button></a> </center>
                <br><br>
                <center> <a href='./GerarRelatorioQuantidadePorSexo.php?id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-success'>Porcentagem de Participantes por sexo</button></a> </center>


            <?php } else { ?>
                <center><button  disabled type='button' class='btn btn-lg btn-warning'><h6>(Aguardando Participantes inscreverem para liberar função)</h6></button></a> </center>

            <?php } ?>



        </div> <!-- /container -->