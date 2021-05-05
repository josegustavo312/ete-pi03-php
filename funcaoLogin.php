<?php
include "conexao.php";

$get_login = $_POST["login"];
$get_senha = md5($_POST["senha"]);

$confirmacao = mysql_query("SELECT * FROM usuario WHERE login = ('$get_login') AND senha = ('$get_senha')", $db); //verifica se o login e a senha conferem

$contagem = mysql_num_rows($confirmacao); //traz o resultado da pesquisa acima
	 
if ( $contagem == 1 ) {
	 setcookie ("login", $get_login); //grava o cookie com o login
	 setcookie ("senha", $get_senha); //grava o cookie com a senha
	 	  echo "Usuário logado."; //se a senha digitada está correta, mostra a mensagem
	  } else {
	  echo "Login ou senha inválidos. <a href=javascript:history.go(-1)>Clique aqui para voltar.</a>"; //se a senha está incorreta mostra essa mensagem
	  }
?>
