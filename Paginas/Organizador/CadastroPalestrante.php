



<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Cadastrar Palestrante</h2>
    </div>
    <div class="row espaco">
        <div class="pull-right">
            <a href='index.php?link=10'><button type='button' class='btn btn-sm btn-info'>Listar e Gerenciar Palestrante</button></a>				
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Organizador/ProcessaCadastroPalestrante.php">

                <div class="form-group">
                    <label for="nomePessoa" class="col-sm-2 control-label">Nome Pessoa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="nomePessoa" placeholder=""  maxlength="50" required="required" >
                    </div>
                    <label for="empresa" class="col-sm-2 control-label">Nome Da Empresa(Opcional)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="empresa" placeholder="" maxlength="50">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpfPessoa" class="col-sm-2 control-label">CPF </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa" placeholder="" maxlength="14" required="required" >
                    </div>
                    <label for="cnpjEmpresa" class="col-sm-2 control-label">CNPJ Da Empresa(Opcional) </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cnpjEmpresa" name="cnpjEmpresa" placeholder="" maxlength="18">
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
                    <label for="matricula" class="col-sm-2 control-label">Matrícula Da Instituição(Caso Possuir)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Somente Números"  maxlength="10">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" placeholder="" required="required" maxlength="35"  pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres">
                    </div>
                    <label for="senhaConfirma" class="col-sm-2 control-label">Confirme a Senha </label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senhaConfirma" placeholder="Confirme a senha digitada anteriormente" required="required" maxlength="35" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres">
                    </div>
                </div>



                <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder=" "required="required" maxlength="70">
                    </div>
                    <label for="emailConfirma" class="col-sm-2 control-label">Confirme o E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="emailConfirma" placeholder="Confirme o email digitado anteriormente" required="required" maxlength="70">
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

