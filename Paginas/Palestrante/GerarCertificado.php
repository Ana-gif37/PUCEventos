
   <?php

   $idParticipante = $_GET['idPalestrante'];
   $idEvento = $_GET['idEvento'];
   include '../../Classes/ConexaoBD/Conexao.class.php';
   include '../../Classes/Evento.class.php';


   $evento = new Evento();




//LISTA OS PARTICIPANTES
   $resultado = $evento->consultarCodigoEncerradoEmissaoCertificadoPalestrante($idParticipante, $idEvento);
   for ($i = 0; $i < mysqli_num_rows($resultado); $i++) {
       $linha = mysqli_fetch_array($resultado);
       echo "<tr>";


       $nomeEvento = $linha['NOMEEVENTO'];
       $dataInicio = date('d/m/y', strtotime($linha['DATAINICIOEVENTO']));
       $dataFim = date('d/m/y', strtotime($linha['DATAFIMEVENTO']));
       $cargaHoraria = $linha['CARGAHORARIA'];
       $nomeParticipante = $linha['NOMEPARTICIPANTE'];
       $autenticacao = $linha['CODIGODEAUTENTICACAO'];
   }

   $linhaDadosCerficado = 'Ministrou como palestrante o evento: ' . $nomeEvento . ' no período de ' . $dataInicio . ' à ' . $dataFim . ' com carga horária de ' . $cargaHoraria . ' horas.';
   $linhaAutenticacao = 'Código de autenticação de veracidade do certificado: ' . $autenticacao . ' ';

//referenciar o DomPDF com namespace
   use Dompdf\Dompdf;

// include autoloader
   require_once("../../dompdf/autoload.inc.php");

//Criando a Instancia
   $dompdf = new DOMPDF();

   $dompdf->set_paper("legal", "landscape");

// Carrega seu HTML
   $dompdf->load_html('

        <body background="../../imagens/BordaCertificado.png"> 
        <img class="img-circle" src="../../imagens/logo2.png" alt="Generic placeholder image" width="70" height="70">



        <h1 style="text-align: center;">Pontificia Universidade Católica de Minas Gerais</h1>
        <br>
        <h2 style="text-align: center; ">Declaração</h1>
        <br><br>
        <p>O colegiado da Pontificia Universidade Católica de Minas Gerais do núcleo universitário de Contagem certifica que:</p>
        <br><h2 style="text-align: center;">' . $nomeParticipante . '</h2><br>
        <p> ' . $linhaDadosCerficado . '</p>
        <br><p> ' . $linhaAutenticacao . '</p>
        '
   );

//Renderizar o html
   $dompdf->render();

//Exibir a página
   $dompdf->stream(
           "relatorio.pdf", array(
       "Attachment" => false //Para realizar o download somente alterar para true
           )
   );
   ?>