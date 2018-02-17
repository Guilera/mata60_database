<?php
	
?>
<h1>Adicionar Ponto Turístico<br></h1>
<meta charset="utf-8">
<form name="dadosPTuristico" action="conectar-ponto_turistico.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome_completo" value="" /></td>
			</tr>
			<tr>
				<td>Tipo:</td>
				<td><input type="text" name="username" value="" /></td>
			</tr>
			<tr>
				<td>Descrição:</td>
				<td><input type="password" name="senha" value="" /></td>
			</tr>
			<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="pais" value="" /></td>
			</tr>
			<tr>
				<td>Bairro:</td>
				<td><input type="date" name="data_nasc" value="" /></td>
			</tr>
			<tr>
				<td><input type="submit" name="acao" value="Criar" /></td>
			</tr>
		</tbody>
	</table>	
</form>
<form action="../../pages/pturistico.php">
	<input type="submit" value="Cancelar">
</form>