<?php

?>
<head>
	<style type="text/css">
		input[type=number]::-webkit-inner-spin-button { 
		    -webkit-appearance: none;
		    cursor:pointer;
		    display:block;
		    width:3px;
		    color: #333;
		    text-align:center;
		    position:relative;
		    
		}
		input[type=number] { 
		   -moz-appearance: textfield;
		   appearance: textfield;
		   margin: 0;
		}	
	</style>
</head>

<h1>Busca Avançada Clientes<br></h1>
<meta charset="utf-8">
<form name="dadosBAC" action="resposta-busca-avancada-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome_completo" value="" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="username" value="" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>País:</td>
				<td><input type="text" name="pais" value="" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>Dia do Nascimento:</td>
				<td><input type="number" min="1" max="31" name="dianasc" /></td>
			</tr>
			<tr>
				<td>Mês do Nascimento:</td>
				<td><input type="number" min="1" max="12" name="mesnasc" /></td>
			</tr>
			<tr>
				<td>Ano do Nascimento:</td>
				<td><input type="number" min="1000" max="2030" name="anonasc" /></td>
			</tr>
			<tr>
				<td><input type="submit" onclick="JavaScript:return validateForm();" name="acao" value="Busca Avancada" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/clientes.php">
	<input type="submit" value="Cancelar">
</form>

<script type="text/javascript">
	function validateForm() {
		var a=document.forms["dadosBAC"]["nome_completo"].value;
		var b=document.forms["dadosBAC"]["username"].value;
		var c=document.forms["dadosBAC"]["pais"].value;
		var d=document.forms["dadosBAC"]["dianasc"].value;
		var e=document.forms["dadosBAC"]["mesnasc"].value;
		var f=document.forms["dadosBAC"]["anonasc"].value;

		if (a=="" && b=="" && c=="" && d=="" && e=="" && f=="") {
			alert("Por favor, preencha ao menos um campo.");
			return (false);
		}
	}
</script>