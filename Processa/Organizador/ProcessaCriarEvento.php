
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
    $tempo = time();

    include '../../Classes/ConexaoBD/Conexao.class.php';
    include '../../Classes/Evento.class.php';


    $evento = new evento();



    $nome = $_POST['nome'];
    $dataInicioInscricao = $_POST['dataInicioInscricao'];
    $dii = explode("/", $dataInicioInscricao);
    $dataInicioInscricao = $dii[2] . "-" . $dii[1] . "-" . $dii[0];
    $dataFimInscricao = $_POST['dataFimInscricao'];
    $dfi = explode("/", $dataFimInscricao);
    $dataFimInscricao = $dfi[2] . "-" . $dfi[1] . "-" . $dfi[0];
    $id_organizador = $_POST['idOrganizador'];
    $dataInicioEvento = $_POST['dataInicioEvento'];
    $die = explode("/", $dataInicioEvento);
    $dataInicioEvento = $die[2] . "-" . $die[1] . "-" . $die[0];
    $dataFimEvento = $_POST['dataFimEvento'];
    $horaInicio = $_POST['horaInicio'];
    $horaFinal = $_POST['horaFinal'];
    $dfe = explode("/", $dataFimEvento);
    $dataFimEvento = $dfe[2] . "-" . $dfe[1] . "-" . $dfe[0];
    $quantidadeVagas = $_POST['quantidadeVagas'];
    $descricao = $_POST['descricao'];
    $id_unidade = $_POST['id_unidade'];
    $imagem = $evento->tratar_arquivo_upload($_FILES['arquivo']['name']);
    $arquivo = $tempo . $imagem;
    $cargaHoraria = $_POST['cargaHoraria'];

    //palestrantes
    $palestrante1 = $_POST['id_palestrante1'];
    $palestrante2 = $_POST['id_palestrante2'];
    $palestrante3 = $_POST['id_palestrante3'];
    $palestrante4 = $_POST['id_palestrante4'];
    $palestrante5 = $_POST['id_palestrante5'];
    $palestrante6 = $_POST['id_palestrante6'];
    $palestrante7 = $_POST['id_palestrante7'];
    $palestrante8 = $_POST['id_palestrante8'];
    $palestrante9 = $_POST['id_palestrante9'];
    
    

    $ultimoCurso = $evento->UltimoEventoInserido();

    $linha = mysqli_fetch_array($ultimoCurso);

    $ultimo = $linha['ID'];
    $ultimoEvento = $ultimo + 1;


    $evento->setNome($nome);
    $evento->setDataInicioInscricao($dataInicioInscricao);
    $evento->setDataFimInscricao($dataFimInscricao);
    $evento->setId_organizador($id_organizador);
    $evento->setDataInicioEvento($dataInicioEvento);
    $evento->setDataFimEvento($dataFimEvento);
    $evento->setQuantidadeVagas($quantidadeVagas);
    $evento->setCargaHoraria($cargaHoraria);
    $evento->setId_unidade($id_unidade);
    $evento->setHoraInicio($horaInicio);
    $evento->setHoraFinal($horaFinal);

    if (isset($_POST['gravar'])) {
        $evento->setGratuitoOuPago(1);
        $tipoevento = 1;
    }
    if (isset($_POST['gravarPago'])) {
        $evento->setGratuitoOuPago(2);
        $tipoevento = 2;
    }

