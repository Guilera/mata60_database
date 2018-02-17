<?php
	
?>
<h1>Adicionar Anunciante<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-anunciante.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome Fantasia:</td>
				<td><input type="text" name="nome_fantasia" value="" required /></td>
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
				<td>CNPJ:</td>
				<td><input type="text" name="cnpj" value="" required /></td>
			</tr>
			<tr>
				<td>Serviço:</td>
				<td><input type="text" name="tipo_de_servico" value="" required /></td>
			</tr>
			<tr>
				<td>Homepage:</td>
				<td><input type="text" name="homepage" value="" required /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="" required /></td>
			</tr>
			<tr>
				<td><input type="submit" name="acao" value="Criar" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/anunciantes.php">
	<input type="submit" value="Cancelar">
</form>