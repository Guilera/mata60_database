<?php
	include("conectar-evento.php");
	$eventos = selectIdEvento($_POST["evento_id"]);
	$grupo1 = getNomeAnunciantes();
	$grupo2 = getNomeCidades();
?>
<head>
	<style type="text/css">
		input[type=number]::-webkit-inner-spin-button { 
		    -webkit-appearance: none;
		    cursor:pointer;
		    display:block;
		    width:3px;
		    color: #333;
		    text-align:center;
		    position:relative;
		    
		}
		input[type=number] { 
		   -moz-appearance: textfield;
		   appearance: textfield;
		   margin: 0;
		}	
	</style>
</head>
<meta charset="utf-8">
<form name="dadosEvento" action="conectar-evento.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$eventos["nome"]?>" required /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="tipo" value="<?=$eventos["tipo"]?>" required /></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><input type="text" name="descricao" value="<?=$eventos["descricao"]?>" /></td>
			</tr>
			<tr>
				<td>Data:</td>
				<td><input type="date" name="data" value="<?=$eventos["data"]?>" required /></td>
				<td>Hora:</td>
				<td><input type="time" name="hora" value="<?=$eventos["hora"]?>" required /></td>
			</tr>
			<tr>
				<td>Valor:</td>
				<td><input type="text" name="valor" value="<?=$eventos["valor"]?>" /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" value="<?=$eventos["logradouro"]?>" /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="text" name="bairro" value="<?=$eventos["bairro"]?>" /></td>
			</tr>
			<tr>
				<td>Número:</td>
				<td><input type="number" name="numero" value="<?=$eventos["numero"]?>" /></td>
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
			<tr >
				<td>
					<input type="hidden" name="evento_id" value="<?=$eventos["evento_id"]?>" />
					<input type="submit" name="acao" value="Atualizar" />
				</td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/eventos.php">
	<input type="submit" value="Cancelar">
</form>