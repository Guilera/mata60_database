<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_cidade();
		}
		else if ($_POST["acao"]=="alterar-cidade") {
			alterar_cidade();
		}
		else if ($_POST["acao"]=="pesquisar-cidade") {
			pesquisar_cidades();
		}
		else if ($_POST["acao"]=="excluir-cidade") {
			excluir_cidade();
		}
		else if ($_POST["acao"]=="busca-avancada-cidade") {
			excluir_cidade();
		}
		else if ($_POST["acao"]=="Cancelar") {
			voltarcidades();
		}
		//else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","root","teste123","turismo");
		return $conexao;
	}

 	function inserir_cidade(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO cidades (nome, uf_id)"
	 			. " VALUES ('{$_POST["nome"]}','{$_POST["ufid"]}')";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarcidades();
	}

	function alterar_cidade(){
		$banco = abrirBanco();
		$sql = "UPDATE usuarios SET username='{$_POST["username"]}' WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$sql = "UPDATE cidades SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarcidades();
	}

	function pesquisar_cidades($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM cidades WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT cidades.usuario_id,cidades.nome_completo,"
			   . " cidades.pais,cidades.data_nasc,usuarios.username"
			   . " FROM cidades"
			   . " INNER JOIN usuarios ON cidades.usuario_id = usuarios.usuario_id"
			   . " WHERE cidades.nome_completo LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	 }

	function excluir_cidade(){
		$banco = abrirBanco();
		$sql = "DELETE FROM cidades WHERE cidade_id='{$_POST["cidade_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarcidades();
	}

	function selectAllCidades(){
		$banco = abrirBanco();
		$sql = "SELECT cidades.cidade_id,cidades.nome,ufs.nome as ufnome FROM cidades"
			   . " INNER JOIN ufs USING (uf_id) ORDER BY ufnome,cidades.nome";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdcidade($usuario_id){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM cidades WHERE usuario_id=".$usuario_id;
		$sql = "SELECT cidades.usuario_id,cidades.nome_completo,"
			   . " cidades.pais,cidades.data_nasc,usuarios.username,usuarios.senha"
			   . " FROM cidades"
			   . " INNER JOIN ufs ON cidades.usuario_id = usuarios.usuario_id"
			   . " WHERE cidades.usuario_id=".$usuario_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function getNomeUFs(){
		$banco = abrirBanco();
		$sql = "SELECT nome,uf_id FROM ufs";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltarcidades(){
		header("location: ../../pages/cidades.php");
	}