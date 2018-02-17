<?php
	include ("conectar-ponto_turistico.php");
	$grupo = getNomeCidades();
?>
<h1>Adicionar Ponto Turístico<br></h1>
<meta charset="utf-8">
<form name="dadosPTuristico" action="conectar-ponto_turistico.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="" required /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="tipo" value="" required /></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><input type="text" name="descricao" value="" /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="" /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="" /></td>
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
				<td><input type="submit" name="acao" value="Criar" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/pontos_turisticos.php">
	<input type="submit" value="Cancelar">
</form>