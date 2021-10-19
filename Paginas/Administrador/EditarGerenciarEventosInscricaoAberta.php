
<?php
include '../../Classes/Evento.class.php';
include '../../Classes/Curso.class.php';



$evento = new Evento();
$cursos = new Curso();

$id = $_GET['id'];

$resultadoConsulta = $evento->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idEventos = $linha['ID'];
    $nome = $linha['NOME_EVENTO'];
    $dataInicioInscricao = $linha['DATAINICIOINSCRICAO'];
    $dataFimInscricao = $linha['DATAFIMINSCRICAO'];
    $dataInicioEvento = $linha['DATAINICIOEVENTO'];
    $dataFimEvento = $linha['DATAFIMEVENTO'];
    $horaInicio = $linha['HORAINICIOEVENTO'];
    $horaFinal = $linha['HORAFIMEVENTO'];
    $quantidadeVagas = $linha['QUANTIDADEVAGAS'];
    $descricao = $linha['DESCRICAO'];
    $gratuitoOuPago = $linha['GRATUITOOUPAGO'];
    $idUnidade = $linha['UNIDADE'];
    $imagem = $linha['IMAGEM'];
    $id_oganizador = $linha['ORGANIZADOR_ID'];
    $cargaHoraria = $linha['CARGAHORARIA'];
}
$_SESSION['ID'] = $id;

//consulta número de cursos nos eventos

$resultadoConsultaNumeroCursos = $evento->consultarNumeroCursos($id);
$nCuraoa = mysqli_fetch_array($resultadoConsultaNumeroCursos);
$numeroCursos = $nCuraoa['nCursos'];

//consulta quantidade de cursos 

$resultadoConsultaQuantidadeCursos = $cursos->consultarNumeroCursos();
$qCuraoa = mysqli_fetch_array($resultadoConsultaQuantidadeCursos);
$quantidadeCursos = $qCuraoa['QUANTIDADE_CURSO'];


//consulta número de palestrantes

$resultadoConsultaNumeroPalestrantes = $evento->consultarNumeroPalestrantes($id);
$nPalestrantes = mysqli_fetch_array($resultadoConsultaNumeroPalestrantes);
$numeroPalestrantes = $nPalestrantes['nPalestrantes'];


//consulta os 9 palestrantes
$resultadoConsultaPalestrante1 = $evento->consultarPalestrantes($id, 0);

$linha1 = mysqli_fetch_array($resultadoConsultaPalestrante1);
$idPalestrante1 = $linha1['ID_PALESTRANTE'];
$nomePaletrante1 = $linha1['NOME_PALESTRANTE'];


if ($numeroPalestrantes > 1) {
    $resultadoConsultaPalestrante2 = $evento->consultarPalestrantes($id, 1);

    $linha2 = mysqli_fetch_array($resultadoConsultaPalestrante2);
    $idPalestrante2 = $linha2['ID_PALESTRANTE'];
    $nomePaletrante2 = $linha2['NOME_PALESTRANTE'];
}
if ($numeroPalestrantes > 2) {
    $resultadoConsultaPalestrante3 = $evento->consultarPalestrantes($id, 2);

    $linha3 = mysqli_fetch_array($resultadoConsultaPalestrante3);
    $idPalestrante3 = $linha3['ID_PALESTRANTE'];
    $nomePaletrante3 = $linha3['NOME_PALESTRANTE'];
}
if ($numeroPalestrantes > 3) {
    $resultadoConsultaPalestrante4 = $evento->consultarPalestrantes($id, 3);

    $linha4 = mysqli_fetch_array($resultadoConsultaPalestrante4);

    $idPalestrante4 = $linha4['ID_PALESTRANTE'];
    $nomePaletrante4 = $linha4['NOME_PALESTRANTE'];
}


if ($numeroPalestrantes > 4) {


    $resultadoConsultaPalestrante5 = $evento->consultarPalestrantes($id, 4);

    $linha5 = mysqli_fetch_array($resultadoConsultaPalestrante5);

    $idPalestrante5 = $linha5['ID_PALESTRANTE'];
    $nomePaletrante5 = $linha5['NOME_PALESTRANTE'];
}

