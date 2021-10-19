<a href="../../arquivos/3/1466172.jpg">
    <?php
    session_start();
    include '../../Classes/ConexaoBD/Conexao.class.php';
    include '../../Classes/MaterialDidatico.class.php';



    $materialDidatico = new MaterialDidatico();




    $id = $_GET["id"];
    $nome = $_GET["nome"];
    $idEventos = $_GET["evento"];




    $resultadoConsulta = $materialDidatico->consultarCodigoEventos_material($idEventos);

    $linha = mysqli_fetch_array($resultadoConsulta);

    $idMaterial = $linha['ID_MATERIAL'];
   
    


//apaga o arquivo da pasta
    unlink("../../arquivos/$idEventos/$nome");

    $resultado = $materialDidatico->excluirEventos_material($id);
    $resultado1 = $materialDidatico->excluir($idMaterial);

    ?>
    <!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="utf-8">
        </head>

        <body>
            <?php
            if ($resultado == true ) {
                echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=20&id=$idEventos'>
					<script type=\"text/javascript\">
					alert(\"Material apagado com Sucesso.\");
				</script>
			";
            } else {
                echo "
			
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=20&id=$idEventos'>
				<script type=\"text/javascript\">
					alert(\"Material não foi apagado com Sucesso.\");
				</script>
			";
            }
            ?>
        </body>
    </html>