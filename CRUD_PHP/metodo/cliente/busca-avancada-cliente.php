<?php
  include ("conectar-cliente.php");
  $valor_buscar = $_POST['busca-avancada-cliente'];
  $grupo = pesquisarClientesAvancado();
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
<form name="dadosPessoa" action="conectar-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>Dia do Nascimento:</td>
				<td><input type="number" min="1" max="31" name="dia-nasc" /></td>
			</tr>
			<tr>
				<td>Mês do Nascimento:</td>
				<td><input type="number" min="1" max="12" name="mes-nasc" /></td>
			</tr>
			<tr>
				<td>Ano do Nascimento:</td>
				<td><input type="number" min="1900" max="2030" name="ano-nasc" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" maxlength="20" size="15"/></td>
			</tr>
			<tr>
				<td>Endereco:</td>
				<td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" maxlength="20" size="15"/></td>
			</tr>

			<tr style="display: inline-block;">
				<td><input type="submit" name="acao" value="Busca Avancada" /></td>
				<td><input type="submit" name="acao" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>