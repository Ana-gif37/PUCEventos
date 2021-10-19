<?php

$idEvento = $_GET['id'];
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/ListaPresenca.class.php';
$presenca = new ListaPresenca();


$resultadoQ = $presenca->QuantidadeChamadas($idEvento);
$linhaQ = mysqli_fetch_array($resultadoQ);
$quantidadeChamadas = $linhaQ['TOTALCHAMADAS'];



$resultadoPresenca = $presenca->numeroDePresencaGeralPorEvento($idEvento);
$linha = mysqli_fetch_array($resultadoPresenca);
$nomeEvento = $linha['NOMEEVENTO'];
$nChamadas = $linha['TOTALCHAMADASPOREVENTO'];





$html1 = '<table';
$html1 .= '<thead>';
$html1 .= '<tr>';
$html1 .= '<th>Nome do Participante</th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th>N� de Presen�as</th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th>N� de Faltas</th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th> </th>';
$html1 .= '<th>Frequ�ncia</th>';
$html1 .= '</tr>';
$html1 .= '</thead>';
$html1 .= '<tbody>';


//LISTA OS PARTICIPANTES
//LISTA OS PARTICIPANTES
$resultado = $presenca->numeroDePresencaGeralPorEvento($idEvento);
for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
    $linha = mysqli_fetch_array($resultado);




    $html1 .= '<tr><td>' . $nomeParticipante = $linha['NOMEPARTICIPANTE'] . "</td>";
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<td>' . $numeroPresencas = $linha['NUMEROPRESENCAS'] . "</td>";
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<td>' . $totalFaltas = $linha['totalFaltas'] . "</td>";
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<th> </th>';
    $html1 .= '<td>' . $frequencia = ($numeroPresencas / $nChamadas) * 100 .'%'. "</td>";
}
$html1 .= '</tbody>';
$html1 .= '</table';

//referenciar o DomPDF com namespace
use Dompdf\Dompdf;

// include autoloader
require_once("../../dompdf/autoload.inc.php");

//Criando a Instancia
$dompdf = new DOMPDF();

// Carrega seu HTML
$dompdf->load_html('
     <center> <img class="img-circle" src="../../imagens/logo2.png" alt="Generic placeholder image" width="70" height="70"> </center> 
            <h3 style="text-align: center;">SGEV - Sistema de Gest�o de Eventos </h3>
			<center><h3>Relat�rio de Frequ�ncia dos Participantes dos Eventos</h3></center>
			<p><b>Nome do Evento:  </b>' . $nomeEvento . ' </p>
                          <p><b>Total de chamadas realizadas: </b>' . $nChamadas . ' </p>  
                           ___________________________________________________________________________________________
                           <br><b>Frequ�ncia dos inscritos nos Eventos</b>
                           ___________________________________________________________________________________________
                         <br><br>
                          ' . $html1 . '

			
');

//Renderizar o html
$dompdf->render();

//Exibibir a p�gina
$dompdf->stream(
        "relatorio_celke.pdf", array(
    "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>