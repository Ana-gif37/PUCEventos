
    <?php

    $idParticipante = $_GET['idParticipante'];
    $idEvento = $_GET['idEvento'];
    include '../../Classes/ConexaoBD/Conexao.class.php';
    include '../../Classes/Evento.class.php';

    $evento = new Evento();




//LISTA OS PARTICIPANTES
    $resultado = $evento->consultarCodigoAndamentoCracha($idParticipante, $idEvento);
    for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
        $linha = mysqli_fetch_array($resultado);
        echo "<tr>";


        $nomeEvento = $linha['NOMEEVENTO'];
        $nomeParticipante = $linha['NOMEPARTICIPANTE'];
        $matricula = $linha['MATRICULA'];
        $curso = $linha['CURSO'];
        $unidade = $linha['UNIDADE'];
    }

    $linhaParticipante = 'Nome: ' . $nomeParticipante . ' ';
    $linhaMatricula = 'Matricula: ' . $matricula . ' ';
    $linhaCurso = 'Curso: ' . $curso . ' ';
    $linhaUnidade = 'Unidade: ' . $unidade . ' ';

    //referenciar o DomPDF com namespace
    use Dompdf\Dompdf;

// include autoloader
    require_once("../../dompdf/autoload.inc.php");

    //Criando a Instancia
    $dompdf = new DOMPDF();


    // Carrega seu HTML
    $dompdf->load_html(' 
            
                        <body background="../../imagens/modeloCracha.png"  style="background-repeat: no-repeat"> 
                                
			
			<br><p>' . $nomeEvento . '<</p>
                        <br><br><br><p>' . $linhaParticipante . '</p>
                        <p>' . $linhaMatricula . '</p>
                        <p>' . $linhaCurso . '</p>
                        <p>' . $linhaUnidade . '</p>
                        

			');

    //Renderizar o html
    $dompdf->render();

    //Exibir a página
    $dompdf->stream(
            "relatorio.pdf", array(
        "Attachment" => false //Para realizar o download somente alterar para true
            )
    );
    ?>