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

<h1>Busca Avançada<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-anunciante.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome Fantasia:</td>
				<td><input type="text" name="nome" /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="username" /></td>
			</tr>
			<tr>
				<td>CNPJ:</td>
				<td><input type="text" name="cnpj" /></td>
			</tr>
			<tr>
				<td>Homepage:</td>
				<td><input type="text" name="homepage" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" /></td>
			</tr>

			<tr style="display: inline-block;">
				<td><input type="submit" name="acao" value="Busca Avancada" /></td>
				<td><input type="submit" name="acao" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>