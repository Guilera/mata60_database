<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_anunciante();
		}
		else if ($_POST["acao"]=="alterar-anunciante") {
			alterar_anunciante();
		}
		else if ($_POST["acao"]=="pesquisar-anunciante") {
			pesquisar_anunciantes();
		}
		else if ($_POST["acao"]=="excluir-anunciante") {
			excluir_anunciante();
		}
		else if ($_POST["acao"]=="busca-avancada-anunciante") {
			excluir_anunciante();
		}
		else if ($_POST["acao"]=="Cancelar") {
			voltaranunciantes();
		}
		//else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","root","teste123","turismo");
		return $conexao;
	}

 	function inserir_anunciante(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO usuarios (username,senha,tipo) values ('{$_POST["username"]}','{$_POST["senha"]}',2)";
	 	$banco->query($sql);
	 	$sql = "INSERT INTO anunciantes (nome_fantasia,cnpj,tipo_de_servico,homepage,telefone,usuario_id)"
	 			. " VALUES ('{$_POST["nome_fantasia"]}','{$_POST["cnpj"]}','{$_POST["tipo_de_servico"]}',"
	 			. " '{$_POST["homepage"]}','{$_POST["telefone"]}',LAST_INSERT_ID())";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltaranunciantes();
	}

	function alterar_anunciante(){
		$banco = abrirBanco();
		$sql = "UPDATE usuarios SET username='{$_POST["username"]}' WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$sql = "UPDATE anunciantes SET nome_fantasia='{$_POST["nome_fantasia"]}',"
			." cnpj='{$_POST["cnpj"]}',tipo_de_servico='{$_POST["tipo_de_servico"]}', homepage='{$_POST["homepage"]}',"
			." telefone='{$_POST["telefone"]}'"
			." WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltaranunciantes();
	}

	function pesquisar_anunciantes($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM anunciantes WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT anunciantes.usuario_id,anunciantes.nome_fantasia,"
			   . " anunciantes.cnpj,anunciantes.tipo_de_servico,"
			   . " anunciantes.homepage,anunciantes.telefone,usuarios.username"
			   . " FROM anunciantes"
			   . " INNER JOIN usuarios ON anunciantes.usuario_id = usuarios.usuario_id"
			   . " WHERE anunciantes.nome_fantasia LIKE '%$valor_pesquisar%'"
			   . " OR username LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	 }

	function excluir_anunciante(){
		$banco = abrirBanco();
		$sql = "DELETE FROM anunciantes WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltaranunciantes();
	}

	function selectAllanunciantes(){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM anunciantes order by nome_completo";
		$sql = "SELECT anunciantes.usuario_id,anunciantes.nome_fantasia,"
			   . " anunciantes.cnpj,anunciantes.tipo_de_servico,"
			   . " anunciantes.homepage,anunciantes.telefone,usuarios.username"
			   . " FROM anunciantes"
			   . " INNER JOIN usuarios ON anunciantes.usuario_id = usuarios.usuario_id"
			   . " ORDER BY anunciantes.nome_fantasia";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdAnunciante($usuario_id){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM anunciantes WHERE usuario_id=".$usuario_id;
		$sql = "SELECT anunciantes.usuario_id,anunciantes.nome_fantasia,"
			   . " anunciantes.cnpj,anunciantes.tipo_de_servico,"
			   . " anunciantes.homepage,anunciantes.telefone,usuarios.username,usuarios.senha"
			   . " FROM anunciantes"
			   . " INNER JOIN usuarios ON anunciantes.usuario_id = usuarios.usuario_id"
			   . " WHERE anunciantes.usuario_id=".$usuario_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltaranunciantes(){
		header("location: ../../pages/anunciantes.php");
	}