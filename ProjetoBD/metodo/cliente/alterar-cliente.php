<?php
	include("../conectar.php");
	$clientes = selectIdCliente($_POST["pessoa_id"]);
	//var_dump($pessoa);
?>
<meta charset="utf-8">
<form name="dadosPessoa" action="../conectar.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome_completo" value="<?=$clientes["nome_completo"]?>" size="20" /></td>
			</tr>
			<tr>
				<td>País:</td>
				<td><input type="text" name="pais" value="<?=$clientes["pais"]?>" size="20"/></td>
			</tr>
			<tr>
				<td>Nascimento:</td>
				<td><input type="date" name="data_nasc" value="<?=$clientes["data_nasc"]?>" /></td>
			</tr>
			<tr>
				<td><input type="hidden" name="acao" value="alterar-cliente" />
				<input type="hidden" name="pessoa_id" value="<?=$clientes["pessoa_id"]?>" />
				</td>
				<td><input type="submit" value="Atualizar" name="Atualizar" /></td>
			</tr>
		</tbody>
	</table>	
</form>