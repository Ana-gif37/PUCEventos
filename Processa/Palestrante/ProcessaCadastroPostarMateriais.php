
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
    </head>


    <!--intancia as classes e recebe os valores no objeto-->    
    <?php
    include '../../Classes/ConexaoBD/Conexao.class.php';
    include '../../classes/MaterialDidatico.class.php';


    $materialDidatico = new MaterialDidatico();




    $id = $_POST['id'];
    $arquivo = $materialDidatico->tratar_arquivo_upload( $_FILES['arquivo']['name']);
  

    
    $ultimoMaterialPostado = $materialDidatico->exibirUltimoMaterialCadastrados();

    $linha = mysqli_fetch_array($ultimoMaterialPostado);

    $ultimo = $linha['id'];

    $materialDidatico->setNome($arquivo);

    $materialDidatico->setId_evento($id);
    $materialDidatico->setId_material($ultimo + 1);


//Pasta onde o arquivo vai ser salvo


    $_UP['pasta'] = '../../arquivos/' . $id . '/';

//Tamanho máximo do arquivo em Bytes
    $_UP['tamanho'] = 1024 * 1024 * 100; //5mb
//Array com as extensoes permitidas
    $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif', 'pdf', 'docx', 'doc', 'xls', 'xlsx', 'ppt', 'pptx', 'txt', 'zip', 'rar');







//Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
    if ($_FILES['arquivo']['error'] != 0) {
        
    }

//Faz a verificação da extensao do arquivo
    $extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
    if (array_search($extensao, $_UP['extensoes']) === false) {

        //Upload não efetuado com sucesso, exibe a mensagem
        echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>
			<script type=\"text/javascript\">
				alert(\"Arquivo fora da extensão aceita.Coloque nas seguintes extensoes 'png', 'jpg', 'jpeg', 'gif', 'pdf','docx','doc','xls','xlsx','ppt','pptx','txt','zip','rar' \");
			</script>
		";
    }

//Faz a verificação do tamanho do arquivo
    else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {

        echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>
			<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do evento foi cadastrado.\");
		</script>
        ";
    }


//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
    else {

        //verifica se a pasta arquivos existe e cria uma com o id dentro
        if (is_dir('../../arquivos')) {
            //cria o primeiro diretório
            mkdir('../../arquivos');
            if (is_dir('../../arquivos/' . $id)) {
                //não faz nada
             
            } else {
                mkdir('../../arquivos/' . $id);
           
            }
        } else {
            //cria o primeiro diretório
            mkdir('../../arquivos');
            if (is_dir('../../arquivos/' . $id)) {
                //não faz nada
    
            } else {
                mkdir('../../arquivos/' . $id);
    
            }
        }
        $nome_final = $materialDidatico->tratar_arquivo_upload( $_FILES['arquivo']['name']);

        //Verificar se é possivel mover o arquivo para a pasta escolhida


        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
            //Upload efetuado com sucesso, exibe a mensagem
            $resultado = $materialDidatico->inserir($materialDidatico);
            $resultado1 = $materialDidatico->inserirEventos_material($materialDidatico);
            if ($resultado == true and $resultado1==true) {
                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>
			<script type=\"text/javascript\">
				alert(\"Material enviado com Sucesso.\");
			</script>
		";
            } else {
                //Upload não efetuado com sucesso, exibe a mensagem
                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>
			<script type=\"text/javascript\">
				alert(\"Material não foi enviado com Sucesso.\");
			</script>
		";
            }
        } else {
            //Upload não efetuado com sucesso, exibe a mensagem
            echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=5'>
			<script type=\"text/javascript\">
				alert(\"Material não foi enviado com Sucesso.Pode ter ocorrido uma falha em nossos servidores tente novamente!\");
			</script>
		";
        }
    }
    ?>
</body>
</html>