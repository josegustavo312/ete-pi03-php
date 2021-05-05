<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Recuperar Senha</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<div id="topoImagem">
                
</div>

<div id="conteudo">

<form name="senha" method="post" action="senha.php?comecar=1">
	  <table width="400" border="1" cellspacing="0" cellpadding="0">
	    <tr> 
	      <td width="150"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Login:</font></td>
	      <td width="250"><input name="login" type="text" id="login"></td>
	    </tr>
	    <tr> 
	      <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Email:</font></td>
	      <td><input name="email" type="text" id="email" size="50" ></td>
	    </tr>
	    <tr> 
	      <td colspan="2"><div align="center"> 
	          <input name="enviar" type="submit" id="enviar" value="Enviar minha Senha">
	        </div></td>
	    </tr>
	  </table>
</form>

    
<?php
error_reporting(0);

include "conexao.php";

$comecar = $_GET["comecar"];
$login = $_POST["login"];
$senha = md5($_POST["senha"]);
$email = $_POST["email"];

if ($comecar == ""){
}

else{

	$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = ('$login') AND email = ('$email')", $db); //verifica se o login e a email conferem
	  while ($row = mysql_fetch_array($confirmacao)) {
	    $login = $row["login"]; //adiciona a variavel $login o login do usuario
		$senha = $row["senha"]; //adiciona a variavel $senha a senha do usuario
	    $email = $row["email"]; //adiciona a variavel $email o email do usuario
	}
	 
	$contagem = mysql_num_rows($confirmacao); //traz o resultado da pesquisa acima
	 
	if ( $contagem == 1 ) {
	  	// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
	require("phpmailer/class.phpmailer.php");
	
	$token = explode('@', $email);
    $domain = $token[1];
	 
	// Inicia a classe PHPMailer
	$mail = new PHPMailer();
	 
	// Define os dados do servidor e tipo de conexão
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsSMTP(); // Define que a mensagem será SMTP
	//$mail->Host = "smtp.live.com"; // Endereço do servidor SMTP
	//$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
	$mail->SMTPSecure = 'tls';
	//$mail->Username = 'seumail@dominio.net'; // Usuário do servidor SMTP
	//$mail->Password = '587'; // Senha do servidor SMTP
	
	$mail->Port = 587;
    $mail->Host = "smtp.live.com";
    //$mail->Username = $hotmailUser;
    //$mail->Password = $hotmailPass;  
	 
	// Define o remetente
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->From = "gugu3124@hotmail.com"; // Seu e-mail
	$mail->Sender = "gugu3124@hotmail.com"; // Seu e-mail
	$mail->FromName = "Joãozinho"; // Seu nome
	 
	// Define os destinatário(s)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->AddAddress('gugu3124@hotmail.com', 'Gustavo');
	//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
	//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
	 
	// Define os dados técnicos da Mensagem
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	 
	// Define a mensagem (Texto e Assunto)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
	$mail->Body = "Este é o corpo da mensagem de teste";
	$mail->AltBody = "Este é o corpo da mensagem de teste, em Texto Plano";
	 
// Define os anexos (opcional)
	// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
	 
	// Envia o e-mail
	$enviado = $mail->Send();
	 
	// Limpa os destinatários e os anexos
	$mail->ClearAllRecipients();
	$mail->ClearAttachments();
	 
	// Exibe uma mensagem de resultado
	if ($enviado) {
	echo "E-mail enviado com sucesso!";
	} else {
	echo "Não foi possível enviar o e-mail.<br /><br />";
	echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
	}
	  
	  echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Sua senha foi enviada com sucesso para o email: $email.</font></div>"; //resposta se o email foi enviado com sucesso
	  } else {
	    echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Seu login ou email está incorreto.</font></div>"; //resposta se não foi possivel enviar o email
	}

}
?>

<center>

<br/><br/>

<img height="348" width="555" src="img/home.png" />

</center>

</div>

<div id="rodape">

</div>

</div>


</body>
</html>