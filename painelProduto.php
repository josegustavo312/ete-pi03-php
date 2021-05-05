<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Produtos</title>
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
<b>PAINEL DO PRODUTO  </b><img src="img/computador_icon.png">
</center>

<form method="post" action="funcaoProduto.php?funcao=gravar">

<fieldset>

<legend>Cadastrar Produto</legend>

Codigo de Barra: <input type="text" name="codBarra" size="14" maxlength="14" required/> <br/><br/>

Referência: <input type="text" name="referencia" size="45" maxlength="45" required/> <br/><br/>

Descrição: <input type="text" name="descricao" size="65" maxlength="65" required/> <br/><br/>

Preco: <input type="text" name="preco" required/> <br/><br/>

Estoque: <input type="text" name="estoque" required/>

&ensp;&ensp;&ensp;&ensp;

<input type="submit" name="Enviar" value="Cadastrar">

</fieldset>

</form>

<form method="post" action="painelProduto.php">

<br/>

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
  	<td width="340" align="center"> CÓDIGO DE BARRA </td>
    <td width="500" align="center"> REFERÊNCIA </td>
    <td width="340" align="center"> PREÇO </td>
    <td width="340" align="center"> ESTOQUE </td>
    <td width="70" align="center"> MODIFICAR </td>
    <td width="70" align="center"> EXCLUIR </td>
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
  	<td align="center"><?php echo $get_codBarra ?></td>
    <td align="center"><?php echo $get_referencia ?></td>
    <td align="center"><?php echo $get_preco ?></td>
    <td align="center"><?php echo $get_estoque ?></td>
    <td align="center"><a href="painelProduto.php?funcao=editar&idproduto=<?php echo $get_idproduto ?>"><font color="#CC0000">Alterar</font></a></td>
    <td align="center"><a href="funcaoProduto.php?funcao=excluir&idproduto=<?php echo $get_idproduto ?>"><font color="#CC0000">x</font></a></td>
  </tr>
  <?php
	}
  ?>
</table>

<br/>

</center>

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
    
	<form method="post" action="funcaoProduto.php?funcao=editar&idproduto=<?php echo $get_idproduto ?>">
    
    <fieldset>

	<legend>Painel do Produto: <?php echo $get_descricao ?></legend>
    
    Código de Barra: <input type="text" name="codBarra" size="14" maxlength="14" value="<?php echo $get_codBarra ?>"> <br/><br/>
    
    Referência: <input type="text" name="referencia" size="45" maxlength="45" value="<?php echo $get_referencia ?>"> <br/><br/>
    
    Descrição: <input type="text" name="descricao" size="70" maxlength="70" value="<?php echo $get_descricao ?>"> <br/><br/>
    
    Preço: <input type="text" name="preco" size="45" maxlength="45" value="<?php echo $get_preco ?>"> <br/><br/>
    
    Estoque: <input type="text" name="estoque" size="10" maxlength="10" value="<?php echo $get_estoque ?>">
      
    &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
    
    <input type="submit" name="Editar" value="Alterar">
    
    </fieldset>
    
    </form>
</div>

<div id="rodape">

</div>

</div>

</body>
</html>