<?php

class Evento {

    private $id_evento;
    private $nome;
    private $dataInicioInscricao;
    private $dataFimInscricao;
    private $dataInicioEvento;
    private $dataFimEvento;
    private $horaInicio;
    private $horaFinal;
    private $quantidadeVagas;
    private $descricao;
    private $id_organizador;
    private $gratuitoOuPago;
    private $valorPagamento;
    private $dataVencimento;
    private $id_unidade;
    private $imagem;
    private $cargaHoraria;
    private $id_situacaogratuitooupago;
    private $autenticacao;
    private $idParticipante;
    private $dataDocumento;
    private $prazoPaganmento;
    private $nossoNumero;
    private $numeroDocumento;
    private $valorCobrado;
    private $demonstrativo1;
    private $demonstrativo2;
    private $demonstrativo3;
    private $instrucoes1;
    private $instrucoes2;
    private $instrucoes3;
    private $codigoCliente;
    private $agencia;
    private $carteira;
    private $carteiraDescricao;
    private $nomeCedente;
    private $cpfCnpj;
    private $enderecoEmpresa;
    private $cidade;
    private $uf;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getHoraInicio() {
        return $this->horaInicio;
    }

    function getHoraFinal() {
        return $this->horaFinal;
    }

    function setHoraInicio($horaInicio) {
        $this->horaInicio = $horaInicio;
    }

    function setHoraFinal($horaFinal) {
        $this->horaFinal = $horaFinal;
    }

    function getAutenticacao() {
        return $this->autenticacao;
    }

    function setAutenticacao($autenticacao) {
        $this->autenticacao = $autenticacao;
    }

    function getId_situacaogratuitooupago() {
        return $this->id_situacaogratuitooupago;
    }

