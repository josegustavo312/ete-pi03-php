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
$get_email = $_POST["email"];

if ($comecar == ""){
}

else{

	$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = ('$login') AND email = ('$get_email')", $db); //verifica se o login e a email conferem
	  while ($row = mysql_fetch_array($confirmacao)) {
	    $login = $row["login"]; //adiciona a variavel $login o login do usuario
		$senha = $row["senha"]; //adiciona a variavel $senha a senha do usuario
	    $get_email = $row["email"]; //adiciona a variavel $email o email do usuario
	}
	 
	$contagem = mysql_num_rows($confirmacao); //traz o resultado da pesquisa acima
	 
	if ( $contagem == 1 ) {
//Configurando variaveis
$mail_remetente = "skintech@skintech.com.br"; //Sempre utilize um email do site
$mail = "gugu3124@hotmail.com"; //Destino que tem conta no hotmail.com
$assunto = "Testando script";
$mensagem = "<b>Teste</b>";

//Setando header
$cabecalho = "MIME-Version: 1.0\r\n";
$cabecalho .= "X-Priority: 3\r\n";
$cabecalho .= "Reply-To: $email\n";
$cabecalho .= "Cc: $cc\n";
$cabecalho .= "Bcc: $bcc\n";
$cabecalho .= "X-Mailer: Resposta para $nome\n";
$cabecalho .= "Content-type: text/html; charset=iso-8859-1\r\n";
$cabecalho .= "From: ".$mail." \r\n";

mail($email,$assunto,$mensagem,$cabecalho);

//Enviando o email
$ok = mail($email,$assunto,$mensagem,$cabecalho);;
//Se foi enviado…
if ( $ok ) echo "Bombandoooo…";
else echo "ihhhh não deu!";
	 
	  echo "<div align=center><font size=2 face=Verdana, Arial, Helvetica, sans-serif>Sua senha foi enviada com sucesso para o email: $get_email.</font></div>"; //resposta se o email foi enviado com sucesso
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