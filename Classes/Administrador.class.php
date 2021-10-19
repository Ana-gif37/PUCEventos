<?php

class Administrador extends Pessoa {

    public function login($senha, $login) {


        $sql = "SELECT * FROM administrador WHERE EMAIL= '$login' AND senha = md5('$senha') AND ATIVO_INATIVO=1";


        $executa = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($executa) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function inserir($usuario) {
        $sql = "INSERT INTO administrador (matricula, senha,email,nomePessoa,cpfPessoa,ativo_inativo) VALUES(" . $usuario->getMatricula() . ", '" .md5( $usuario->getSenha()) . "', '" . $usuario->getEmail() . "', '" . $usuario->getNomePessoa() . "', '" . $usuario->getCPFPessoa() . "','1')";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE administrador SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($usuario) {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0)AS CPFPESSOA,EMAIL,ATIVO_INATIVO,TOKENRECUPERASENHA"
                . " FROM administrador WHERE  MATRICULA = '$usuario' OR NOMEPESSOA LIKE'%$usuario%' OR CPFPESSOA ='$usuario'OR EMAIL LIKE'%$usuario%'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $matricula, $nomePessoa, $senha, $CPFPessoa, $email) {
        $sql = "UPDATE administrador SET MATRICULA= $matricula, NOMEPESSOA ='$nomePessoa', SENHA =$senha , CPFPESSOA ='$CPFPessoa', EMAIL ='$email' WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function alterarMeusDados($id, $matricula, $senha,  $email) {
        $sql = "UPDATE administrador SET MATRICULA= $matricula, SENHA =$senha , EMAIL ='$email' WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {
        $sql = "DELETE FROM administrador WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosUsuariosCadastrados() {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0)AS CPFPESSOA,EMAIL,ATIVO_INATIVO,TOKENRECUPERASENHA FROM administrador ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
      public function exibirTodosUsuariosCadastradosAtivos() {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0)AS CPFPESSOA,EMAIL,ATIVO_INATIVO,TOKENRECUPERASENHA FROM administrador WHERE ATIVO_INATIVO=1 ORDER BY matricula";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT ID,MATRICULA,SENHA,NOMEPESSOA,lpad(CPFPESSOA,11,0)AS CPFPESSOA,EMAIL,ATIVO_INATIVO,TOKENRECUPERASENHA FROM administrador WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarEmail($email) {
        $sql = "SELECT * FROM administrador WHERE EMAIL = '$email'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarRecuperarSenha($email) {
        $sql = " SELECT * FROM administrador where EMAIL='$email'"
        ;
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarToken($email, $token) {
        $sql = "update administrador set TOKENRECUPERASENHA='$token' where EMAIL='$email'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultarToken($token) {
        $sql = " SELECT * FROM administrador where TOKENRECUPERASENHA='$token'";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function AtualizarSenha($email, $senha) {
        $sql = "update administrador set SENHA=md5('$senha'),TOKENRECUPERASENHA=null where EMAIL='$email'";

        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }
    
        public function consultarNumeroAdministradores() {
        $sql = "SELECT count(id)  as QUANTIDADE_ADMINISTRADOR  FROM administrador";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
