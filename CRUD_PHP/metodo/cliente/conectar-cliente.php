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
		//else if ($_POST["acao"]=="Busca Avancada") {
		//	pesquisarClientesAvancado();
		//}
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

	function pesquisarClientesAvancado($nome,$usuario,$pais,$dianasc,$mesnasc,$anonasc){
	 	$banco = abrirBanco();

	 	//$nome = $_POST["nome"];
	 	//$usuario = $_POST["username"];
	 	//$pais = $_POST["pais"];
	 	//$dianasc = $_POST["dianasc"];
	 	//$mesnasc = $_POST["mesnasc"];
	 	//$anonasc = $_POST["anonasc"];
	 	$count = 0;

	 	$sql = "SELECT * FROM clientes INNER JOIN usuarios USING (usuario_id) WHERE ";
	 	if($nome){$sql .= "nome_completo LIKE '%$nome%'"; $count=$count+1;}
	 	if($usuario){
	 		if($count>0){ $sql .= " AND"; }
	 		$sql .= " username LIKE '%$usuario%'"; $count=$count+1;
	 	}
	 	if($pais){
	 		if($count>0){ $sql .= " AND"; }
	 		$sql .= " pais LIKE '%$pais%'"; $count=$count+1;
	 	}
	 	if($dianasc && $mesnasc && $anonasc){
	 		if($count>0){ $sql .= " AND"; }
	 		$data_nasc = $anonasc."-".$mesnasc."-".$dianasc;
	 		$sql .= " data_nasc LIKE '".$data_nasc."'"; $count=$count+1;
	 	}
	 	elseif ($dianasc && $mesnasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$data_nasc = $mesnasc."-".$dianasc;
	 		$sql .= " data_nasc LIKE '%".$data_nasc."'"; $count=$count+1;
	 	}
	 	elseif ($dianasc && $anonasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$data_nasc = $anonasc."'%".$dianasc;
	 		$sql .= " data_nasc LIKE '".$data_nasc."'"; $count=$count+1;
	 	}
	 	elseif ($mesnasc && $anonasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$data_nasc = $anonasc."-".$mesnasc;
	 		$sql .= " data_nasc LIKE '".$data_nasc."%'"; $count=$count+1;
	 	}
	 	elseif ($dianasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$sql .= " data_nasc LIKE '%".$dianasc."'"; $count=$count+1;
	 	}
	 	elseif ($mesnasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$sql .= " data_nasc LIKE '%".$mesnasc."%'"; $count=$count+1;
	 	}
	 	elseif ($anonasc) {
	 		if($count>0){ $sql .= " AND"; }
	 		$sql .= " AND data_nasc LIKE '".$anonasc."%'"; $count=$count+1;
	 	}	 	
		var_dump($sql);
		$ok = $banco->query($sql);
	 	if(!$ok){ ?>
			<script type="text/javascript">
				alert('Não foi possivel fazer pesquisa avançada de clientes.\n' + '<?php echo $banco->error; ?>');
				location = "../../pages/clientes.php";
			</script>
			<?php
			$banco->close();
		} else {
			$banco->close();
			voltarClientes();
		}

	 	//$ok = $banco->query($sql);
		//$banco->close();
		//voltareventos();
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