//função para comparar se hora é maior
    $hInicio = strtotime($horaInicio);
    $hFinal = strtotime($horaFinal);



    //parte do codigo pra valida se uma data e maior que a outra
    $dInicioInscricao = strtotime($evento->formata_data($dataInicioInscricao));
    $dFimInscricao = strtotime($evento->formata_data($dataFimInscricao));
    $dInicioEvento = strtotime($evento->formata_data($dataInicioEvento));
    $dFimEvento = strtotime($evento->formata_data($dataFimEvento));

    if ($dInicioEvento <= $dFimEvento and $dInicioInscricao <= $dFimInscricao and $hInicio < $hFinal and $dataFimInscricao < $dataInicioEvento) {

        //verifica se o campo matricula ta diferente de null e passa valor para ele caso contrario seta nulo
        if (!empty($_POST['descricao'])) {
            $evento->setDescricao($descricao);
        } else {
            $evento->setDescricao(NULL);
        }


        if (!empty($_FILES['arquivo']['name'])) {
            $evento->setImagem($arquivo);
        } else {
            $evento->setImagem(NULL);
        }


        //palestrantes
//Pasta onde o arquivo vai ser salvo
        $_UP['pasta'] = '../../imagens/ImagensEventos/';

//Tamanho máximo do arquivo em Bytes
        $_UP['tamanho'] = 1024 * 1024 * 100; //5mb
//Array com as extensoes permitidas
        $_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');


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
            $resultado = $evento->inserirEventos($evento);

            //Grava dados do checkbox

            if (!empty($_POST['curso'])) {
                if (isset($_POST['gravar']) or isset($_POST['gravarPago'])) {

                    $curso = $_POST['curso'];
                    $numCheckBox = count($curso);

                    for ($i = 0; $i < $numCheckBox; $i++) {

                        $evento->inserirEventoCurso($curso[$i], $ultimoEvento);
                    }
                }
            }
            //insere um palestrante no evento
            $evento->inserirEventoPalestrante($palestrante1, $ultimoEvento,$evento->geraAutenticacaoEvento());
            //verifica se algum dos palestrantes opcionais estao preenchidos

            if (!empty($_POST['id_palestrante2'])) {
                $evento->inserirEventoPalestrante($palestrante2, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante3'])) {
                $evento->inserirEventoPalestrante($palestrante3, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante4'])) {
                $evento->inserirEventoPalestrante($palestrante4, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }
            if (!empty($_POST['id_palestrante5'])) {
                $evento->inserirEventoPalestrante($palestrante5, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante6'])) {
                $evento->inserirEventoPalestrante($palestrante6, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante7'])) {
                $evento->inserirEventoPalestrante($palestrante7, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante8'])) {
                $evento->inserirEventoPalestrante($palestrante8, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante9'])) {
                $evento->inserirEventoPalestrante($palestrante9, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if ($resultado == true) {
                if ($tipoevento == 1) {
                    echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
			alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do evento foi cadastrado.\");
		</script>
";
                }if ($tipoevento == 2) {
                    echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=31&id=$ultimoEvento'>
			<script type=\"text/javascript\">
			alert(\"A imagem não foi cadastrada for favor, envie arquivos com as seguintes extensões: png, jpg, jpeg e gif. As informações do evento foi cadastrado.\");
		</script>
";
                }
            } else {
                //Upload não efetuado com sucesso, exibe a mensagem
                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso.\");
			</script>
		";
            }
        }

//Faz a verificação do tamanho do arquivo
        else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
            echo "";
            $resultado = $evento->inserirEventos($evento);


            //Grava dados do checkbox

            if (!empty($_POST['curso'])) {
                if (isset($_POST['gravar'])or isset($_POST['gravarPago'])) {

                    $curso = $_POST['curso'];
                    $numCheckBox = count($curso);

                    for ($i = 0; $i < $numCheckBox; $i++) {

                        $evento->inserirEventoCurso($curso[$i], $ultimoEvento);
                    }
                }
            }
            //insere um palestrante no evento
            $evento->inserirEventoPalestrante($palestrante1, $ultimoEvento,$evento->geraAutenticacaoEvento());

            //verifica se algum dos palestrantes opcionais estao preenchidos

            if (!empty($_POST['id_palestrante2'])) {
                $evento->inserirEventoPalestrante($palestrante2, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante3'])) {
                $evento->inserirEventoPalestrante($palestrante3, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante4'])) {
                $evento->inserirEventoPalestrante($palestrante4, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }
            if (!empty($_POST['id_palestrante5'])) {
                $evento->inserirEventoPalestrante($palestrante5, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante6'])) {
                $evento->inserirEventoPalestrante($palestrante6, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante7'])) {
                $evento->inserirEventoPalestrante($palestrante7, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante8'])) {
                $evento->inserirEventoPalestrante($palestrante8, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }

            if (!empty($_POST['id_palestrante9'])) {
                $evento->inserirEventoPalestrante($palestrante9, ($ultimoEvento),$evento->geraAutenticacaoEvento());
            }




            if ($resultado == true) {

                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso.\");
			</script>
		";

                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=31'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso.\");
			</script>
		";
            } else {
                if ($tipoevento == 1) {
                    echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do evento foi cadastrado.\");
		</script>
                ";
                } elseif ($tipoevento == 2) {
                    echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=31&&id=$ultimoEvento'>
			<script type=\"text/javascript\">
			alert(\"O arquivo enviado é muito grande, envie arquivos de até 2mb. As informações do evento foi cadastrado.\");
		</script>
                ";
                }
            }
        }

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
        else {
            //Primeiro verifica se deve trocar o nome do arquivo
            //mantem o nome original do arquivo
            $nome_final = $tempo . $evento->tratar_arquivo_upload($_FILES['arquivo']['name']);

            //Verificar se é possivel mover o arquivo para a pasta escolhida
            //verifica se a pasta arquivos existe e cria uma com o id dentro


            if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
                //Upload efetuado com sucesso, exibe a mensagem
                $resultado = $evento->inserirEventos($evento);

                //Grava dados do checkbox

                if (!empty($_POST['curso'])) {
                    if (isset($_POST['gravar'])or isset($_POST['gravarPago'])) {

                        $curso = $_POST['curso'];
                        $numCheckBox = count($curso);

                        for ($i = 0; $i < $numCheckBox; $i++) {

                            $evento->inserirEventoCurso($curso[$i], $ultimoEvento);
                        }
                    }
                }
                //insere um palestrante no evento
                $evento->inserirEventoPalestrante($palestrante1, $ultimoEvento,$evento->geraAutenticacaoEvento());

                //verifica se algum dos palestrantes opcionais estao preenchidos

                if (!empty($_POST['id_palestrante2'])) {
                    $evento->inserirEventoPalestrante($palestrante2, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante3'])) {
                    $evento->inserirEventoPalestrante($palestrante3, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante4'])) {
                    $evento->inserirEventoPalestrante($palestrante4, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }
                if (!empty($_POST['id_palestrante5'])) {
                    $evento->inserirEventoPalestrante($palestrante5, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante6'])) {
                    $evento->inserirEventoPalestrante($palestrante6, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante7'])) {
                    $evento->inserirEventoPalestrante($palestrante7, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante8'])) {
                    $evento->inserirEventoPalestrante($palestrante8, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if (!empty($_POST['id_palestrante9'])) {
                    $evento->inserirEventoPalestrante($palestrante9, ($ultimoEvento),$evento->geraAutenticacaoEvento());
                }

                if ($resultado == true) {
                    if ($tipoevento == 1) {
                        echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento cadastrado com Sucesso.\");
			</script>
                     ";
                    } elseif ($tipoevento == 2) {
                        echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=31&&id=$ultimoEvento'>
			<script type=\"text/javascript\">
				alert(\"Evento cadastrado com Sucesso.\");
			</script>
                     ";
                    }
                } else {
                    //Upload não efetuado com sucesso, exibe a mensagem
                    echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso.\");
			</script>
		";
                }
            } else {
                //Upload não efetuado com sucesso, exibe a mensagem
                echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso.\");
			</script>
		";
            }
        }
    } else {
        //Upload não efetuado com sucesso, exibe a mensagem
        echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=2'>
			<script type=\"text/javascript\">
				alert(\"Evento não foi cadastrado com Sucesso a data ou hora de fim tem que ser posterior que a de inicio.Também observe se a data de inicio do evento é posterior a data de fim da inscrição.\");
			</script>
		";
    }
    ?>
</body>
</html>