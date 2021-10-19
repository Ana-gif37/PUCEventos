<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Palestrante.class.php';

$palestrante = new Palestrante();

$id = $_GET["id"];



$resultado = $palestrante->excluir($id);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=10'>
					<script type=\"text/javascript\">
					alert(\"Usuário apagado com Sucesso.\");
				</script>
			";
        } else {
            echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=10'>
				<script type=\"text/javascript\">
					alert(\"Usuário não foi apagado com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>