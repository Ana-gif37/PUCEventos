<?php


class Unidade {

    private $nome;
    private $conexao;

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    public function __construct() {
        $this->conexao = new Conexao();
    }

    public function inserir($curso) {
        $sql = "INSERT INTO unidade (nome,ativo_inativo) VALUES('" . $curso->getNome() . "',1)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE unidade SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($curso) {
        $sql = "SELECT * FROM unidade WHERE  NOME LIKE'%$curso%' ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $nome) {
        $sql = "UPDATE unidade SET NOME= '$nome' WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {


        $sql = "DELETE FROM unidade WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodasUnidadesCadastradas() {
        $sql = "SELECT * FROM unidade ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodasUnidadesCadastradasAtivas() {
        $sql = "SELECT * FROM unidade where ATIVO_INATIVO=1 ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT * FROM unidade WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
     public function consultarNumeroUnidade() {
        $sql = "SELECT count(id)  as QUANTIDADE_UNIDADE  FROM unidade";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
