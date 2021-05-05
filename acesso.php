<?php
	include "conexao.php"; //carregamos o arquivo de configuração
	 
	$nome = $HTTP_COOKIE_VARS["login"]; //pegamos o cookie login, gravado anteriormente com o login
	$pass = $HTTP_COOKIE_VARS["senha"]; //pegamos o cookie senha, gravado anteriormente com o login
	 
	$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = ('$nome') AND senha = ('$pass')", $db); //verificamos se o conteudo dos cookies esta correto
	$contagem = mysql_num_rows($confirmacao); //resulta da pesquisa acima
	 
	//aqui finalizamos assim essa página, a comparação iremos fazer nas páginas com acesso restrito

?>