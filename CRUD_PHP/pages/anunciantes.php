<!DOCTYPE html>
<?php
  include ("../metodo/anunciante/conectar-anunciante.php");
  $grupo = selectAllAnunciantes();
?>

<head>
  <meta charset="UTF-8">
  <title>Anunciantes</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>LIsta de Anunciantes</h1>
</header>

<body>
  <div>
    <div class="box">
      <form name="inserir-anunciante" action="../metodo/anunciante/inserir-anunciante.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Anunciante" name="inserir-anunciante" /> 
     </form>
    </div>
    <div class="box">
     <form name="inserir" action="../metodo/anunciante/busca-avancada-anunciante.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar-anunciante" action="../metodo/anunciante/pesquisar-anunciante.php" method="POST">
        <input type="text" name="pesquisar-anunciante" maxlength="20" size="15" placeholder="Quick Search...">
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </div>
  </div>
  
  <table class="responstable">

    <thead>
      <tr>
        <th width="160">Nome Fantasia</th>
        <th width="130">USuário</th>
        <th width="150">CNPJ</th>
        <th width="140">Serviço</th>
        <th width="140">Homepage</th>
        <th width="100">Telefone</th>
        <th width="8"></th>
        <th width="8"></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $anunciantes) { ?>
          
        <tr>
          <td><?=$anunciantes["nome_fantasia"]?></td>
          <td><?=$anunciantes["username"]?></td>
          <td><?=$anunciantes["cnpj"]?></td>
          <td><?=$anunciantes["tipo_de_servico"]?></td>
          <td><?=$anunciantes["homepage"]?></td>
          <td><?=$anunciantes["telefone"]?></td>
          <td>
            <form name="alterar-anunciante" action="../metodo/anunciante/alterar-anunciante.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$anunciantes["usuario_id"]?>" />
              <input type="image" width="30" src="../imgs/i-editar.png">
              <!--<input type="submit" value="Editar" name="editar" />-->
            </form>
          </td>
          <td>
            <form name="excluir-anunciante" action="../metodo/anunciante/conectar-anunciante.php" method="POST">
              <input type="hidden" name="usuario_id" value="<?=$anunciantes["usuario_id"]?>" />
              <input type="hidden" name="acao" value="excluir-anunciante" />
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
