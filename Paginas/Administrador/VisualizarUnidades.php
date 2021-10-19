
<?php

include '../../Classes/Unidade.class.php';

$unidade= new Unidade();

$id = $_GET['id'];

$resultadoConsulta = $unidade->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idCurso = $linha['ID'];
    $nome = $linha['NOME'];

}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Unidade</h1>
    </div>

    <div class="row">
        <div class="pull-right">

            <a href='index.php?link=27&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

            <a href='../../Processa/Administrador/ProcessaApagarUnidade.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class=" col-sm-3 col-md-1">
                <b>Id:</b>
            </div>
            <div class=" col-sm-9 col-md-11">
                <?php echo $idCurso; ?>
            </div>

            <div class="col-sm-3 col-md-1">
                <b>Nome:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo $nome; ?>
            </div>

           

        </div>
    </div>
</div> <!-- /container -->

