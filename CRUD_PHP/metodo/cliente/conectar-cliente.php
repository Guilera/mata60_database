<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_cliente();
		}
		else if ($_POST["acao"]=="Atualizar") {
			alterar_cliente();
		}
		else if ($_POST["acao"]=="pesquisar-cliente") {
			pesquisar_clientes();
		}
		else if ($_POST["acao"]=="excluir-cliente") {
			excluir_cliente();
		}
		else if ($_POST["acao"]=="Busca Avancada") {
			pesquisarClientesAvancado();
		}
		//else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","admin","admin_turismo","turismo");
		if(false === mysqli_set_charset($conexao, "utf8")){
			echo "<script> alert('bug no charset');</script>";
    	}
		return $conexao;
	}

 	function inserir_cliente(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO usuarios (username,senha,tipo) values ('{$_POST["username"]}','{$_POST["senha"]}',1)";
	 	$banco->query($sql);
	 	$sql = "INSERT INTO clientes (nome_completo, pais, data_nasc, usuario_id)"
	 			. " VALUES ('{$_POST["nome_completo"]}','{$_POST["pais"]}','{$_POST["data_nasc"]}', LAST_INSERT_ID())";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarClientes();
	}

	function inserir_varios_clientes($valor){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM clientes WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "'%$valor%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 }

	function alterar_cliente(){
		$banco = abrirBanco();
		$sql = "UPDATE usuarios SET username='{$_POST["username"]}' WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$sql = "UPDATE clientes SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarClientes();
	}

	function pesquisar_clientes($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM clientes WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT clientes.usuario_id,clientes.nome_completo,"
			   . " clientes.pais,clientes.data_nasc,usuarios.username"
			   . " FROM clientes"
			   . " INNER JOIN usuarios ON clientes.usuario_id = usuarios.usuario_id"
			   . " WHERE clientes.nome_completo LIKE '%$valor_pesquisar%'";
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

	function pesquisarClientesAvancado($nome, $nascimento, $telefone, $endereco){
		$banco = abrirBanco();
		if(!empty($nome)) {
			$sql = "SELECT * FROM clientes WHERE nome LIKE '%$nome%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($nascimento)) {
			$sql = "SELECT * FROM clientes WHERE nascimento LIKE '%$nascimento%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($telefone)) {
			$sql = "SELECT * FROM clientes WHERE telefone LIKE '%$telefone%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($endereco)) {
			$sql = "SELECT * FROM clientes WHERE endereco LIKE '%$endereco%'";
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
		$sql = "DELETE FROM clientes WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$sql = "DELETE FROM usuarios WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarClientes();
	}

	function selectAllClientes(){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM clientes order by nome_completo";
		$sql = "SELECT clientes.usuario_id,clientes.nome_completo,clientes.pais,clientes.data_nasc,usuarios.username FROM clientes"
			   . " INNER JOIN usuarios ON clientes.usuario_id = usuarios.usuario_id order by clientes.nome_completo";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdCliente($usuario_id){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM clientes WHERE usuario_id=".$usuario_id;
		$sql = "SELECT clientes.usuario_id,clientes.nome_completo,"
			   . " clientes.pais,clientes.data_nasc,usuarios.username,usuarios.senha"
			   . " FROM clientes"
			   . " INNER JOIN usuarios ON clientes.usuario_id = usuarios.usuario_id"
			   . " WHERE clientes.usuario_id=".$usuario_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltarClientes(){
		header("location: ../../pages/clientes.php");
	}