<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="inserir-evento") {
			inserir_evento();
		}
		else if ($_POST["acao"]=="alterar-evento") {
			alterar_evento();
		}
		else if ($_POST["acao"]=="pesquisar-evento") {
			pesquisar_eventos();
		}
		else if ($_POST["acao"]=="excluir-evento") {
			excluir_evento();
		}
		else if ($_POST["acao"]=="busca-avancada-evento") {
			
		}
		//else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","root","teste123","turismo");
		return $conexao;
	}

 	function inserir_evento(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO eventos (nome_completo, pais, data_nasc, pessoa_id)"
	 			. " VALUES ('{$_POST["nome_completo"]}','{$_POST["pais"]}','{$_POST["data_nasc"]}', LAST_INSERT_ID())";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltareventos();
	}

	function alterar_evento(){
		$banco = abrirBanco();
		$sql = "UPDATE eventos SET nome_completo='{$_POST["nome_completo"]}',"
				." pais='{$_POST["pais"]}', data_nasc='{$_POST["data_nasc"]}'"
				." WHERE pessoa_id='{$_POST["pessoa_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltareventos();
	}

	function pesquisar_eventos($valor_pesquisar){
		$banco = abrirBanco();
		$sql = "SELECT * FROM eventos WHERE nome_completo LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	 }

	function pesquisareventosAvancado($nome, $nascimento, $telefone, $endereco){
		$banco = abrirBanco();
		if(!empty($nome)) {
			$sql = "SELECT * FROM eventos WHERE nome LIKE '%$nome%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($nascimento)) {
			$sql = "SELECT * FROM eventos WHERE nascimento LIKE '%$nascimento%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($telefone)) {
			$sql = "SELECT * FROM eventos WHERE telefone LIKE '%$telefone%'";
			$resultado = $banco->query($sql);
		}
		if(!empty($endereco)) {
			$sql = "SELECT * FROM eventos WHERE endereco LIKE '%$endereco%'";
			$resultado = $banco->query($sql);
		}
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function excluir_evento(){
		$banco = abrirBanco();
		$sql = "DELETE FROM eventos WHERE pessoa_id='{$_POST["pessoa_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltareventos();
	}

	function selectAlleventos(){
		$banco = abrirBanco();
		$sql = "SELECT eventos.nome,tipo,descricao,data_hora,valor,logradouro,eventos.usuario_id,"
			   . " eventos.cidade_id,anunciantes.nome_fantasia as anuncnome,cidades.nome as cidnome"
			   . " FROM eventos INNER JOIN anunciantes USING (usuario_id)"
			   . " INNER JOIN cidades USING (cidade_id) ORDER BY nome";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdevento($evento_id){
		$banco = abrirBanco();
		$sql = "SELECT * FROM eventos WHERE evento_id=".$evento_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function voltarIndex(){
		header("location: ../index.php");
	}

	function voltareventos(){
		header("location: ../../pages/eventos.php");
	}