<?php

class Conexao {

    private $usuario = "root";
    //private $senha = "31t4s@4dm1n";
	private $senha = "123456";
    private $caminho = "localhost";
    private $banco = "PUCEventos";
    private $con;

    public function __construct() {
        $this->con = mysqli_connect($this->caminho, $this->usuario, $this->senha) or die("Conexão com o banco de dados Falhou!" . mysqli_error($this->con));
        mysqli_select_db($this->con, $this->banco) or die("Conexão com o banco de dados Falhou!" . mysqli_error($this->con));
    }

    public function getCon() {
        return $this->con;
    }

}
?>


