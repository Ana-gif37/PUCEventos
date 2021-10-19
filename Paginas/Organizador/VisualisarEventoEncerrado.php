
<?php
include '../../Classes/DAO/EventoDAO.php';
include '../../Classes/entidades/evento.php';

$EventoDAO = new EventoDAO();
$evento = new evento();

$id = $_GET['id'];

$resultadoConsulta = $EventoDAO->consultarCodigo($id);
for ($i = 0; $i < mysqli_num_rows($resultadoConsulta); $i++) {
    $linha = mysqli_fetch_array($resultadoConsulta);
    $idCurso = $linha['ID'];
    $nome = $linha['NOME'];
    $dataInicioInscricao = $linha['DATAINICIOINSCRICAO'];
    $dataFimInscricao = $linha['DATAFIMINSCRICAO'];
    $dataInicioEvento = $linha['DATAINICIOEVENTO'];
    $dataFimEvento = $linha['DATAFIMEVENTO'];
    $horaInicioEvento = $linha['HORAINICIOEVENTO'];
    $horaFimEvento = $linha['HORAFIMEVENTO'];
    $quantidadeVagas = $linha['QUANTIDADEVAGAS'];
    $descricao = $linha['DESCRICAO'];
    $gratuitoOuPago = $linha['GRATUITOOUPAGO'];
    $valorPagamento = $linha['VALORPAGAMENTO'];
    $dataVencimento = $linha['DATAVENCIMENTO'];
    $id_unidade = $linha['ID_UNIDADE'];
    $id_oganizador = $linha['ID_ORGANIZADOR'];
    $imagem = $linha['IMAGEM'];
}
$_SESSION['ID'] = $id;
?>
<div class="container theme-showcase" role="main">      
    <div class="page-header">
        <h1>Visualizar Evento</h1>
    </div>



    <div class="row">
        <div class="col-md-12">
            <div class=" col-sm-3 col-md-2">
                <b>Id:</b>
            </div>
            <div class=" col-sm-9 col-md-10">
                <?php echo $idCurso; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Nome:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $nome; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Período de Inscrição:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('d/m/Y ', strtotime($dataInicioInscricao)); ?> até  <?php echo date('d/m/Y ', strtotime($dataFimInscricao)); ?> 
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Período do Evento:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('d/m/Y ', strtotime($dataInicioEvento)); ?> até  <?php echo date('d/m/Y ', strtotime($dataFimEvento)); ?> 
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Horário do Evento:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo date('H:i ', strtotime($horaInicioEvento)); ?> até  <?php echo date('H:i ', strtotime($horaFimEvento)); ?> 
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Quantidade de vagas:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $quantidadeVagas; ?>
            </div>
            <div class="col-sm-3 col-md-2">
                <b>Descricao:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $descricao; ?>
            </div>


            <div class="col-sm-3 col-md-2">
                <b>Gratuito ou pago?</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php
                if ($gratuitoOuPago == 1) {
                    echo 'Gratuito';
                } if ($gratuitoOuPago == 2) {
                    echo 'Pago';
                }
                ?>

            </div>
           

            <div class="col-sm-3 col-md-2">
                <b>Unidade:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $id_unidade; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Organizador:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <?php echo $id_oganizador; ?>
            </div>

            <div class="col-sm-3 col-md-2">
                <b>Imagem:</b>
            </div>
            <div class="col-sm-9 col-md-10">
                <br>
                <img src="<?php echo "../../imagens/ImagensEventos/$imagem"; ?>" width="100" height="100">
            </div>
        </div>
    </div>
</div> <!-- /container -->

