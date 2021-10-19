<?php

class Palestrante extends Pessoa {

   // private $telefone;
    private $cnpjEmpresa;
    private $empresa;

    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

    //function getTelefone() {
       // return $this->telefone;
    //}

    function getCnpjEmpresa() {
        return $this->cnpjEmpresa;
    }

    //function setTelefone($telefone) {
        //$this->telefone = $telefone;
    //}

    function setCnpjEmpresa($cnpjEmpresa) {
        $this->cnpjEmpresa = $cnpjEmpresa;
    }

    public function login($senha, $login) {


        $sql = "SELECT * FROM palestrante WHERE EMAIL= '$login' AND senha = md5('$senha')  AND ATIVO_INATIVO=1";


        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($executa) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($usuario) {
        $sql = "INSERT INTO palestrante (matricula, senha,email,nomePessoa,cpfPessoa,cnpjEmpresa,empresa,sexo,datanascimento,ativo_inativo) VALUES(" . $usuario->getMatricula() . ", '" . md5($usuario->getSenha()) . "', '" . $usuario->getEmail() . "', '" . $usuario->getNomePessoa() . "', " . $usuario->getCPFPessoa() . "," . $usuario->getCnpjEmpresa() . ",'"  . $usuario->getEmpresa() . "', '" . $usuario->getSexo() . "','" . $usuario->getDataNascimento() . "',1)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE palestrante SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($usuario) {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA FROM palestrante WHERE  MATRICULA = '$usuario' OR NOMEPESSOA LIKE'%$usuario%' OR CPFPESSOA ='$usuario' OR CNPJEMPRESA ='$usuario' OR EMPRESA='$usuario'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email,  $cnpj, $empresa, $dataNascimento, $sexo) {
        $sql = "UPDATE palestrante SET MATRICULA= $matricula, NOMEPESSOA ='$nomePessoa',SENHA=$senha,CPFPESSOA='$CPFPessoa',EMAIL='$email',CNPJEMPRESA=$cnpj,EMPRESA='$empresa',DATANASCIMENTO='$dataNascimento',SEXO='$sexo'   WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {


        $sql = "DELETE FROM palestrante WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastrados() {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA,EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA FROM palestrante ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastradosAtivos() {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA FROM palestrante  WHERE ATIVO_INATIVO=1 ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA,DATANASCIMENTO AS DATANASCIMENTO,SEXO AS SEXO, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA FROM palestrante WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarEmail($email) {
        $sql = "SELECT * FROM palestrante WHERE EMAIL = '$email'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarRecuperarSenha($email) {
        $sql = " SELECT * FROM palestrante where EMAIL='$email'"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarToken($email, $token) {
        $sql = "update palestrante set TOKENRECUPERASENHA='$token' where EMAIL='$email'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarToken($token) {
        $sql = " SELECT * FROM palestrante where TOKENRECUPERASENHA='$token'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarSenha($email, $senha) {
        $sql = "update palestrante set SENHA=md5('$senha'),TOKENRECUPERASENHA=null where EMAIL='$email'";

        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarNumeroPalestrantes() {
        $sql = "SELECT count(id)  as QUANTIDADE_PALESTRANTE  FROM palestrante";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroDeEventosMeusComInscricaoAberta($id) {
        $sql = "SELECT  count(e.id) QUANTIDADE_EVENTOS FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO))AND EVENTOAPROVADOPELOADMINISTRADOR=1 ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
    public function meusEventosComInscricaoAberta($id) {
        $sql = "SELECT  e.id AS ID ,e.nome as NOME  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND EVENTOAPROVADOPELOADMINISTRADOR=1 ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
        public function consultarMeusEventosComInscricaoAberta($id,$event) {
        $sql = " SELECT  e.id AS ID ,e.nome as NOME, e.gratuitooupago as GRATUITOOUPAGO  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (E.DATAINICIOINSCRICAO) AND (e.DATAFIMINSCRICAO)) AND EVENTOAPROVADOPELOADMINISTRADOR=1  and e.nome like'%$event%'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
    
        public function meusEventosEmAndamento($id) {
        $sql = "SELECT  e.id AS ID ,e.nome as NOME  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND EVENTOAPROVADOPELOADMINISTRADOR=1 ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
        public function consultarMeusEventosEmAndamento($id,$event) {
        $sql = "SELECT  e.id AS ID ,e.nome as NOME  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND EVENTOAPROVADOPELOADMINISTRADOR=1 and e.nome like'%$event%'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
      public function consultarNumeroMeusEventosEmAndamento($id) {
        $sql = "SELECT  count(ep.ID_EVENTO) AS QUANTIDADEEVENTOS  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and (now() BETWEEN (DATAINICIOEVENTO) AND (DATAFIMEVENTO))AND EVENTOAPROVADOPELOADMINISTRADOR=1   ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
         public function meusEventosEncerrados($id) {
        $sql = "SELECT  e.id AS ID ,e.nome as NOME  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1 ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
        public function consultarMeusEncerrados($id,$event) {
        $sql = " SELECT   e.id AS ID ,e.nome as NOME, e.gratuitooupago as GRATUITOOUPAGO  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1 and e.nome like'%$event%'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
       public function consultarNumeroMeusEventosEncerrados($id) {
        $sql = "SELECT  count(ep.ID_EVENTO) AS QUANTIDADEEVENTOS  FROM eventos e  LEFT JOIN evento_palestrante ep ON ep.ID_EVENTO=e.ID LEFT JOIN palestrante p ON ep.ID_PALESTRANTE=p.ID where p.id =$id and  now() >= DATAFIMEVENTO AND EVENTOAPROVADOPELOADMINISTRADOR=1   ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
