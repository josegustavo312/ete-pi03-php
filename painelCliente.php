<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Clientes</title>
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
<b>PAINEL DO CLIENTE  </b><img src="img/cliente.png">
</center>

<form method="post" action="funcaoCliente.php?funcao=gravar">

<fieldset>

<legend>Cadastrar Cliente</legend>

Nome: <input type="text" name="nome" size="45" maxlength="45" required/> 

<span style="padding-left:100px">

Email: <input type="text" name="email" size="45" maxlength="45" required/> 

</span>

<br/><br/>

Data Nasc.: <input type="text" name="dataNasc" size="11" maxlength="10" placeholder="dd/mm/aaaa" required/> 

<span style="padding-left:52px">

Sexo: <input type="radio" value="Masculino" name="sexo" checked="checked" required/> M 
      <input type="radio" value="Feminino" name="sexo" required/> F  

</span>

<span style="padding-left:50px">

Nome da Mãe: <input type="text" name="mae" size="45" maxlength="45" required/> 
      
</span>

<br/><br/>

Telefone: <input type="text" name="telefone" size="30" maxlength="30" placeholder="(xx) xxxx-xxxx" required/> 

<span style="padding-left:193px">

Cpf: <input type="text" name="cpf" size="14" maxlength="14" placeholder="xxx.xxx.xxx-xx" required/> 

</span>

<br/><br/>

Cidade: <input type="text" name="cidade" size="30" maxlength="45" required/> 

<span style="padding-left:52px">

UF: <select name="uf" required>
                            <option value="PE">PE</option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PR">PR</option>
                            <option value="PB">PB</option>
                            <option value="PA">PA</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
    </select>     

</span>

<span style="padding-left:50px">

Bairro: <input type="text" name="bairro" size="45" maxlength="45" required/> 
      
</span>

<br/><br/>

Logradouro: <input type="text" name="logradouro" size="30" maxlength="30" required/> 

<span style="padding-left:143px">

Numero: <input type="text" name="numero" size="15" maxlength="15" required/> 

</span>

<span style="padding-left:95px">

<input type="submit" name="Enviar" value="Cadastrar">

</span>

</fieldset>

</form>

<form method="post" action="painelCliente.php">

<br/>

<fieldset>

<legend>Buscar por Clientes</legend>

<input type="text" name="nome" size="45" maxlength="45">

<input type="submit" name="Enviar" value="Buscar">

</fieldset>

</form>

<center>

<table width="800" border="1">
  <tr align="center">
    <td colspan="7" bgcolor="#000066"><font color="#FFFFFF">Tabela dos Clientes</font></td>
  </tr>
  <tr>
  	<td width="340" align="center"> NOME </td>
    <td width="500" align="center"> EMAIL </td>
    <td width="340" align="center"> CPF </td>
    <td width="340" align="center"> TELEFONE </td>
    <td width="70" align="center"> MODIFICAR </td>
    <td width="70" align="center"> EXCLUIR </td>
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
  	<td align="center"><?php echo $get_nome ?></td>
    <td align="center"><?php echo $get_email ?></td>
    <td align="center"><?php echo $get_cpf ?></td>
    <td align="center"><?php echo $get_telefone ?></td>
    <td align="center"><a href="painelCliente.php?funcao=editar&idcliente=<?php echo $get_idcliente ?>"><font color="#CC0000">Alterar</font></a></td>
    <td align="center"><a href="funcaoCliente.php?funcao=excluir&idcliente=<?php echo $get_idcliente ?>"><font color="#CC0000">x</font></a></td>
  </tr>
  <?php
	}
  ?>
</table>

<br/>

