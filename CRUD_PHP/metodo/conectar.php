<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="inserir-cliente") {
			inserir_cliente2();
		}
		if ($_POST["acao"]=="alterar-cliente") {
			alterar_cliente();
		}
		if ($_POST["acao"]=="pesquisar-cliente") {
			pesquisar_clientes();
		}
		if ($_POST["acao"]=="excluir-cliente") {
			excluir_cliente();
		}
		else voltarIndex();

	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","root","teste123","turismo");
		return $conexao;
	}

	function inserir_cliente(){
		$banco = abrirBanco();
		$sql = "INSERT INTO clientes (nome_completo, pais, data_nasc)"
				. " VALUES ('{$_POST["nome_completo"]}','{$_POST["pais"]}','{$_POST["data_nasc"]}')";
		$banco->query($sql);
		$banco->close();
		voltarClientes();
	}

 	function inserir_cliente2(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO pessoas values ()";
	 	$banco->query($sql);
	 	$sql = "INSERT INTO clientes (nome_completo, pais, data_nasc, pessoa_id)"
	 			. " VALUES ('{$_POST["nome_completo"]}','{$_POST["pais"]}','{$_POST["data_nasc"]}', LAST_INSERT_ID())";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarClientes();
	 }

	function alterar_cliente(){
		$banco = abrirBanco();
		$sql = "UPDATE clientes SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE pessoa_id='{$_POST["pessoa_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarClientes();
	}

	 function pesquisar_clientes($valor_pesquisar){
	 	$banco = abrirBanco();
	 	$sql = "SELECT * FROM clientes WHERE nome_completo LIKE '%$valor_pesquisar%'";
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

	function pesquisarPessoasAvancado($nome, $nascimento, $telefone, $endereco){
		$banco = abrirBanco();
		if(!empty($nome)) {
			$sql = "SELECT * FROM pessoa WHERE nome LIKE '%$nome%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($nascimento)) {
			$sql = "SELECT * FROM pessoa WHERE nascimento LIKE '%$nascimento%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($telefone)) {
			$sql = "SELECT * FROM pessoa WHERE telefone LIKE '%$telefone%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($endereco)) {
			$sql = "SELECT * FROM pessoa WHERE endereco LIKE '%$endereco%'";
			$resultado = $banco->query($sql);
		}
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function excluir_cliente(){
		$banco = abrirBanco();
		$sql = "DELETE FROM clientes WHERE pessoa_id='{$_POST["pessoa_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarClientes();
	}

	function selectAllClientes(){
		$banco = abrirBanco();
		$sql = "SELECT * FROM clientes ORDER BY nome_completo";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectAllAnunciantes(){
		$banco = abrirBanco();
		$sql = "SELECT * FROM anunciantes ORDER BY nome_completo";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdCliente($pessoa_id){
		$banco = abrirBanco();
		$sql = "SELECT * FROM clientes WHERE pessoa_id=".$pessoa_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltarClientes(){
		header("location: ../pages/clientes.php");
	}