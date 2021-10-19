<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MaterialDidatico
 *
 * @author wesle
 */
class MaterialDidatico {

    private $id_material;
    private $nome;
    private $conexao;
    private $id_evento;

    function getNome() {
        return $this->nome;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function getId_material() {
        return $this->id_material;
    }

    function setId_material($id_material) {
        $this->id_material = $id_material;
    }

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getConexao() {
        return $this->conexao;
    }

    function getId_evento() {
        return $this->id_evento;
    }

    function setConexao($conexao) {
        $this->conexao = $conexao;
    }

    function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

function tratar_arquivo_upload($string){
   // pegando a extensao do arquivo
   $partes 	= explode(".", $string);
   $extensao 	= $partes[count($partes)-1];	
   // somente o nome do arquivo
   $nome	= preg_replace('/\.[^.]*$/', '', $string);	
   // removendo simbolos, acentos etc
   $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ?';
   $b = 'aaaaaaaceeeeiiiidnoooooouuuuybsaaaaaaaceeeeiiiidnoooooouuuuyybyRr-';
   $nome = strtr($nome, utf8_decode($a), $b);
   $nome = str_replace(".","-",$nome);
   $nome = preg_replace( "/[^0-9a-zA-Z\.]+/",'-',$nome);
   return utf8_decode(strtolower($nome.".".$extensao));
}

    public function inserir($material) {
        $sql = "INSERT INTO materialdidatico (NOME) VALUES('" . $material->getNome() . "')";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

//    public function consultar($material) {
//        $sql = "SELECT * FROM materialdidatico WHERE  NOME LIKE'%$material%' ";
//        $resultado = mysqli_query($this->conexao->getCon(), $sql);
//
//        if (mysqli_num_rows($resultado)) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }
//
//    public function alterar($id, $nome) {
//        $sql = "UPDATE materialdidatico SET NOME= '$nome' WHERE id = '$id'";
//        if (mysqli_query($this->conexao->getCon(), $sql)) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
    public function excluir($id) {


        $sql = "DELETE FROM materialdidatico WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

//    public function exibirTodosMateriaisCadastrados() {
//        $sql = "SELECT * FROM materialdidatico ORDER BY nome";
//        $resultado = mysqli_query($this->conexao->getCon(), $sql);
//        if (mysqli_num_rows($resultado) > 0) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }

    public function consultarCodigo($id) {
        $sql = "SELECT * FROM materialdidatico WHERE id = '$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function exibirUltimoMaterialCadastrados() {
        $sql = "SELECT id FROM materialdidatico ORDER BY id DESC LIMIT 1";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function inserirEventos_material($material) {
        $sql = "INSERT INTO eventos_material (ID_EVENTO,ID_MATERIAL) VALUES('" . $material->getId_evento() . "','" . $material->getId_material() . "')";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

//    public function consultaEventos_material($material) {
//        $sql = "SELECT * FROM eventos_material WHERE  NOME LIKE'%$material%' ";
//        $resultado = mysqli_query($this->conexao->getCon(), $sql);
//
//        if (mysqli_num_rows($resultado)) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }
//
//    public function alterarEventos_material($id, $nome) {
//        $sql = "UPDATE eventos_material SET NOME= '$nome' WHERE id = '$id'";
//        if (mysqli_query($this->conexao->getCon(), $sql)) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
    public function excluirEventos_material($id) {


        $sql = "DELETE FROM eventos_material WHERE ID='$id'";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

//    public function exibirTodosMateriaisCadastradosEventos_material() {
//        $sql = "SELECT * FROM eventos_material ORDER BY nome";
//        $resultado = mysqli_query($this->conexao->getCon(), $sql);
//        if (mysqli_num_rows($resultado) > 0) {
//            return $resultado;
//        } else {
//            return false;
//        }
//    }

    public function consultarCodigoEventos_material($id) {
        $sql = "SELECT e.NOME AS NOMEEVENTO,m.NOME AS NOMEMATERIAL,em.id AS ID,m.id AS ID_MATERIAL FROM eventos_material em left join eventos e on e.ID=em.ID_EVENTO left join materialdidatico m on m.ID=em.ID_MATERIAL where e.id='$id'";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
      public function consultarNumeroMateriais($id) {
        $sql = "SELECT count(id) as QUANTIDADEMATERIAIS FROM eventos_material where ID_EVENTO=$id";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
