<?php
	
?>
<h1>Adicionar Anunciante<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-anunciante.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome Fantasia:</td>
				<td><input type="text" name="nome_fantasia" value="" /></td>
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
				<td>CNPJ:</td>
				<td><input type="text" name="cnpj" value="" /></td>
			</tr>
			<tr>
				<td>Serviço:</td>
				<td><input type="text" name="tipo_de_servico" value="" /></td>
			</tr>
			<tr>
				<td>Homepage:</td>
				<td><input type="text" name="homepage" value="" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="" /></td>
			</tr>
			<tr style="display: inline-block;">
				<td><input type="submit" name="acao" value="Criar" /></td>
				<td><input type="submit" name="acao" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>