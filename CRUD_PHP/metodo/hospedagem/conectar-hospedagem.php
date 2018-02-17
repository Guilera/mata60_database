<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_hospedagem();
		}
		else if ($_POST["acao"]=="alterar-hospedagem") {
			alterar_hospedagem();
		}
		else if ($_POST["acao"]=="pesquisar-hospedagem") {
			pesquisar_hospedagens();
		}
		else if ($_POST["acao"]=="excluir-hospedagem") {
			excluir_hospedagem();
		}
		else if ($_POST["acao"]=="busca-avancada-hospedagem") {
			excluir_hospedagem();
		}
		else if ($_POST["acao"]=="Cancelar") {
			voltarhospedagens();
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

 	function inserir_hospedagem(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO hospedagens (nome,tipo,descricao,valor_diaria,logradouro,bairro,numero,usuario_id,cidade_id)"
	 		   . "VALUES ('{$_POST["nome"]}','{$_POST["tipo"]}','{$_POST["descricao"]}','{$_POST["valor_diaria"]}',"
	 		   . "'{$_POST["logradouro"]}','{$_POST["bairro"]}','{$_POST["numero"]}','{$_POST["userid"]}',"
	 		   . "'{$_POST["cityid"]}')";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarhospedagens();
	}

	function alterar_hospedagem(){
		$banco = abrirBanco();
		$sql = "UPDATE hospedagens SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarhospedagens();
	}

	function pesquisar_hospedagens($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM hospedagens WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT hospedagens.usuario_id,hospedagens.nome_completo,"
			   . " hospedagens.pais,hospedagens.data_nasc,usuarios.username"
			   . " FROM hospedagens"
			   . " INNER JOIN usuarios ON hospedagens.usuario_id = usuarios.usuario_id"
			   . " WHERE hospedagens.nome_completo LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	}

	function excluir_hospedagem(){
		$banco = abrirBanco();
		$sql = "DELETE FROM hospedagens WHERE usuario_id='{$_POST["usuario_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarhospedagens();
	}

	function selectAllHospedagens(){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM hospedagens ORDER BY nome";
		$sql = "SELECT hospedagens.nome,hospedagens.tipo,hospedagens.descricao,hospedagens.valor_diaria,"
			   . " hospedagens.logradouro,hospedagens.bairro,hospedagens.numero,hospedagens.usuario_id,"
			   . " hospedagens.cidade_id,anunciantes.nome_fantasia,anunciantes.usuario_id,cidades.nome as cidnome"
			   . " FROM hospedagens"
			   . " INNER JOIN anunciantes ON hospedagens.usuario_id = anunciantes.usuario_id"
			   . " INNER JOIN cidades ON hospedagens.cidade_id = cidades.cidade_id"
			   . " ORDER BY hospedagens.nome";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdHospedagem($hospedagem_id){
		$banco = abrirBanco();
		$sql = "SELECT hospedagens.nome,hospedagens.tipo,hospedagens.descricao,"
		   . " hospedagens.valor_diaria,hospedagens.logradouro,hospedagens.bairro,"
		   . " hospedagens.numero,hospedagens.usuario_id,hospedagens.cidade_id,anunciantes.nome,"
		   . " anunciantes.usuario_id,cidades.cidade_id"
		   . " FROM hospedagens"
		   . " INNER JOIN anunciantes ON hospedagens.usuario_id = anunciantes.usuario_id"
		   . " WHERE anunciantes.usuario_id=".$hospedagem_id." INNER JOIN cidades ON hospedagens.cidade_id = cidades.cidade_id";
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function getNomeAnunciantes(){
		$banco = abrirBanco();
		$sql = "SELECT nome_fantasia,usuario_id FROM anunciantes";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function getNomeCidades(){
		$banco = abrirBanco();
		$sql = "SELECT nome,cidade_id FROM cidades";
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

	function voltarhospedagens(){
		header("location: ../../pages/hospedagens.php");
	}