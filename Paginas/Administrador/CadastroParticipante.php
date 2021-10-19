

<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Cadastrar Participante</h2>
    </div>
    <div class="row espaco">
        <div class="pull-right">
            <a href='index.php?link=3'><button type='button' class='btn btn-sm btn-info'>Listar e Gerenciar Participantes</button></a>				
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaCadastroParticipante.php">

                <div class="form-group">
                    <label for="nomePessoa" class="col-sm-2 control-label">Nome Pessoa</label> 
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nomePessoa" placeholder="" maxlength="50"required="required" >
                    </div>
                </div>


                <div class="form-group">
                    <label for="matricula" class="col-sm-2 control-label">Matrícula (Caso for aluno(a) da PUC)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="" maxlength="35" maxlength="10">
                    </div>
                    <label for="cpfPessoa" class="col-sm-2 control-label">CPF </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa" placeholder="" maxlength="14"required="required" >
                    </div>
                </div>

                <div class="form-group">
                    <label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Formato dd/mm/aaaa" required="required">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>

                    <label for="sexo" class="col-sm-2 control-label">Sexo: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="sexo" >
                            <option value="">Selecione</option>
                            <option value="m">Masculino</option>
                            <option value="f">Feminino</option>
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" placeholder="" maxlength="35" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres"required="required" >
                    </div>
                    <label for="senhaConfirma" class="col-sm-2 control-label">Confirme a Senha </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senhaConfirma" placeholder="Confirme a senha digitada anteriormente" maxlength="35" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres"required="required" >
                    </div>
                </div>


                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder=" "required="required" maxlength="70" >
                    </div>
                    <label for="emailConfirma" class="col-sm-2 control-label">Confirme o E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="emailConfirma" required="required"placeholder="Confirme o email digitada anteriormente" maxlength="70">
                    </div>
                </div>




                <div class="form-group">
                    <label for="curso" class="col-sm-2 control-label">Selecione o curso (Caso for aluno(a) da PUC)</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="curso" id="id_unidade">
                            <option value="">Selecione</option>
                            <?php
                            include '../../Classes/Curso.class.php';


                            $curso = new Curso();

                            //LISTA OS PARTICIPANTES
                            $resultadoCurso = $curso->exibirTodosCursosCadastradosAtivos();
                            for ($i = 0; $i < mysqli_num_rows($resultadoCurso); $i++) {
                                $linha = mysqli_fetch_array($resultadoCurso);
                                ?>
                                <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOME"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>



                <div class="form-group">
                    <label for="periodo" class="col-sm-2 control-label">Período (Caso for aluno(a) da PUC) </label>
                    <div class="col-sm-10">
                        <select class="form-control" name="periodo" >
                            <option value="">Selecione o Período</option>
                            <option value="1">1º Período</option>
                            <option value="2">2º Período</option>
                            <option value="3">3º Período</option>
                            <option value="4">4º Período</option>
                            <option value="5">5º Período</option>
                            <option value="6">6º Período</option>
                            <option value="7">7º Período</option>
                            <option value="8">8º Período</option>
                            <option value="9">9º Período</option>
                            <option value="10">10º Período</option>
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
                                ?>
                                <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOME"]; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="gravar" value="gravar" class="btn btn-primary">Cadastrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

