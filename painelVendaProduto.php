<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Venda Produto</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css">
</head>

<body>
<div id="container">

<div id="topo">
                
</div>

<div id="menu">

<font color="#F1F2F3">
<?php
	include 'menu.php';
?> 
</font>        
               
</div>

<div id="conteudo">

<font color="#F1F2F3">
<?php
  	include "conexao.php";
	error_reporting(0);
?>	
</font>

<center>
<b>PAINEL DE VENDA PRODUTO </b><img src="img/pedido.png">
</center>

<form method="post" action="painelVendaProduto.php">

<fieldset>

<legend>Buscar por Produtos</legend>

<input type="text" name="codBarra" size="45" maxlength="45">

<input type="submit" name="Enviar" value="Buscar">

</fieldset>

</form>

<center>

<table width="800" border="1">
  <tr align="center">
    <td colspan="7" bgcolor="#000066"><font color="#FFFFFF">Tabela dos Produtos</font></td>
  </tr>
  <tr>
  	<td width="70" align="center"> SELEÇÃO </td>
  	<td width="340" align="center"> CÓDIGO DE BARRA </td>
    <td width="500" align="center"> REFERÊNCIA </td>
    <td width="340" align="center"> PREÇO </td>
    <td width="340" align="center"> ESTOQUE </td>
  </tr>
  
  <br/>
  
  <?php
	$gravar_codBarra = $_POST["codBarra"];
	if ($gravar_codBarra == ""){
		$sql_visualizar = mysql_query ("SELECT * FROM produto");
	}
	else{
		$sql_visualizar = mysql_query ("SELECT * FROM produto WHERE codBarra = '$gravar_codBarra'");
	}
	
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idproduto = $linha["idproduto"];
			$get_codBarra = $linha["codBarra"];
			$get_referencia = $linha["referencia"];
			$get_descricao = $linha["descricao"];
			$get_preco = $linha["preco"];
			$get_estoque = $linha["estoque"];
				
  ?>
  <tr>
  	<td align="center"><a href="painelVendaProduto.php?funcao=editar&idproduto=<?php echo $get_idproduto ?>"><font color="#CC0000">Select</font></a></td>
  	<td align="center"><?php echo $get_codBarra ?></td>
    <td align="center"><?php echo $get_referencia ?></td>
    <td align="center"><?php echo $get_preco ?></td>
    <td align="center"><?php echo $get_estoque ?></td>
  </tr>
  <?php
	}
  ?>
</table>

</center>

<br/>
    
    <?php
				$idproduto = $_GET['idproduto'];
		$sql_update = mysql_query("SELECT * FROM produto WHERE idproduto = '$idproduto'");
		while($linha = mysql_fetch_array($sql_update)){
			$get_idproduto = $linha["idproduto"];
			$get_codBarra = $linha["codBarra"];
			$get_referencia = $linha["referencia"];
			$get_descricao = $linha["descricao"];
			$get_preco = $linha["preco"];
			$get_estoque = $linha["estoque"];
		}
    ?>
    
    <br/>
    
	<form method="post" action="funcaoVenda.php?funcao=gravarProduto&idproduto=<?php echo $get_idproduto ?>&estoque=<?php echo $get_estoque ?>">
    
    <fieldset>
    
    <legend> Painel Venda Produto</legend>
        
    Referência: <input type="text" name="referencia" size="45" maxlength="45" value="<?php echo $get_referencia ?>"> 
    
    <span style="padding-left:52px">
    
    Preço: <input type="text" name="preco" size="9" maxlength="9" value="<?php echo $get_preco ?>"> 
    
    </span>
    
    <span style="padding-left:52px">
        
    Quantidade: <input type="text" name="quantidade" size="5" maxlength="5" required/> <br/><br/>
    
    </span>
    
    <input type="submit" name="Avançar" value="Avançar">
    
    </fieldset>
    
    </form>
</div>

<div id="rodape">

</div>

</div>

</body>
</html>