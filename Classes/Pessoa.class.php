<?php

class Pessoa {

    private $matricula;
    private $senha;
    private $nomePessoa;
    private $CPFPessoa;
    private $email;
    private $dataNascimento;
    private $sexo;
    private $ativo_inativo;

    public function __construct() {
        $this->conexao = new Conexao();
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getSexo() {
        return $this->sexo;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    function getMatricula() {
        return $this->matricula;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNomePessoa() {
        return $this->nomePessoa;
    }

    function getCPFPessoa() {
        return $this->CPFPessoa;
    }

    function getEmail() {
        return $this->email;
    }

    function setMatricula($matricula) {
        $this->matricula = $matricula;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNomePessoa($nomePessoa) {
        $this->nomePessoa = $nomePessoa;
    }

    function setCPFPessoa($CPFPessoa) {
        $this->CPFPessoa = $CPFPessoa;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function getAtivo_inativo() {
        return $this->ativo_inativo;
    }

    function setAtivo_inativo($ativo_inativo) {
        $this->ativo_inativo = $ativo_inativo;
    }

    function ValidaCPF($CPFPessoa) {

        $digitoA = 0;
        $digitoB = 0;

        for ($i = 0, $x = 10; $i <= 8; $i++, $x--) {


            $digitoA += $CPFPessoa[$i] * $x;
        }

        for ($i = 0, $x = 11; $i <= 9; $i++, $x--) {

            if (str_repeat($i, 11) == $CPFPessoa) {
                return FALSE;
            }
            $digitoB += $CPFPessoa[$i] * $x;
        }
        $somaA = (($digitoA % 11) < 2) ? 0 : 11 - ($digitoA % 11);
        $somaB = (($digitoB % 11) < 2) ? 0 : 11 - ($digitoB % 11);


        if ($somaA != $CPFPessoa[9] || $somaB != $CPFPessoa[10]) {

            return FALSE;
        } else {
            return TRUE;
        }
    }

    function validaCNPJ($cnpj) {
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj);
        // Valida tamanho
        if (strlen($cnpj) != 14)
            return false;
        // Valida primeiro dígito verificador
        for ($i = 0, $j = 5, $soma = 0; $i < 12; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        if ($cnpj{12} != ($resto < 2 ? 0 : 11 - $resto))
            return false;
        // Valida segundo dígito verificador
        for ($i = 0, $j = 6, $soma = 0; $i < 13; $i++) {
            $soma += $cnpj{$i} * $j;
            $j = ($j == 2) ? 9 : $j - 1;
        }
        $resto = $soma % 11;
        return $cnpj{13} == ($resto < 2 ? 0 : 11 - $resto);
    }

    function EnviarMensagemRecuperaSenha($emailDestinatario, $nomeDestinatario, $token, $usuario) {
        require '../../PHPMailer-master/PHPMailerAutoload.php';

//objeto do mailler para envio do e-mail
        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'tls';

        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 587;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'puceventosmg@gmail.com';
        $Mailer->Password = 'f0rm4nd0s2o21';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'puceventosmg@gmail.com';

        //Destinatario 
        $Mailer->AddAddress($emailDestinatario);

        //Nome do Remetente
        $Mailer->FromName = 'PUC Eventos - Puc Minas';

        //Assunto da mensagem
        $Mailer->Subject = 'Recuperar Senha';

        // corpo do e-mail
        $Mailer->Body = '<span style="color:#000; font-size:14px; font-family:Verdana">'
                . 'Sr.(a)' . $nomeDestinatario . '<br><br>'
                . 'Clique no link abaixo para redefinir sua senha do PUC Eventos.<br><br></span>'
                . '<a href ="http://localhost/PUCEventos/paginas/Login/editarSenha.php?token=' . $token . '&usuario=' . $usuario . '">'
                . 'http://localhost/PUCEventos/paginas/Login/editarSenha.php?token=' . $token . '&usuario=' . $usuario . '</a></span><br/><span style="color:#333;'
                . 'font-size 14px;font-family:Verdana">Enviado:' . date("d/m/Y H:i") . '</span>';


        if ($Mailer->Send()) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"E-mail enviado com sucesso.Acesse o seu e-mail para alterar a senha\");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/index.php'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail(s) confirme seu endereço de e-mail.\");
				</script>
			";
        }
    }

    function EnviarMensagemGrupoDePessoas($nomeRemetente, $emailDestinatario, $assunto, $mensagem, $numerosDestinatarios) {
        require '../../PHPMailer-master/PHPMailerAutoload.php';
        $email = explode(";", $emailDestinatario);

        
//objeto do mailler para envio do e-mail
        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';

        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 465;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'puceventosmg@gmail.com';
        $Mailer->Password = 'f0rm4nd0s2o21';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'puceventosmg@gmail.com';
        for ($i = 0; $i < $numerosDestinatarios; $i++) {
            //Destinatario 
            $Mailer->AddAddress($email[$i]);
        }


        //Nome do Remetente
        $Mailer->FromName = 'PUC Eventos - Puc Minas';

        //Assunto da mensagem
        $Mailer->Subject = $assunto;

        // corpo do e-mail
        $Mailer->Body = '<span style="color:#000; font-size:14px; font-family:Verdana">'
                . $mensagem . '.<br><br></span>'
                . "Enviada por: " . $nomeRemetente . '.<br><br></span>';



        if ($Mailer->Send()) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"E-mail(s) enviado(s) com sucesso.  \");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Administrador/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail confirme seu endereço de e-mail.\");
				</script>
			";
        }
    }

    function EnviarMensagemGrupoDePessoasPeloOrganizador($nomeRemetente, $emailDestinatario, $assunto, $mensagem, $numerosDestinatarios) {
        require '../../PHPMailer-master/PHPMailerAutoload.php';
        $email = explode(";", $emailDestinatario);

    
//objeto do mailler para envio do e-mail
        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';

        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 465;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'puceventosmg@gmail.com';
        $Mailer->Password = 'f0rm4nd0s2o21';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'puceventosmg@gmail.com';
        for ($i = 0; $i < $numerosDestinatarios; $i++) {
            //Destinatario 
            $Mailer->AddAddress($email[$i]);
        }


        //Nome do Remetente
        $Mailer->FromName = 'PUC Eventos - Puc Minas';

        //Assunto da mensagem
        $Mailer->Subject = $assunto;

        // corpo do e-mail
        $Mailer->Body = '<span style="color:#000; font-size:14px; font-family:Verdana">'
                . $mensagem . '.<br><br></span>'
                . "Enviada por: " . $nomeRemetente . '.<br><br></span>';



        if ($Mailer->Send()) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"E-mail(s) enviado(s) com sucesso.  \");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Organizador/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail confirme seu endereço de e-mail se é valido ou tente mais tarde.\");
				</script>
			";
        }
    }

    function EnviarMensagemGrupoDePessoasPeloPalestrante($nomeRemetente, $emailDestinatario, $assunto, $mensagem, $numerosDestinatarios) {
        require '../../PHPMailer-master/PHPMailerAutoload.php';
        $email = explode(";", $emailDestinatario);

   
//objeto do mailler para envio do e-mail
        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';

        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 465;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'puceventosmg@gmail.com';
        $Mailer->Password = 'f0rm4nd0s2o21';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'puceventosmg@gmail.com';
        for ($i = 0; $i < $numerosDestinatarios; $i++) {
            //Destinatario 
            $Mailer->AddAddress($email[$i]);
        }


        //Nome do Remetente
        $Mailer->FromName = 'PUC Eventos - Puc Minas';

        //Assunto da mensagem
        $Mailer->Subject = $assunto;

        // corpo do e-mail
        $Mailer->Body = '<span style="color:#000; font-size:14px; font-family:Verdana">'
                . $mensagem . '.<br><br></span>'
                . "Enviada por: " . $nomeRemetente . '.<br><br></span>';



        if ($Mailer->Send()) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"E-mail(s) enviado(s) com sucesso.  \");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Palestrante/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail confirme seu endereço de e-mail se é valido ou tente mais tarde.\");
				</script>
			";
        }
    }
    
    
        function EnviarMensagemGrupoDePessoasPeloParticipante($nomeRemetente, $emailDestinatario, $assunto, $mensagem, $numerosDestinatarios) {
        require '../../PHPMailer-master/PHPMailerAutoload.php';
        $email = explode(";", $emailDestinatario);

   
//objeto do mailler para envio do e-mail
        $Mailer = new PHPMailer();

        //Define que será usado SMTP
        $Mailer->IsSMTP();

        //Enviar e-mail em HTML
        $Mailer->isHTML(true);

        //Aceitar carasteres especiais
        $Mailer->Charset = 'UTF-8';

        //Configurações
        $Mailer->SMTPAuth = true;
        $Mailer->SMTPSecure = 'ssl';

        //nome do servidor
        $Mailer->Host = 'smtp.gmail.com';
        //Porta de saida de e-mail 
        $Mailer->Port = 465;

        //Dados do e-mail de saida - autenticação
        $Mailer->Username = 'puceventosmg@gmail.com';
        $Mailer->Password = 'f0rm4nd0s2o21';

        //E-mail remetente (deve ser o mesmo de quem fez a autenticação)
        $Mailer->From = 'puceventosmg@gmail.com';
        for ($i = 0; $i < $numerosDestinatarios; $i++) {
            //Destinatario 
            $Mailer->AddAddress($email[$i]);
        }


        //Nome do Remetente
        $Mailer->FromName = 'PUC Eventos - Puc Minas';

        //Assunto da mensagem
        $Mailer->Subject = $assunto;

        // corpo do e-mail
        $Mailer->Body = '<span style="color:#000; font-size:14px; font-family:Verdana">'
                . $mensagem . '.<br><br></span>'
                . "Enviada por: " . $nomeRemetente . '.<br><br></span>';



        if ($Mailer->Send()) {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"E-mail(s) enviado(s) com sucesso.  \");
				</script>
			";
        } else {
            echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/PUCEventos/Paginas/Participante/index.php?link=1'>
					<script type=\"text/javascript\">
					alert(\"Ocorreu um erro ao enviar o e-mail confirme seu endereço de e-mail se é valido ou tente mais tarde.\");
				</script>
			";
        }
    }

}
