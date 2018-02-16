<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="inserir-ponto_turistico") {
			inserir_ponto_turistico();
		}
		else if ($_POST["acao"]=="alterar-ponto_turistico") {
			alterar_ponto_turistico();
		}
		else if ($_POST["acao"]=="pesquisar-ponto_turistico") {
			pesquisar_pontos_turisticos();
		}
		else if ($_POST["acao"]=="excluir-ponto_turistico") {
			excluir_ponto_turistico();
		}
		else if ($_POST["acao"]=="busca-avancada-ponto_turistico") {
			excluir_ponto_turistico();
		}
		else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","root","teste123","turismo");
		return $conexao;
	}

 	function inserir_ponto_turistico(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO pontos_turisticos (nome_completo, pais, data_nasc, usuario_id)"
	 			. " VALUES ('{$_POST["nome_completo"]}','{$_POST["pais"]}','{$_POST["data_nasc"]}', LAST_INSERT_ID())";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarpontos_turisticos();
	}

	function inserir_varios_pontos_turisticos($valor){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM pontos_turisticos WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "'%$valor%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 }

	function alterar_ponto_turistico(){
		$banco = abrirBanco();
		$sql = "UPDATE usuarios SET username='{$_POST["username"]}' WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$sql = "UPDATE pontos_turisticos SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarpontos_turisticos();
	}

	function pesquisar_pontos_turisticos($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM pontos_turisticos WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT pontos_turisticos.usuario_id,pontos_turisticos.nome_completo,"
			   . " pontos_turisticos.pais,pontos_turisticos.data_nasc,usuarios.username"
			   . " FROM pontos_turisticos"
			   . " INNER JOIN usuarios ON pontos_turisticos.usuario_id = usuarios.usuario_id"
			   . " WHERE pontos_turisticos.nome_completo LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	 }

	// Nao funcionando:
	//function pesquisarPessoas($valor_pesquisar){
	//	$banco = abrirBanco();
	//	$sql = "SELECT * FROM pessoa LIKE '%$valor_pesquisar%'";
	//	$resultado1 = $banco->query($sql);
	//	$sql = "SELECT * FROM pessoa WHERE nascimento LIKE '%$valor_pesquisar%'";
	//	$resultado2 = $banco->query($sql);
	//	$sql = "SELECT * FROM pessoa WHERE telefone LIKE '%$valor_pesquisar%'";
	//	$resultado3 = $banco->query($sql);
	//	$sql = "SELECT * FROM pessoa WHERE endereco LIKE '%$valor_pesquisar%'";
	//	$resultado4 = $banco->query($sql);
	//	$banco->close();
	//	while ($row = mysqli_fetch_array($resultado1)) {
	//		$grupo[] = $row;
	//	}
	//	while ($row = mysqli_fetch_array($resultado2)) {
	//		$grupo[] = $row;
	//	}
	//	while ($row = mysqli_fetch_array($resultado3)) {
	//		$grupo[] = $row;
	//	}
	//	while ($row = mysqli_fetch_array($resultado4)) {
	//		$grupo[] = $row;
	//	}
	//	return $grupo;
	//}

	function pesquisarpontos_turisticosAvancado($nome, $nascimento, $telefone, $endereco){
		$banco = abrirBanco();
		if(!empty($nome)) {
			$sql = "SELECT * FROM pontos_turisticos WHERE nome LIKE '%$nome%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($nascimento)) {
			$sql = "SELECT * FROM pontos_turisticos WHERE nascimento LIKE '%$nascimento%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($telefone)) {
			$sql = "SELECT * FROM pontos_turisticos WHERE telefone LIKE '%$telefone%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($endereco)) {
			$sql = "SELECT * FROM pontos_turisticos WHERE endereco LIKE '%$endereco%'";
			$resultado = $banco->query($sql);
		}
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function excluir_ponto_turistico(){
		$banco = abrirBanco();
		$sql = "DELETE FROM pontos_turisticos WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarpontos_turisticos();
	}

	function selectAllPontos_Turisticos(){
		$banco = abrirBanco();
		$sql = "SELECT pontos_turisticos.nome, tipo,descricao,logradouro,bairro,"
				. "cidades.nome AS cidnome FROM pontos_turisticos"
				. " INNER JOIN cidades USING (cidade_id) ORDER BY cidades.nome, bairro";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdponto_turistico($usuario_id){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM pontos_turisticos WHERE usuario_id=".$usuario_id;
		$sql = "SELECT pontos_turisticos.usuario_id,pontos_turisticos.nome_completo,"
			   . " pontos_turisticos.pais,pontos_turisticos.data_nasc,usuarios.username,usuarios.senha"
			   . " FROM pontos_turisticos"
			   . " INNER JOIN ufs ON pontos_turisticos.usuario_id = usuarios.usuario_id"
			   . " WHERE pontos_turisticos.usuario_id=".$usuario_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltarpontos_turisticos(){
		header("location: ../../pages/pontos_turisticos.php");
	}