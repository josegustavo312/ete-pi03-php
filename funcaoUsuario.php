<?php
include "conexao.php";

$gravar_id = $_GET["idusuario"];
$gravar_idusuario = $_GET["idusuario"];
$get_nome = $_POST["nome"];
$get_dataNasc = $_POST["dataNasc"];
$get_sexo = $_POST["sexo"];
$get_email = $_POST["email"];
$get_login = $_POST["login"];
$get_senha = md5($_POST["senha"]);
$get_mae = $_POST["mae"];
$get_telefone = $_POST["telefone"];
$get_cpf = $_POST["cpf"];
$get_uf = $_POST["uf"];
$get_cidade = $_POST["cidade"];
$get_bairro = $_POST["bairro"];
$get_logradouro = $_POST["logradouro"];
$get_numero = $_POST["numero"];

if ( $_GET['funcao'] == "editar" ) {
	
	$sql_gravar = mysql_query ("UPDATE usuario SET nome=('$get_nome'), dataNasc=('$get_dataNasc'), sexo=('$get_sexo'),
								email=('$get_email'), login=('$get_login'), senha=('$get_senha'), mae=('$get_mae'),
								telefone=('$get_telefone'), cpf=('$get_cpf'), uf=('$get_uf'), cidade=('$get_cidade'),
								bairro=('$get_bairro'), logradouro=('$get_logradouro'), numero=('$get_numero')
								where idusuario = ('$gravar_idusuario')");
	header('Location:painelUsuario.php');
}

else if ( $_GET['funcao'] == "excluir" ) {
	
	$sql_gravar = mysql_query ("DELETE FROM usuario where idusuario = ('$gravar_id')");
	header('Location:painelUsuario.php');
	
}

?>