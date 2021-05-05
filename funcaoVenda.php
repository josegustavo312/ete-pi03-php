<?php
include "conexao.php";

$gravar_idcliente = $_GET["idcliente"];
$gravar_idvenda = $_GET["idvenda"];
$gravar_iditem = $_GET["iditem"];
$gravar_idproduto = $_GET["idproduto"];
$gravar_quantidade = $_POST["quantidade"];
$gravar_preco = $_POST["preco"];
$gravar_desconto = $_POST["desconto"];
$gravar_estoque = $_GET["estoque"];

$valorQuantidade = $gravar_preco * $gravar_quantidade; 

$estoqueBaixa = $gravar_estoque - $gravar_quantidade;

if ( $_GET['funcao'] == "gravarProduto" ) {
	
	$sql_gravarVenda = mysql_query ("INSERT INTO venda (valor)
	value ('$valorQuantidade')");
	
	$sql_gravarItem = mysql_query ("INSERT INTO item (idproduto, quantidade)
	value ('$gravar_idproduto','$gravar_quantidade')");
	
	$sql_baixaEstoque = mysql_query ("UPDATE produto SET estoque = ('$estoqueBaixa')
	where idproduto = ('$gravar_idproduto')");
	
	header('Location:painelVendaCliente.php');
}

else if ( $_GET['funcao'] == "gravarCliente" ) {
	
	$sql_gravarVenda = mysql_query ("UPDATE venda SET idcliente=($gravar_idcliente) where idvenda = ($gravar_idvenda)");
	
	$sql_gravarVenda = mysql_query ("UPDATE item SET idvenda=($gravar_idvenda) where iditem = ($gravar_iditem)");
	
	header('Location:notaFiscal.php');
}

?>