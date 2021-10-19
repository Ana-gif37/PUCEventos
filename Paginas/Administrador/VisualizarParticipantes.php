
<?php
include '../../Classes/Participante.class.php';


$participante = new Participante();

$id = $_GET['id'];

$resultadoConsulta = $participante->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idParticipante = $linha['ID'];
    $matricula = $linha['MATRICULA'];
    $nomePessoa = $linha['NOMEPESSOA'];
    $CPFPessoa = $linha['CPFPESSOA'];
    $dataNascimento = $linha['DATANASCIMENTO'];
    $sexo = $linha['SEXO'];
    $senha = $linha['SENHA'];
    $email = $linha['EMAIL'];
    $curso = $linha['NOMECURSO'];
    $periodo = $linha['PERIODO'];
    $unidade = $linha['NOMEUNIDADE'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Participante</h1>
    </div>
    

    <div class="row">
        <div class="pull-right">

            <a href='index.php?link=4&id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-warning'>Editar</button></a>

            <a href='../../Processa/Administrador/ProcessaApagarParticipante.php?id=<?php echo $linha['ID']; ?>'><button type='button' class='btn btn-sm btn-danger'>Apagar</button></a>
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


            <div class="col-sm-3 col-md-1">
                <b>E-mail:</b>
            </div>
            <div class="col-sm-9 col-md-11">
                <?php echo $email; ?>
            </div>
            <?php if ($curso <> NULL) { ?>
                <div class="col-sm-3 col-md-1">
                    <b>Curso:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php echo $curso; ?>
                </div>
            <?php } ?>


            <?php if ($periodo <> NULL) { ?>
                <div class="col-sm-3 col-md-1">
                    <b>Período:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php echo $periodo . 'º Período'; ?>
                </div>
            <?php } ?>


            <?php if ($unidade <> NULL) { ?>
                <div class="col-sm-3 col-md-1">
                    <b>Unidade:</b>
                </div>
                <div class="col-sm-9 col-md-11">
                    <?php echo $unidade; ?>
                </div>
            <?php } ?>

        </div>
    </div>
</div> <!-- /container -->

