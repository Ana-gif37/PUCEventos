

<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Criar Eventos </h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Organizador/ProcessaCriarEvento.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome do Evento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" placeholder="" required="required" maxlength="100" >
                    </div>
                </div>

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="dataInicioInscricao" class="col-sm-2 control-label">Data de inico das inscrições</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="dataInicioInscricao" name="dataInicioInscricao" placeholder="Formato dd/mm/aaaa" required="required">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                        </div>
                        <label for="dataFimInscricao" class="col-sm-2 control-label">Data de fim das inscrições</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="dataFimInscricao" name="dataFimInscricao" placeholder="Formato dd/mm/aaaa" required="required">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                        </div>
                    </div>




                    <form class="form-horizontal">
                        <div class="form-group">
                            <label for="dataInicioEven4to" class="col-sm-2 control-label">Data de inico do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dataInicioEvento" name="dataInicioEvento" placeholder="Formato dd/mm/aaaa" required="required">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>
                            <label for="dataFimEvento" class="col-sm-2 control-label">Data de fim do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dataFimEvento" name="dataFimEvento" placeholder="Formato dd/mm/aaaa"  required="required">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>
                        </div>




                        <div class="form-group">
                            <label for="horaInicial" class="col-sm-2 control-label">Horário Inicial do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group clockpicker-with-callbacks">
                                    <input id="horaInicio" name="horaInicio"type="text" class="form-control" value="" placeholder="Formato hh:mm" required="required">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>

                            <label for="horaFinal" class="col-sm-2 control-label">Horário Final do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group clockpicker-with-callbacks">
                                    <input id="horaFinal" name="horaFinal"type="text" class="form-control" value=""placeholder="Formato hh:mm" required="required">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="cargaHoraria"   class="col-sm-2 control-label">Carga Horária Total do Evento</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="cargaHoraria" name="cargaHoraria" placeholder="Somente números" required="required">
                            </div>
                            <label for="quantidadeVagas"  class="col-sm-2 control-label">Quantidade de Vagas </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="quantidadeVagas" name="quantidadeVagas" placeholder="Somente números " required="required">
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="descricao" class="col-sm-2 control-label">Descrição </label>
                            <div class="col-sm-10">
                                <textarea class="form-control ckeditor" rows="5" name="descricao" placeholder="" required="required" maxlength="4294967295"></textarea>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="id_unidade"  class="col-sm-2 control-label">Selecione a unidade</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_unidade" id="id_unidade" required="required">
                                    <option value="">Selecione</option>
                                    <?php
                                    include '../../Classes/Unidade.class.php';

                                    $unidade = new Unidade();

                                    //LISTA OS PARTICIPANTES
                                    $resultado = $unidade->exibirTodasUnidadesCadastradasAtivas();
                                    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                        $linha = mysqli_fetch_array($resultado);
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOME"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <?php
                        include '../../Classes/Curso.class.php';
                        $cursos = new Curso();

                        $resultadoQ = $cursos->consultarNumeroCursos();
                        $linhaQ = mysqli_fetch_array($resultadoQ);
                        $quantidadeCurso = $linhaQ['QUANTIDADE_CURSO'];
                        if ($quantidadeCurso > 0) {
                            ?>
                            

                            <div class="form-group">

                                <label for="curso[]" class="col-sm-2 control-label">Selecione os cursos que podem participar deste evento</label>
                                <div class="col-sm-10">

                                    <div class="form-check form-check-inline">
                                        <br>
                                        <label class="form-check-label">
                                            <?php
                                            //LISTA OS PARTICIPANTES
                                            $resultadoCurso = $cursos->exibirTodosCursosCadastradosAtivos();
                                            for ($i = 0; $i < mysqli_num_rows($resultadoCurso); $i++) {
                                                $linha = mysqli_fetch_array($resultadoCurso);
                                                ?>
                                                <input name="curso[]" class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?php echo $linha["ID"]; ?>"> <?php
                                                echo $linha["NOME"];
                                                "required"
                                                ?>
                                                <?php
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <br><br>
                            </div>
                            <?php
                            
                            }
                            ?>
                            <br>


                            <div class="form-group">
                                <label for="arquivo" class="col-sm-2 control-label">Foto </label>
                                <div class="col-sm-10">
                                    <input name="arquivo" type="file"/>	
                                </div>
                            </div>

                            <br>
                            <div id="dynamicDiv">
                                <p>
                                    <label for="descricao" class="col-sm-2 control-label">Palestantes </label>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante1"  id="inputeste" required="required"  >

                                        <option value="">Palestrante 1(obrigatório)</option>
                                        <?php
                                        include '../../Classes/Palestrante.class.php';

                                        $palestrante = new Palestrante();

//LISTA OS PARTICIPANTES
                                        $resultadoP = $palestrante->exibirTodosUsuariosCadastradosAtivos();
                                        for ($i = 0; $i < mysqli_num_rows($resultadoP); $i++) {
                                            $linha = mysqli_fetch_array($resultadoP);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante2"  id="inputeste"  >

                                        <option>Palestrante 2(Caso possuir)</option>
                                        <?php
                                        $resultadoPa = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPa);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante3"  id="inputeste"  >

                                        <option>Palestrante 3(Caso possuir)</option>
                                        <?php
                                        $resultadoPar = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPar); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPar);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                </p>

                            </div>

                            <br> <br> 

                            <div id="dynamicDiv">

                                <p>
                                    <label for="descricao" class="col-sm-2 control-label"></label>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante4"  id="inputeste"  >

                                        <option>Palestrante 4(Caso possuir)</option>
                                        <?php
