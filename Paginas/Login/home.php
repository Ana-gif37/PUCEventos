
<!--container contendo todas as divs da pagina-->
<div class="container">

    <!--cabeçalho da pagina-->
    <div class="Topo">   
        <form action="index.php" method="post" accept-charset="utf-8" class="form-Topo">
            <center><img src="imagens/logo-puc-minas.png" width="10%" height="10%"/></center> 
            <center><h2> PUC Eventos - Gerenciamento de Eventos Internos</h2></center><br>  
            </div>    
            <!--formulario com  texto login e senha e botão-->
            <div class="formulario">   
                <form action="" method="" accept-charset="utf-8" class="form-login">
                    <h2> <small>Autenticação</small></h2>
                    <label form="email" class="sr-only">Usuário</label>
                    <input name = "email" type="text" id="inputUsuario" class="form-control" placeholder="Digite o E-mail" required autofocus>
                    <br>
                    <label form="senha" class="sr-only">Senha</label>
                    <input name= "senha" type="password" id="inputSenha" class="form-control"placeholder="Senha">
                    <br>
                    <div class="form-group"style="max-width:390px;margin: 0px">
                        <select name="tipoUsuario" class="form-control" >
                            <option  value="">Selecione o tipo de usuário</option>
                            <option  value="Administrador"> Administrador</option>
                            <option  value="Organizador"> Organizador</option>
                            <option  value="Palestrante"> Palestrante</option>
                            <option  value="Participante"> Participante </option>
                        </select>
                    </div>
                    <br>

                    <button type="submit" class="btn btn-primary btn-block">Entrar</button>
                    <br>
                    <div class='LinkEsqueciSenha'>
                        <button type="button" class="btn btn-xs btn-link" data-toggle="modal" data-target="#myModalEsqueciSenha">Esqueci a Senha</button>
                    </div> 
                    <div class='LinkNaoCadastro'>
                        <button type="button" class="btn btn-xs btn-link" data-toggle="modal" data-target="#myModalcad">Não Tenho Cadastro</button>
                    </div> 
            </div> 

        </form>
    </div>


    <!--referencia para arquivo php que verifica login e senha-->
    <?php
    include("./Processa/Login/VerificaLogin.php");
    ?>
    <!-- Inicio Modal Cadastro Participante-->
    <div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="alert alert-info">
                        <strong>Atenção!</strong><br> Esta seção é para cadastro exclusivo de participantes. <br>Para organizadores e administradores o cadastro é realizado por administradores do sistema.<br>Para Palestrantes o cadastro deve ser realizado por Administradores ou organizadores do Evento.
                    </div>        
                </div>
                <div class="modal-body">
                    <form method="POST" action="Processa/Participante/ProcessaCadastro.php" enctype="multipart/form-data">

                        <?php
                        include './Classes/ConexaoBD/Conexao.class.php';
                        include './Classes/Curso.class.php';
                        include './Classes/Unidade.class.php';

                        $cursos = new Curso();
                        $unidade = new Unidade();

                        $resultadoCurso = $cursos->exibirTodosCursosCadastradosAtivos();

                        $resultado = $unidade->exibirTodasUnidadesCadastradasAtivas();
                        ?>



                        <table class = "table">

                            <tr>
                            <label for="recipient-name" class="control-label">Nome Pessoa:</label>
                            <input name="nomePessoa" type="text" class="form-control" required="required"  maxlength="50">

                            <th>
                                <label for="recipient-name"  class="control-label">Matricula (Caso for aluno(a) da PUC):</label>
                                <input name="matricula" type="text" class="form-control" placeholder="Somente Número" maxlength="11" id="matricula" >
                                <label for="recipient-name"  class="control-label">Data de Nascimento:</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" id="dataNascimento" name="dataNascimento" placeholder="Formato dd/mm/aaaa" required="required">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <label for="recipient-name" class="control-label">Senha:</label>
                                <input name="senha" type="password" class="form-control" required="required" pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres" maxlength="35">
                                <label for="recipient-name" class="control-label">E-mail:</label>
                                <input name="email" type="email" class="form-control" placeholder=" " required="required" maxlength="70">




                                <label for="recipient-name" class="control-label">Curso (Caso for aluno(a) da PUC):</label>

                                <select name="curso" class="form-control">
                                    <option value="">Selecione</option>
                                    <?php
                                    for ($i = 0; $i < mysqli_num_rows($resultadoCurso); $i++) {
                                        $linha = mysqli_fetch_array($resultadoCurso);
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOME"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                                <label for="recipient-name" class="control-label">Unidade (Caso for aluno(a) da PUC):</label>

                                <select name="id_unidade" class="form-control">
                                    <option value="">Selecione</option>

                                    <?php
                                    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
                                        $linha = mysqli_fetch_array($resultado);
                                        ?>
                                        <option value="<?php echo $linha["ID"]; ?>"><?php echo $linha["NOME"]; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>





                            </th>
                            <th>
                                <label for="message-text" class="control-label">CPF:</label>
                                <input name="cpfPessoa" type="text" class="form-control" placeholder="Somente números" required="required" maxlength="15" id="cpfPessoa">
                                <label for="recipient-name" class="control-label">Sexo:</label>

                                  <select class="form-control" name="sexo" >
                                    <option  value="">Selecione</option>
                                    <option  value="m"> Masculino</option>
                                    <option  value="f"> Feminino</option>

                                </select>

                                <label for="message-text" class="control-label">Confirme a senha:</label>
                                <input name="senhaConfirma" type="password" class="form-control"required="required" maxlength="35"pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres">
                                <label for="recipient-name" class="control-label">Confirme o E-mail:</label>
                                <input name="emailConfirma" type="email" class="form-control"placeholder=" " required="required" maxlength="70">

                                <label for="recipient-name" class="control-label">Período (Caso for aluno(a) da PUC):</label>

                                <select name="periodo" class="form-control"  >
                                    <option  value="">Selecione</option>
                                    <option  value="1"> 1º Período</option>
                                    <option  value="2"> 2º Período</option>
                                    <option  value="3"> 3º Período </option>
                                    <option  value="4"> 4º Período </option>
                                    <option  value="5"> 5º Período </option>
                                    <option  value="6"> 6º Período </option>
                                    <option  value="7"> 7º Período </option>
                                    <option  value="8"> 8º Período </option>
                                    <option  value="9"> 9º Período </option>
                                    <option  value="10"> 10º Período </option>
                                </select>
                                <div class="modal-footer">
                                    <br>


                                    <input type="submit" name="gravar" value="cadastrar"class="btn btn-primary ">   
                                </div>
                            </th>
                            </tr>
                        </table>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- Fim Modal -->

    <!-- Inicio Modal Esqueci senha -->
    <div class="modal fade" id="myModalEsqueciSenha" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title text-center" id="myModalLabel">Recuperar Senha</h4>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Processa/Login/RecuperaSenha.php" enctype="multipart/form-data">

                        <label for="recipient-name" class="control-label">Digite o email cadastrado:</label>
                        <input name="email" type="email" class="form-control">
                        <label for="recipient-name" class="control-label">Tipo de Usuário:</label>
                        <select name="tipoUsuario" class="form-control" >
                            <option  value="">Selecione</option>
                            <option  value="Administrador"> Administrador</option>
                            <option  value="Organizador"> Organizador</option>
                            <option  value="Palestrante"> Palestrante</option>
                            <option  value="Participante"> Participante </option>
                        </select>


                        <div class="modal-footer">
                            <button type="submit" class="btn btn-info">Recuperar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
            <!--formularios datapicker criar os calendarios de acordo com o id do formulario-->
    <script src="./JavaScript/Organizador/FormulariosDataPicker.js"></script>
    </div>
    <!-- Fim Modal -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./jquery/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./CSS/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $('#exampleModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var recipient = button.data('whatever') // Extract info from data-* attributes
            var recipientnome = button.data('whatevernome')
            var recipientdetalhes = button.data('whateverdetalhes')
            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
            var modal = $(this)
            modal.find('.modal-title').text('ID do Curso: ' + recipient)
            modal.find('#id_curso').val(recipient)
            modal.find('#recipient-name').val(recipientnome)
            modal.find('#detalhes-text').val(recipientdetalhes)
        })
    </script>
</div>
</div>



