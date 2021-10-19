<?php

class Curso {

    private $id_curso;
    private $nome;
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getId_curso() {
        return $this->id_curso;
    }

    function setId_curso($id_curso) {
        $this->id_curso = $id_curso;
    }

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    public function inserir($curso) {
        $sql = "INSERT INTO curso (nome,ativo_inativo) VALUES('" . $curso->getNome() . "',1)";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function ativarDesativar($ativar, $id) {
        $sql = "UPDATE curso SET ATIVO_INATIVO= $ativar WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function consultar($curso) {
        $sql = "SELECT * FROM curso WHERE  NOME LIKE'%$curso%' ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);

        if (mysqli_num_rows($resultado)) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function alterar($id, $nome) {
        $sql = "UPDATE curso SET NOME= '$nome' WHERE id = '$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function excluir($id) {


        $sql = "DELETE FROM curso WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function exibirTodosCursosCadastrados() {
        $sql = "SELECT * FROM curso ORDER BY nome";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirTodosCursosCadastradosAtivos() {
        $sql = "SELECT * FROM curso where ATIVO_INATIVO=1 ORDER BY nome ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarCodigo($id) {
        $sql = "SELECT * FROM curso WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function consultarNumeroCursos() {
        $sql = "SELECT count(id)  as QUANTIDADE_CURSO  FROM curso";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
