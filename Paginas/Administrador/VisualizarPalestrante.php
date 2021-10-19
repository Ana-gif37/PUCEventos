
<?php
include '../../Classes/Palestrante.class.php';


$palestrante = new Palestrante();

$id = $_GET['id'];

$resultadoConsulta = $palestrante->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idOrganizador = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $nomeEmpresa = $linha['EMPRESA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $dataNascimento = $linha['DATANASCIMENTO'];
    $sexo = $linha['SEXO'];
    $CNPJEmpresa = $linha['CNPJEMPRESA'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
    //$telefone = $linha['TELEFONE'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Palestrante</h1>
    </div>

    <div class="row">
        <div class="pull-right">

            <a href='index.php?link=39&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

            <a href='../../Processa/Administrador/ProcessaApagarPalestrante.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
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
                <b>Nascimento:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo date('d/m/Y', strtotime($dataNascimento)); ?>
            </div>


            <div class="col-sm-3 col-md-1">
                <b>Sexo:</b>
            </div>
            <?php if ($sexo == 'm') { ?>

                <div class="col-sm-9 col-md-11">
                    <?php echo 'masculino'; ?>
                </div>
            <?php } else { ?>
                <div class="col-sm-9 col-md-11">
                    <?php echo 'feminino'; ?>
                </div>
            <?php } ?>

           

            <?php if ($nomeEmpresa <> NULL or $nomeEmpresa <> '') { ?>
                <div class="col-sm-3 col-md-1">
                    <b>Empresa:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php echo $nomeEmpresa; ?>
                </div>
            <?php } ?>

            <?php if ($CNPJEmpresa <> NULL) { ?>
                <div class="col-sm-3 col-md-1">
                    <b>CNPJ:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php
                    $parte_um = substr($CNPJEmpresa, 0, 2);
                    $parte_dois = substr($CNPJEmpresa, 2, 3);
                    $parte_tres = substr($CNPJEmpresa, 5, 3);
                    $parte_quatro = substr($CNPJEmpresa, 8, 4);
                    $parte_cinco = substr($CNPJEmpresa, 12, 2);

                    $cnpj = "$parte_um.$parte_dois.$parte_tres/$parte_quatro-$parte_cinco";



                    echo $cnpj;
                    ?>
                </div>
            <?php } ?>




            <div class="col-sm-3 col-md-1">
                <b>E-mail:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo $email; ?>
            </div>


        </div>
    </div>
</div> <!-- /container -->

