<?php
include "conexao.php";

$gravar_id = $_GET["idcliente"];
$gravar_idcliente = $_GET["idcliente"];
$get_nome = $_POST["nome"];
$get_dataNasc = $_POST["dataNasc"];
$get_sexo = $_POST["sexo"];
$get_email = $_POST["email"];
$get_mae = $_POST["mae"];
$get_telefone = $_POST["telefone"];
$get_cpf = $_POST["cpf"];
$get_uf = $_POST["uf"];
$get_cidade = $_POST["cidade"];
$get_bairro = $_POST["bairro"];
$get_logradouro = $_POST["logradouro"];
$get_numero = $_POST["numero"];

if ( $_GET['funcao'] == "gravar" ) {
	
	$sql_gravar = mysql_query ("INSERT INTO cliente (nome, dataNasc, sexo, email, mae, telefone, cpf,
	 							uf, cidade, bairro, logradouro, numero)
								value ('$get_nome','$get_dataNasc','$get_sexo','$get_email','$get_mae',
								'$get_telefone','$get_cpf','$get_uf','$get_cidade','$get_bairro','$get_logradouro','$get_numero')");
	header('Location:painelCliente.php');
}

else if ( $_GET['funcao'] == "editar" ) {
	
	$sql_gravar = mysql_query ("UPDATE cliente SET nome=('$get_nome'), dataNasc=('$get_dataNasc'), sexo=('$get_sexo'),
								email=('$get_email'), mae=('$get_mae'), telefone=('$get_telefone'), cpf=('$get_cpf'), 
								uf=('$get_uf'), cidade=('$get_cidade'), bairro=('$get_bairro'), logradouro=('$get_logradouro'),
								numero=('$get_numero') where idcliente = ('$gravar_idcliente')");
	header('Location:painelCliente.php');
}

else if ( $_GET['funcao'] == "excluir" ) {
	
	$sql_gravar = mysql_query ("DELETE FROM cliente where idcliente = ('$gravar_id')");
	header('Location:painelCliente.php');
	
}

?>