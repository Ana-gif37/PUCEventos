
<?php
$palestrante = new Palestrante();

$id = $_SESSION['idPalestrante'];

$resultadoConsulta = $palestrante->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idPalestrante = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $datanascimento = $linha['DATANASCIMENTO'];
    $sexo = $linha['SEXO'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
    $CNPJEmpresa = $linha['CNPJEMPRESA'];
    //$telefone = $linha['TELEFONE'];
    $nomeEmpresa = $linha['EMPRESA'];
}
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Atualizar meu cadastro</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Palestrante/ProcessaEditarMeusDados.php">

                <div class="form-group">
                    <label for="nomePessoa" class="col-sm-2 control-label">Nome Pessoa</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  disabled="disabled" name="nomePessoa" placeholder=""  maxlength="50" required="required" value="<?php echo $nomePessoa; ?>">
                    </div>
                    <label for="empresa" class="col-sm-2 control-label">Nome Da Empresa(Opcional)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="empresa" placeholder="" maxlength="50" value="<?php echo $nomeEmpresa; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="cpfPessoa" class="col-sm-2 control-label">CPF </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cpfPessoa" name="cpfPessoa" placeholder="" maxlength="14" required="required"  disabled="disabled"value="<?php echo $CPFPessoa; ?>">
                    </div>
                    <label for="cnpjEmpresa" class="col-sm-2 control-label">CNPJ Da Empresa(Opcional) </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="cnpjEmpresa" name="cnpjEmpresa" placeholder="" maxlength="18" value="<?php echo $CNPJEmpresa; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="dataNascimento" class="col-sm-2 control-label">Data de Nascimento</label>
                    <div class="col-sm-4">
                        <div class="input-group date">
                            <input type="text" class="form-control"disabled="disabled" placeholder="Formato dd/mm/aaaa" required="required"value="<?php echo date('d/m/Y', strtotime($datanascimento)); ?>">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>

                    </div>

                    <label for="sexo" class="col-sm-2 control-label">Sexo: </label>
                    <div class="col-sm-4">
                        <select class="form-control" name="sexo" disabled="disabled" >
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
                    <label for="matricula" class="col-sm-2 control-label">Matrícula Da Instituição(Caso Possuir)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="matricula" name="matricula" placeholder="Somente Números"  maxlength="10" value="<?php echo $matricula; ?>">
                    </div>
                    
                </div>

                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha" placeholder="" required="required" maxlength="35"  pattern=".{6,}" title="Sua senha deve ter no minimo 6 caracteres"value="<?php echo $senha; ?>">
                    </div>
                    <label for="email" class="col-sm-2 control-label">E-mail </label>
                    <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder=" "required="required" maxlength="70"value="<?php echo $email; ?>">
                    </div>
                </div>

                <input type="hidden" name="id" value="<?php echo $idPalestrante; ?>">




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

