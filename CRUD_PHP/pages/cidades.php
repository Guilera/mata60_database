<!DOCTYPE html>
<?php
  include ("../metodo/cidade/conectar-cidade.php");
  $grupo = selectAllCidades();
?>

<head>
  <meta charset="UTF-8">
  <title>Cidades</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>Lista de Cidades</h1>
</header>

<body>
  <div>
    <div class="box">
      <form name="inserir-cidade" action="../metodo/cidade/inserir-cidade.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar cidade" name="inserir-cidade" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="../metodo/cidade/busca-avancada-cidade.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar-cidade" action="../metodo/cidade/pesquisar-cidade.php" method="POST">
        <input type="text" name="pesquisar-cidade" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
  <table class="responstable">

    <thead>
      <tr>
        <th width="300">Nome</th>
        <th width="200">ID Nome</th>
        <th width="300">Unidade Federativa</th>
        <th width="200">ID UF</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $cidades) { ?>
          
        <tr>
          <td><?=utf8_encode($cidades["nome"])?></td>
          <td><?=$cidades["cidade_id"]?></td>
          <td><?=utf8_encode($cidades["ufnome"])?></td>
          <td><?=$cidades["uf_id"]?></td>
          <td>
            <form name="alterar-cidade" action="../metodo/cidade/alterar-cidade.php" method="POST">
              <input type="hidden" name="cidade_id" value="<?=$cidades["cidade_id"]?>" />
              <input type="image" width="30" src="../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-cidade" action="../metodo/cidade/conectar-cidade.php" method="POST">
              <input type="hidden" name="cidade_id" value="<?=$cidades["cidade_id"]?>" />
              <input type="hidden" name="acao" value="excluir-cidade" />
              <input type="image" width="30" src="../imgs/i-excluir.png">
              <!--<input type="submit" value="Excluir" name="excluir" />-->
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
