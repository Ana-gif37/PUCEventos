<?php

class Participante extends Pessoa {

    private $id_participante;
    private $curso;
    private $periodo;
    private $unidade;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getId_participante() {
        return $this->id_participante;
    }

    function setId_participante($id_participante) {
        $this->id_participante = $id_participante;
    }

    function getUnidade() {
        return $this->unidade;
    }

    function setUnidade($unidade) {
        $this->unidade = $unidade;
    }

    function getCurso() {
        return $this->curso;
    }

    function getPeriodo() {
        return $this->periodo;
    }

    function setCurso($curso) {
        $this->curso = $curso;
    }

    function setPeriodo($periodo) {
        $this->periodo = $periodo;
    }

    public function login($senha, $login) {


        $sql = "SELECT * FROM participante WHERE (EMAIL= '$login' ) AND senha = md5('$senha')  AND ATIVO_INATIVO=1 ";


        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($executa) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($usuario) {
        $sql = "INSERT INTO participante (matricula, senha,email,nomepessoa,cpfpessoa,id_curso,id_unidade,periodo,sexo,datanascimento,ativo_inativo)"
                . " VALUES(" . $usuario->getMatricula() . ", '" . md5($usuario->getSenha()) . "', "
                . "'" . $usuario->getEmail() . "', '" . $usuario->getNomePessoa() . "'"
                . ", '" . $usuario->getCPFPessoa() . "', " . $usuario->getCurso() . ", " . $usuario->getUnidade() . ", " . $usuario->getPeriodo() . ", '" . $usuario->getSexo() . "','" . $usuario->getDataNascimento() . "',1)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE participante SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($usuario) {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA,EMAIL,ID_CURSO,ID_UNIDADE,PERIODO,ATIVO_INATIVO,TOKENRECUPERASENHA FROM participante WHERE  MATRICULA = '$usuario' OR NOMEPESSOA LIKE'%$usuario%' OR CPFPESSOA ='$usuario'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email, $curso, $periodo, $unidade, $dataNascimento, $sexo) {
        $sql = "UPDATE participante SET MATRICULA= $matricula, NOMEPESSOA ='$nomePessoa',SENHA=$senha,EMAIL='$email',ID_CURSO=$curso,PERIODO=$periodo,ID_UNIDADE=$unidade,CPFPESSOA=$CPFPessoa,DATANASCIMENTO='$dataNascimento',SEXO='$sexo' WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {


        $sql = "DELETE FROM participante WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastrados() {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA,EMAIL,ID_CURSO,ID_UNIDADE,PERIODO,ATIVO_INATIVO,TOKENRECUPERASENHA FROM participante ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT p.id as ID,p.MATRICULA,p.SENHA,p.NOMEPESSOA,lpad(p.CPFPESSOA,11,0) AS CPFPESSOA,DATANASCIMENTO AS DATANASCIMENTO,SEXO AS SEXO,p.EMAIL,p.PERIODO,c.nome as NOMECURSO,u.nome as NOMEUNIDADE,p.ID_UNIDADE,p.ID_CURSO
                        FROM participante p
                        left join curso c on c.id=p.id_curso 
                        left join unidade u on u.id=p.ID_UNIDADE
                        WHERE P.id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarEmail($email) {
        $sql = "SELECT * FROM participante WHERE EMAIL = '$email'  ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarRecuperarSenha($email) {
        $sql = " SELECT * FROM participante where EMAIL='$email'"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarToken($email, $token) {
        $sql = "update participante set TOKENRECUPERASENHA='$token' where EMAIL='$email'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarToken($token) {
        $sql = " SELECT * FROM participante where TOKENRECUPERASENHA='$token'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarSenha($email, $senha) {
        $sql = "update participante set SENHA=md5('$senha'),TOKENRECUPERASENHA=null where EMAIL='$email'";

        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function VerificaUsuariosInscritosEventos($evento) {
        $sql = "SELECT p.MATRICULA AS MATRICULA,lpad(p.CPFPESSOA,11,0) AS CPFPESSOA,p.ATIVO_INATIVO AS ATIVO_INATIVO,p.EMAIL,p.NOMEPESSOA AS NOMEPESSOA,p.ID AS ID, ID_SITUACAOGRATUITOOUPAGO AS ID_SITUACAOGRATUITOOUPAGO,e.GRATUITOOUPAGO AS GRATUITOOUPAGO,p.sexo AS SEXO,SUBSTRING(FROM_DAYS(TO_DAYS(NOW())-TO_DAYS(p.DATANASCIMENTO)), 3, 2) AS IDADE FROM participante p  LEFT JOIN evento_participante ep ON ep.ID_PARTICIPANTE=p.ID  LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO WHERE e.ID=$evento ORDER BY p.NOMEPESSOA";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function QuantidadeUsuariosInscritosEventos($evento) {
        $sql = "SELECT count(p.ID) AS QUANTIDADEINSCRITOS FROM participante p  LEFT JOIN evento_participante ep ON ep.ID_PARTICIPANTE=p.ID  LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO WHERE e.ID=$evento";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function ConsultaUsuariosInscritosEventos($evento, $usuario) {
        $sql = "SELECT p.MATRICULA AS MATRICULA,lpad(p.CPFPESSOA,11,0) AS CPFPESSOA,p.ATIVO_INATIVO AS ATIVO_INATIVO,p.EMAIL,p.NOMEPESSOA AS NOMEPESSOA,p.ID AS ID, ID_SITUACAOGRATUITOOUPAGO AS ID_SITUACAOGRATUITOOUPAGO,e.GRATUITOOUPAGO AS GRATUITOOUPAGO FROM participante p  LEFT JOIN evento_participante ep ON ep.ID_PARTICIPANTE=p.ID  LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO WHERE (e.ID=$evento)  AND (p.MATRICULA='$usuario' OR p.NOMEPESSOA LIKE '%$usuario%' OR p.CPFPESSOA='$usuario' OR p.EMAIL LIKE '%$usuario%')";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultaMeusEventosEmAndamento($usuario) {
        $sql = " SELECT ep.ID_EVENTO AS ID_EVENTO ,
                        ep.ID_PARTICIPANTE AS ID_PARTICIPANTE ,
                        e.NOME AS NOMEEVENTO,
                        p.NOMEPESSOA AS NOMEPARTICIPANTE
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
			WHERE (ep.ID_PARTICIPANTE=$usuario)
                        AND (now() BETWEEN (e.DATAINICIOEVENTO) AND (e.DATAFIMEVENTO)) 
                        AND ep.ID_SITUACAOGRATUITOOUPAGO=2
                        AND EVENTOAPROVADOPELOADMINISTRADOR=1
                        ORDER BY NOMEEVENTO";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroParticipantes() {
        $sql = "SELECT count(id)  as QUANTIDADE_PARTICIPANTE  FROM participante";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroParticipantesPorSexo($evento, $sexo) {
        $sql = "select count(p.id) AS quantidade from evento_participante ep INNER JOIN participante p ON p.ID = ep.ID_PARTICIPANTE INNER JOIN eventos e ON e.ID= ep.ID_PARTICIPANTE where ep.ID_EVENTO=$evento AND p.sexo='$sexo'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosParticipanteEstaInscrito($id) {
        $sql = "SELECT count(ep.ID_EVENTO) AS QUANTIDADE_EVENTOS 
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE ep.ID_PARTICIPANTE=$id AND
                        (now() BETWEEN (DATAINICIOINSCRICAO) AND (DATAFIMINSCRICAO))
                        AND (ep.ID_SITUACAOGRATUITOOUPAGO=2 OR ep.ID_SITUACAOGRATUITOOUPAGO=1) 
                        AND e.EVENTOAPROVADOPELOADMINISTRADOR=1";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosEmAndamento($id) {
        $sql = "SELECT count(ep.ID_EVENTO) AS QUANTIDADE_EVENTOS 
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE ep.ID_PARTICIPANTE=$id AND
                        (now() BETWEEN (e.DATAINICIOEVENTO) AND (e.DATAFIMEVENTO)) 
                        AND (ep.ID_SITUACAOGRATUITOOUPAGO=2)
                        AND e.EVENTOAPROVADOPELOADMINISTRADOR=1";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroEventosEncerrados($id) {
        $sql = "SELECT count(ep.ID_EVENTO) AS QUANTIDADE_EVENTOS 
                        FROM evento_participante ep
                        LEFT JOIN eventos e ON e.ID=ep.ID_EVENTO
                        LEFT JOIN participante p ON p.ID=ep.ID_PARTICIPANTE
                        LEFT JOIN situacaoinscricao s ON ep.ID_SITUACAOGRATUITOOUPAGO=s.id
                        WHERE ep.ID_PARTICIPANTE=$id AND
                        now() >= DATAFIMEVENTO
                        AND (ep.ID_SITUACAOGRATUITOOUPAGO=2)
                        AND e.EVENTOAPROVADOPELOADMINISTRADOR=1";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
