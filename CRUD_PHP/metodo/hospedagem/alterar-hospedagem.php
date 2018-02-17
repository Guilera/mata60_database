<?php
	include("conectar-hospedagem.php");
	$hospedagens = selectIdHospedagem($_POST["hospedagem_id"]);
	$grupo1 = getNomeAnunciantes();
	$grupo2 = getNomeCidades();
?>
<meta charset="utf-8">
<form name="dadosHospedagem" action="conectar-hospedagem.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$hospedagens["nome"]?>" required /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="tipo" value="<?=$hospedagens["tipo"]?>" required /></td>
			</tr>
			<tr>
				<td>Descricao:</td>
				<td><input type="text" name="descricao" value="<?=$hospedagens["descricao"]?>" required /></td>
			</tr>
			<tr>
				<td>Valor Diária:</td>
				<td><input type="text" name="valor_diaria" value="<?=$hospedagens["valor_diaria"]?>" required /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="<?=$hospedagens["logradouro"]?>" required /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="<?=$hospedagens["bairro"]?>" required /></td>
			</tr>
			<tr>
				<td>Número:</td>
				<td><input type="text" name="numero" value="<?=$hospedagens["numero"]?>" required /></td>
			</tr>
			<tr>
				<td>Anunciante:</td>
				<td>
					<select name="anuncid">
						<?php foreach ($grupo1 as $anunciantes) { ?>
					    	<option value="<?=$anunciantes["usuario_id"]?>">
					    		<?=$anunciantes["nome_fantasia"]?>
					    	</option>
					    <?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td>
					<select name="cidid">
						<?php foreach ($grupo2 as $cidades) { ?>
					    	<option value="<?=$cidades["cidade_id"]?>">
					    		<?=$cidades["nome"]?>
					    	</option>
					    <?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="hospedagem_id" value="<?=$hospedagens["hospedagem_id"]?>" />
					<input type="submit" name="acao" value="Atualizar" />
				</td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/hospedagens.php">
	<input type="submit" value="Cancelar">
</form>