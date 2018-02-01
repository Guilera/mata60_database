<?php
  include ("conectar.php");
  $valor_nome = $_POST['pesquisar'];
  $valor_nascimento = $_POST['pesquisar'];
  $valor_telefone = $_POST['pesquisar'];
  $valor_endereco = $_POST['pesquisar'];

  $grupo = pesquisarPessoasAvancado($valor_nome,$valor_nascimento,$valor_telefone,$valor_endereco);
?>

<h1>Busca Avançada<br></h1>
<meta charset="utf-8">
<form name="dadosPessoa" action="conectar.php" method="POST">
	<table>
		<tbody>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" value="<?=$pessoa["nome"]?>" maxlength="20" size="15" /></td>
			</tr>
			<tr>
				<td>Nascimento:</td>
				<td><input type="text" name="nascimento" value="<?=$pessoa["nascimento"]?>" maxlength="10" size="15" /></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" value="<?=$pessoa["telefone"]?>" maxlength="20" size="15"/></td>
			</tr>
			<tr>
				<td>Endereco:</td>
				<td><input type="text" name="endereco" value="<?=$pessoa["endereco"]?>" maxlength="20" size="15"/></td>
			</tr>

			<tr style="display: inline-block;">
				<td><input type="hidden" name="acao" value="buscaavancada" />
					<input type="hidden" name="id_pessoa" value="<?=$pessoa["id_pessoa"]?>" />
				</td>
				<td><input type="submit" value="Buscar" name="Buscar" /></td>
				<td><input type="submit" action="../index.php" value="Cancelar" /></td>
			</tr>
		</tbody>
	</table>	
</form>