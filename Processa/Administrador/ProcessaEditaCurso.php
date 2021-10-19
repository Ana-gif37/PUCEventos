<?php
session_start();
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Curso.class.php';


$cursos = new Curso();


$id = $_POST["id"];
$nome = $_POST['nome'];


$resultadoAlteracao = $cursos->alterar($id, $nome);





?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>

    <body>
<?php
if ($resultadoAlteracao == true) {
    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=16'>
				<script type=\"text/javascript\">
					alert(\"Curso editado com Sucesso.\");
				</script>
			";
} else {
    echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=16'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi editado com Sucesso.\");
				</script>
			";
}
?>
    </body>
</html>