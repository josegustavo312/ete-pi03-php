<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Página Inicial</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<div id="topoImagem">
                
</div>

<div id="conteudo">

	<form name="login" method="post" action="index.php?comecar=1">
	<table width="490" border="0" cellspacing="0" cellpadding="0" align="right">
	  <tr> 
	    <td width="50"> Login: </td>
	      <td width="250">
	        <input name="login" type="text" id="login">
	        </td>
	    <td width="50">Senha: </td>
	      <td><input name="senha" type="password" id="senha"></td>
	    <td width="100"><div align="center">
	          <input name="entrar" type="submit" id="entrar" value="Entrar">
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

if ($comecar == ""){
}

else{

$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = ('$login') AND senha = ('$senha')", $db); //verifica se o login e a senha conferem

$contagem = mysql_num_rows($confirmacao); //traz o resultado da pesquisa acima
	 
if ( $contagem == 1 ) {
	
	 header('Location:index_usuario.php');
	 
	  } else {
	  echo "<script>alert(' Login ou Senha Inválidos ');</script>"; //se a senha está incorreta mostra essa mensagem
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