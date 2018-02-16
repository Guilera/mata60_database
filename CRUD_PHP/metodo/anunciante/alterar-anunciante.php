<?php
	include("conectar-anunciante.php");
	$anunciantes = selectIdAnunciante($_POST["usuario_id"]);
	//var_dump($pessoa);
?>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-anunciante.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Business Name:</td>
				<td><input type="text" name="nome_fantasia" value="<?=$anunciantes["nome_fantasia"]?>" /></td>
			</tr>
			<tr>
				<td>Username:</td>
				<td><input type="text" name="username" value="<?=$anunciantes["username"]?>" /></td>
			</tr>
			<tr>
				<td>CNPJ:</td>
				<td><input type="text" name="cnpj" value="<?=$anunciantes["cnpj"]?>" /></td>
			</tr>
			<tr>
				<td>Service:</td>
				<td><input type="text" name="tipo_de_servico" value="<?=$anunciantes["tipo_de_servico"]?>" /></td>
			</tr>
			<tr>
				<td>Homepage:</td>
				<td><input type="text" name="homepage" value="<?=$anunciantes["homepage"]?>" /></td>
			</tr>
			<tr>
				<td>Phone:</td>
				<td><input type="text" name="telefone" value="<?=$anunciantes["telefone"]?>" /></td>
			</tr>
			<tr>
				<td><input type="hidden" name="acao" value="alterar-anunciante" />
				<input type="hidden" name="usuario_id" value="<?=$anunciantes["usuario_id"]?>" />
				</td>
				<td><input type="submit" value="Atualizar" name="Atualizar" /></td>
			</tr>
		</tbody>
	</table>	
</form>