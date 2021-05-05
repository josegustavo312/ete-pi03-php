<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Venda Cliente</title>
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
<b>PAINEL DE VENDA </b><img src="img/pedido.png">
</center>

<form method="post" action="painelVendaCliente.php">

<fieldset>

<legend>Buscar por Clientes</legend>

<input type="text" name="nome" size="45" maxlength="45">

<input type="submit" name="Enviar" value="Buscar">

</fieldset>

</form>

<center>

<table width="800" border="1">
  <tr align="center">
    <td colspan="7" bgcolor="#000066"><font color="#FFFFFF">Tabela dos Usuários</font></td>
  </tr>
  <tr>
    <td width="70" align="center"> SELECIONAR </td>
  	<td width="340" align="center"> NOME </td>
    <td width="500" align="center"> EMAIL </td>
    <td width="340" align="center"> CPF </td>
    <td width="340" align="center"> TELEFONE </td>
  </tr>
  
  <br/>
  
  <?php
	$gravar_nome = $_POST["nome"];
	if ($gravar_nome == ""){
		$sql_visualizar = mysql_query ("SELECT * FROM cliente");
	}
	else{
		$sql_visualizar = mysql_query ("SELECT * FROM cliente WHERE nome LIKE '%$gravar_nome%'");
	}
	
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idcliente = $linha["idcliente"];
			$get_nome = $linha["nome"];
			$get_dataNasc = $linha["dataNasc"];
			$get_sexo = $linha["sexo"];
			$get_email = $linha["email"];
			$get_login = $linha["login"];
			$get_senha = $linha["senha"];
			$get_mae = $linha["mae"];
			$get_telefone = $linha["telefone"];
			$get_cpf = $linha["cpf"];
			$get_uf = $linha["uf"];
			$get_cidade = $linha["cidade"];
			$get_bairro = $linha["bairro"];
			$get_logradouro = $linha["logradouro"];
			$get_numero = $linha["numero"];
				
  ?>
  <tr>
    <td align="center"><a href="painelVendaCliente.php?funcao=editar&idcliente=<?php echo $get_idcliente ?>"><font color="#CC0000">Select</font></a></td>
  	<td align="center"><?php echo $get_nome ?></td>
    <td align="center"><?php echo $get_email ?></td>
    <td align="center"><?php echo $get_cpf ?></td>
    <td align="center"><?php echo $get_telefone ?></td>
  </tr>
  <?php
	}
  ?>
</table>

</center>

<br/>

<br/>

	<?php
	$sql_visualizar = mysql_query ("SELECT * FROM venda");
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idvenda = $linha["idvenda"];
			$get_idcliente = $linha["idcliente"];
			$get_valor = $linha["valor"];
		}
  	?>
	
    <?php
	$sql_visualizar = mysql_query ("SELECT * FROM item");
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_iditem = $linha["iditem"];
		}
  	?>
	
	<?php
		$idcliente = $_GET['idcliente'];
		$gravar_nome = $_POST["nome"];
		if ($idcliente == 0){
		$sql_update = mysql_query("SELECT * FROM cliente");
		while($linha = mysql_fetch_array($sql_update)){
			$get_idcliente = $linha["idcliente"];
			$get_nome = $linha["nome"];
		}
		}
		else{
		$sql_update = mysql_query("SELECT * FROM cliente WHERE idcliente = '$idcliente'");
		while($linha = mysql_fetch_array($sql_update)){
			$get_idcliente = $linha["idcliente"];
			$get_nome = $linha["nome"];
		}
		}
    ?>
    
    <br/>
    
	<form method="post" action="funcaoVenda.php?funcao=gravarCliente&idvenda=<?php echo $get_idvenda ?>&iditem=<?php echo $get_idvenda ?>&idcliente=<?php echo $get_idcliente ?>">
    
    <fieldset>
    
    <legend> Cliente </legend>
    
    Cliente: <input type="text" name="nome" size="45" maxlength="45" value="<?php echo $get_nome ?>"> <br/><br/>  
   
    <input type="submit" name="Finalizar" value="Finalizar Venda">
    
    </fieldset>
    
    </form>
    
</div>

<div id="rodape">

</div>

</div>

</body>
</html>