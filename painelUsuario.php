<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Painel Usuários</title>
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
<b>PAINEL DO USUÁRIO  </b><img src="img/user.png">
</center>

<form method="post" action="painelUsuario.php?comecar=1">

<fieldset>

<legend>Cadastrar Usuário</legend>

Nome: <input type="text" name="nome" size="45" maxlength="45" required/> 

<span style="padding-left:100px">

Email: <input type="text" name="email" size="45" maxlength="45" required/> 

</span>

<br/><br/>

Login: <input type="text" name="login" size="30" maxlength="30" required/> 

<span style="padding-left:193px">

Senha: <input type="password" name="senha" size="30" maxlength="30" required/> 

</span>

<br/><br/>

Data Nasc.: <input type="text" name="dataNasc" size="11" maxlength="10" placeholder="dd/mm/aaaa" required/> 

<span style="padding-left:52px">

Sexo: <input type="radio" value="M" name="sexo" checked="checked" required/> M 
      <input type="radio" value="F" name="sexo" required/> F  

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

<form method="post" action="painelUsuario.php">

<br/>

<fieldset>

<legend>Buscar por Usuários</legend>

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
		$sql_visualizar = mysql_query ("SELECT * FROM usuario");
	}
	else{
		$sql_visualizar = mysql_query ("SELECT * FROM usuario WHERE nome LIKE '%$gravar_nome%'");
	}
	
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idusuario = $linha["idusuario"];
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
  	<td align="center"><?php echo $get_nome ?></td>
    <td align="center"><?php echo $get_email ?></td>
    <td align="center"><?php echo $get_cpf ?></td>
    <td align="center"><?php echo $get_telefone ?></td>
    <td align="center"><a href="painelUsuario.php?funcao=editar&idusuario=<?php echo $get_idusuario ?>"><font color="#CC0000">Alterar</font></a></td>
    <td align="center"><a href="funcaoUsuario.php?funcao=excluir&idusuario=<?php echo $get_idusuario ?>"><font color="#CC0000">x</font></a></td>
  </tr>
  <?php
	}
  ?>
</table>

<br/>

</center>

	<?php
		$idusuario = $_GET['idusuario'];
		$sql_update = mysql_query("SELECT * FROM usuario WHERE idusuario = '$idusuario'");
		while($linha = mysql_fetch_array($sql_update)){
			$get_idusuario = $linha["idusuario"];
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
		}
    ?>
    
    <br/>
    
	<form method="post" action="funcaoUsuario.php?funcao=editar&idusuario=<?php echo $get_idusuario ?>">
    
    <fieldset>

	<legend>Painel do Usuario: <?php echo $get_nome ?></legend>
    
    Nome: <input type="text" name="nome" size="45" maxlength="45" value="<?php echo $get_nome ?>" required/> 

	<span style="padding-left:100px">

	Email: <input type="text" name="email" size="45" maxlength="45" value="<?php echo $get_email ?>" required/> 

	</span>

	<br/><br/>

	Login: <input type="text" name="login" size="30" maxlength="30" value="<?php echo $get_login ?>" required/> 

	<span style="padding-left:193px">

	Senha: <input type="password" name="senha" size="32" maxlength="32" required/> 

	</span>

	<br/><br/>

	Data Nasc.: <input type="text" name="dataNasc" size="11" maxlength="10" placeholder="dd-mm-aaaa" value="<?php echo $get_dataNasc ?>" 	required/> 

	<span style="padding-left:52px">

	Sexo: <input type="radio" value="M" name="sexo" checked="checked" required/> M 
      	  <input type="radio" value="F" name="sexo" required/> F  

	</span>

	<span style="padding-left:50px">

	Nome da Mãe: <input type="text" name="mae" size="45" maxlength="45" value="<?php echo $get_mae ?>" required/> 
      
	</span>

	<br/><br/>

	Telefone: <input type="text" name="telefone" size="30" maxlength="30" placeholder="(xx) xxxx-xxxx" value="<?php echo $get_telefone?>" 	required/> 

	<span style="padding-left:193px">

	Cpf: <input type="text" name="cpf" size="14" maxlength="14" placeholder="xxx.xxx.xxx-xx" value="<?php echo $get_cpf ?>" required/> 

	</span>

	<br/><br/>

	Cidade: <input type="text" name="cidade" size="30" maxlength="45" value="<?php echo $get_cidade ?>"  required/> 

	<span style="padding-left:52px">

	UF: <select name="uf" required>
							<option value=<?php echo $get_uf ?>><?php echo $get_uf ?></option>
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
    
    <font color="#F1F2F3">
    
    <?php
include "conexao.php";

$gravar_id = $_GET["idusuario"];
$gravar_idusuario = $_GET["idusuario"];
$get_comecar = $_GET["comecar"];
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

if ($get_comecar == ""){
}

else{

$pesquisar = mysql_query("SELECT * FROM usuario WHERE login = ('$get_login')", $db);

$contagem = mysql_num_rows($pesquisar); 

if ( $contagem == 1 ) {
	$errors .= "Login escolhido já cadastrado.";
	echo "<script>alert(' Login já Cadastrado ');</script>";
}

	else if ( $errors == "" ) { //checa se houve ou não erros no cadastro
	
	  $cadastrar = mysql_query("INSERT INTO usuario (nome, dataNasc, sexo, email, login, senha, mae, telefone, cpf,
	 							uf, cidade, bairro, logradouro, numero)
								value ('$get_nome','$get_dataNasc','$get_sexo','$get_email','$get_login','$get_senha','$get_mae',
								'$get_telefone','$get_cpf','$get_uf','$get_cidade','$get_bairro','$get_logradouro','$get_numero')", $db);
								header('Location:painelUsuario.php');
	 
	    if ( $cadastrar == 1 ) {
	      echo "<script>alert(' Cadastro Realizado com Sucesso ');</script>";
	      } else {
	     echo "<script>alert(' Ocorreu um erro no servidor ao tentar se cadastrar. ');</script>";
	  }
	  } else {
	    echo "<script>alert(' Ocorreu os seguintes erros ao tentar se cadastrar:$errors ');</script>";
	}
	
}

?>

</font>
    
</div>

<div id="rodape">

</div>

</div>

</body>
</html>