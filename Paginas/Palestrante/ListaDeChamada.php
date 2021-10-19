<?php
$evento = $_GET['id'];
?>

<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Lista de Presença</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Palestrante/ProcessaCadastroListaDePresenca.php">



        </div>

        <div class="form-group">

            <div class="form-group">
                <label for="dataChamada" class="col-sm-3 control-label">Data da chamada</label>
                <div class="col-sm-9">
                    <div class="input-group date">
                        <input type="text" class="form-control" id="dataChamada" name="dataChamada" placeholder="Formato dd/mm/aaaa" required="required">
                        <div class="input-group-addon">
                            <span class="glyphicon glyphicon-th"></span>
                        </div>
                    </div>

                </div>

                <label for="participantes[]" class="col-sm-3 control-label">Selecione as pessoas presentes:</label>
                <div class="col-sm-9">

                    <div class="form-check form-check-inline">
<!--                            <input  name="todos" class="form-check-input" type="checkbox" id="selectAll"  ><b> Marcar/Desmarcar Todos</b>-->
                        <br>

                        <label class = "form-check-label">
                            <?php
                            include '../../Classes/Participante.class.php';


                            $participante = new Participante();

                            //LISTA OS PARTICIPANTES
                            $resultado = $participante->VerificaUsuariosInscritosEventos($evento);
                            for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                $linha = mysqli_fetch_array($resultado);
                                ?>
                                <input name="participantes[]" class="form-check-input" type="checkbox" id="selectedId" value="<?php echo $linha["ID"]; ?>"> <?php
                                echo $linha["NOMEPESSOA"];
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

            <input type="hidden" name="idEvento" value="<?php echo $_GET['id']; ?>">


            <div class="form-group">
                <br>
                <div class="col-sm-offset-3 col-sm-">
                    <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Salvar Lista</button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

