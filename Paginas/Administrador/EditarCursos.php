
<?php
include '../../Classes/Curso.class.php';


$cursos = new Curso();

$id = $_GET['id'];

$resultadoConsulta = $cursos->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idCursos = $linha['ID'];
    $nome = $linha['NOME'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h2>Editar Cursos</h2>
    </div>

    <div class="row">
        <div class="col-md-12">
            <form class="form-horizontal" method="POST" action="../../Processa/Administrador/ProcessaEditaCurso.php">

                <div class="form-group">
                    <label for="nome" class="col-sm-2 control-label">Nome </label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" placeholder="" required="required"  maxlength="50" placeholder=""value="<?php echo $nome; ?>">
                    </div>
                </div>


                <div class="form-group">
                    <input type="hidden" name="id" value="<?php echo $idCursos; ?>">

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

