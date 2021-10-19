<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/DAO/EventoDAO.php';
include '../../Classes/entidades/evento.php';

$EventoDAO = new EventoDAO();
$evento = new evento();

$id = $_GET["id"];



$resultado = $EventoDAO->excluir($id);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=4'>
					<script type=\"text/javascript\">
					alert(\"Evento apagado com Sucesso.\");
				</script>
			";
        } else {
            echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=4'>
				<script type=\"text/javascript\">
					alert(\"Evento não foi apagado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>