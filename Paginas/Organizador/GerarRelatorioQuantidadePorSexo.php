<?php

$idEvento = $_GET['id'];
include '../../Classes/ConexaoBD/Conexao.class.php';
include '../../Classes/Evento.class.php';
include '../../Classes/Pessoa.class.php';
include '../../Classes/Participante.class.php';


$evento = new Evento();
$participante = new Participante();

$resultadoQuantidadeMasculino = $participante->consultarNumeroParticipantesPorSexo($idEvento,'m');
$linhaQuantidadeMasculino= mysqli_fetch_array($resultadoQuantidadeMasculino);
$quantidadeMasculino = $linhaQuantidadeMasculino['quantidade'];


if($quantidadeMasculino==NULL){
    $qSexoMasculino=" "." Não há participantes deste sexo inscrito";
}else{
    $qSexoMasculino=$quantidadeMasculino;
}

$resultadoQuantidadeFeminino = $participante->consultarNumeroParticipantesPorSexo($idEvento,'f');
$linhaQuantidadeFeminino= mysqli_fetch_array($resultadoQuantidadeFeminino);
$quantidadeFeminino = $linhaQuantidadeFeminino['quantidade'];


if($quantidadeFeminino==NULL){
    $qSexoFeminino=" "." Não há participantes deste sexo inscrito";
}else{
    $qSexoFeminino=$quantidadeFeminino;
}

$porcentagemMasculino=number_format(($quantidadeMasculino/($quantidadeMasculino+$quantidadeFeminino)*100),2);
$porcentagemFeminino=number_format(($quantidadeFeminino/($quantidadeMasculino+$quantidadeFeminino)*100),2);





	
	$html1 = '<table';	
	$html1 .= '<thead>';
	$html1 .= '<tr>';
	$html1 .= '<th>Nome do Participante</th>';
        $html1 .= '<th> </th>';
        $html1 .= '<th> </th>';
        $html1 .= '<th> </th>';
	$html1 .= '<th>Idade</th>';
        $html1 .= '<th> </th>';
        $html1 .= '<th> </th>';
        $html1 .= '<th> </th>';
	$html1 .= '<th>Sexo</th>';
	$html1 .= '</tr>';
	$html1 .= '</thead>';
	$html1 .= '<tbody>';



//LISTA OS PARTICIPANTES
   $resultado = $participante->VerificaUsuariosInscritosEventos($idEvento);
   for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
       $linha = mysqli_fetch_array($resultado);
      


       $html1 .= '<tr><td>'.$nomeParticipante = $linha['NOMEPESSOA'] . "</td>";
       $html1 .= '<th> </th>';
       $html1 .= '<th> </th>';
       $html1 .= '<th> </th>';
       $html1 .= '<td>'.$idade =$linha['IDADE'] . "</td>";
       $html1 .= '<th> </th>';
       $html1 .= '<th> </th>';
       $html1 .= '<th> </th>';
       $sexo = $linha['SEXO'] ;
       if($sexo=='m'){
           $html1 .= '<td>'."masc.". "</td></tr>";
       }else{
           $html1 .= '<td>'."fem.". "</td></tr>";
       }
   
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
            <h3 style="text-align: center;">PUCEventos - Sistema de Gestão de Eventos </h3>
			<center><h3>Relatório de Participantes dos Eventos por Sexo</h3></center>
			<p><b>Quantidade do sexo masculino:  </b>' . $qSexoMasculino . ' </p>
                            <p><b>Porcentagem de participantes do sexo masculino:  </b>' . $porcentagemMasculino . '%'.' </p>
                            <p><b>Quantidade do sexo feminino:  </b>' . $quantidadeFeminino . ' </p>
                                 <p><b>Porcentagem de participantes do sexo feminino:  </b>' . $porcentagemFeminino . '%'.' </p>
                               
                           ___________________________________________________________________________________________
                           <br><b>Inscritos nos Eventos</b>
                           ___________________________________________________________________________________________
                         <br><br>
                          '. $html1 .'

			
');

//Renderizar o html
$dompdf->render();

//Exibibir a página
$dompdf->stream(
        "relatorio_celke.pdf", array(
    "Attachment" => false //Para realizar o download somente alterar para true
        )
);
?>