if ($numeroPalestrantes > 5) {

    $resultadoConsultaPalestrante6 = $evento->consultarPalestrantes($id, 5);

    $linha6 = mysqli_fetch_array($resultadoConsultaPalestrante6);
    $idPalestrante6 = $linha6['ID_PALESTRANTE'];
    $nomePaletrante6 = $linha6['NOME_PALESTRANTE'];
}


if ($numeroPalestrantes > 6) {
    $resultadoConsultaPalestrante7 = $evento->consultarPalestrantes($id, 6);


    $linha7 = mysqli_fetch_array($resultadoConsultaPalestrante7);
    $idPalestrante7 = $linha7['ID_PALESTRANTE'];
    $nomePaletrante7 = $linha7['NOME_PALESTRANTE'];
}

if ($numeroPalestrantes > 7) {
    $resultadoConsultaPalestrante8 = $evento->consultarPalestrantes($id, 7);

    $linha8 = mysqli_fetch_array($resultadoConsultaPalestrante8);
    $idPalestrante8 = $linha8['ID_PALESTRANTE'];
    $nomePaletrante8 = $linha8['NOME_PALESTRANTE'];
}

if ($numeroPalestrantes > 8) {
    $resultadoConsultaPalestrante9 = $evento->consultarPalestrantes($id, 8);

    $linha8 = mysqli_fetch_array($resultadoConsultaPalestrante9);
    $idPalestrante9 = $linha9['ID_PALESTRANTE'];
    $nomePaletrante9 = $linha9['NOME_PALESTRANTE'];
}
?>

