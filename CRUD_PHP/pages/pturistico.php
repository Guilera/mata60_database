<!DOCTYPE html>
<?php
  include ("../metodo/ponto_turistico/conectar-ponto_turistico.php");
  $grupo = selectAllPontos_Turisticos();
  //var_dump($grupo);
?>

<head>
  <meta charset="UTF-8">
  <title>Pontos Turísticos</title>
  <link rel="stylesheet" type="text/css" href="../css/style2.css">
</head>

<header>
    <h1>Lista de Pontos Turísticos</h1>
</header>

<body>
  <div>
    <!-- <div class="box" style="float: left;"> -->
    <div class="box">
      <form name="inserir-ponto_turistico" action="../metodo/inserir-ponto_turistico.php" method="POST">
        <input type="hidden" name="acao" value="inserir" />
        <input type="submit" value="Adicionar Ponto Turístico" name="inserir" /> 
     </form>
    </div>
    <div class="box">
     <form name="busca-avancada-ponto_turistico" action="metodo/busca-avancada-ponto_turistico.php" method="POST">
        <input type="submit" value="Busca Avançada" /> 
     </form>
    </div>
    <div class="box">
     <form name="voltar" action="../">
        <input type="submit" value="Menu" />
     </form>
    </div>
    <div class="box" style="float: right;">
      <form name="pesquisar-ponto_turistico" action="metodo/pesquisar.php" method="POST">
        <input type="text" name="pesquisar" class="form-control" maxlength="20" size="15" placeholder="Busca Rápida...">
        <button type="submit" class="btn btn-primary">Procurar</button>
      </form>
    </div>
  </div>
  
  <table class="responstable">

    <thead>
      <tr>
        <th width="200">Nome</th>
        <th>Tipo</th>
        <th>Descrição</th>
        <th>Logradouro</th>
        <th>Bairro</th>
        <th>Cidade</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      foreach ($grupo as $pontos_turisticos) { ?>
          
        <tr>
          <td><?=$pontos_turisticos["nome"]?></td>
          <td><?=$pontos_turisticos["tipo"]?></td>
          <td><?=$pontos_turisticos["descricao"]?></td>
          <td><?=$pontos_turisticos["logradouro"]?></td>
          <td><?=$pontos_turisticos["bairro"]?></td>
          <td><?=$pontos_turisticos["cidnome"]?></td>
          <td>
            <form name="alterar-ponto_turistico" action="../metodo/ponto_turistico/alterar-ponto_turistico.php" method="POST">
              <input type="hidden" name="ponto_turistico_id" value="<?=$ponto_turisticos["ponto_turistico_id"]?>" />
              <input type="image" width="30" src="../imgs/i-editar.png">
            </form>
          </td>
          <td>
            <form name="excluir-ponto_turistico" action="../metodo/ponto_turistico/conectar-ponto_turistico.php" method="POST">
              <input type="hidden" name="ponto_turistico_id" value="<?=$ponto_turisticos["ponto_turistico_id"]?>" />
              <input type="hidden" name="acao" value="excluir-ponto_turistico" />
              <input type="image" width="30" src="../imgs/i-excluir.png">
            </form>
          </td>
        </tr>

      <?php 
      } ?>
      
    </tbody>
  </table>

</body>

</html>