//LISTA OS PARTICIPANTES
                                        $resultadoPart = $palestrante->exibirTodosUsuariosCadastradosAtivos();
                                        for ($i = 0; $i < mysqli_num_rows($resultadoPart); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPart);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante5"  id="inputeste"  >

                                        <option>Palestrante 5(Caso possuir)</option>
                                        <?php
                                        $resultadoPa = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPa);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante6"  id="inputeste"  >

                                        <option>Palestrante 6(Caso possuir)</option>
                                        <?php
                                        $resultadoPar = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPar); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPar);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                </p>

                            </div>
                            <br> <br> 

                            <div id="dynamicDiv">

                                <p>
                                    <label for="descricao" class="col-sm-2 control-label"></label>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante7"  id="inputeste"  >

                                        <option>Palestrante 7(Caso possuir)</option>
                                        <?php
//LISTA OS PARTICIPANTES
                                        $resultadoPart = $palestrante->exibirTodosUsuariosCadastradosAtivos();
                                        for ($i = 0; $i < mysqli_num_rows($resultadoPart); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPart);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante8"  id="inputeste"  >

                                        <option>Palestrante 8(Caso possuir)</option>
                                        <?php
                                        $resultadoPa = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPa); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPa);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>
                                <div class="col-sm-3">
                                    <select class="form-control" name="id_palestrante9"  id="inputeste"  >

                                        <option>Palestrante 9(Caso possuir)</option>
                                        <?php
                                        $resultadoPar = $palestrante->exibirTodosUsuariosCadastradosAtivos();

                                        for ($i = 0; $i < mysqli_num_rows($resultadoPar); $i++) {
                                            $linha = mysqli_fetch_array($resultadoPar);
                                            ?>
                                            <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOMEPESSOA"]; ?></option>
                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>


                                </p>

                            </div>
                            <br><br>

                            <!--sempre seta que o evento é gratuito somente após preenchimento dos dados de pagamento é que são atualizados os dados--> 
                            <input type="hidden" name="idOrganizador" value="<?php echo $_SESSION['idOrganizador']; ?>">


                            <input type="hidden" name="idOrganizador" value="<?php echo $_SESSION['idOrganizador']; ?>">


                        <div class="form-group">
                            <br><br><br>
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Salvar  <br> </button>
                            </div>
                            <div class="col-sm-offset-2 col-sm-4">
                            </div>
                        </div>

                    </form>
                    </div>
                    </div>
                    </div> <!-- /container -->








