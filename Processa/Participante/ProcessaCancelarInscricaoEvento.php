<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Evento.class.php';

$evento = new Evento();

$idEvento = $_GET["id"];
$idParticipante= $_GET["idPartcipante"];



$resultado = $evento->excluirEventoParticipante($idEvento,$idParticipante);
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <?php
        if ($resultado == true) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=3'>
					<script type=\"text/javascript\">
					alert(\"Inscrição cancelada.\");
				</script>
			";
        } else {
            echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=3'>
				<script type=\"text/javascript\">
					alert(\"Não foi possível cancelar inscrição.\");
				</script>
			";
        }
        ?>
    </body>
</html>