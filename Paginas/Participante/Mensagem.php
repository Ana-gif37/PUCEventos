<?php
$evento = $_GET['id'];
?>

<div class="container theme-showcase" role="main">


    <div class="page-header">
        <h2>Enviar Mensagens</h2>
        <br><br><br><br><br><br>

        <div class="row">




          <?php
         


            $participante = new Participante();

            //LISTA OS PARTICIPANTES
            $resultado = $participante->QuantidadeUsuariosInscritosEventos($evento);
             $linha = mysqli_fetch_array($resultado);
            $quantidadeInscritosParticipante = $linha['QUANTIDADEINSCRITOS'];
            if ($quantidadeInscritosParticipante > 0) {
                ?>

                <center><a href='index.php?link=10&id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-success'>Enviar Mensagem aos Participantes</button></a> </center>

            <?php } else { ?>
                <center><button  disabled type='button' class='btn btn-lg btn-success'>Enviar Mensagem aos Participantes <br><h6>(Aguardando Participantes inscreverem para liberar função)</h6></button></a> </center>

            <?php } ?>
                <br><br><br>
            <center> <a href='index.php?link=8&id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-info'>Enviar Mensagem ao Organizador</button></a> </center>

            <br><br><br>
            <center> <a href='index.php?link=7&id=<?php echo $evento; ?>'><button type='button' class='btn btn-lg btn-primary'>Enviar Mensagem aos Palestrantes</button></a> </center>




        </div> <!-- /container -->