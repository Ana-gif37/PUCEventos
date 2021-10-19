<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Unidade.class.php';



$unidade = new Unidade();

$id = $_GET["id"];



$resultado = $unidade->excluir($id);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=18'>
					<script type=\"text/javascript\">
					alert(\"Unidade apagada com Sucesso.\");
				</script>
			";
        } else {
            echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=18'>
				<script type=\"text/javascript\">
					alert(\"Unidade não foi apagada com Sucesso.\");
				</script>
			";
        }
        ?>
    </body>
</html>