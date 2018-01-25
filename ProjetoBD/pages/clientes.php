<!DOCTYPE html>
<?php
  include ("../metodo/conectar.php");
  $grupo = selectAllClientes();
?>

<head>
  <meta charset="UTF-8">
  <title>Clientes</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>Lista de Clientes</h1>
</header>

<body>
  <div>
    <div class="box">
      <form name="inserir-cliente" action="../metodo/cliente/inserir-cliente.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Cliente" name="inserir-cliente" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="../metodo/cliente/busca-avancada-cliente.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar-cliente" action="../metodo/cliente/pesquisar-cliente.php" method="POST">
        <input type="text" name="pesquisar-cliente" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
  <table class="responstable">

    <thead>
      <tr>
        <th width="550">Nome</th>
    		<th width="250">País Origem</th>
    		<th width="150">Data Nascimento</th>
    		<th id="thButton">Editar</th>
    		<th id="thButton">Excluir</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $clientes) { ?>
          
        <tr>
          <td><?=$clientes["nome_completo"]?></td>
          <td><?=$clientes["pais"]?></td>
          <td><?=formatoData($clientes["data_nasc"])?></td>
          <td>
            <form name="alterar-cliente" action="../metodo/cliente/alterar-cliente.php" method="POST">
              <input type="hidden" name="cliente_id" value="<?=$clientes["cliente_id"]?>" />
              <input type="submit" value="Editar" name="editar" />  
            </form>
          </td>
          <td>
            <form name="excluir-cliente" action="../metodo/conectar.php" method="POST">
              <input type="hidden" name="cliente_id" value="<?=$clientes["cliente_id"]?>" />
              <input type="hidden" name="acao" value="excluir-cliente" />
              <input type="submit" value="Excluir" name="excluir" />  
            </form>
          </td>
        </tr>

      <?php 
      } ?>
      
    </tbody>
  </table>
    
  <?php
    function formatoData($data) {
      $array = explode("-", $data);
      $novaData = $array[2]."/".$array[1]."/".$array[0];
      return $novaData;
    }
  ?>
</body>

</html>
