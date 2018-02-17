<?php
	include ("conectar-cidade.php");
	$grupo1 = getNomeUFs();
?>
<h1>Adicionar Cidade<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar-cidade.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="" required /></td>
			</tr>
			<tr>
				<td>UF:</td>
				<!--<td><input type="text" name="ufid" value="1" /></td>-->
				<td>
					<select name="ufid">
						<?php foreach ($grupo1 as $ufs) { ?>
					    	<option value="<?=$ufs["uf_id"]?>">
					    		<?=$ufs["nome"]?>
					    	</option>
					    <?php } ?>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" name="acao" value="Criar" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/cidades.php">
	<input type="submit" value="Cancelar">
</form>