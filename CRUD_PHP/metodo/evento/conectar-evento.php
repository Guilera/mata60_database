<?php
	
	if (isset($_POST["acao"])) {
		if ($_POST["acao"]=="Criar") {
			inserir_evento();
		}
		else if ($_POST["acao"]=="Atualizar") {
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
		$conexao = new mysqli("localhost","admin","admin_turismo","turismo");
		if(false === mysqli_set_charset($conexao, "utf8")){
			echo "<script> alert('bug no charset');</script>";
    	}
		return $conexao;
	}

	function inserir_evento2(){
	 	$banco = abrirBanco();
	 	$sql = "INSERT INTO eventos (nome, tipo, descricao, data_hora, valor, logradouro, bairro, numero,"
	 		   . " usuario_id, cidade_id) VALUES ('{$_POST["nome"]}','{$_POST["tipo"]}',"
	 		   . "'{$_POST["descricao"]}','{$_POST["data"]}"." "."{$_POST["hora"]}".":00'".","
	 		   . "'{$_POST["valor"]}','{$_POST["logradouro"]}','{$_POST["bairro"]}','{$_POST["numero"]}',"
	 		   . "'{$_POST["anuncid"]}','{$_POST["cidid"]}')";
	 	$ok = $banco->query($sql);
		$banco->close();
		voltareventos();
	}

 	function inserir_evento(){
	 	$banco = abrirBanco();

	 	$nome = $_POST["nome"];
	 	$tipo = $_POST["tipo"];
	 	$descricao = $_POST["descricao"];
	 	$data_hora = $_POST["data"]." ".$_POST["hora"].":00";
	 	$valor = $_POST["valor"];
	 	$logradouro = $_POST["logradouro"];
	 	$bairro = $_POST["bairro"];
	 	$numero = $_POST["numero"];

	 	$sql = "INSERT INTO eventos (nome,tipo,";
	 	if($descricao){$sql .= "descricao,";}
	 	$sql .= "data_hora,";
	 	if($valor){$sql .= "valor,";}
	 	if($logradouro){$sql .= "logradouro,";}
	 	if($bairro){$sql .= "bairro,";}
	 	if($numero){$sql .= "numero,";}
	 	$sql .= "usuario_id,cidade_id) VALUES (";
	 	$sql .= "\"".$nome."\"".",\"".$tipo."\",";
	 	if($descricao){$sql .= "\"".$descricao."\",";}
	 	$sql .= "'".$data_hora."',";
	 	if($valor){$sql .= $valor.",";}
	 	if($logradouro){$sql .= "\"".$logradouro."\",";}
	 	if($bairro){$sql .= "\"".$bairro."\",";}
	 	if($numero){$sql .= $numero.",";}
	 	$sql .= $_POST["anuncid"].",";
	 	$sql .= $_POST["cidid"].")";
		//var_dump($sql);

	 	$ok = $banco->query($sql);
		$banco->close();
		voltareventos();
	}

	function alterar_evento(){
		$banco = abrirBanco();
		
		$nome = $_POST["nome"];
	 	$tipo = $_POST["tipo"];
	 	$descricao = $_POST["descricao"];
	 	$data_hora = $_POST["data"]." ".$_POST["hora"].":00";
	 	$valor = $_POST["valor"];
	 	$logradouro = $_POST["logradouro"];
	 	$bairro = $_POST["bairro"];
	 	$numero = $_POST["numero"];

	 	$sql = "UPDATE eventos SET nome=\"".$nome."\",tipo=\"".$tipo."\"";
	 	if($descricao){$sql .= ",descricao=\"".$descricao."\"";}
	 	$sql .= ",data_hora='".$data_hora."'";
	 	if($valor){$sql .= ",valor=".$valor;}
	 	if($logradouro){$sql .= ",logradouro=\"".$logradouro."\"";}
	 	if($bairro){$sql .= ",bairro=\"".$bairro."\"";}
	 	if($numero){$sql .= ",numero=".$numero;}
	 	$sql .= ",usuario_id=".$_POST["anuncid"].",cidade_id=".$_POST["cidid"];
	 	$sql .= " WHERE eventos.evento_id={$_POST["evento_id"]}";
		//var_dump($sql);
		$banco->query($sql);
		$banco->close();
		voltareventos();
	}

	function pesquisar_eventos($valor_pesquisar){
		$banco = abrirBanco();
		$sql = "SELECT * FROM eventos WHERE nome LIKE '%$valor_pesquisar%'"
			   . "OR tipo LIKE '%$valor_pesquisar%'";
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
		$sql = "DELETE FROM eventos WHERE evento_id='{$_POST["evento_id"]}'";
		$ok = $banco->query($sql);
		if(!$ok){ ?>
			<script type="text/javascript">
				alert('Não foi possivel deletar\n' + '<?php echo $banco->error; ?>');
				location = "../../pages/eventos.php";
			</script>
			<?php
			$banco->close();
		} else {
			$banco->close();
			voltareventos();
		}
		//$banco->query($sql);
		//$banco->close();
		//voltareventos();
	}

	function selectAlleventos(){
		$banco = abrirBanco();
		$sql = "SELECT evento_id,eventos.nome,tipo,descricao,data_hora,valor,logradouro,eventos.usuario_id,"
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

	function selectIdEvento($evento_id){
		$banco = abrirBanco();
		$sql = "SELECT * FROM eventos WHERE evento_id=".$evento_id;
		$resultado = $banco->query($sql);
		$banco->close();
		$evento = mysqli_fetch_assoc($resultado);
		return $evento;
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

	function voltareventos(){
		header("location: ../../pages/eventos.php");
	}