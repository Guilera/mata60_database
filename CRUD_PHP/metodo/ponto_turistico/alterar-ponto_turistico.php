<?php
	include("conectar-ponto_turistico.php");
	$pontos_turisticos = selectIdPonto_Turistico($_POST["ponto_turistico_id"]);
	$grupo = getNomeCidades();
?>
<meta charset="utf-8">
<form name="dadosPontoTuristico" action="conectar-ponto_turistico.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$pontos_turisticos["nome"]?>" size="20" /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="tipo" value="<?=$pontos_turisticos["tipo"]?>" size="20" /></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><input type="text" name="descricao" value="<?=$pontos_turisticos["descricao"]?>" size="20" /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="<?=$pontos_turisticos["logradouro"]?>" size="20"/></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="<?=$pontos_turisticos["bairro"]?>" /></td>
			</tr>
			<tr>
				<td>Cidade:</td>
				<td>
					<select name="cidid">
						<?php foreach ($grupo as $cidades) { ?>
					    	<option value="<?=$cidades["cidade_id"]?>">
					    		<?=$cidades["nome"]?>
					    	</option>
					    <?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="ponto_turistico_id" value="<?=$pontos_turisticos["ponto_turistico_id"]?>" />
					<input type="submit" name="acao" value="Atualizar" />
				</td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/pontos_turisticos.php">
	<input type="submit" value="Cancelar">
</form>