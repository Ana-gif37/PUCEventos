<?php

class Organizador extends Pessoa {

    private $telefone;
    private $cnpjEmpresa;
    private $empresa;

    function getEmpresa() {
        return $this->empresa;
    }

    function setEmpresa($empresa) {
        $this->empresa = $empresa;
    }

   // function getTelefone() {
      //  return $this->telefone;
   // }

    function getCnpjEmpresa() {
        return $this->cnpjEmpresa;
    }

   // function setTelefone($telefone) {
       // $this->telefone = $telefone;
   // }

    function setCnpjEmpresa($cnpjEmpresa) {
        $this->cnpjEmpresa = $cnpjEmpresa;
    }

    public function login($senha, $login) {


        $sql = "SELECT * FROM organizador WHERE EMAIL= '$login' AND senha = md5('$senha')  AND ATIVO_INATIVO=1";



        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($executa) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($usuario) {
        $sql = "INSERT INTO organizador (matricula, senha,email,nomePessoa,cpfPessoa,cnpjEmpresa,empresa,sexo,datanascimento,ativo_inativo) VALUES(" . $usuario->getMatricula() . ", '" .md5( $usuario->getSenha()) . "', '" . $usuario->getEmail() . "', '" . $usuario->getNomePessoa() . "', " . $usuario->getCPFPessoa() . "," . $usuario->getCnpjEmpresa() . ",'"  . $usuario->getEmpresa() . "', '" . $usuario->getSexo() ."','" . $usuario->getDataNascimento() ."',1)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE organizador SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($usuario) {
        $sql = "SELECT  ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA"
                . " FROM organizador "
                . "WHERE  MATRICULA = '$usuario' OR NOMEPESSOA LIKE'%$usuario%' OR CPFPESSOA ='$usuario' OR CNPJEMPRESA ='$usuario' OR EMPRESA ='$usuario'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email,  $cnpj, $empresa,$dataNascimento,$sexo) {
        $sql = "UPDATE organizador SET MATRICULA= $matricula, NOMEPESSOA ='$nomePessoa',SENHA=$senha,CPFPESSOA='$CPFPessoa',EMAIL='$email',CNPJEMPRESA=$cnpj,EMPRESA='$empresa',DATANASCIMENTO='$dataNascimento',SEXO='$sexo'   WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {


        $sql = "DELETE FROM organizador WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastrados() {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA"
                . " FROM organizador "
                . "ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastradosAtivos() {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA"
                . " FROM organizador "
                . "WHERE ATIVO_INATIVO=1 ORDER BY NOMEPESSOA";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT ID,SENHA, MATRICULA,NOMEPESSOA,lpad(CPFPESSOA,11,0) AS CPFPESSOA,DATANASCIMENTO AS DATANASCIMENTO,SEXO AS SEXO, EMAIL,EMPRESA,lpad(CNPJEMPRESA,14,0) AS CNPJEMPRESA,ATIVO_INATIVO,TOKENRECUPERASENHA "
                . "FROM organizador "
                . "WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarEmail($email) {
        $sql = "SELECT * FROM organizador WHERE EMAIL = '$email'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarRecuperarSenha($email) {
        $sql = " SELECT * FROM organizador where EMAIL='$email'"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarToken($email, $token) {
        $sql = "update organizador set TOKENRECUPERASENHA='$token' where EMAIL='$email'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarToken($token) {
        $sql = " SELECT * FROM organizador where TOKENRECUPERASENHA='$token'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarSenha($email, $senha) {
        $sql = "update organizador set SENHA=md5('$senha'),TOKENRECUPERASENHA=null where EMAIL='$email'";

        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarOrganizadorDoEvento($id) {
        $sql = " SELECT o.EMAIL ,o.ID ,o.NOMEPESSOA FROM eventos e LEFT JOIN organizador o ON o.ID=e.ID_ORGANIZADOR WHERE e.ID=$id ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

public function consultarNumeroOrganizadores() {
        $sql = "SELECT count(id) as QUANTIDADE_ORGANIZADOR  FROM organizador";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    


}
