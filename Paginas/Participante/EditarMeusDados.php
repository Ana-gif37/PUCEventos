
<?php
$participante = new Participante();

$id = $_SESSION['idParticipante'];

$resultadoConsulta = $participante->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idParticipante = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $datanascimento = $linha['DATANASCIMENTO'];
    $sexo = $linha['SEXO'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
    $curso = $linha['NOMECURSO'];
    $periodo = $linha['PERIODO'];
    $idUnidade = $linha['ID_UNIDADE'];
    $id_curso = $linha['ID_CURSO'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Editar Participante</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Participante/ProcessaEditarMeusDados.php">

                <div class="form-group">
                    <label for="nomePessoa" class="col-sm-2 control-label">Nome Pessoa</label> 
                    <div class="col-sm-10">
                        <input type="text" class="form-control" disabled="disabled"placeholder="" maxlength="50"required="required" value="<?php echo $nomePessoa; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="matricula" class="col-sm-2 control-label">Matrícula (Caso for aluno(a) da PUC)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" maxlength="35" maxlength="10"value="<?php echo $matricula; ?>">
                    </div>
                    <label for="cpfPessoa" class="col-sm-2 control-label">CPF </label>
                    <div class="col-sm-4">
                        <input type="text" disabled="disabled" class="form-control"  placeholder="" maxlength="14"required="required"value="<?php echo $CPFPessoa; ?>" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <input type="text" class="form-control" disabled="disabled"placeholder="Formato dd/mm/aaaa" required="required"value="<?php echo date('d/m/Y', strtotime($datanascimento)); ?>">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>

                    <label for="sexo" class="col-sm-2 control-label">Sexo: </label>
                    <div class="col-sm-4">
                        <select class="form-control" disabled="disabled">
                            <option value="">Selecione</option>
                            <option value="m"    
<?php
if ($sexo == 'm') {
    echo 'selected';
}
?>
                                    >Masculino</option>
                            <option value="f"
                            <?php
                            if ($sexo == 'f') {
                                echo 'selected';
                            }
                            ?>
                                    >Feminino</option>
                        </select>

                    </div>
                </div>
                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" placeholder="" maxlength="35" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres"required="required" value="<?php echo $senha; ?>" >
                    </div>
                    <label for="email" class="col-sm-2 control-label">E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder=" " maxlength="70" value="<?php echo $email; ?>" >
                    </div>

                </div>



                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Selecione o curso (Caso for aluno(a) da PUC)</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="curso" id="curso" >
                            <option value="">Selecione</option>
<?php
include '../../Classes/Curso.class.php';

$curso = new Curso();

//LISTA OS PARTICIPANTES
$resultadoCurso = $curso->exibirTodosCursosCadastradosAtivos();
for ($i = 0; $i < mysqli_num_rows($resultadoCurso); $i++) {
    $linha = mysqli_fetch_array($resultadoCurso);

    echo $id_situacao = $linha['ID'];
    ?>
                                <option value="<?php echo $linha["ID"]; ?>"

                                <?php
                                if ($id_situacao == $id_curso) {
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



                <div class="form-group">
                    <label for="periodo" class="col-sm-2 control-label">Período (Caso for aluno(a) da PUC) </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="periodo">
                            <option value="">Selecione o Período</option>
                            <option value="1"
<?php
if ($periodo == 1) {
    echo 'selected';
}
?>
                                    >1º Período</option>
                            <option value="2"
                            <?php
                            if ($periodo == 2) {
                                echo 'selected';
                            }
                            ?>
                                    >2º Período</option>
                            <option value="3"
                            <?php
                            if ($periodo == 3) {
                                echo 'selected';
                            }
                            ?>
                                    >3º Período</option>
                            <option value="4"
                            <?php
                            if ($periodo == 4) {
                                echo 'selected';
                            }
                            ?>
                                    >4º Período</option>
                            <option value="5"
                            <?php
                            if ($periodo == 5) {
                                echo 'selected';
                            }
                            ?>
                                    >5º Período</option>
                            <option value="6"
                            <?php
                            if ($periodo == 6) {
                                echo 'selected';
                            }
                            ?>
                                    >6º Período</option>
                            <option value="7"
                            <?php
                            if ($periodo == 7) {
                                echo 'selected';
                            }
                            ?>
                                    >7º Período</option>
                            <option value="8"
                            <?php
                            if ($periodo == 8) {
                                echo 'selected';
                            }
                            ?>
                                    >8º Período</option>
                            <option value="9"
                            <?php
                            if ($periodo == 9) {
                                echo 'selected';
                            }
                            ?>
                                    >9º Período</option>
                            <option value="10"
                            <?php
                            if ($periodo == 10) {
                                echo 'selected';
                            }
                            ?>
                                    >10º Período</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="id_unidade" class="col-sm-2 control-label">Selecione a unidade (Caso for aluno(a) da PUC) </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="id_unidade" id="id_unidade" >
                            <option value="">Selecione</option>
<?php
include '../../Classes/Unidade.class.php';

$unidade = new Unidade();

//LISTA OS PARTICIPANTES
$resultado = $unidade->exibirTodasUnidadesCadastradasAtivas();
for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
    $linha = mysqli_fetch_array($resultado);

    echo $id_situacao = $linha['ID'];
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

                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="hidden" name="nomePessoa" value="<?php echo $nomePessoa; ?>">
                <input type="hidden" name="cpfPessoa" value="<?php echo $CPFPessoa; ?>">
                <input type="hidden" name="sexo" value="<?php echo $sexo; ?>">
                <input type="hidden" name="dataNascimento" value="<?php echo $datanascimento; ?>">

                <div class="form-group">
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

