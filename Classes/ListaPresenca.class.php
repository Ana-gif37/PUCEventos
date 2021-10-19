<?php

class ListaPresenca {

    private $dataLista;
    private $presenca;
    private $idParticipante;
    private $idEvento;
    private $conexao;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getDataLista() {
        return $this->dataLista;
    }

    function getPresenca() {
        return $this->presenca;
    }

    function getIdParticipante() {
        return $this->idParticipante;
    }

    function getIdEvento() {
        return $this->idEvento;
    }

    function setDataLista($dataLista) {
        $this->dataLista = $dataLista;
    }

    function setPresenca($presenca) {
        $this->presenca = $presenca;
    }

    function setIdParticipante($idParticipante) {
        $this->idParticipante = $idParticipante;
    }

    function setIdEvento($idEvento) {
        $this->idEvento = $idEvento;
    }

    public function inserir($presenca) {
        $sql = "INSERT INTO listapresenca (DATALISTA,ID_PARTICIPANTE,ID_EVENTO,PRESENCA) VALUES('" . $presenca->getDataLista() . "','" . $presenca->getIdParticipante() . "','" . $presenca->getIdEvento() . "','" . $presenca->getPresenca() . "')";
        if (mysqli_query($this->conexao->getCon(), $sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function numeroDePresencaGeralPorEvento($id) {
        $sql = "select (c.TOTALCHAMADASPOREVENTO-b.NUMEROPRESENCAS)as totalFaltas,c.TOTALCHAMADASPOREVENTO,b.NUMEROPRESENCAS as NUMEROPRESENCAS,b.ID_EVENTO,b.ID_PARTICIPANTE,b.NOMEPARTICIPANTE,b.NOMEEVENTO
                        from (SELECT ID_EVENTO,ID_PARTICIPANTE,count(ID_PARTICIPANTE) AS NUMEROPRESENCAS,p.NOMEPESSOA AS NOMEPARTICIPANTE, e.NOME AS NOMEEVENTO  
                                FROM listapresenca lp
                                        LEFT JOIN 	participante p on p.ID=lp.ID_PARTICIPANTE
                            LEFT JOIN 	eventos e on e.ID=lp.ID_EVENTO
                                                where ID_EVENTO=$id 
                                                group by ID_PARTICIPANTE)b

                            LEFT JOIN 

                        (select a.ID_EVENTO as ID_EVENTO,sum(a.TOTALCHAMADAS)AS TOTALCHAMADASPOREVENTO from
                                (select ID_EVENTO,count(distinct DATALISTA) AS TOTALCHAMADAS FROM listapresenca group by ID_EVENTO)A 
                                        group by a.ID_EVENTO)c

                        on b.ID_EVENTO=c.ID_EVENTO";

        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

    public function numeroDePresencaGeralPorEventoEParticipante($idEvento, $idParticipante) {
        $sql = "select (c.TOTALCHAMADASPOREVENTO-b.NUMEROPRESENCAS)as totalFaltas,c.TOTALCHAMADASPOREVENTO,b.NUMEROPRESENCAS as NUMEROPRESENCAS,b.ID_EVENTO,b.ID_PARTICIPANTE,b.NOMEPARTICIPANTE,b.NOMEEVENTO
                        from (SELECT ID_EVENTO,ID_PARTICIPANTE,count(ID_PARTICIPANTE) AS NUMEROPRESENCAS,p.NOMEPESSOA AS NOMEPARTICIPANTE, e.NOME AS NOMEEVENTO  
                                FROM listapresenca lp
                                        LEFT JOIN 	participante p on p.ID=lp.ID_PARTICIPANTE
                            LEFT JOIN 	eventos e on e.ID=lp.ID_EVENTO
                                                where ID_EVENTO=$idEvento AND ID_PARTICIPANTE=$idParticipante
                                                group by ID_PARTICIPANTE)b

                            LEFT JOIN 

                        (select a.ID_EVENTO as ID_EVENTO,sum(a.TOTALCHAMADAS)AS TOTALCHAMADASPOREVENTO from
                                (select ID_EVENTO,count(distinct DATALISTA) AS TOTALCHAMADAS FROM listapresenca group by ID_EVENTO)A 
                                        group by a.ID_EVENTO)c

                        on b.ID_EVENTO=c.ID_EVENTO";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }
    
    
       public function QuantidadeChamadas($id) {
        $sql = "select count(distinct DATALISTA) AS TOTALCHAMADAS FROM listapresenca   where ID_EVENTO=$id  ";
        $resultado = mysqli_query($this->conexao->getCon(), $sql);
        if (mysqli_num_rows($resultado) > 0) {
            return $resultado;
        } else {
            return false;
        }
    }

}
