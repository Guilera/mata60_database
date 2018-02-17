<?php
	include("conectar-hospedagem.php");
	$hospedagens = selectIdHospedagem($_POST["hospedagem_id"]);
?>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-hospedagem.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$hospedagens["nome"]?>" size="20" /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="tipo" value="<?=$hospedagens["tipo"]?>" /></td>
			</tr>
			<tr>
				<td>Descricao:</td>
				<td><input type="text" name="descricao" value="<?=$hospedagens["descricao"]?>" /></td>
			</tr>
			<tr>
				<td>Valor Diária:</td>
				<td><input type="text" name="valor_diaria" value="<?=$hospedagens["valor_diaria"]?>" /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="<?=$hospedagens["logradouro"]?>" /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="<?=$hospedagens["bairro"]?>" /></td>
			</tr>
			<tr>
				<td>Número:</td>
				<td><input type="text" name="numero" value="<?=$hospedagens["numero"]?>" /></td>
			</tr>
			<tr>
				<td>Usuário:</td>
				<td><input type="text" name="username" value="<?=$hospedagens["username"]?>" /></td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td><input type="text" name="cidade_id" value="<?=$hospedagens["cidade_id"]?>" /></td>
			</tr>
			<tr>
				<td><input type="hidden" name="acao" value="alterar-hospedagem" />
				<input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
				</td>
				<td><input type="submit" value="Atualizar" name="Atualizar" /></td>
			</tr>
		</tbody>
	</table>	
</form>