    function setId_situacaogratuitooupago($id_situacaogratuitooupago) {
        $this->id_situacaogratuitooupago = $id_situacaogratuitooupago;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    function getIdParticipante() {
        return $this->idParticipante;
    }

    function setIdParticipante($idParticipante) {
        $this->idParticipante = $idParticipante;
    }

    function getCargaHoraria() {
        return $this->cargaHoraria;
    }

    function setCargaHoraria($cargaHoraria) {
        $this->cargaHoraria = $cargaHoraria;
    }

    function getImagem() {
        return $this->imagem;
    }

    function setImagem($imagem) {
        $this->imagem = $imagem;
    }

    function getId_unidade() {
        return $this->id_unidade;
    }

    function setId_unidade($id_unidade) {
        $this->id_unidade = $id_unidade;
    }

    function getId_organizador() {
        return $this->id_organizador;
    }

    function setId_organizador($id_organizador) {
        $this->id_organizador = $id_organizador;
    }

    function getNome() {
        return $this->nome;
    }

    function getDataInicioInscricao() {
        return $this->dataInicioInscricao;
    }

    function getDataFimInscricao() {
        return $this->dataFimInscricao;
    }

    function getDataInicioEvento() {
        return $this->dataInicioEvento;
    }

    function getDataFimEvento() {
        return $this->dataFimEvento;
    }

    function getQuantidadeVagas() {
        return $this->quantidadeVagas;
    }

    function getDescricao() {
        return $this->descricao;
    }

    function getGratuitoOuPago() {
        return $this->gratuitoOuPago;
    }

    function getValorPagamento() {
        return $this->valorPagamento;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setDataInicioInscricao($dataInicioInscricao) {
        $this->dataInicioInscricao = $dataInicioInscricao;
    }

    function setDataFimInscricao($dataFimInscricao) {
        $this->dataFimInscricao = $dataFimInscricao;
    }

    function setDataInicioEvento($dataInicioEvento) {
        $this->dataInicioEvento = $dataInicioEvento;
    }

    function setDataFimEvento($dataFimEvento) {
        $this->dataFimEvento = $dataFimEvento;
    }

    function setQuantidadeVagas($quantidadeVagas) {
        $this->quantidadeVagas = $quantidadeVagas;
    }

    function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    function setGratuitoOuPago($gratuitoOuPago) {
        $this->gratuitoOuPago = $gratuitoOuPago;
    }

    function setValorPagamento($valorPagamento) {
        $this->valorPagamento = $valorPagamento;
    }

    function setDataVencimento($dataVencimento) {
        $this->dataVencimento = $dataVencimento;
    }

    function getDataVencimento() {
        return $this->dataVencimento;
    }

    function getDataDocumento() {
        return $this->dataDocumento;
    }

    function getPrazoPaganmento() {
        return $this->prazoPaganmento;
    }

    function getNossoNumero() {
        return $this->nossoNumero;
    }

    function getNumeroDocumento() {
        return $this->numeroDocumento;
    }

    function getValorCobrado() {
        return $this->valorCobrado;
    }

    function getDemonstrativo1() {
        return $this->demonstrativo1;
    }

    function getDemonstrativo2() {
        return $this->demonstrativo2;
    }

    function getDemonstrativo3() {
        return $this->demonstrativo3;
    }

    function getInstrucoes1() {
        return $this->instrucoes1;
    }

    function getInstrucoes2() {
        return $this->instrucoes2;
    }

    function getInstrucoes3() {
        return $this->instrucoes3;
    }

    function getCodigoCliente() {
        return $this->codigoCliente;
    }

    function getAgencia() {
        return $this->agencia;
    }

    function getCarteira() {
        return $this->carteira;
    }

    function getCarteiraDescricao() {
        return $this->carteiraDescricao;
    }

    function getNomeCedente() {
        return $this->nomeCedente;
    }

    function getCpfCnpj() {
        return $this->cpfCnpj;
    }

    function getEnderecoEmpresa() {
        return $this->enderecoEmpresa;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getUf() {
        return $this->uf;
    }

    function setDataDocumento($dataDocumento) {
        $this->dataDocumento = $dataDocumento;
    }

    function setPrazoPaganmento($prazoPaganmento) {
        $this->prazoPaganmento = $prazoPaganmento;
    }

    function setNossoNumero($nossoNumero) {
        $this->nossoNumero = $nossoNumero;
    }

    function setNumeroDocumento($numeroDocumento) {
        $this->numeroDocumento = $numeroDocumento;
    }

    function setValorCobrado($valorCobrado) {
        $this->valorCobrado = $valorCobrado;
    }

    function setDemonstrativo1($demonstrativo1) {
        $this->demonstrativo1 = $demonstrativo1;
    }

    function setDemonstrativo2($demonstrativo2) {
        $this->demonstrativo2 = $demonstrativo2;
    }

    function setDemonstrativo3($demonstrativo3) {
        $this->demonstrativo3 = $demonstrativo3;
    }

    function setInstrucoes1($instrucoes1) {
        $this->instrucoes1 = $instrucoes1;
    }

    function setInstrucoes2($instrucoes2) {
        $this->instrucoes2 = $instrucoes2;
    }

    function setInstrucoes3($instrucoes3) {
        $this->instrucoes3 = $instrucoes3;
    }

    function setCodigoCliente($codigoCliente) {
        $this->codigoCliente = $codigoCliente;
    }

    function setAgencia($agencia) {
        $this->agencia = $agencia;
    }

    function setCarteira($carteira) {
        $this->carteira = $carteira;
    }

    function setCarteiraDescricao($carteiraDescricao) {
        $this->carteiraDescricao = $carteiraDescricao;
    }

    function setNomeCedente($nomeCedente) {
        $this->nomeCedente = $nomeCedente;
    }

    function setCpfCnpj($cpfCnpj) {
        $this->cpfCnpj = $cpfCnpj;
    }

    function setEnderecoEmpresa($enderecoEmpresa) {
        $this->enderecoEmpresa = $enderecoEmpresa;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setUf($uf) {
        $this->uf = $uf;
    }

    function geraAutenticacaoEvento() {
        $tamanho = 15;
        $maiusculas = true;
        $numeros = true;
        $simbolos = true;
// Caracteres de cada tipo
        $lmin = 'abcdefghijklmnopqrstuvwxyz';
        $lmai = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $num = '1234567890';
        $simb = '!@#$%*-';
// Variáveis internas
        $retorno = '';
        $caracteres = '';
// Agrupamos todos os caracteres que poderão ser utilizados
        $caracteres .= $lmin;
        if ($maiusculas)
            $caracteres .= $lmai;
        if ($numeros)
            $caracteres .= $num;
        if ($simbolos)
            $caracteres .= $simb;
// Calculamos o total de caracteres possíveis
        $len = strlen($caracteres);
        for ($n = 1; $n <= $tamanho; $n++) {
// Criamos um número aleatório de 1 até $len para pegar um dos caracteres
            $rand = mt_rand(1, $len);
// Concatenamos um dos caracteres na variável $retorno
            $retorno .= $caracteres[$rand - 1];
        }
        return $retorno;
    }

    function tratar_arquivo_upload($string) {
        // pegando a extensao do arquivo
        $partes = explode(".", $string);
        $extensao = $partes[count($partes) - 1];
        // somente o nome do arquivo
        $nome = preg_replace('/\.[^.]*$/', '', $string);
        // removendo simbolos, acentos etc
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
        $nome = strtr($nome, utf8_decode($a), $b);
        $nome = str_replace(".", "-", $nome);
        $nome = preg_replace("/[^0-9a-zA-Z\.]+/", '-', $nome);
        return utf8_decode(strtolower($nome . "." . $extensao));
    }

    public function inserirEventos($evento) {
        $sql = "INSERT INTO eventos (NOME,DATAINICIOINSCRICAO,DATAFIMINSCRICAO,ID_ORGANIZADOR,DATAINICIOEVENTO,DATAFIMEVENTO,QUANTIDADEVAGAS,DESCRICAO,GRATUITOOUPAGO,IMAGEM,ID_UNIDADE,CARGAHORARIA,HORAINICIOEVENTO,HORAFIMEVENTO) "
                . "VALUES('" . $evento->getNome() . "','" . $evento->getDataInicioInscricao() . "','" . $evento->getDataFimInscricao() . "','" . $evento->getId_organizador() . "',"
                . "'" . $evento->getDataInicioEvento() . "','" . $evento->getDataFimEvento() . "','" . $evento->getQuantidadeVagas() . "'"
                . ",'" . $evento->getDescricao() . "','" . $evento->getGratuitoOuPago() . "','" . $evento->getImagem() . "'," . $evento->getId_unidade() . ",'" . $evento->getCargaHoraria() . "','" . $evento->getHoraInicio() . "','" . $evento->getHoraFinal() . "')";


        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE eventos SET EVENTOAPROVADOPELOADMINISTRADOR= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function destacar($ativar, $id) {
        $sql = "UPDATE eventos SET DESTACAREVENTO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarEventosInscricaoAberta($evento) {
        $sql = "SELECT * FROM eventos where (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO))  AND NOME LIKE'%$evento%'  ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCursosDoParticipante($curso) {
        $sql = "SELECT * FROM evento_curso where ID_CURSO=$curso";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosInscricaoAbertaGratuitoOuPago($id) {
        $sql = "SELECT count(ID) AS QUANTIDADE_EVENTOS FROM eventos where (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO)) AND GRATUITOOUPAGO=$id AND EVENTOAPROVADOPELOADMINISTRADOR=1 ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosInscricaoAbertaEmDestaque() {
        $sql = "SELECT count(ID) AS QUANTIDADE_EVENTOS FROM eventos where (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO)) AND DESTACAREVENTO=1  and EVENTOAPROVADOPELOADMINISTRADOR=1  ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosInscricaoAberta() {
        $sql = "SELECT count(ID) AS QUANTIDADE_EVENTOS FROM eventos where (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO))   ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosEmAndamento() {
        $sql = "SELECT count(ID) AS QUANTIDADE_EVENTOS  FROM eventos where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO)) ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosEncerrados() {
        $sql = "SELECT count(ID) AS QUANTIDADE_EVENTOS  FROM eventos where now() >= DATAFIMEVENTO  ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarDadosEventosPagos($id_evento) {
        $sql = "SELECT * FROM eventos_pagamento where ID_EVENTO=$id_evento";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

//    public function consultarEventosGratuitosInscricaoAberta($evento) {
//        $sql = "SELECT * FROM eventos where (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO)) AND GRATUITOOUPAGO=1 AND NOME LIKE'%$evento%'  ORDER BY nome";
//        $resultado = mysqli_query($this->conexao->getCon(), $sql);
//        if (mysqli_num_rows($resultado) > 0) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }
    public function consultarEventosEmAndamento($evento) {

        $sql = " SELECT * FROM eventos where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO)) AND NOME LIKE'%$evento%' ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }


    public function consultarEventosEncerrados($evento) {

        $sql = " SELECT * FROM eventos where now() >= DATAFIMEVENTO AND NOME LIKE'%$evento%' ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }


    public function alterarEventosInscricaoAberta($id, $nome, $dataInicioInscricao, $dataFimInscricao, $dataInicioEvento, $dataFimEvento, $quantidadeVagas, $descricao, $organizador, $gratuitoOuPago, $unidade, $imagem, $horaInicioEvento, $horaFimEvento, $cargahoraria) {
        $sql = "update eventos set NOME='$nome',DATAINICIOINSCRICAO='$dataInicioInscricao',DATAFIMINSCRICAO='$dataFimInscricao',DATAINICIOEVENTO='$dataInicioEvento',DATAFIMEVENTO='$dataFimEvento',QUANTIDADEVAGAS=$quantidadeVagas,DESCRICAO='$descricao', ID_ORGANIZADOR=$organizador,GRATUITOOUPAGO=$gratuitoOuPago,ID_UNIDADE=$unidade,IMAGEM='$imagem',HORAINICIOEVENTO='$horaInicioEvento',HORAFIMEVENTO='$horaFimEvento',CARGAHORARIA=$cargahoraria"
                . " where id=$id";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function alterarEventosPagos($id_Evento, $dataVencimento, $dataDocumento, $prazoPagamento, $nossoNumero, $numeroDocumento, $valorCobrado, $demonstrativo1, $demonstrativo2, $demonstrativo3, $instrucoes1, $instrucoes2, $instrucoes3, $codigoCliente, $agencia, $carteira, $carteiraDescricao, $cpfOuCnpj, $nomeCedente, $enderecoEmpresa, $cidade, $uf) {

        $sql = "update eventos_pagamento set DIASPRAZO='$prazoPagamento',DATAVENCIMENTO='$dataVencimento',VALORCOBRADO='$valorCobrado',DATADOCUMENTO='$dataDocumento',NOSSO_NUMERO='$nossoNumero',NUMERO_DOCUMENTO='$numeroDocumento', DEMONSTRATIVO1='$demonstrativo1',DEMONSTRATIVO2='$demonstrativo2',DEMONSTRATIVO3='$demonstrativo3',INSTRUCOES1='$instrucoes1',INSTRUCOES2='$instrucoes2',INSTRUCOES3='$instrucoes3',PSK='$codigoCliente' ,AGENCIA='$agencia',CARTEIRA='$carteira',CARTEIRA_DESCRICAO='$carteiraDescricao',NOMECEDENTE='$nomeCedente',CNPJEMPRESA='$cpfOuCnpj',ENDERECOEMPRESA='$enderecoEmpresa',CIDADE='$cidade',UF='$uf' where ID_EVENTO=$id_Evento";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

//
//    public function alterarEventosGratuitosInscricaoAberta($id, $nome, $dataInicioInscricao, $dataFimInscricao, $dataInicioEvento, $dataFimEvento, $quantidadeVagas, $descricao, $unidade) {
//
//        $sql = "UPDATE eventos SET NOME= '$nome',DATAINICIOINSCRICAO='$dataInicioInscricao',DATAFIMINSCRICAO='$dataFimInscricao',DATAINICIOEVENTO='$dataInicioEvento',DATAFIMEVENTO='$dataFimEvento',QUANTIDADEVAGAS='$quantidadeVagas',DESCRICAO='$descricao',ID_UNIDADE='$unidade' WHERE id = '$id'";
//        if (mysqli_query($this->conexao->getCon(), $sql)) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//

    public function excluirEventoCurso($id) {
        $sql = "DELETE FROM evento_curso WHERE ID_EVENTO='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluirEventoParticipante($idEvento, $idParticipante) {
        $sql = "DELETE FROM evento_participante WHERE ID_EVENTO=$idEvento AND ID_PARTICIPANTE=$idParticipante";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluirEventoPalestrante($id) {
        $sql = "DELETE FROM evento_palestrante WHERE ID_EVENTO='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosEventosEmDestaque() {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND e.DESTACAREVENTO=1 AND EVENTOAPROVADOPELOADMINISTRADOR=1 OR EVENTOAPROVADOPELOADMINISTRADOR=NULL ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEventosInscricaoAberta() {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO))  ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarTodosMeusEventosInscricaoAberta($idOrganizador, $event) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND e.ID_ORGANIZADOR =$idOrganizador  AND e.nome like '%$event%'ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosMeusEventosInscricaoAberta($idOrganizador) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND e.ID_ORGANIZADOR =$idOrganizador  ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosMeusEventosEmAndamento($idOrganizador) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND e.ID_ORGANIZADOR =$idOrganizador AND EVENTOAPROVADOPELOADMINISTRADOR=1  ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarTodosMeusEventosEmAndamento($idOrganizador, $event) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND EVENTOAPROVADOPELOADMINISTRADOR=1 AND e.ID_ORGANIZADOR =$idOrganizador  AND e.nome like '%$event%'ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
        public function consultarNumeroEventosEmAndamentoOrganizador($id) {
        $sql = "SELECT count(e.ID) AS QUANTIDADE_EVENTOS
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND e.ID_ORGANIZADOR =$id AND EVENTOAPROVADOPELOADMINISTRADOR=1  ORDER BY e.nome
     ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
     public function exibirTodosMeusEventosEncerrados($idOrganizador) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1 AND e.ID_ORGANIZADOR =$idOrganizador  ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarTodosMeusEventosEncerrados($idOrganizador, $event) {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1 AND e.ID_ORGANIZADOR =$idOrganizador  AND e.nome like '%$event%'ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    
          public function consultarNumeroEventosEncerradosOrganizador($id) {
        $sql = "SELECT count(e.ID) AS QUANTIDADE_EVENTOS
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        where now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1 AND e.ID_ORGANIZADOR =$id  ORDER BY e.nome
    ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEventosGratuitosInscricaoAberta() {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO))AND EVENTOAPROVADOPELOADMINISTRADOR=1  AND e.GRATUITOOUPAGO=1   ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEventosPagosInscricaoAberta() {
        $sql = "SELECT e.ID AS ID,
                        e.NOME AS NOME,
                        e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO,
                        e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO,
                        e.DATAINICIOEVENTO AS DATAINICIOEVENTO,
                        e.DATAFIMEVENTO AS DATAFIMEVENTO,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        o.NOMEPESSOA AS NOMEPESSOA,
                        e.ID_ORGANIZADOR AS ID_ORGANIZADOR,
                        e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,
                        e.DESCRICAO AS DESCRICAO,
                        s.SITUACAO AS SITUACAO,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.IMAGEM AS IMAGEM,
                        e.ID_UNIDADE AS ID_UNIDADE,
                        u.NOME AS NOMEUNIDADE,
                        e.EVENTOAPROVADOPELOADMINISTRADOR,
                        e.DESTACAREVENTO
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND e.GRATUITOOUPAGO=2  AND EVENTOAPROVADOPELOADMINISTRADOR=1 ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEmAguardandoInicio() {
        $sql = "SELECT * FROM eventos where now() < DATAINICIOEVENTO AND now() > DATAFIMINSCRICAO ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEmAndamento() {
        $sql = "SELECT * FROM eventos where (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO)) ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosEncerrados() {
        $sql = "SELECT * FROM eventos where now() >= DATAFIMEVENTO ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigoInscritosEmEvento($id) {
        $sql = " SELECT e.ID AS ID, e.NOME AS NOME,e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO, e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO , e.DATAINICIOEVENTO AS DATAINICIOEVENTO,e.DATAFIMEVENTO AS DATAFIMEVENTO, e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,e.DESCRICAO AS DESCRICAO,e.GRATUITOOUPAGO AS GRATUITOOUPAGO,e.IMAGEM AS IMAGEM,u.NOME  AS ID_UNIDADE,o.NOMEPESSOA AS ID_ORGANIZADOR  FROM eventos e LEFT JOIN unidade u ON e.ID_UNIDADE=u.ID LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID WHERE e.id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = " SELECT e.ID AS ID, e.NOME AS NOME_EVENTO,e.DATAINICIOINSCRICAO AS DATAINICIOINSCRICAO, e.DATAFIMINSCRICAO AS DATAFIMINSCRICAO , e.DATAINICIOEVENTO AS DATAINICIOEVENTO,e.DATAFIMEVENTO AS DATAFIMEVENTO, e.QUANTIDADEVAGAS AS QUANTIDADEVAGAS,e.DESCRICAO AS DESCRICAO,e.GRATUITOOUPAGO AS GRATUITOOUPAGO,e.IMAGEM AS IMAGEM,u.NOME  AS ID_UNIDADE,o.NOMEPESSOA AS ID_ORGANIZADOR,HORAINICIOEVENTO AS HORAINICIOEVENTO,HORAFIMEVENTO AS HORAFIMEVENTO , e.ID_UNIDADE AS UNIDADE,e.ID_ORGANIZADOR AS ORGANIZADOR_ID,e.CARGAHORARIA AS CARGAHORARIA   FROM eventos e LEFT JOIN unidade u ON e.ID_UNIDADE=u.ID LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID WHERE e.id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroPalestrantes($id) {
        $sql = "SELECT count(p.id )nPalestrantes  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID WHERE e.id = $id";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroCursos($id) {
        $sql = "SELECT count(e.ID) AS nCursos FROM evento_curso ec LEFT JOIN curso c ON c.ID=ec.ID_CURSO LEFT JOIN eventos e ON e.ID = ec.ID_EVENTO WHERE ec.ID_EVENTO=$id";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarQuantidadeMeusEventosOrganizados($id) {
        $sql = "SELECT count(e.ID) AS QUANTIDADE_EVENTOS
                        FROM eventos e 
                        LEFT JOIN organizador o ON e.ID_ORGANIZADOR=o.ID
                        LEFT JOIN situacaogratuitooupago s ON s.id = e.GRATUITOOUPAGO
                        LEFT JOIN unidade u ON u.ID=e.ID_UNIDADE
                        where (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND e.ID_ORGANIZADOR =$id  ORDER BY e.nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarQuantidadeInscritosPorEventos($id) {
        $sql = "SELECT count(ID_PARTICIPANTE)AS VAGAS_PREENCHIDAS FROM evento_participante WHERE ID_EVENTO=$id";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarSeJaInscreveuNoEvento($idEvento, $idParticipante) {
        $sql = "SELECT count(id) AS PARTICIPACAO FROM evento_participante WHERE ID_EVENTO=$idEvento and ID_PARTICIPANTE=$idParticipante";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarPalestrantes($id, $posicao) {
        $sql = " SELECT  p.id AS ID_PALESTRANTE, p.NOMEPESSOA AS NOME_PALESTRANTE FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID WHERE e.id = '$id' GROUP BY ID_PALESTRANTE   LIMIT $posicao,1";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarPalestrantesEvento($id) {
        $sql = " SELECT  p.id AS ID_PALESTRANTE, p.NOMEPESSOA AS NOME_PALESTRANTE FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID WHERE e.id = $id ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCursos($id) {
        $sql = " SELECT ec.ID_CURSO AS ID_CURSO,c.NOME AS NOME_EVENTO  FROM evento_curso ec LEFT JOIN curso c ON c.ID=ec.ID_CURSO LEFT JOIN eventos e ON e.ID=ec.ID_EVENTO where ec.ID_EVENTO=$id ORDER BY c.NOME ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function cadastrarEventoParticipante($eventos) {
        $sql = "INSERT INTO evento_participante (ID_EVENTO,ID_PARTICIPANTE,CODIGODEAUTENTICACAO,ID_SITUACAOGRATUITOOUPAGO) VALUES('" . $eventos->getId_evento() . "','" . $eventos->getIdParticipante() . "','" . $eventos->getAutenticacao() . "','" . $eventos->getId_situacaogratuitooupago() . "')";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function cancelarInscricao($evento, $participante, $situacao) {

        $sql = "
UPDATE evento_participante SET ID_SITUACAOGRATUITOOUPAGO=$situacao WHERE ID_EVENTO=$evento AND ID_PARTICIPANTE=$participante   ";

        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarCodigoInscritos($id) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.GRATUITOOUPAGO AS GRATUITOPAGO,
                        s.SITUACAO
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE ep.ID_PARTICIPANTE=$id AND
                        (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO))
                        AND (ep.ID_SITUACAOGRATUITOOUPAGO=2 OR ep.ID_SITUACAOGRATUITOOUPAGO=1)
                         ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigoAndamento($id) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        pg.SITUACAO AS GRATUITOPAGO,
                        s.SITUACAO
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaogratuitooupago pg ON 	e.GRATUITOOUPAGO=pg.ID
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE s.ID=$id
                        AND (now() BETWEEN (e.DATAINICIOEVENTO) AND (e.DATAFIMEVENTO)) 
                        ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigoAndamentoCracha($idUsuario, $idEvento) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.MATRICULA AS MATRICULA,
                        c.nome AS CURSO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        u.NOME AS UNIDADE
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaogratuitooupago pg ON 	e.GRATUITOOUPAGO=pg.ID
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        LEFT JOIN unidade u ON u.id=p.ID_UNIDADE
                        LEFT JOIN curso c ON c.id=p.ID_CURSO
			WHERE s.ID=2 AND (ep.ID_PARTICIPANTE=$idUsuario AND ep.ID_EVENTO=$idEvento)
                        AND (now() BETWEEN (e.DATAINICIOEVENTO) AND (e.DATAFIMEVENTO)) 
                        ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigoEncerradoEmissaoCertificado($idParticipante, $idEvento) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        pg.SITUACAO AS GRATUITOPAGO,
                        s.SITUACAO,
                        e.DATAINICIOEVENTO,
                        e.DATAFIMEVENTO,
                        e.CARGAHORARIA,
                        ep.CODIGODEAUTENTICACAO
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaogratuitooupago pg ON 	e.GRATUITOOUPAGO=pg.ID
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE  now() >= DATAFIMEVENTO
                        AND s.ID=2
                        AND (ID_EVENTO=$idEvento AND ID_PARTICIPANTE=$idParticipante) 
                        ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
       public function consultarCodigoEncerradoEmissaoCertificadoPalestrante($idParticipante, $idEvento) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PALESTRANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        e.DATAINICIOEVENTO,
                        e.DATAFIMEVENTO,
                        e.CARGAHORARIA,
                        ep.CODIGODEAUTENTICACAO
                        FROM evento_palestrante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN palestrante p ON p.ID=ep.ID_PALESTRANTE
                        WHERE  now() >= DATAFIMEVENTO
                        AND (ID_EVENTO=$idEvento AND ID_PALESTRANTE=$idParticipante) 
                        ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigoEncerrado($id) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE,
                        e.GRATUITOOUPAGO AS GRATUITOOUPAGO,
                        pg.SITUACAO AS GRATUITOPAGO,
                        s.SITUACAO
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaogratuitooupago pg ON 	e.GRATUITOOUPAGO=pg.ID
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE ep.ID_PARTICIPANTE=$id
                        AND  now() >= DATAFIMEVENTO
                        AND s.ID=2
                        ORDER BY NOMEEVENTO"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function inserirEventoPalestrante($palestrante, $evento,$autenticacao) {
        $sql = "insert into evento_palestrante (ID_EVENTO, ID_PALESTRANTE,CODIGODEAUTENTICACAO) values ($evento,$palestrante,'$autenticacao') ";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function inserirEventoPagamento($evento) {
        $sql = "insert into eventos_pagamento ( ID_EVENTO,DIASPRAZO,DATAVENCIMENTO,VALORCOBRADO,DATADOCUMENTO,NOSSO_NUMERO,NUMERO_DOCUMENTO,DEMONSTRATIVO1,DEMONSTRATIVO2,DEMONSTRATIVO3,INSTRUCOES1,INSTRUCOES2,INSTRUCOES3,PSK,AGENCIA,CARTEIRA,CARTEIRA_DESCRICAO,NOMECEDENTE,CNPJEMPRESA,ENDERECOEMPRESA,CIDADE,UF )"
                . " values ('" . $evento->getId_evento() . "',"
                . "'" . $evento->getPrazoPaganmento() . "','" . $evento->getDataVencimento() . "',"
                . "'" . $evento->getValorCobrado() . "','" . $evento->getDataDocumento() . "','" . $evento->getNossoNumero() . "',"
                . "'" . $evento->getNumeroDocumento() . "','" . $evento->getDemonstrativo1() . "','" . $evento->getDemonstrativo2() . "',"
                . "'" . $evento->getDemonstrativo3() . "','" . $evento->getInstrucoes1() . "','" . $evento->getInstrucoes2() . "',"
                . "'" . $evento->getInstrucoes3() . "','" . $evento->getCodigoCliente() . "','" . $evento->getAgencia() . "',"
                . "'" . $evento->getCarteira() . "','" . $evento->getCarteiraDescricao() . "','" . $evento->getNomeCedente() . "',"
                . "'" . $evento->getCpfCnpj() . "','" . $evento->getEnderecoEmpresa() . "','" . $evento->getCidade() . "','" . $evento->getUf() . "') ";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function inserirEventoCurso($curso, $evento) {
        $sql = "INSERT INTO evento_curso (ID_EVENTO,ID_CURSO) VALUES($evento,$curso)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UltimoEventoInserido() {
        $sql = "SELECT max(id) AS ID FROM eventos";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    function formata_data($_data) {
        // o array $partes é um dos parâmetros de preg_match(), e retorna os padrões encontrados na string.
        if (preg_match("/^([0-9]{4})\-([0-9]{1,2})\-([0-9]{1,2})$/", $_data, $partes)) {
            $data_formatada = $partes[3] . "-" . $partes[2] . "-" . $partes[1];
            return $data_formatada;
        }
    }

    public function consultarSeCursoEstaEmEvento($id_evento, $id_curso) {
        $sql = "SELECT ec.ID_CURSO AS ID_CURSO,c.NOME AS NOME_EVENTO  FROM evento_curso ec LEFT JOIN curso c ON c.ID=ec.ID_CURSO LEFT JOIN eventos e ON e.ID=ec.ID_EVENTO where ec.ID_EVENTO=$id_evento AND ec.ID_CURSO=$id_curso ORDER BY c.NOME";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function MediaIdadeEventos($id_evento) {
        $sql = "select avg(SUBSTRING(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.DATANASCIMENTO)), 3, 2)) AS mediaIdade from evento_participante ep INNER JOIN participante p ON p.ID = ep.ID_PARTICIPANTE INNER JOIN eventos e ON e.ID= ep.ID_PARTICIPANTE where ep.ID_EVENTO=$id_evento";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function MediaIdadeMasculinoEventos($id_evento) {
        $sql = "select avg(SUBSTRING(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.DATANASCIMENTO)), 3, 2)) AS mediaIdade from evento_participante ep INNER JOIN participante p ON p.ID = ep.ID_PARTICIPANTE INNER JOIN eventos e ON e.ID= ep.ID_PARTICIPANTE where ep.ID_EVENTO=$id_evento AND p.sexo='m'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function MediaIdadeFemininoEventos($id_evento) {
        $sql = "select avg(SUBSTRING(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.DATANASCIMENTO)), 3, 2)) AS mediaIdade from evento_participante ep INNER JOIN participante p ON p.ID = ep.ID_PARTICIPANTE INNER JOIN eventos e ON e.ID= ep.ID_PARTICIPANTE where ep.ID_EVENTO=$id_evento AND p.sexo='f'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
