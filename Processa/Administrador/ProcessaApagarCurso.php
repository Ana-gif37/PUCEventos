<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Curso.class.php';



$curso = new Curso();

$id = $_GET["id"];



$resultado = $curso->excluir($id);
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=16'>
					<script type=\"text/javascript\">
					alert(\"Curso apagado com Sucesso.\");
				</script>
			";
} else {
    echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=16'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi apagado com Sucesso.\");
				</script>
			";
}
?>
    </body>
</html>