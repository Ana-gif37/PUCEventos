<?php
$evento = $_GET['id'];
?>

<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Enviar mensagem aos Palestrantes</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaEnviarMensagemPalestrante.php">

                <div class="form-group">
                    <label for="assunto" class="col-sm-2 control-label">Assunto</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="assunto" placeholder="" required="required">
                    </div>
                </div>

                <div class="form-group">
                    <label for="mensagem" class="col-sm-2 control-label">Mensagem</label>
                    <div class="col-sm-10">

                        <textarea class="form-control" name="mensagem" rows="10"></textarea>

                    </div>
                </div>

                <div class="form-group">

                    <label for="participantes[]" class="col-sm-2 control-label">Selecione as pessoas que deseja enviar</label>
                    <div class="col-sm-10">

                        <div class="form-check form-check-inline">
<!--                            <input  name="todos" class="form-check-input" type="checkbox" id="selectAll"  ><b> Marcar/Desmarcar Todos</b>-->
                            <br>

                            <label class = "form-check-label">
                                <?php
                                include '../../Classes/Evento.class.php';


                                $event = new Evento();

                                //LISTA OS PARTICIPANTES
                                $resultado = $event->consultarPalestrantesEvento($evento);
                                for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                    $linha = mysqli_fetch_array($resultado);
                                    ?>
                                    <input checked name="palestrantes[]" class="form-check-input" type="checkbox" id="selectedId" value="<?php echo $linha["ID_PALESTRANTE"]; ?>"> <?php
                                    echo $linha["NOME_PALESTRANTE"];
                                    "required"
                                    ?>
                                    <br>
                                    <?php
                                }
                                ?>
                            </label>
                        </div>
                    </div>
                    <br><br>

                </div>

                <input type="hidden" name="idAdministrador" value="<?php echo $_SESSION['idAdministrador']; ?>">


                <div class="form-group">
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="enviarEmail" value="gravar" class="btn btn-primary">Enviar e-mail</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

