<?php
	include("conectar-cidade.php");
	$cidades = selectIdCidade($_POST["cidade_id"]);
	$grupo = getNomeUFs();
?>
<meta charset="utf-8">
<form name="dadosCidade" action="conectar-cidade.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="cidnome" value="<?=$cidades["cidnome"]?>" size="20" required /></td>
			</tr>
			<tr>
				<td>UF:</td>
				<td>
					<select name="ufid">
						<?php foreach ($grupo as $ufs) { ?>
					    	<option value="<?=$ufs["uf_id"]?>">
					    		<?=$ufs["nome"]?>
					    	</option>
					    <?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td>
					<input type="hidden" name="cidade_id" value="<?=$cidades["cidade_id"]?>" />
					<input type="submit" name="acao" value="Atualizar" />
				</td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/cidades.php">
	<input type="submit" value="Cancelar">
</form>