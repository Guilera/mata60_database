<?php
	
?>
<h1>Adicionar Cliente<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-cliente.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome completo:</td>
				<td><input type="text" name="nome_completo" value="" required /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="username" value="" required /></td>
			</tr>
			<tr>
				<td>Senha:</td>
				<td><input type="password" name="senha" value="" required /></td>
			</tr>
			<tr>
				<td>País:</td>
				<td><input type="text" name="pais" value="" required /></td>
			</tr>
			<tr>
				<td>Nascimento:</td>
				<td><input type="date" name="data_nasc" value="" required /></td>
			</tr>
			<tr>
				<td><input type="submit" name="acao" value="Criar" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/clientes.php">
	<input type="submit" value="Cancelar">
</form>