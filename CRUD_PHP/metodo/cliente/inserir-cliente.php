<?php
	
?>
<h1>Adicionar Cliente<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome completo:</td>
				<td><input type="text" name="nome_completo" value="" /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="username" value="" /></td>
			</tr>
			<tr>
				<td>Senha:</td>
				<td><input type="password" name="senha" value="" /></td>
			</tr>
			<tr>
				<td>País:</td>
				<td><input type="text" name="pais" value="" /></td>
			</tr>
			<tr>
				<td>Nascimento:</td>
				<td><input type="date" name="data_nasc" value="" /></td>
			</tr>
			<tr style="display: inline-block;">
				<td><input type="submit" name="acao" value="Criar" /></td>
				<td><input type="submit" name="acao" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>