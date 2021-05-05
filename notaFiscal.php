<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NFE</title>
<link href="CSS/estilo.css" rel="stylesheet" type="text/css" />
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

<div id="conteudoNota">

<font color="#F1F2F3">
<?php
  	include "conexao.php";
	error_reporting(0);
?>	
</font>

<center>
 <?php
	$sql_visualizar = mysql_query ("SELECT * FROM venda");
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idvenda = $linha["idvenda"];
			$get_idcliente = $linha["idcliente"];
			$get_valor = $linha["valor"];
	}
  ?>

		<?php
		$idcliente = $get_idcliente;
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
 
 <?php
	$sql_visualizar = mysql_query ("SELECT * FROM item");
	while($linha = mysql_fetch_array($sql_visualizar)){
			$get_idprodutoItem = $linha["idproduto"];
			$get_quantidade = $linha["quantidade"];
	}
  ?>

		<?php
			$idproduto = $get_idprodutoItem;
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
        
                <table border="1" bgcolor="white">
                    
                <tr> 
                    <td colspan="3" width="600px"><font size="1"><b> RECEBEMOS DE SOFTF5 COMERCIO ELETRONIC CNPJ : 09.358.108/0002-06 
                            OS PRODUTOS CONSTANTES DA NOTA FISCAL INDICADA AO LADO</b></font></td>
                    <td rowspan="2"><font size="4"><b> NF-e <br/> N&ordm; <?php echo $get_idvenda ?> </br> S&Eacute;RIE 68 </b></font></td>
                </tr>
                
                <tr>
                    <td valign="top"><font size="2">DATA DO RECEBIMENTO</font></td>
                    <td colspan="2" valign="top"><font size="2">IDENTIFICA&Ccedil;&Atilde;O E ASSINATURA DO RECEBEDOR</font></td>
                </tr>
                
                <tr>
                    <td colspan="4">-----------------------------------------------------------------------------------------------------------------------------------------------------------------------</td>
                </tr>
                
                </table>
                 
                <table border="1" bgcolor="white"> 
                 
                <tr>
                    <td align="center" rowspan="3"><img src="img/nota_fiscal_logo.png"></td>
                    <td colspan="2" width="23%" rowspan="3"><font size="4"><center><b> DANFE </b><br/>
                        <font size="2"> DOCUMENTO AUXILIAR <br/> DA NOTA FISCAL ELETR&Ocirc;NICA </center>
                        &zwnj;&zwnj;&zwnj; 0 - ENTRADA <br/>
                        &zwnj;&zwnj;&zwnj; 1 - SA&Iacute;DA   <br/>
                        <font size="4"><b>&zwnj;&zwnj;&zwnj;&zwnj; N&ordm; <?php echo $get_idvenda ?> <br/>
                        &zwnj;&zwnj;&zwnj; S&Eacute;RIE:68 <br/>
                        &zwnj;&zwnj;&zwnj; FOLHA:1/1 </b></font>
                    </td>
                    <td align="center"><img src="img/codigo_barra.png"></td>
                </tr>
                
                <tr>
                    <td</td>
                    <td><font size="2">Chave de Acesso: </font><br/>
                    <font size="3"><b>3512 0109 3581 0800 0206 5506 8000 3597 2514 0075<b></font>
                    </td>
                </tr>
                
                <tr>
                    <td</td>
                    <td align="center"><font size="2"> Consulta de autenticidade no portal nacional da NF-e 
                        www.nfe.fazenda.gov.br/portal ou no site da Sefaz Autorizadora</font>
                    </td>
                </tr>
                
                </table>
                
                <table bgcolor="#FFFFFF" width="100%">
             
             	<tr> 
                	<td> DESTINAT&Aacute;RIO/REMETENTE </td>
                </tr>
             
             </table>
                                 
              <table border="1" bgcolor="white">
                                    
                <tr> 
                  <td colspan="3" width="60%"> <font size="1"> NOME/RAZ&Atilde;O SOCIAL </font> <br/>
                  <?php echo $get_nome ?></td>
                  <td width="20%"><font size="1"> CNPJ/CPF </font> <br/>
                  <b><?php echo $get_cpf ?></b></td>
                  <td width="5%"><font size="1"> DATA DE EMISS&Atilde;O </font> <br/>
                  17/11/2012</td>
                </tr> 
                
                <tr> 
                  <td colspan="2"><font size="1"> ENDERE&Ccedil;O </font> <br/>
                  <?php echo $get_logradouro ?>, <?php echo $get_numero ?></td>
                  <td><font size="1"> BAIRRO/DISTRITO </font> <br/>
                  <?php echo $get_bairro ?></td>
                  <td><font size="1"> UF </font> <br/>
                  <?php echo $get_uf ?></td>
                  <td><font size="1"> DATA DE SA&Iacute;DA </font> <br/>
                  17/11/2012</td>
                </tr> 
                
              </table>
              
             <table bgcolor="#FFFFFF" width="100%">
             
             	<tr> 
                	<td align="center"> <font size="2"><b>DADOS DOS PRODUTOS/SERVI&Ccedil;OS</b></font> </td>
                </tr>
             
             </table>
                
             <table border="1" bgcolor="white">
                                    
                <tr> 
                    <td align="center"><font size="2">C&oacute;d. Produto</font></td>
                    <td align="center" width="30%"><font size="2">Descri&ccedil;&atilde;o dos Produtos/Servi&ccedil;os</font></td>
                    <td align="center"><font size="2">NCM/SH</font></td>
                    <td align="center"><font size="2">CST</font></td>
                    <td align="center"><font size="2">CFOP</font></td>
                    <td align="center"><font size="2">UN</font></td>
                    <td align="center"><font size="2">Quant.</font></td>
                    <td align="center"><font size="2">V. Unit&aacute;rio</font></td>
                    <td align="center"><font size="2">Valor Total</font></td>
                    <td align="center"><font size="2">Base de C&aacute;lc. ICMS</font></td>
                    <td align="center"><font size="2">Valor ICMS</font></td>
                    <td align="center"><font size="2">Valor IPI</font></td>
                    <td align="center"><font size="2">Aliq. ICMS</font></td>
                    <td align="center"><font size="2">Aliq. IPI</font></td>
                </tr>
                
                <tr> 
                    <td align="center" height="350px" valign="top"><font size="3"><?php echo $get_idproduto ?></font></td>
                    <td valign="top" align="center"><font size="3"><?php echo $get_referencia ?></font></td>
                    <td align="center" valign="top"><font size="3">84713019</font></td>
                    <td align="center" valign="top"><font size="3">260</font></td>
                    <td align="center" valign="top"><font size="3">6108</font></td>
                    <td align="center" valign="top"><font size="3">PC</font></td>
                    <td align="center" valign="top"><font size="3"><?php echo $get_quantidade ?>,000</font></td>
                    <td align="center" valign="top"><font size="3"><?php echo $get_preco ?>,00</font></td>
                    <td align="center" valign="top"><font size="3"><?php echo $get_valor ?>,00</font></td>
                    <td align="center" valign="top"><font size="3">0,00</font></td>
                    <td align="center" valign="top"><font size="3">0,00</font></td>
                    <td align="center" valign="top"><font size="3"></font></td>
                    <td align="center" valign="top"><font size="3">0,00</font></td>
                    <td align="center" valign="top"><font size="3"></font></td>
                </tr>
                
             </table>
             
             <table bgcolor="#FFFFFF" width="100%">
             
             	<tr> 
                	<td align="center"> <font size="2"><b>DADOS ADICIONAIS</b></font> </td>
                </tr>
             
             </table>
             
            <table border="1" bgcolor="#FFFFFF">
            
                <tr>
                    <td><font size="1"> INFORMA&Ccedil;&Otilde;ES COMPLEMENTARES </font> <br/>
                    <font size="2">PEDIDO NO14157525 IMPOSTO RECOLHIDO POR SUBSTITUICAO-ARTIGO 313A A 
                    313Z20 DO RICMS/00 </font></td>
                    <td width="50%" valign="top"><font size="1"> RESERVADO AO FISCO </font></td>
                </tr>
                 
             </table>

</div>

<div id="rodape">

</div>

</div>


</body>
</html>