<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Editar Evento </h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaEditaEventosInscricaoAberta.php" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome do Evento</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" placeholder="" required="required" maxlength="100" value="<?php echo $nome ?>" >
                    </div>
                </div>

                <form class="form-horizontal">
                    <div class="form-group">
                        <label for="dataInicioInscricao" class="col-sm-2 control-label">Data de inico das inscrições</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="dataInicioInscricao" name="dataInicioInscricao" placeholder="Formato dd/mm/aaaa" required="required"value="<?php echo date('d/m/Y', strtotime($dataInicioInscricao)); ?>">
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>

                        </div>
                        <label for="dataFimInscricao" class="col-sm-2 control-label">Data de fim das inscrições</label>
                        <div class="col-sm-4">
                            <div class="input-group date">
                                <input type="text" class="form-control" id="dataFimInscricao" name="dataFimInscricao" placeholder="Formato dd/mm/aaaa" required="required"value="<?php echo date('d/m/Y', strtotime($dataFimInscricao)); ?>">
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
                                    <input type="text" class="form-control" id="dataInicioEvento" name="dataInicioEvento" placeholder="Formato dd/mm/aaaa" required="required"value="<?php echo date('d/m/Y', strtotime($dataInicioEvento)); ?>">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                            </div>
                            <label for="dataFimEvento" class="col-sm-2 control-label">Data de fim do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dataFimEvento" name="dataFimEvento" placeholder="Formato dd/mm/aaaa"  required="required"value="<?php echo date('d/m/Y', strtotime($dataFimEvento)); ?>">
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
                                    <input id="horaInicio" name="horaInicio"type="text" class="form-control" placeholder="Formato hh:mm" required="required" value="<?php echo str_replace(":", "", date('H:i', strtotime($horaInicio))); ?>">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>

                            <label for="horaFinal" class="col-sm-2 control-label">Horário Final do Evento</label>
                            <div class="col-sm-4">
                                <div class="input-group clockpicker-with-callbacks">
                                    <input id="horaFinal" name="horaFinal"type="text" class="form-control" placeholder="Formato hh:mm" required="required" value="<?php echo str_replace(":", "", date('H:i', strtotime($horaFinal))); ?>">
                                    <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-time"></span>
                                    </span>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                            <label for="cargaHoraria"   class="col-sm-2 control-label">Carga Horária Total do Evento</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="cargaHoraria" name="cargaHoraria" placeholder="Somente números" required="required" value="<?php echo $cargaHoraria ?>">
                            </div>
                            <label for="quantidadeVagas"  class="col-sm-2 control-label">Quantidade de Vagas </label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="quantidadeVagas" name="quantidadeVagas" placeholder="Somente números " required="required"value="<?php echo $quantidadeVagas ?>" >
                            </div>
                        </div>





                        <div class="form-group">
                            <label for="descricao" class="col-sm-2 control-label">Descrição </label>
                            <div class="col-sm-10">
                                <textarea class="form-control ckeditor" rows="5" name="descricao" placeholder="" required="required" maxlength="4294967295"><?php echo $descricao ?></textarea>
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

                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($id_situacao == $idUnidade) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                ><?php echo $linha["NOME"]; ?></option>

                                        </option>

                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>


                        <?php
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
                                            $cursosEvento = $evento->consultarCursos($id);

                                            $resultadoCurso = $cursos->exibirTodosCursosCadastradosAtivos();
                                            if ($quantidadeCursos > 0) {

                                                for ($i = 0; $i < mysqli_num_rows($resultadoCurso); $i++) {
                                                    $linha = mysqli_fetch_array($resultadoCurso);
                                                    ?>
                                                    <input name="curso[]" <?php
                                                    if ($evento->consultarSeCursoEstaEmEvento($id, $linha["ID"]) == true) {
                                                        echo "checked";
                                                    }
                                                    ?> class="form-check-input" type="checkbox" id="inlineCheckbox1"  value="<?php echo $linha["ID"]; ?>"> <?php
                                                           echo $linha["NOME"];
                                                           ?>
                                                           <?php
                                                       }
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

                        <div class="form-group">
                            <label for="id_organizador"  class="col-sm-2 control-label">Selecione o organizador</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="id_organizador" id="id_organizador" required="required">
                                    <option value="">Selecione</option>
                                    <?php
                                    include '../../Classes/Organizador.class.php';

                                    $organizador = new Organizador();

//LISTA OS PARTICIPANTES
                                    $resultadoOrganizador = $organizador->exibirTodosUsuariosCadastradosAtivos();
                                    for ($i = 0; $i < mysqli_num_rows($resultadoOrganizador); $i++) {
                                        $linha = mysqli_fetch_array($resultadoOrganizador);

                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($id_situacao == $id_oganizador) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                ><?php echo $linha["NOMEPESSOA"]; ?></option>

                                        </option>

                                    <?php }
                                    ?>
                                </select>
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
                                        $id_situacao = $linha['ID'];
                                        ?>

                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($id_situacao == $idPalestrante1) {
                                                    echo 'selected';
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 1) {
                                                    if ($id_situacao == $idPalestrante2) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 2) {
                                                    if ($id_situacao == $idPalestrante3) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA'] ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 3) {
                                                    if ($id_situacao == $idPalestrante4) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 4) {
                                                    if ($id_situacao == $idPalestrante5) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 5) {
                                                    if ($id_situacao == $idPalestrante6) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 6) {
                                                    if ($id_situacao == $idPalestrante7) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 7) {
                                                    if ($id_situacao == $idPalestrante8) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
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
                                        $id_situacao = $linha['ID'];
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"

                                                <?php
                                                if ($numeroPalestrantes > 8) {
                                                    if ($id_situacao == $idPalestrante9) {
                                                        echo 'selected';
                                                    }
                                                }
                                                ?>
                                                ><?php echo $linha['NOMEPESSOA']; ?></option>

                                        </option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>


                            </p>

                        </div>
                        <br><br>

                        <input type="hidden" name="idEvento" value="<?php echo $id; ?>">

                        <input type="hidden" name="ncursos" value="<?php echo $numeroCursos; ?>">

                        <div class="form-group">
                            <br><br><br>
                            <?php if ($gratuitoOuPago == 1) { ?>
                            <div class="col-sm-offset-2 col-sm-4">
                                <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Editar  <br> </button>
                            </div>
                             <?php } ?>
                            <?php if ($gratuitoOuPago == 2) { ?>
                                <div class="col-sm-offset-2 col-sm-4">
                                </div>
                            <?php } ?>
                        </div>

                    </form>
                    </div>
                    </div>
                    </div> <!-- /container -->








