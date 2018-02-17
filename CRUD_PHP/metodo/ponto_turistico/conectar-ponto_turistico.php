<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_ponto_turistico();
		}
		else if ($_POST["acao"]=="Atualizar") {
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
		//else voltarIndex();
	}

	function abrirBanco(){
		$conexao = new mysqli("localhost","admin","admin_turismo","turismo");
		if(false === mysqli_set_charset($conexao, "utf8")){
			echo "<script> alert('bug no charset');</script>";
    	}
		return $conexao;
	}

 	function inserir_ponto_turistico(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO pontos_turisticos (nome, tipo, descricao, logradouro, bairro, cidade_id)"
	 			. " VALUES ('{$_POST["nome"]}','{$_POST["tipo"]}','{$_POST["descricao"]}','{$_POST["logradouro"]}',"
	 			. "'{$_POST["bairro"]}','{$_POST["cidid"]}')";
	 	$banco->query($sql);
	 	$banco->close();
	 	voltarpontos_turisticos();
	}

	function alterar_ponto_turistico(){
		$banco = abrirBanco();
		$sql = "UPDATE pontos_turisticos SET nome='{$_POST["nome"]}',tipo='{$_POST["tipo"]}',"
				." descricao='{$_POST["descricao"]}', logradouro='{$_POST["logradouro"]}',"
				. "bairro='{$_POST["bairro"]}',cidade_id='{$_POST["cidid"]}'"
				." WHERE ponto_turistico_id='{$_POST["ponto_turistico_id"]}'";
		$banco->query($sql);
		$banco->close();
		voltarpontos_turisticos();
	}

	function pesquisar_pontos_turisticos($valor_pesquisar){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM pontos_turisticos WHERE nome_completo LIKE '%$valor_pesquisar%'";
		$sql = "SELECT ponto_turistico_id,pontos_turisticos.nome,tipo,descricao,logradouro,"
			   . " bairro, pontos_turisticos.cidade_id,cidades.cidade_id,cidades.nome as cidnome"
			   . " FROM pontos_turisticos"
			   . " INNER JOIN cidades USING (cidade_id)"
			   . " WHERE pontos_turisticos.nome LIKE '%$valor_pesquisar%'"
			   . " OR tipo LIKE '%$valor_pesquisar%'";
	 	$resultado = $banco->query($sql);
	 	$banco->close();
	 	while ($row = mysqli_fetch_array($resultado)) {
	 		$grupo[] = $row;
	 	}
	 	return $grupo;
	 }

	function excluir_ponto_turistico(){
		$banco = abrirBanco();
		$sql = "DELETE FROM pontos_turisticos WHERE ponto_turistico_id='{$_POST["ponto_turistico_id"]}'";
		$ok = $banco->query($sql);
		if(!$ok){ ?>
			<script type="text/javascript">
				alert('Não foi possivel deletar\n' + '<?php echo $banco->error; ?>');
				location = "../../pages/pontos_turisticos.php";
			</script>
			<?php
			$banco->close();
		} else {
			$banco->close();
			voltarpontos_turisticos();
		}
	}

	function selectAllPontos_Turisticos(){
		$banco = abrirBanco();
		$sql = "SELECT ponto_turistico_id,pontos_turisticos.nome,tipo,descricao,"
				. "logradouro,bairro,pontos_turisticos.cidade_id,cidades.cidade_id,"
				. "cidades.nome AS cidnome FROM pontos_turisticos"
				. " INNER JOIN cidades USING (cidade_id) ORDER BY pontos_turisticos.nome, bairro";
		$resultado = $banco->query($sql);
		$banco->close();
		while ($row = mysqli_fetch_array($resultado)) {
			$grupo[] = $row;
		}
		return $grupo;
	}

	function selectIdPonto_Turistico($ponto_turistico_id){
		$banco = abrirBanco();
		//$sql = "SELECT * FROM pontos_turisticos WHERE usuario_id=".$usuario_id;
		$sql = "SELECT * FROM pontos_turisticos WHERE ponto_turistico_id=".$ponto_turistico_id;
		//$sql = "SELECT pontos_turisticos.usuario_id,pontos_turisticos.nome_completo,"
		//	   . " pontos_turisticos.pais,pontos_turisticos.data_nasc,usuarios.username,usuarios.senha"
		//	   . " FROM pontos_turisticos"
		//	   . " INNER JOIN ufs ON pontos_turisticos.usuario_id = usuarios.usuario_id"
		//	   . " WHERE pontos_turisticos.usuario_id=".$ponto_turistico_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$pessoa = mysqli_fetch_assoc($resultado);
		return $pessoa;
	}

	function getNomeCidades(){
		$banco = abrirBanco();
		$sql = "SELECT nome,cidade_id FROM cidades ORDER BY nome";
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

	function voltarpontos_turisticos(){
		header("location: ../../pages/pontos_turisticos.php");
	}