</center>

	<?php
		$idcliente = $_GET['idcliente'];
		$sql_update = mysql_query("SELECT * FROM cliente WHERE idcliente = '$idcliente'");
		while($linha = mysql_fetch_array($sql_update)){
			$get_idcliente = $linha["idcliente"];
			$get_nome = $linha["nome"];
			$get_dataNasc = $linha["dataNasc"];
			$get_sexo = $linha["sexo"];
			$get_email = $linha["email"];
			$get_mae = $linha["mae"];
			$get_telefone = $linha["telefone"];
			$get_cpf = $linha["cpf"];
			$get_uf = $linha["uf"];
			$get_cidade = $linha["cidade"];
			$get_bairro = $linha["bairro"];
			$get_logradouro = $linha["logradouro"];
			$get_numero = $linha["numero"];
		}
    ?>
    
    <br/>
    
	<form method="post" action="funcaoCliente.php?funcao=editar&idcliente=<?php echo $get_idcliente ?>">
    
    <fieldset>

	<legend>Painel do Cliente: <?php echo $get_nome ?></legend>
    
    Nome: <input type="text" name="nome" size="45" maxlength="45" value="<?php echo $get_nome ?>" required/> 

	<span style="padding-left:100px">

	Email: <input type="text" name="email" size="45" maxlength="45" value="<?php echo $get_email ?>" required/> 

	</span>

	<br/><br/>

	Data Nasc.: <input type="text" name="dataNasc" size="11" maxlength="10" placeholder="dd-mm-aaaa" value="<?php echo $get_dataNasc ?>" 			required/> 

	<span style="padding-left:52px">

	Sexo: <input type="radio" value="Masculino" name="sexo" checked="checked" required/> M 
      	  <input type="radio" value="Feminino" name="sexo" required/> F  

	</span>

	<span style="padding-left:50px">

	Nome da Mãe: <input type="text" name="mae" size="45" maxlength="45" value="<?php echo $get_mae ?>" required/> 
      
	</span>

	<br/><br/>

	Telefone: <input type="text" name="telefone" size="30" maxlength="30" placeholder="(xx) xxxx-xxxx" value="<?php echo $get_telefone ?>" 		required/> 

	<span style="padding-left:193px">

	Cpf: <input type="text" name="cpf" size="14" maxlength="14" placeholder="xxx.xxx.xxx-xx" value="<?php echo $get_cpf ?>" required/> 

	</span>

	<br/><br/>

	Cidade: <input type="text" name="cidade" size="30" maxlength="45" value="<?php echo $get_cidade ?>"  required/> 

	<span style="padding-left:52px">

	UF: <select name="uf" required>
							<option value="<?php echo $get_uf ?>"><?php echo $get_uf ?></option>
                            <option value="AC">AC</option>
                            <option value="AL">AL</option>
                            <option value="AP">AP</option>
                            <option value="AM">AM</option>
                            <option value="BA">BA</option>
                            <option value="CE">CE</option>
                            <option value="DF">DF</option>
                            <option value="ES">ES</option>
                            <option value="GO">GO</option>
                            <option value="MA">MA</option>
                            <option value="MT">MT</option>
                            <option value="MS">MS</option>
                            <option value="MG">MG</option>
                            <option value="PE">PE</option>
                            <option value="PR">PR</option>
                            <option value="PB">PB</option>
                            <option value="PA">PA</option>
                            <option value="PI">PI</option>
                            <option value="RJ">RJ</option>
                            <option value="RN">RN</option>
                            <option value="RS">RS</option>
                            <option value="RO">RO</option>
                            <option value="RR">RR</option>
                            <option value="SC">SC</option>
                            <option value="SP">SP</option>
                            <option value="SE">SE</option>
                            <option value="TO">TO</option>
    </select>     

	</span>

	<span style="padding-left:50px">

	Bairro: <input type="text" name="bairro" size="45" maxlength="45" value="<?php echo $get_bairro ?>" required/> 
      
	</span>

	<br/><br/>

	Logradouro: <input type="text" name="logradouro" size="30" maxlength="30" value="<?php echo $get_logradouro ?>" required/> 

	<span style="padding-left:143px">

	Numero: <input type="text" name="numero" size="15" maxlength="15" value="<?php echo $get_numero ?>" required/> 

	</span>
    
    <span style="padding-left:115px">
    
    <input type="submit" name="Editar" value="Alterar">
    
    </span>
    
    </fieldset>
    
    </form>
</div>

<div id="rodape">

</div>

</div>

</body>
</html>