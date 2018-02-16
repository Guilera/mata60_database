<?php
	
?>
<h1>Adicionar Cliente<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Full name:</td>
				<td><input type="text" name="nome_completo" value="" /></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" value="" /></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input type="password" name="senha" value="" /></td>
			</tr>
			<tr>
				<td>Country:</td>
				<td><input type="text" name="pais" value="" /></td>
			</tr>
			<tr>
				<td>Birth:</td>
				<td><input type="date" name="data_nasc" value="" /></td>
			</tr>
			<tr  style="display: inline-block;">
				<td><input type="hidden" name="acao" value="inserir-cliente" /></td>
				<td><input type="submit" value="Criar" name="Criar" /></td>
				<td><input type="submit" action="../../pages/clientes.php" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>