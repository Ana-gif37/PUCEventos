
<?php
$administrador = new Administrador();

  $id=$_SESSION['idAdministrador'] ;

$resultadoConsulta = $administrador->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idParticipante = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
}
//$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Atualizar meu cadastro</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaEditarMeusDados.php">

                <div class="form-group">
                    <label for="nomePessoa" class="col-sm-2 control-label">Nome:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="" required="required"  maxlength="50" disabled="disabled"value="<?php echo $nomePessoa; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <label for="matricula"  class="col-sm-2 control-label">Matrícula (Caso possuir)</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" name="matricula" id="matricula" placeholder=""   maxlength="10"value="<?php echo $matricula; ?>">
                    </div>
                    <label for="cpfPessoa" class="col-sm-2 control-label">CPF </label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control"  placeholder="" required="required"  maxlength="14" disabled="disabled" value="<?php echo $CPFPessoa; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="senha" class="col-sm-2 control-label">Senha</label>
                    <div class="col-sm-4">
                        <input type="password" class="form-control" name="senha"  id="senha" placeholder="Somente Numeros" required="required"  maxlength="10"value="<?php echo $senha; ?>">
                    </div>
                    <label for="email" class="col-sm-2 control-label">E-mail </label>
                      <div class="col-sm-4">
                        <input type="email" class="form-control" name="email" placeholder=" " maxlength="70" value="<?php echo $email; ?>" >
                    </div>
                </div>




                <input type="hidden" name="id" value="<?php echo $idParticipante; ?>">

                <div class="form-group">
                    <br>
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" name="editar" value="editar" class="btn btn-primary">Editar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> <!-- /container -->

