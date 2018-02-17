<?php
	include ("conectar-hospedagem.php");
	$grupo1 = getNomeAnunciantes();
	$grupo2 = getNomeCidades();
?>

<h1>Adicionar Hospedagem<br></h1>
<meta charset="utf-8">
<form name="dadosHosped" action="conectar-hospedagem.php" method="POST">
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
				<td><input type="text" name="descricao" value="" required /></td>
			</tr>
			<tr>
				<td>Valor Diária:</td>
				<td><input type="text" name="valor_diaria" value="" required /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="" required /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="" required /></td>
			</tr>
			<tr>
				<td>Número:</td>
				<td><input type="text" name="numero" value="" required /></td>
			</tr>
			<tr>
				<td>Anunciante:</td>
				<td>
					<select name="userid">
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
					<select name="cityid">
						<?php foreach ($grupo2 as $cidades) { ?>
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
<form action="../../pages/hospedagens.php">
	<input type="submit" value="Cancelar">
</form>