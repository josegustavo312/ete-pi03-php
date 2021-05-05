<?php
include "conexao.php";

$gravar_id = $_GET["idproduto"];
$gravar_idproduto = $_GET["idproduto"];
$gravar_codBarra = $_POST["codBarra"];
$gravar_referencia = $_POST["referencia"];
$gravar_descricao = $_POST["descricao"];
$gravar_preco = $_POST["preco"];
$gravar_estoque = $_POST["estoque"];

if ( $_GET['funcao'] == "gravar" ) {
	
	$sql_gravar = mysql_query ("INSERT INTO produto (codBarra, descricao, preco, estoque, referencia)
	value ('$gravar_codBarra','$gravar_descricao','$gravar_preco','$gravar_estoque','$gravar_referencia')");
	header('Location:painelProduto.php');
}

else if ( $_GET['funcao'] == "editar" ) {
	
	$sql_gravar = mysql_query ("UPDATE produto SET codBarra=('$gravar_codBarra'), descricao=('$gravar_descricao'), 
	preco=('$gravar_preco'), estoque=('$gravar_estoque'), referencia=('$gravar_referencia') where idproduto = ('$gravar_idproduto')");
	header('Location:painelProduto.php');
}

else if ( $_GET['funcao'] == "excluir" ) {
	
	$sql_gravar = mysql_query ("DELETE FROM produto where idproduto = ('$gravar_id')");
	header('Location:painelProduto.php');
	
}

?>