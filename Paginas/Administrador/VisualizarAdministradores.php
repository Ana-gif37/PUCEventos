
<?php
$administrador = new Administrador();

$id = $_GET['id'];

$resultadoConsulta = $administrador->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idAdministrador = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Administrador</h1>
    </div>

    <div class="row">
        <div class="pull-right">

            <a href='index.php?link=25&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

            <a href='../../Processa/Administrador/ProcessaApagarAdministrador.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">


            <div class=" col-sm-3 col-md-1">
                <b>Id:</b>
            </div>

            <div class=" col-sm-9 col-md-11">
                <?php echo $id; ?>
            </div>

            <div class="col-sm-3 col-md-1">
                <b>Nome:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo $nomePessoa; ?>
            </div>

            <?php if ($matricula <> NULL) { ?>
                <div class="col-sm-3 col-md-1">
                    <b>Matrícula:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php echo $matricula; ?>
                </div>

            <?php } ?>

            <div class="col-sm-3 col-md-1">
                <b>CPF:</b>
            </div>
            <div class="col-sm-9 col-md-11">

                <?php
               

                $parte_um = substr($CPFPessoa, 0, 3);
                $parte_dois = substr($CPFPessoa, 3, 3);
                $parte_tres = substr($CPFPessoa, 6, 3);
                $parte_quatro = substr($CPFPessoa, 9, 2);

                $cpf = "$parte_um.$parte_dois.$parte_tres-$parte_quatro";

                echo $cpf;

               
                ?>
            </div>
            <div class="col-sm-3 col-md-1">
                <b>E-mail:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo $email; ?>
            </div>


        </div>
    </div>
</div> <!-- /container -->

